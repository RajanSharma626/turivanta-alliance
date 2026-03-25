@extends('layouts.app')

@section('title', 'Verify Code - Turivanta Alliance')

@section('content')
<main class="flex-grow flex items-center justify-center w-full pt-32 pb-20 z-10 relative mt-10">
    <div class="max-w-4xl w-full flex flex-col items-center relative z-10 px-6">
        <div class="text-center mb-12">
            <h5 class="text-[#ff014f] font-bold text-[13px] tracking-[0.2em] uppercase mb-4">Step 2 of 3</h5>
            <h2 class="text-[36px] sm:text-[42px] font-extrabold leading-[1.2] tracking-tight text-white mb-4">
                Verify Reset Code
            </h2>
            <p class="text-gray-400 text-[15px] max-w-xl mx-auto">
                Please enter the 6-digit code sent to <span class="text-white font-bold">{{ session('reset_email') }}</span>.
            </p>
        </div>

        @if (session('success'))
            <div class="w-full max-w-[550px] mb-8 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl text-emerald-500 text-sm font-bold flex items-center justify-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full max-w-[550px] bg-[#0a0a0f]/80 backdrop-blur-2xl border border-white/10 rounded-3xl p-8 sm:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
            <form id="otp-verify-form" action="{{ route('password.verify.submit') }}" method="POST" class="flex flex-col gap-8 w-full">
                @csrf
                
                <div class="flex flex-col items-center gap-6 w-full">
                    <div class="flex gap-2 sm:gap-4 justify-center w-full">
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-10 h-12 sm:w-14 sm:h-14 text-center text-xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required autofocus>
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-10 h-12 sm:w-14 sm:h-14 text-center text-xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-10 h-12 sm:w-14 sm:h-14 text-center text-xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-10 h-12 sm:w-14 sm:h-14 text-center text-xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-10 h-12 sm:w-14 sm:h-14 text-center text-xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-10 h-12 sm:w-14 sm:h-14 text-center text-xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                    </div>
                    @if ($errors->has('otp'))
                        <p class="text-rose-500 text-sm font-bold">{{ $errors->first('otp') }}</p>
                    @endif
                </div>

                <button type="submit" id="verify-btn" class="w-full inline-flex items-center justify-center gap-2 px-10 py-[15px] bg-[#ff014f] text-white font-bold rounded-2xl transition-all duration-300 hover:bg-[#e11d48] hover:shadow-[0_0_20px_rgba(255,1,79,0.4)] hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed">
                    <span id="verify-btn-text" class="text-[15px]">Verify & Continue</span>
                    <svg id="verify-btn-icon" class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>

            <div class="text-center pt-8 border-t border-white/5 mt-8 w-full">
                <p class="text-gray-400 text-sm mb-3">Didn't receive the code?</p>
                <div id="resend-container">
                    <p id="timer-text" class="text-xs text-gray-500">
                        Resend available in <span id="timer" class="font-bold text-[#ff014f]">05:00</span>
                    </p>
                    <form id="resend-form" action="{{ route('password.resend') }}" method="POST" class="hidden">
                        @csrf
                        <button type="submit" class="text-white hover:text-[#ff014f] text-sm font-bold transition-all hover:scale-105 active:scale-95 inline-flex items-center gap-2">
                            <span>Resend Reset Code </span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    // OTP Navigation
    const elements = document.querySelectorAll('.otp-input');
    elements.forEach((input, index) => {
        input.addEventListener('keyup', (e) => {
            if (e.key >= 0 && e.key <= 9) {
                if (index < elements.length - 1) elements[index + 1].focus();
            } else if (e.key === 'Backspace') {
                if (index > 0) elements[index - 1].focus();
            }
        });
        
        input.addEventListener('paste', (e) => {
            e.preventDefault();
            const data = (e.clipboardData || window.clipboardData).getData('text').slice(0, 6).split('');
            elements.forEach((input, i) => {
                if (data[i]) input.value = data[i];
            });
            if (data.length > 0) elements[Math.min(data.length, elements.length) - 1].focus();
        });
    });

    // Handle Countdown Timer
    const expirationTime = Number("{{ $expires_at ?? 0 }}") * 1000;
    const timerElem = document.getElementById('timer');
    const timerBox = document.getElementById('timer-text');
    const resendFm = document.getElementById('resend-form');

    function startCounting() {
        const currentTime = new Date().getTime();
        const diff = expirationTime - currentTime;

        if (diff <= 0) {
            timerBox.classList.add('hidden');
            resendFm.classList.remove('hidden');
            return;
        }

        const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const secs = Math.floor((diff % (1000 * 60)) / 1000);

        timerElem.innerHTML = String(mins).padStart(2, '0') + ":" + String(secs).padStart(2, '0');
        setTimeout(startCounting, 1000);
    }

    if (expirationTime > 0) {
        startCounting();
    } else {
        timerBox.classList.add('hidden');
        resendFm.classList.remove('hidden');
    }

    const vForm = document.getElementById('otp-verify-form');
    const vBtn = document.getElementById('verify-btn');
    const vBtnTxt = document.getElementById('verify-btn-text');
    const vBtnIcn = document.getElementById('verify-btn-icon');

    if (vForm) {
        vForm.addEventListener('submit', function() {
            vBtn.disabled = true;
            vBtnTxt.innerText = 'Verifying...';
            vBtnIcn.classList.add('hidden');
        });
    }

    if (resendFm) {
        resendFm.addEventListener('submit', function() {
            const rBtn = resendFm.querySelector('button');
            rBtn.disabled = true;
            rBtn.innerHTML = 'Sending New OTP...';
        });
    }
</script>
@endpush
