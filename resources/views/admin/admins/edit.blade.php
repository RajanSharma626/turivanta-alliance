@extends('layouts.admin')

@section('title', 'Edit Admin - Turivanta Admin')
@section('page_title', 'Update Administrator Profile')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="glass-panel p-10 rounded-[40px] border border-white/5 relative overflow-hidden group">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#ff014f]/5 rounded-full blur-[100px] group-hover:bg-[#ff014f]/10 transition-colors"></div>
        
        <div class="flex flex-col md:flex-row items-center gap-10 relative z-10 mb-12">
            <!-- Avatar -->
            <div class="w-32 h-32 bg-gradient-to-tr from-[#ff014f] to-[#e11d48] rounded-[40px] border-8 border-white/5 flex items-center justify-center font-black text-4xl italic text-white shadow-2xl">
                 {{ substr($admin->name, 0, 1) }}
            </div>

            <!-- Basic Info Headers -->
            <div class="text-center md:text-left grow">
                <h3 class="text-white font-black heading-font text-3xl tracking-tighter uppercase italic mb-2">{{ $admin->name }}</h3>
                <p class="text-gray-500 font-bold uppercase tracking-[0.3em] text-[10px] mb-6">Editing Profile #{{ str_pad($admin->id, 5, '0', STR_PAD_LEFT) }}</p>
                
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-3">
                    <span class="px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-widest bg-[#ff014f]/10 text-[#ff014f] border border-[#ff014f]/20 shadow-lg shadow-[#ff014f]/5">{{ $admin->role }}</span>
                    @if($admin->status === 'active')
                        <span class="px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-widest bg-emerald-500/10 text-emerald-500 border border-emerald-500/20 italic">Fully Active</span>
                    @else
                        <span class="px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-widest bg-rose-500/10 text-rose-500 border border-rose-500/20 italic">Suspended</span>
                    @endif
                </div>
            </div>
        </div>

        <form action="{{ route('admin.admins.update', $admin) }}" method="POST" class="space-y-8 relative z-10">
            @csrf
            @method('PATCH')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Name -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Full Legal Name</label>
                    <input type="text" name="name" required placeholder="John Doe" value="{{ old('name', $admin->name) }}" class="w-full bg-white/[0.02] border @error('name') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold">
                    @error('name') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>

                <!-- Role -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">System Role</label>
                    <select name="role" required class="w-full bg-[#030305] border @error('role') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold appearance-none selection:bg-[#ff014f]">
                        <option value="Super Admin" {{ old('role', $admin->role) == 'Super Admin' ? 'selected' : '' }} @if($superAdminExists) disabled class="text-gray-700" @endif>Super Admin @if($superAdminExists && $admin->role !== 'Super Admin') (Exists) @endif</option>
                        <option value="Admin" {{ old('role', $admin->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Manager" {{ old('role', $admin->role) == 'Manager' ? 'selected' : '' }}>Manager</option>
                    </select>
                    @error('role') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Email -->
            <div class="flex flex-col gap-3">
                <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Email Identity</label>
                <input type="email" name="email" required placeholder="personnel@turivanta.com" value="{{ old('email', $admin->email) }}" class="w-full bg-white/[0.02] border @error('email') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold">
                @error('email') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
            </div>

            <!-- Password Change -->
            <div class="flex flex-col gap-3">
                <div class="flex justify-between items-center px-2">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">Update Password</label>
                    <span class="text-[9px] text-gray-600 font-bold uppercase tracking-widest">Leave blank to keep current</span>
                </div>
                <input type="password" name="password" placeholder="••••••••••••" class="w-full bg-white/[0.02] border @error('password') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold">
                @error('password') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-between gap-4 pt-10 mt-10 border-t border-white/5">
                <a href="{{ route('admin.admins') }}" class="px-8 py-4 bg-white/5 text-gray-400 font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-white/10 hover:text-white transition-all">
                    Cancel Changes
                </a>
                
                <div class="flex items-center gap-4">
                    <button type="submit" class="px-10 py-4 bg-[#ff014f] text-white font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-[#e11d48] transition-all shadow-[0_15px_30px_rgba(255,1,79,0.3)] hover:-translate-y-1 active:scale-95">
                        Save Identity Updates
                    </button>
                </div>
            </div>
        </form>

        <div class="mt-8 pt-8 border-t border-white/5 flex justify-end">
            <form action="{{ route('admin.admins.toggle-status', $admin) }}" method="POST">
                @csrf
                <button type="submit" class="px-8 py-3 @if($admin->status === 'active') bg-rose-500/5 text-rose-500/60 @else bg-emerald-500/5 text-emerald-500/60 @endif text-[10px] font-black uppercase tracking-[0.2em] rounded-xl hover:bg-white/5 transition-all italic border border-white/5">
                    @if(auth('admin')->id() === $admin->id)
                        Self-Suspension Restricted
                    @else
                        {{ $admin->status === 'active' ? 'Deactivate Account' : 'Reactivate Account' }}
                    @endif
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
