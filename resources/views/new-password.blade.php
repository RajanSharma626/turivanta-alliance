@extends('layouts.app')

@section('title', 'New Password - Turivanta Alliance')

@section('content')
<main class="flex-grow flex items-center justify-center w-full pt-32 pb-20 z-10 relative mt-10">
    <div class="max-w-4xl w-full flex flex-col items-center relative z-10 px-6">
        <div class="text-center mb-12">
            <h5 class="text-[#ff014f] font-bold text-[13px] tracking-[0.2em] uppercase mb-4">Step 3 of 3</h5>
            <h2 class="text-[36px] sm:text-[42px] font-extrabold leading-[1.2] tracking-tight text-white mb-4">
                Set New Password
            </h2>
            <p class="text-gray-400 text-[15px] max-w-xl mx-auto">
                Secure your account with a strong new password that you haven't used before.
            </p>
        </div>

        <div class="w-full max-w-[550px] bg-[#0a0a0f]/80 backdrop-blur-2xl border border-white/10 rounded-3xl p-8 sm:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
            <form id="new-password-form" action="{{ route('password.update.submit') }}" method="POST" class="flex flex-col gap-6 w-full">
                @csrf
                
                <div class="flex flex-col gap-3">
                    <label class="text-[13px] font-bold text-white tracking-wide ml-2">New Password</label>
                    <input type="password" name="password" required placeholder="••••••••" class="w-full bg-[#131215] border @error('password') border-rose-500 @else border-white/10 @enderror rounded-2xl px-6 py-[14px] text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all text-[14px]">
                    @error('password') <span class="text-rose-500 text-[11px] font-bold ml-3">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-3">
                    <label class="text-[13px] font-bold text-white tracking-wide ml-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation" required placeholder="••••••••" class="w-full bg-[#131215] border border-white/10 rounded-2xl px-6 py-[14px] text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all text-[14px]">
                </div>

                <button type="submit" id="update-btn" class="mt-4 w-full inline-flex items-center justify-center gap-2 px-10 py-[15px] bg-[#ff014f] text-white font-bold rounded-2xl transition-all duration-300 hover:bg-[#e11d48] hover:shadow-[0_0_20px_rgba(255,1,79,0.4)] hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed">
                    <span id="update-btn-text" class="text-[15px]">Update My Password</span>
                    <svg id="update-btn-icon" class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    const nForm = document.getElementById('new-password-form');
    const uBtn = document.getElementById('update-btn');
    const uBtnTxt = document.getElementById('update-btn-text');
    const uBtnIcn = document.getElementById('update-btn-icon');

    if (nForm) {
        nForm.addEventListener('submit', function() {
            uBtn.disabled = true;
            uBtnTxt.innerText = 'Updating Password...';
            uBtnIcn.classList.add('hidden');
        });
    }
</script>
@endpush
