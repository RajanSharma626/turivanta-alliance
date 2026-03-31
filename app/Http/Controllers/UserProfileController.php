<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function edit()
    {
        return view('settings', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'contact_no' => 'required|string|unique:users,contact_no,' . $user->id,
            'gender' => 'required|string',
            'dob' => 'required|date',
            'business_type' => 'required|string',
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'business_type' => $request->business_type,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Your current password does not match our records.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password changed successfully.');
    }

    public function downloadInvoice()
    {
        $user = Auth::user();
        $subscription = $user->currentSubscription;

        if (!$subscription) {
            return back()->with('error', 'No active subscription found.');
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('invoices.subscription', [
            'user' => $user,
            'subscription' => $subscription,
            'invoice_no' => 'INV-' . strtoupper(substr(md5($subscription->id . $subscription->created_at), 0, 8)),
            'date' => $subscription->created_at->format('M d, Y'),
        ]);

        return $pdf->download('invoice-' . $subscription->id . '.pdf');
    }
}
