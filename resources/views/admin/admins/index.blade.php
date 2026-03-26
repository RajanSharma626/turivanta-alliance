@extends('layouts.admin')

@section('title', 'Manage Admins - Turivanta Admin')
@section('page_title', 'Administrators Management')

@section('content')
<div class="glass-panel p-8 rounded-[40px] border border-white/5 overflow-hidden">
    @if(session('success'))
    <div class="mb-8 mx-4 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 animate-fade-in">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-8 mx-4 p-4 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-500 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 animate-fade-in">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        {{ session('error') }}
    </div>
    @endif

    <div class="flex flex-col sm:flex-row items-center justify-between mb-8 px-4 gap-4">
        <h3 class="text-white font-black heading-font text-lg tracking-tight uppercase italic grow">System Administrators</h3>
        <a href="{{ route('admin.admins.create') }}" class="px-8 py-3 bg-[#ff014f] text-white font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-[#e11d48] transition-all shadow-[0_10px_20px_rgba(255,1,79,0.2)] hover:-translate-y-1">
            + Create Admin
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @forelse($admins as $admin)
        <div class="p-8 rounded-[35px] bg-white/[0.02] border border-white/5 group hover:bg-white/[0.04] hover:border-[#ff014f]/20 transition-all text-center relative overflow-hidden @if($admin->status === 'suspended') opacity-60 @endif">
            <div class="absolute -right-5 -top-5 w-24 h-24 bg-[#ff014f]/5 rounded-full blur-2xl group-hover:bg-[#ff014f]/10 transition-colors"></div>
            
            <div class="w-20 h-20 bg-gradient-to-tr from-[#ff014f] to-[#e11d48] rounded-[28px] border-4 border-white/5 flex items-center justify-center font-black text-2xl italic text-white mx-auto mb-6 group-hover:rotate-6 transition-transform shadow-xl">
                 {{ substr($admin->name, 0, 1) }}
            </div>
            
            <p class="text-white text-lg font-black heading-font tracking-tight italic">{{ $admin->name }}</p>
            <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-4">{{ $admin->email }}</p>
            
            <div class="flex items-center justify-center gap-2 mb-8 uppercase">
                <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest bg-[#ff014f]/10 text-[#ff014f] border border-[#ff014f]/20">{{ $admin->role }}</span>
                @if($admin->status === 'active')
                    <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest bg-emerald-500/10 text-emerald-500 border border-emerald-500/20 italic">active</span>
                @else
                    <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest bg-rose-500/10 text-rose-500 border border-rose-500/20 italic">suspended</span>
                @endif
            </div>
            
            <div class="flex gap-3 mt-4 border-t border-white/5 pt-6">
                <a href="{{ route('admin.admins.edit', $admin) }}" class="flex-1 py-3 bg-white/5 text-gray-400 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-white/10 hover:text-white transition-all inline-block">Edit</a>
                
                <form action="{{ route('admin.admins.toggle-status', $admin) }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full py-3 bg-white/5 text-rose-500/50 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-rose-500/10 hover:text-rose-500 transition-all italic">
                        {{ $admin->status === 'active' ? 'Suspend' : 'Reactivate' }}
                    </button>
                </form>
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
