@extends('layouts.app')

@section('title', 'Verify Your Email - Turivanta Alliance')

@section('content')
<main class="flex-grow flex items-center justify-center w-full pt-32 pb-20 z-10 relative mt-10">
    <div class="max-w-4xl w-full flex flex-col items-center relative z-10 px-6">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-[#ff014f]/10 rounded-full mb-6 border border-[#ff014f]/20">
                <svg class="w-10 h-10 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <h5 class="text-[#ff014f] font-bold text-[13px] tracking-[0.2em] uppercase mb-4">Verification Required</h5>
            <h2 class="text-[36px] sm:text-[42px] font-extrabold leading-[1.2] tracking-tight text-white mb-4">
                Almost there, {{ Auth::user()->first_name }}!
            </h2>
            <p class="text-gray-400 text-[15px] max-w-xl mx-auto">
                Before you can start using your account, we need to verify your email address. Click the button below to receive a 6-digit verification code.
            </p>
        </div>

        <div class="w-full max-w-[550px] bg-[#0a0a0f]/80 backdrop-blur-2xl border border-white/10 rounded-3xl p-8 sm:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.5)] text-center">
            <form action="{{ route('otp.send') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full inline-flex items-center justify-center gap-3 px-10 py-[16px] bg-[#ff014f] text-white font-bold rounded-2xl transition-all duration-300 hover:bg-[#e11d48] hover:shadow-[0_0_30px_rgba(255,1,79,0.4)] hover:-translate-y-1">
                    <span class="text-[16px]">Send Verification Code</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
                </button>
            </form>
            
            <p class="mt-8 text-sm text-gray-500">
                Signed in as <span class="text-gray-300 font-medium">{{ Auth::user()->email }}</span>. 
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-[#ff014f] hover:underline font-bold ml-1">Sign out</button>
                </form>
            </p>
        </div>
    </div>
</main>
@endsection
