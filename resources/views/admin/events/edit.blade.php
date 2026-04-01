@extends('layouts.admin')

@section('title', 'Edit Event - Turivanta Admin')
@section('page_title', 'Modify Event Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="glass-panel p-10 rounded-[40px] border border-white/5 relative overflow-hidden group">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#ff014f]/5 rounded-full blur-[100px] group-hover:bg-[#ff014f]/10 transition-colors"></div>
        
        <div class="mb-10 relative z-10">
            <h3 class="text-white font-black heading-font text-2xl tracking-tighter uppercase italic mb-2">Update Event</h3>
            <p class="text-gray-500 text-sm font-medium">Modify existing event information for #{{ $event->id }}</p>
        </div>

        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-8 relative z-10">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Title -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Event Name</label>
                    <input type="text" name="title" required placeholder="Workshop on AI" value="{{ old('title', $event->title) }}" class="w-full bg-white/[0.02] border @error('title') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold">
                    @error('title') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>

                <!-- Event Date -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Date & Time</label>
                    <input type="datetime-local" name="event_date" required value="{{ old('event_date', $event->event_date->format('Y-m-d\TH:i')) }}" class="w-full bg-white/[0.02] border @error('event_date') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold [color-scheme:dark]">
                    @error('event_date') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Location -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Location (Address or Link)</label>
                    <input type="text" name="location" required placeholder="New York, NY or Zoom Link" value="{{ old('location', $event->location) }}" class="w-full bg-white/[0.02] border @error('location') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold">
                    @error('location') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>

                <!-- Type -->
                <div class="flex flex-col gap-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Event Type</label>
                    <select name="is_online" required class="w-full bg-[#030305] border @error('is_online') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold appearance-none">
                        <option value="0" {{ old('is_online', $event->is_online) == '0' ? 'selected' : '' }}>Physical Event</option>
                        <option value="1" {{ old('is_online', $event->is_online) == '1' ? 'selected' : '' }}>Online Event</option>
                    </select>
                    @error('is_online') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Description -->
            <div class="flex flex-col gap-3">
                <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Description</label>
                <textarea name="description" rows="4" placeholder="Briefly describe the event..." class="w-full bg-white/[0.02] border @error('description') border-rose-500 @else border-white/5 @enderror rounded-2xl px-6 py-4 text-white placeholder-gray-700 focus:outline-none focus:border-[#ff014f] transition-all text-sm font-bold resize-none">{{ old('description', $event->description) }}</textarea>
                @error('description') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
            </div>

            <!-- Image Upload -->
            <div class="flex flex-col gap-3">
                <label class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] ml-2">Event Poster / Image</label>
                <div class="relative">
                    <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(this)">
                    <label for="image" class="w-full bg-white/[0.02] border border-dashed @error('image') border-rose-500 @else border-white/10 @enderror rounded-3xl p-8 flex flex-col items-center justify-center cursor-pointer hover:bg-[#ff014f]/5 hover:border-[#ff014f]/30 transition-all group {{ $event->image ? 'hidden' : '' }}">
                        <div class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center mb-4 text-gray-500 group-hover:text-[#ff014f] transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 group-hover:text-white transition-colors" id="file-label">Click to change poster image</p>
                    </label>
                    <div id="image-preview" class="{{ $event->image ? '' : 'hidden' }} mt-6 relative w-full aspect-video rounded-3xl overflow-hidden border border-white/10">
                        <img src="{{ $event->image ? Storage::url($event->image) : '' }}" alt="Preview" class="w-full h-full object-cover">
                        <button type="button" onclick="removeImage()" class="absolute top-4 right-4 p-3 bg-black/60 backdrop-blur-md rounded-2xl text-white hover:bg-rose-500 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                </div>
                @error('image') <span class="text-rose-500 text-[10px] font-black uppercase tracking-widest ml-3">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-end gap-4 pt-6 mt-6 border-t border-white/5">
                <a href="{{ route('admin.events') }}" class="px-8 py-4 bg-white/5 text-gray-400 font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-white/10 hover:text-white transition-all">
                    Cancel
                </a>
                <button type="submit" class="px-10 py-4 bg-[#ff014f] text-white font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-[#e11d48] transition-all shadow-[0_15px_30px_rgba(255,1,79,0.3)] hover:-translate-y-1 active:scale-95">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const img = preview.querySelector('img');
        const label = document.querySelector('label[for="image"]');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                preview.classList.remove('hidden');
                label.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage() {
        const input = document.getElementById('image');
        const preview = document.getElementById('image-preview');
        const label = document.querySelector('label[for="image"]');
        
        input.value = '';
        preview.classList.add('hidden');
        label.classList.remove('hidden');
    }
</script>
@endpush
@endsection
