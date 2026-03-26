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

        $otp = rand(100000, 999999);
        $registrationData = $request->only([
            'first_name', 'last_name', 'email', 'gender', 'dob', 'contact_no', 'business_type'
        ]);
        $registrationData['password'] = Hash::make($request->password);
        $registrationData['name'] = $request->first_name . ' ' . $request->last_name;

        // Store in session
        session([
            'registration_data' => $registrationData,
            'verification_email' => $request->email,
            'res_otp' => $otp,
            'res_otp_expires_at' => now()->addMinutes(5)->timestamp
        ]);

        Mail::to($request->email)->send(new VerifyOTPMail($otp));

        return redirect()->route('otp.verify')->with('success', 'A 6-digit verification code has been sent to your email.');
    }

    public function showVerificationNotice()
    {
        $user = Auth::user();
        if ($user && $user->email_verified_at) return redirect()->route('home');
        
        // If not logged in and no registration data, go to login
        if (!$user && !session('registration_data')) return redirect()->route('login');

        return view('verification-notice');
    }

    public function sendOtp()
    {
        $user = Auth::user();
        $email = $user ? $user->email : session('verification_email');
        
        if (!$user && !session('registration_data')) return redirect()->route('login');
        if ($user && $user->email_verified_at) return redirect()->route('home');

        $otp = rand(100000, 999999);
        
        if ($user) {
            $user->otp = $otp;
            $user->otp_expires_at = now()->addMinutes(5);
            $user->save();
        } else {
            session([
                'res_otp' => $otp,
                'res_otp_expires_at' => now()->addMinutes(5)->timestamp
            ]);
        }

        Mail::to($email)->send(new VerifyOTPMail($otp));

        return redirect()->route('otp.verify')->with('success', 'A new 6-digit verification code has been sent to your email.');
    }

    public function showVerifyForm()
    {
        $user = Auth::user();
        
        if ($user) {
            if ($user->email_verified_at) return redirect()->route('home');
            if (!$user->otp) return redirect()->route('verification.notice');
            $expires_at = $user->otp_expires_at->timestamp;
        } else {
            if (!session('registration_data')) return redirect()->route('register');
            if (!session('res_otp')) return redirect()->route('register');
            $expires_at = (int) session('res_otp_expires_at');
        }

        return view('verify-otp', [
            'expires_at' => (int) $expires_at
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|array|size:6',
        ]);

        $otpCode = implode('', $request->otp);
        $user = Auth::user();

        if ($user) {
            if ($user->otp !== $otpCode || now()->gt($user->otp_expires_at)) {
                return back()->withErrors(['otp' => 'Invalid or expired verification code.']);
            }

            $user->otp = null;
            $user->otp_expires_at = null;
            $user->email_verified_at = now();
            $user->save();
        } else {
            $regData = session('registration_data');
            $sessionOtp = session('res_otp');
            $expiresAt = session('res_otp_expires_at');

            if (!$regData || $sessionOtp != $otpCode || now()->timestamp > $expiresAt) {
                return back()->withErrors(['otp' => 'Invalid or expired verification code.']);
            }

            // Create user
            $user = User::create($regData);
            $user->email_verified_at = now();
            $user->save();

            // Clear session
            session()->forget(['registration_data', 'res_otp', 'res_otp_expires_at']);

            Auth::login($user);
        }

        return redirect()->route('profile.index');
    }

    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    public function sendResetOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();
        $otp = rand(100000, 999999);
        
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(5); // Now 5 minutes
        $user->save();

        session(['reset_email' => $user->email]);

        // Log::info('Password reset OTP for ' . $user->email . ': ' . $otp);
        Mail::to($user->email)->send(new \App\Mail\ForgotPasswordMail($user, $otp));

        return redirect()->route('password.verify.form')->with('success', 'A reset code has been sent to your email.');
    }

    public function showVerifyResetOtpForm()
    {
        if (!session('reset_email')) return redirect()->route('password.request');
        
        $user = User::where('email', session('reset_email'))->first();
        $expires = $user ? $user->otp_expires_at?->timestamp : 0;
        
        return view('verify-reset-otp', ['expires_at' => $expires]);
    }

    public function resendResetOtp(Request $request)
    {
        $email = session('reset_email');
        if (!$email) return redirect()->route('password.request');

        $user = User::where('email', $email)->first();
        if (!$user) return redirect()->route('password.request');

        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(5);
        $user->save();

        // Log::info('Resent Password reset OTP for ' . $user->email . ': ' . $otp);
        Mail::to($user->email)->send(new \App\Mail\ForgotPasswordMail($user, $otp));

        return back()->with('success', 'A new reset code has been sent to your email.');
    }

    public function verifyResetOtp(Request $request)
    {
        $request->validate(['otp' => 'required|array|size:6']);

        $otpCode = implode('', $request->otp);
        $email = session('reset_email');
        $user = User::where('email', $email)->first();

        if (!$user || $user->otp !== $otpCode || now()->gt($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Invalid or expired reset code.']);
        }

        // Mark as verified in session
        session(['reset_otp_verified' => true]);

        return redirect()->route('password.reset.form');
    }

    public function showNewPasswordForm()
    {
        if (!session('reset_otp_verified')) return redirect()->route('password.request');
        return view('new-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $email = session('reset_email');
        $user = User::where('email', $email)->first();

        if (!$user || !session('reset_otp_verified')) {
            return redirect()->route('password.request');
        }

        $user->update([
            'password' => Hash::make($request->password),
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        session()->forget(['reset_email', 'reset_otp_verified']);

        return redirect()->route('login')->with('success', 'Password reset successfully. Please login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('web')->attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            
            $user = Auth::guard('web')->user();
            if (!$user->email_verified_at) {
                return redirect()->route('verification.notice');
            }
            
            return redirect()->intended(route('profile.index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
