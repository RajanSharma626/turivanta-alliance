@extends('layouts.admin')

@section('title', 'Manage Admins - Turivanta Admin')
@section('page_title', 'Administrators Management')

@section('content')
<div class="glass-panel p-8 rounded-[40px] border border-white/5 overflow-hidden">
    <div class="flex flex-col sm:flex-row items-center justify-between mb-8 px-4 gap-4">
        <h3 class="text-white font-black heading-font text-lg tracking-tight uppercase italic grow">System Administrators</h3>
        <button class="px-8 py-3 bg-[#ff014f] text-white font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-[#e11d48] transition-all shadow-[0_10px_20px_rgba(255,1,79,0.2)] hover:-translate-y-1">
            + Create Admin
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @forelse($admins as $admin)
        <div class="p-8 rounded-[35px] bg-white/[0.02] border border-white/5 group hover:bg-white/[0.04] hover:border-[#ff014f]/20 transition-all text-center relative overflow-hidden">
            <div class="absolute -right-5 -top-5 w-24 h-24 bg-[#ff014f]/5 rounded-full blur-2xl group-hover:bg-[#ff014f]/10 transition-colors"></div>
            
            <div class="w-20 h-20 bg-gradient-to-tr from-[#ff014f] to-[#e11d48] rounded-[28px] border-4 border-white/5 flex items-center justify-center font-black text-2xl italic text-white mx-auto mb-6 group-hover:rotate-6 transition-transform shadow-xl">
                 {{ substr($admin->name, 0, 1) }}
            </div>
            
            <p class="text-white text-lg font-black heading-font tracking-tight italic">{{ $admin->name }}</p>
            <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-4">{{ $admin->email }}</p>
            
            <div class="flex items-center justify-center gap-2 mb-8">
                <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest bg-[#ff014f]/10 text-[#ff014f] border border-[#ff014f]/20">Root Admin</span>
                <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest bg-white/5 text-gray-500 border border-white/10 italic">Super</span>
            </div>
            
            <div class="flex gap-3 mt-4 border-t border-white/5 pt-6">
                <button class="flex-1 py-3 bg-white/5 text-gray-400 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-white/10 hover:text-white transition-all">Details</button>
                <button class="flex-1 py-3 bg-white/5 text-rose-500/50 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-rose-500/10 hover:text-rose-500 transition-all italic">Suspend</button>
            </div>
        </div>
        @empty
         <div class="col-span-full py-20 text-center">
             <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <p class="text-gray-500 font-bold uppercase text-xs tracking-widest">No administrator accounts detected</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
