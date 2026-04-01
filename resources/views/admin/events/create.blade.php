@extends('layouts.admin')

@section('title', 'Create Events - Turivanta Admin')
@section('page_title', 'Create New Events')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="glass-panel p-10 rounded-[40px] border border-white/5 relative overflow-hidden group">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#ff014f]/5 rounded-full blur-[100px] group-hover:bg-[#ff014f]/10 transition-colors"></div>
        
        <div class="mb-10 relative z-10">
            <h3 class="text-white font-black heading-font text-2xl tracking-tighter uppercase italic mb-2">Initialize Events</h3>
            <p class="text-gray-500 text-sm font-medium">Define details for upcoming community or physical events.</p>
        </div>

        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 relative z-10">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Title -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Event Name</label>
                    <input type="text" name="title" required placeholder="Workshop on AI" value="{{ old('title') }}" class="w-full bg-white/[0.02] border @error('title') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold">
                    @error('title') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>

                <!-- Event Date -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Date & Time</label>
                    <input type="datetime-local" name="event_date" required value="{{ old('event_date') }}" class="w-full bg-white/[0.02] border @error('event_date') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold [color-scheme:dark]">
                    @error('event_date') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Location -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Location (Address or Link)</label>
                    <input type="text" name="location" required placeholder="New York, NY or Zoom Link" value="{{ old('location') }}" class="w-full bg-white/[0.02] border @error('location') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold">
                    @error('location') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>

                <!-- Type -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Event Type</label>
                    <select name="is_online" required class="w-full bg-[#030305] border @error('is_online') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold appearance-none">
                        <option value="0" {{ old('is_online') == '0' ? 'selected' : '' }}>Physical Event</option>
                        <option value="1" {{ old('is_online') == '1' ? 'selected' : '' }}>Online Event</option>
                    </select>
                    @error('is_online') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Description -->
            <div class="flex flex-col gap-3">
                <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Description</label>
                <textarea name="description" rows="4" placeholder="Briefly describe the event..." class="w-full bg-white/[0.02] border @error('description') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold resize-none">{{ old('description') }}</textarea>
                @error('description') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-end gap-4 pt-6 mt-6 border-t border-white/5">
                <a href="{{ route('admin.events') }}" class="px-8 py-4 bg-white/5 text-gray-400 font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-white/10 hover:text-white transition-all">
                    Cancel
                </a>
                <button type="submit" class="px-10 py-4 bg-[#ff014f] text-white font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-[#e11d48] transition-all shadow-[0_15px_30px_rgba(255,1,79,0.3)] hover:-translate-y-1 active:scale-95">
                    Launch Event
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

