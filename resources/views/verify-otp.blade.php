@extends('layouts.app')

@section('title', 'Verify OTP - Turivanta Alliance')

@section('content')
<main class="flex-grow flex items-center justify-center w-full pt-32 pb-20 z-10 relative mt-10">
    <div class="max-w-4xl w-full flex flex-col items-center relative z-10 px-6">
        <div class="text-center mb-12">
            <h5 class="text-[#ff014f] font-bold text-[13px] tracking-[0.2em] uppercase mb-4">Verification Required</h5>
            <h2 class="text-[36px] sm:text-[42px] font-extrabold leading-[1.2] tracking-tight text-white mb-4">
                Verify Your Email
            </h2>
            <p class="text-gray-400 text-[15px] max-w-xl mx-auto">
                We've sent a 6-digit verification code to <span class="text-white font-bold">{{ session('verification_email') }}</span>. Please enter it below to complete your registration.
            </p>
        </div>

        <div class="w-full max-w-[550px] bg-[#0a0a0f]/80 backdrop-blur-2xl border border-white/10 rounded-3xl p-8 sm:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
            <form action="{{ route('otp.verify.submit') }}" method="POST" class="flex flex-col items-center gap-8 w-full">
                @csrf
                
                <div class="flex flex-col items-center gap-6 w-full">
                    <div class="flex gap-2 sm:gap-4 justify-center w-full">
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required autofocus>
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                        <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-14 sm:w-16 sm:h-16 text-center text-2xl font-bold bg-[#131215] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                    </div>

                    @if ($errors->any())
                        <div class="text-rose-500 text-sm font-bold">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-10 py-[15px] bg-[#ff014f] text-white font-bold rounded-2xl transition-all duration-300 hover:bg-[#e11d48] hover:shadow-[0_0_20px_rgba(255,1,79,0.4)] hover:-translate-y-1">
                    <span class="text-[15px]">Verify Account</span>
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
                
                <div class="text-center">
                    <p class="text-gray-400 text-sm mb-2">Didn't receive the code?</p>
                    <button type="button" class="text-white hover:text-[#ff014f] text-sm font-bold transition-colors">Resend Verification Code</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    const inputs = document.querySelectorAll('.otp-input');
    inputs.forEach((input, index) => {
        input.addEventListener('keyup', (e) => {
            if (e.key >= 0 && e.key <= 9) {
                if (index < inputs.length - 1) inputs[index + 1].focus();
            } else if (e.key === 'Backspace') {
                if (index > 0) inputs[index - 1].focus();
            }
        });
        
        // Handle paste
        input.addEventListener('paste', (e) => {
            e.preventDefault();
            const data = e.clipboardData.getData('text').split('');
            inputs.forEach((input, i) => {
                if (data[i]) input.value = data[i];
            });
            if (data.length > 0) inputs[Math.min(data.length, inputs.length) - 1].focus();
        });
    });
</script>
@endpush
