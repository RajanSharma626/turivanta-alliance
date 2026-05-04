@extends('layouts.admin')

@section('title', 'Manage Events - Turivanta Admin')
@section('page_title', 'Events Management')

@section('content')
<div class="glass-panel p-8 rounded-[40px] border border-white/5 overflow-hidden">
    @if(session('success'))
    <div class="mb-8 mx-4 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 text-[10px] font-black uppercase tracking-widest flex items-center gap-3 animate-fade-in">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        {{ session('success') }}
    </div>
    @endif

    <div class="flex flex-col sm:flex-row items-center justify-between mb-8 px-4 gap-4">
        <h3 class="text-white font-black heading-font text-lg tracking-tight uppercase italic grow">Upcoming & Past Events</h3>
        <a href="{{ route('admin.events.create') }}" class="px-8 py-3 bg-[#ff014f] text-white font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-[#e11d48] transition-all shadow-[0_10px_20px_rgba(255,1,79,0.2)] hover:-translate-y-1">
            + Create Events
        </a>
    </div>

    <div class="overflow-x-auto px-4">
        <table class="w-full text-left border-separate border-spacing-y-4">
            <thead>
                <tr class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-500">
                    <th class="px-6 py-4">Event Details</th>
                    <th class="px-6 py-4">Location</th>
                    <th class="px-6 py-4">Date & Time</th>
                    <th class="px-6 py-4">Type</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr class="group hover:bg-white/[0.02] transition-all">
                    <td class="px-6 py-4 bg-white/[0.02] group-hover:bg-white/[0.04] rounded-l-[30px] border-y border-l border-white/5 group-hover:border-[#ff014f]/20 transition-all">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-[#ff014f]/10 flex items-center justify-center font-black text-[#ff014f] overflow-hidden">
                                {{ substr($event->title, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-white text-sm font-bold tracking-tight italic">{{ $event->title }}</p>
                                <p class="text-gray-500 text-[10px] uppercase font-black tracking-widest mt-0.5">ID: #{{ $event->id }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 bg-white/[0.02] group-hover:bg-white/[0.04] border-y border-white/5 group-hover:border-[#ff014f]/20 transition-all">
                        @if(filter_var($event->location, FILTER_VALIDATE_URL))
                            <a href="{{ $event->location }}" target="_blank" rel="noopener noreferrer" class="text-blue-400 hover:text-blue-300 text-xs font-semibold transition-colors break-all">{{ $event->location }}</a>
                        @else
                            <span class="text-gray-300 text-xs font-semibold break-words">{{ $event->location }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 bg-white/[0.02] group-hover:bg-white/[0.04] border-y border-white/5 group-hover:border-[#ff014f]/20 transition-all">
                        <span class="text-gray-300 text-xs font-semibold uppercase tracking-widest">{{ $event->event_date->format('M d, Y • h:i A') }}</span>
                    </td>
                    <td class="px-6 py-4 bg-white/[0.02] group-hover:bg-white/[0.04] border-y border-white/5 group-hover:border-[#ff014f]/20 transition-all">
                        @if($event->is_online)
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest bg-emerald-500/10 text-emerald-500 border border-emerald-500/20">Online</span>
                        @else
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest bg-blue-500/10 text-blue-500 border border-blue-500/20">Physical</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 bg-white/[0.02] group-hover:bg-white/[0.04] rounded-r-[30px] border-y border-r border-white/5 group-hover:border-[#ff014f]/20 text-right transition-all">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.events.edit', $event) }}" class="p-3 bg-white/5 hover:bg-white/10 rounded-xl text-gray-400 hover:text-white transition-all outline-none">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Critical Action: Are you sure you want to delete this event?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-3 bg-white/5 hover:bg-rose-500/10 rounded-xl text-gray-400 hover:text-rose-500 transition-all outline-none">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-20 text-center">
                        <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-gray-500 font-bold uppercase text-xs tracking-widest">No events scheduled yet</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-4 mt-8">
        {{ $events->links() }}
    </div>
</div>
@endsection
