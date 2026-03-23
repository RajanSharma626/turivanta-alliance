<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\VerifyOTPMail;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'contact_no' => 'required|string|unique:users,contact_no',
            'business_type' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'contact_no' => $request->contact_no,
            'business_type' => $request->business_type,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    public function showVerificationNotice()
    {
        $user = Auth::user();
        if (!$user) return redirect()->route('login');
        if ($user->email_verified_at) return redirect()->route('home');

        return view('verification-notice');
    }

    public function sendOtp()
    {
        $user = Auth::user();
        if (!$user) return redirect()->route('login');
        if ($user->email_verified_at) return redirect()->route('home');

        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        Log::info("Verification OTP for {$user->email}: {$otp}");
        Mail::to($user->email)->send(new VerifyOTPMail($otp));

        return redirect()->route('otp.verify');
    }

    public function showVerifyForm()
    {
        $user = Auth::user();
        if (!$user) return redirect()->route('login');
        if ($user->email_verified_at) return redirect()->route('home');
        if (!$user->otp) return redirect()->route('verification.notice');

        return view('verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|array|size:6',
        ]);

        $otpCode = implode('', $request->otp);
        $user = Auth::user();

        if (!$user || $user->otp !== $otpCode || now()->gt($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Invalid or expired verification code.']);
        }

        // Clear OTP and verify email
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            if (!$user->email_verified_at) {
                return redirect()->route('verification.notice');
            }
            
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
