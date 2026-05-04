@extends('layouts.app')

@section('title', 'Events - Turivanta Alliance')

@section('content')
<main class="flex-grow pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="text-center mb-20">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 uppercase tracking-tight italic px-1">
                Global <span class="gradient-text pr-2">Events</span>
            </h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto font-medium leading-relaxed">
                Connect with the global tourism ecosystem through our curated physical and online events.
            </p>
            <div class="w-24 h-1.5 bg-gradient-to-r from-[#ff014f] to-rose-400 mx-auto mt-8 rounded-full shadow-[0_0_15px_rgba(255,1,79,0.5)]"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($events as $event)
                <div class="group relative bg-[#0a0a15] border border-white/10 rounded-[40px] overflow-hidden transition-all duration-500 hover:border-[#ff014f]/30 hover:shadow-[0_20px_50px_rgba(0,0,0,0.5)] hover:-translate-y-2">
                    <!-- Content -->
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3 text-[#ff014f] text-[10px] font-black uppercase tracking-[0.2em]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $event->event_date->format('d M, Y • h:i A') }}
                            </div>
                            @if($event->is_online)
                                <span class="px-3 py-1 bg-emerald-500/10 text-emerald-500 text-[8px] font-black uppercase tracking-widest rounded-full border border-emerald-500/20">Online</span>
                            @else
                                <span class="px-3 py-1 bg-[#ff014f]/10 text-[#ff014f] text-[8px] font-black uppercase tracking-widest rounded-full border border-[#ff014f]/20">Physical</span>
                            @endif
                        </div>


                        <h3 class="text-xl font-bold text-white mb-4 group-hover:text-[#ff014f] transition-colors leading-tight italic uppercase tracking-tight px-1">
                            {{ $event->title }}
                        </h3>

                        <div class="flex items-start gap-3 text-gray-400 text-xs mb-6 font-medium leading-relaxed overflow-hidden">
                            <svg class="w-5 h-5 text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            @if(filter_var($event->location, FILTER_VALIDATE_URL))
                                <a href="{{ $event->location }}" target="_blank" rel="noopener noreferrer" class="hover:text-[#ff014f] transition-colors break-all">{{ $event->location }}</a>
                            @else
                                <span class="break-words">{{ $event->location }}</span>
                            @endif
                        </div>

                        @if($event->description)
                            <p class="text-gray-500 text-xs mb-8 line-clamp-3 leading-relaxed">
                                {{ $event->description }}
                            </p>
                        @endif


                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 bg-white/5 border border-white/10 rounded-[60px] text-center px-10">
                    <div class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-8">
                        <svg class="w-12 h-12 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-4 italic uppercase tracking-wider px-1">No Active Engagements</h2>
                    <p class="text-gray-400 max-w-md mx-auto">We are currently curating new events for the community. Join our membership program to get notified instantly.</p>
                </div>
            @endforelse
        </div>
    </div>
</main>
@endsection
