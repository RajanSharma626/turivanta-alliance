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
                    Secure access with your registered email and a one-time password.
                </p>
            </div>

            <!-- Solid Form Card -->
            <div class="w-full max-w-[850px] bg-[#0a0a0f] border border-[#ffffff0a] rounded-2xl p-8 sm:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.5)] overflow-hidden">
                
                <!-- STEP 1: Enter Email -->
                <form id="step-email" action="#" onsubmit="event.preventDefault(); showOtpStep();" class="flex flex-col gap-5 w-full opacity-100 transition-opacity duration-300">
                    <div class="flex flex-col gap-3">
                        <label class="text-[13px] font-bold text-white tracking-wide ml-2">Email Address</label>
                        <input type="email" id="email-input" required placeholder="name@company.com" class="w-full bg-[#131215] border border-white/5 rounded-full px-6 py-[14px] text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all text-[14px]">
                    </div>

                    <button type="submit" class="mt-1 w-full inline-flex items-center justify-center gap-2 px-10 py-[14px] bg-[#ff014f] text-white font-bold rounded-full transition-all duration-300 hover:bg-[#e11d48] hover:shadow-[0_0_20px_rgba(255,1,79,0.4)]">
                        <span class="text-[15px] tracking-wide inline-flex items-center">Send OTP &nbsp;&rarr;</span>
                    </button>
                </form>

                <!-- STEP 2: Enter OTP -->
                <form id="step-otp" action="/" class="hidden flex-col items-center gap-6 w-full opacity-0 transition-opacity duration-300">
                    
                    <div class="flex items-center w-full max-w-xl gap-3 bg-[#131215] p-4 rounded-xl border border-white/5 relative">
                        <div class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center text-[#ff014f]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-500 font-bold uppercase tracking-wider">Code sent to:</span>
                            <span id="display-email" class="text-sm text-gray-200 font-medium truncate max-w-[150px] sm:max-w-[300px]">name@company.com</span>
                        </div>
                        <button type="button" onclick="showEmailStep()" class="absolute right-4 text-xs font-bold text-[#ff014f] hover:text-white transition-colors">Change</button>
                    </div>

                    <div class="flex flex-col items-center gap-4 w-full">
                        <label class="text-sm font-semibold text-gray-300">Enter 6-digit OTP</label>
                        <div class="flex gap-2 sm:gap-4 justify-center w-full max-w-xl">
                            <input type="text" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                            <input type="text" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                            <input type="text" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                            <input type="text" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                            <input type="text" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                            <input type="text" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                        </div>
                    </div>

                    <button type="submit" class="mt-4 w-full max-w-xl inline-flex items-center justify-center gap-2 px-10 py-[15px] bg-[#ff014f] text-white font-bold rounded-xl transition-all duration-300 hover:bg-[#e11d48] hover:shadow-[0_0_20px_rgba(255,1,79,0.4)]">
                        <span class="text-[15px]">Verify & Login</span>
                        <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                    
                    <div class="text-center mt-2">
                        <button type="button" class="text-gray-400 hover:text-white text-sm font-medium transition-colors">Resend Code in <span id="timer" class="text-[#ff014f]">0:30</span></button>
                    </div>
                </form>

            </div>

            <p class="text-center text-gray-400 text-sm mt-6 font-medium">
                Don't have an account? <a href="{{ route('register') }}" class="text-white hover:text-[#ff014f] font-bold transition-colors">Register here</a>
            </p>

        </div>
    </main>
@endsection

@push('scripts')
<script>
    function showOtpStep() {
        const email = document.getElementById('email-input').value;
        document.getElementById('display-email').innerText = email;
        
        const stepEmail = document.getElementById('step-email');
        const stepOtp = document.getElementById('step-otp');
        
        stepEmail.classList.add('opacity-0');
        setTimeout(() => {
            stepEmail.classList.add('hidden');
            stepOtp.classList.remove('hidden');
            setTimeout(() => {
                stepOtp.classList.remove('opacity-0');
                stepOtp.classList.add('opacity-100');
                document.querySelector('.otp-input').focus();
            }, 50);
        }, 300);
    }

    function showEmailStep() {
        const stepEmail = document.getElementById('step-email');
        const stepOtp = document.getElementById('step-otp');
        
        stepOtp.classList.add('opacity-0');
        setTimeout(() => {
            stepOtp.classList.add('hidden');
            stepEmail.classList.remove('hidden');
            setTimeout(() => {
                stepEmail.classList.remove('opacity-0');
                stepEmail.classList.add('opacity-100');
            }, 50);
        }, 300);
    }

    // OTP Input handle
    const inputs = document.querySelectorAll('.otp-input');
    inputs.forEach((input, index) => {
        input.addEventListener('keyup', (e) => {
            if (e.key >= 0 && e.key <= 9) {
                if (index < inputs.length - 1) inputs[index + 1].focus();
            } else if (e.key === 'Backspace') {
                if (index > 0) inputs[index - 1].focus();
            }
        });
    });
</script>
@endpush
