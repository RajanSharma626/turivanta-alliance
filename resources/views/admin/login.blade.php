@extends('layouts.app')

@section('title', 'Admin Login - Turivanta Alliance')

@section('content')
<main class="flex-grow flex items-center justify-center w-full pt-32 pb-20 z-10 relative mt-10">
    <div class="max-w-4xl w-full flex flex-col items-center relative z-10 px-4 sm:px-6">
        
        <div class="text-center mb-8 w-full flex flex-col items-center">
            <h5 class="text-[#ff014f] font-black text-[10px] sm:text-[11px] tracking-[0.4em] uppercase mb-4 py-2 px-6 bg-white/5 rounded-full border border-white/10">Authorized Personnel Only</h5>
            <h2 class="text-[32px] sm:text-[42px] font-black leading-[1.1] tracking-tighter text-white mb-3 uppercase italic">
                Control <span class="text-[#ff014f]">Panel</span> Login
            </h2>
            <p class="text-gray-500 text-[14px] sm:text-[15px] max-w-sm mx-auto font-medium">
                Please enter your administrative credentials to access the system core.
            </p>
        </div>

        <!-- Solid Form Card -->
        <div class="w-full max-w-[500px] bg-[#05050a] border border-white/5 rounded-[40px] p-8 sm:p-12 shadow-[0_40px_100px_rgba(0,0,0,0.8)] relative overflow-hidden group">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#ff014f]/5 rounded-full blur-[100px] group-hover:bg-[#ff014f]/10 transition-colors"></div>
            
            <form action="{{ route('admin.login.submit') }}" method="POST" class="flex flex-col gap-8 w-full relative z-10">
                @csrf
                
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-2">Email Address</label>
                    <div class="relative group/input">
                        <input type="email" name="email" required placeholder="admin@turivanta.com" value="{{ old('email') }}" class="w-full bg-[#0a0a0f] border @error('email') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-[18px] text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-[14px] font-bold">
                        <svg class="w-5 h-5 absolute right-6 top-1/2 -translate-y-1/2 text-gray-700 group-focus-within/input:text-[#ff014f] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    @error('email') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3 mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-3">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Password</label>
                    </div>
                    <div class="relative group/input">
                        <input type="password" name="password" required placeholder="••••••••••••" class="w-full bg-[#0a0a0f] border @error('password') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-[18px] text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-[14px] font-bold">
                        <svg class="w-5 h-5 absolute right-6 top-1/2 -translate-y-1/2 text-gray-700 group-focus-within/input:text-[#ff014f] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    @error('password') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3 mt-1">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="mt-4 w-full inline-flex items-center justify-center gap-3 px-10 py-[20px] bg-[#ff014f] text-white font-black uppercase text-[12px] tracking-[0.2em] rounded-2xl transition-all duration-500 hover:bg-[#e11d48] hover:shadow-[0_20px_40px_rgba(255,1,79,0.3)] hover:-translate-y-1 active:scale-95 group/btn">
                    <span>LOGIN</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </button>
            </form>

        </div>

    </div>
</main>
@endsection
