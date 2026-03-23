@extends('layouts.app')

@section('title', 'Login - Turivanta Alliance')

@section('content')
<main class="flex-grow flex items-center justify-center w-full pt-32 pb-20 z-10 relative mt-10">
        <div class="max-w-4xl w-full flex flex-col items-center relative z-10 px-4 sm:px-6">
            
            <div class="text-center mb-8 w-full flex flex-col items-center">
                <h5 class="text-[#ff014f] font-bold text-[12px] sm:text-[13px] tracking-[0.2em] uppercase mb-4">Welcome Back</h5>
                <h2 class="text-[32px] sm:text-[42px] font-extrabold leading-[1.2] tracking-tight text-white mb-3">
                    Sign in to your account
                </h2>
                <p class="text-gray-400 text-[14px] sm:text-[15px] max-w-sm mx-auto">
                    Secure access with your registered email and password.
                </p>
            </div>

            <!-- Solid Form Card -->
            <div class="w-full max-w-[550px] bg-[#0a0a0f] border border-[#ffffff0a] rounded-3xl p-8 sm:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                
                <form action="{{ route('login.submit') }}" method="POST" class="flex flex-col gap-6 w-full">
                    @csrf
                    
                    <div class="flex flex-col gap-3">
                        <label class="text-[13px] font-bold text-white tracking-wide ml-2">Email Address</label>
                        <input type="email" name="email" required placeholder="name@company.com" value="{{ old('email') }}" class="w-full bg-[#131215] border @error('email') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-[14px] text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all text-[14px]">
                        @error('email') <span class="text-rose-500 text-[11px] font-bold ml-3">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col gap-3">
                        <div class="flex justify-between items-center px-1">
                            <label class="text-[13px] font-bold text-white tracking-wide ml-1">Password</label>
                            <a href="#" class="text-[12px] text-gray-500 hover:text-[#ff014f] transition-colors font-medium">Forgot Password?</a>
                        </div>
                        <input type="password" name="password" required placeholder="••••••••" class="w-full bg-[#131215] border @error('password') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-[14px] text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all text-[14px]">
                        @error('password') <span class="text-rose-500 text-[11px] font-bold ml-3">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center gap-2 px-2">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded border-white/10 bg-[#131215] text-[#ff014f] focus:ring-[#ff014f]">
                        <label for="remember" class="text-xs text-gray-400 font-medium cursor-pointer select-none">Remember this device</label>
                    </div>

                    <button type="submit" class="mt-2 w-full inline-flex items-center justify-center gap-2 px-10 py-[15px] bg-[#ff014f] text-white font-bold rounded-2xl transition-all duration-300 hover:bg-[#e11d48] hover:shadow-[0_0_20px_rgba(255,1,79,0.4)] hover:-translate-y-0.5">
                        <span class="text-[15px] tracking-wide font-bold">Sign In to Account</span>
                        <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>

            </div>

            <p class="text-center text-gray-400 text-sm mt-6 font-medium">
                Don't have an account? <a href="{{ route('register') }}" class="text-white hover:text-[#ff014f] font-bold transition-colors">Register here</a>
            </p>

        </div>
    </main>
@endsection
