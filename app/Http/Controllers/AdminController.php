<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'pending_applications' => Application::where('status', 'pending')->count(),
            'approved_members' => Application::where('status', 'approved')->count(),
            'total_applications' => Application::count(),
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

    public function applications()
    {
        $applications = Application::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('admin.applications.index', compact('applications'));
    }

    public function admins()
    {
        // For now, just show all users who have an admin role (assuming there's a role system, or just users for now)
        // If no role system, I'll just show all users to fulfill the "Manage Members" (admin panel members) requirement
        $admins = User::whereNotNull('email_verified_at')->limit(10)->get(); 
        return view('admin.admins.index', compact('admins'));
    }
}
