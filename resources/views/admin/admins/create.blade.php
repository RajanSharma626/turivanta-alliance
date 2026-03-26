@extends('layouts.admin')

@section('title', 'Create Admin - Turivanta Admin')
@section('page_title', 'Create New Administrator')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="glass-panel p-10 rounded-[40px] border border-white/5 relative overflow-hidden group">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#ff014f]/5 rounded-full blur-[100px] group-hover:bg-[#ff014f]/10 transition-colors"></div>
        
        <div class="mb-10 relative z-10">
            <h3 class="text-white font-black heading-font text-2xl tracking-tighter uppercase italic mb-2">Initialize Account</h3>
            <p class="text-gray-500 text-sm font-medium">Define security credentials for new system personnel.</p>
        </div>

        <form action="{{ route('admin.admins.store') }}" method="POST" class="space-y-8 relative z-10 text-justify">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Name -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Full Legal Name</label>
                    <input type="text" name="name" required placeholder="John Doe" value="{{ old('name') }}" class="w-full bg-white/[0.02] border @error('name') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold">
                    @error('name') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>

                <!-- Role -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">System Role</label>
                    <select name="role" required class="w-full bg-[#030305] border @error('role') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold appearance-none selection:bg-[#ff014f]">
                        <option value="Super Admin" {{ old('role') == 'Super Admin' ? 'selected' : '' }} @if($superAdminExists) disabled class="text-gray-700" @endif>Super Admin @if($superAdminExists) (Exists) @endif</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : (!old('role') && $superAdminExists ? 'selected' : '') }}>Admin</option>
                        <option value="Manager" {{ old('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                    </select>
                    @error('role') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Email -->
            <div class="flex flex-col gap-3">
                <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Email Identity</label>
                <input type="email" name="email" required placeholder="personnel@turivanta.com" value="{{ old('email') }}" class="w-full bg-white/[0.02] border @error('email') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold">
                @error('email') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
            </div>

            <!-- Password -->
            <div class="flex flex-col gap-3">
                <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Password</label>
                <input type="password" name="password" required placeholder="••••••••••••" class="w-full bg-white/[0.02] border @error('password') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold">
                @error('password') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-end gap-4 pt-6 mt-6 border-t border-white/5">
                <a href="{{ route('admin.admins') }}" class="px-8 py-4 bg-white/5 text-gray-400 font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-white/10 hover:text-white transition-all">
                    Cancel
                </a>
                <button type="submit" class="px-10 py-4 bg-[#ff014f] text-white font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-[#e11d48] transition-all shadow-[0_15px_30px_rgba(255,1,79,0.3)] hover:-translate-y-1 active:scale-95">
                    Create Personnel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
