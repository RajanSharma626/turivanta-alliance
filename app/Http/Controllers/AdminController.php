<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use App\Models\Admin;
use App\Models\Subscription;
use App\Models\SubscriptionHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin && $admin->status !== 'active') {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This administrative account has been suspended.',
            ]);
        }

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided administrative credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function create()
    {
        $superAdminExists = Admin::whereRaw('LOWER(role) = ?', ['super admin'])->exists();
        return view('admin.admins.create', compact('superAdminExists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'role' => 'required|string|in:Super Admin,Admin,Manager',
            'password' => ['required', Password::defaults()],
        ]);

        if (strtolower($request->role) === 'super admin' && Admin::whereRaw('LOWER(role) = ?', ['super admin'])->exists()) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'role' => 'A Super Admin already exists in the system. Only one Super Admin account is permitted.',
            ]);
        }

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.admins')->with('success', 'New administrator account initialized successfully.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'pending_applications' => Application::where('status', 'pending')->count(),
            'approved_members' => Application::where('status', 'approved')->count(),
            'total_applications' => Application::count(),
            'total_admins' => Admin::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function members()
    {
        $members = User::whereNotNull('email_verified_at')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('admin.members.index', compact('members'));
    }

    public function applications(Request $request)
    {
        $filter = $request->get('filter', 'all');
        $query = Application::with('user');

        if ($filter === 'pending') {
            $query->whereNotNull('application_no')->where('status', 'pending');
        } elseif ($filter === 'draft') {
            $query->whereNull('application_no');
        } elseif ($filter === 'approved') {
            $query->where('status', 'approved');
        } elseif ($filter === 'rejected') {
            $query->where('status', 'rejected');
        }

        // Custom Sort Order: Pending -> Draft -> Approved -> Rejected
        $query->orderByRaw("
            CASE 
                WHEN (application_no IS NOT NULL AND status = 'pending') THEN 1
                WHEN application_no IS NULL THEN 2
                WHEN status = 'approved' THEN 3
                WHEN status = 'rejected' THEN 4
                ELSE 5
            END ASC
        ")->orderBy('created_at', 'desc');

        $applications = $query->paginate(15)->appends(['filter' => $filter]);
        
        return view('admin.applications.index', compact('applications', 'filter'));
    }

    public function showApplication(Application $application)
    {
        $application->load('user');
        return view('admin.applications.show', compact('application'));
    }

    public function updateApplicationStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected,pending',
            'rejection_reason' => 'required_if:status,rejected|nullable|string|max:1000',
        ]);

        $application->update([
            'status' => $request->status,
            'rejection_reason' => $request->status === 'rejected' ? $request->rejection_reason : null,
        ]);

        return redirect()->route('admin.applications')->with('success', "Application #{$application->application_no} status updated to {$request->status} successfully.");
    }

    public function admins()
    {
        $admins = Admin::orderBy('id', 'desc')->get(); 
        return view('admin.admins.index', compact('admins'));
    }

    public function edit(Admin $admin)
    {
        $superAdminExists = Admin::whereRaw('LOWER(role) = ?', ['super admin'])->where('id', '!=', $admin->id)->exists();
        return view('admin.admins.edit', compact('admin', 'superAdminExists'));
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'role' => 'required|string|in:Super Admin,Admin,Manager',
            'password' => ['nullable', Password::defaults()],
        ]);

        if (strtolower($request->role) === 'super admin' && Admin::whereRaw('LOWER(role) = ?', ['super admin'])->where('id', '!=', $admin->id)->exists()) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'role' => 'A Super Admin already exists in the system. Only one Super Admin account is permitted.',
            ]);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.admins')->with('success', "Administrative record for {$admin->name} updated successfully.");
    }

    public function toggleStatus(Admin $admin)
    {
        // 1. Prevent self-suspension
        if (Auth::guard('admin')->id() === $admin->id) {
            return back()->with('error', 'Critical Error: System safety protocol prevented self-suspension.');
        }

        // 2. Only Super Admin can suspend others
        if (strtolower(Auth::guard('admin')->user()->role) !== 'super admin') {
            return back()->with('error', 'Access Denied: Administrative privileges insufficient for this action.');
        }

        // 3. Toggle status
        $admin->status = ($admin->status === 'active' ? 'suspended' : 'active');
        $admin->save();

        $verb = ($admin->status === 'active' ? 'Reactivated' : 'Suspended');
        return back()->with('success', "Administrator {$admin->name} has been {$verb} successfully.");
    }

    public function showMemberSubscription(User $member)
    {
        $member->load(['subscriptions' => function($q) {
            $q->orderBy('created_at', 'desc');
        }, 'subscriptionHistories' => function($q) {
            $q->orderBy('created_at', 'desc');
        }]);
        return view('admin.members.subscription', compact('member'));
    }

    public function updateMemberSubscription(Request $request, User $member)
    {
        $request->validate([
            'plan_name' => 'required|string',
            'starts_at' => 'required|date',
            'expires_at' => 'required|date|after:starts_at',
            'price' => 'required|numeric',
            'currency' => 'required|string|in:INR,USD',
            'status' => 'required|in:active,expired,cancelled,pending',
            'notes' => 'nullable|string'
        ]);

        // Optional: Deactivate current active subscriptions
        if ($request->status === 'active') {
            Subscription::where('user_id', $member->id)->where('status', 'active')->update(['status' => 'expired']);
        }

        $subscription = Subscription::create([
            'user_id' => $member->id,
            'plan_name' => $request->plan_name,
            'price' => $request->price,
            'currency' => $request->currency,
            'starts_at' => $request->starts_at,
            'expires_at' => $request->expires_at,
            'status' => $request->status,
            'assigned_by_role' => Auth::guard('admin')->user()->role,
            'assigned_by_id' => Auth::guard('admin')->id(),
        ]);

        SubscriptionHistory::create([
            'user_id' => $member->id,
            'subscription_id' => $subscription->id,
            'plan_name' => $request->plan_name,
            'action' => 'assigned',
            'admin_id' => Auth::guard('admin')->id(),
            'notes' => $request->notes
        ]);

        return redirect()->route('admin.members')->with('success', "Subscription for {$member->name} updated successfully.");
    }
}
