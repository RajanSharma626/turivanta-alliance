@extends('layouts.admin')

@section('title', 'Registered Members - Turivanta Admin')
@section('page_title', 'All Registered Members')

@section('content')
<div class="glass-panel p-8 rounded-[40px] border border-white/5 overflow-hidden">
    <div class="flex flex-col sm:flex-row items-center justify-between mb-8 px-4 gap-4">
        <h3 class="text-white font-black heading-font text-lg tracking-tight uppercase italic grow">Registered Member Base</h3>
        <div class="flex items-center gap-4 w-full sm:w-auto">
             <div class="relative w-full sm:w-64">
                <input type="text" placeholder="Search members..." class="w-full bg-white/5 border border-white/10 rounded-2xl px-12 py-3 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f] transition-all">
                <svg class="w-4 h-4 absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <button class="p-3 bg-white/5 border border-white/10 rounded-2xl text-gray-400 hover:text-white transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
            </button>
        </div>
    </div>

    <div class="overflow-x-auto w-full">
        <table class="w-full text-left border-separate border-spacing-y-4 px-4 overflow-hidden">
            <thead class="text-gray-500 text-[10px] font-black uppercase tracking-widest">
                <tr>
                    <th class="pb-2 pl-6">Member / Name</th>
                    <th class="pb-2">Email & Contact</th>
                    <th class="pb-2">Business Type</th>
                    <th class="pb-2">Joined Date</th>
                    <th class="pb-2">Subscription</th>
                    <th class="pb-2 pr-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="space-y-4">
                @forelse($members as $member)
                    @php 
                        $sub = $member->currentSubscription; 
                    @endphp
                    <tr class="bg-white/[0.02] hover:bg-white/[0.05] transition-all border border-white/5 group translate-y-0 hover:-translate-y-1">
                        <td class="py-5 pl-6 rounded-l-3xl border-y border-l border-white/5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-white/5 to-white/10 flex items-center justify-center font-black text-white group-hover:from-[#ff014f] group-hover:to-[#e11d48] transition-all">
                                    {{ substr($member->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-white text-sm font-bold tracking-tight">{{ $member->name }}</p>
                                    <p class="text-[9px] text-gray-500 font-extrabold uppercase tracking-widest mt-0.5">GTIN: {{ $member->membership_id }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-5 border-y border-white/5">
                            <div class="flex flex-col">
                                <span class="text-xs text-gray-400 font-medium lowercase">{{ $member->email }}</span>
                                <span class="text-[10px] text-gray-600 font-bold mt-1">{{ $member->contact_no ?? 'N/A' }}</span>
                            </div>
                        </td>
                        <td class="py-5 border-y border-white/5 text-gray-400 text-[11px] font-black uppercase tracking-widest">
                            {{ $member->business_type ?? 'Individual' }}
                        </td>
                        <td class="py-5 border-y border-white/5 text-gray-500 text-[10px] font-bold uppercase tracking-wider">
                            {{ $member->created_at->format('M d, Y') }}
                        </td>
                        <td class="py-5 border-y border-white/5">
                            @if($sub)
                                <div class="flex flex-col gap-1">
                                    <span class="text-[10px] text-white font-black uppercase tracking-widest leading-none">{{ $sub->plan_name }}</span>
                                    <span class="text-[9px] text-gray-500 font-bold uppercase tracking-tight">Exp: {{ $sub->expires_at->format('M d, Y') }}</span>
                                </div>
                            @else
                                <span class="text-[10px] text-gray-600 font-black uppercase tracking-widest leading-none italic">No Active Plan</span>
                            @endif
                        </td>
                        <td class="py-5 pr-6 rounded-r-3xl border-y border-r border-white/5 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.members.subscription', $member) }}" class="p-2.5 bg-white/5 border border-white/10 rounded-xl text-gray-400 hover:text-[#ff014f] hover:border-[#ff014f]/30 transition-all flex items-center justify-center group/btn" title="Manage Subscription">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-20 text-center">
                             <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <p class="text-gray-500 font-bold uppercase text-xs tracking-widest">No members found in system database</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-8 px-4">
        {{ $members->links() }}
    </div>
</div>
@endsection
