@extends('layouts.admin')

@section('title', 'Membership Applications - Turivanta Admin')
@section('page_title', 'All Membership Applications')

@section('content')
<div class="glass-panel p-8 rounded-[40px] border border-white/5 overflow-hidden">
    <!-- Filters Header -->
    <div class="flex flex-col sm:flex-row items-center justify-between mb-8 px-4 gap-4">
        <h3 class="text-white font-black heading-font text-lg tracking-tight uppercase italic grow">Alliance Applications Pipeline</h3>
        <div class="flex items-center gap-4 w-full sm:w-auto overflow-x-auto whitespace-nowrap">
            <button class="px-6 py-2.5 rounded-2xl bg-white/5 text-[10px] font-black uppercase tracking-widest text-[#ff014f] border border-[#ff014f]/20">All Submissions</button>
            <button class="px-6 py-2.5 rounded-2xl bg-white/5 text-[10px] font-black uppercase tracking-widest text-gray-500 hover:text-white transition-all">Pending Audit</button>
            <button class="px-6 py-2.5 rounded-2xl bg-white/5 text-[10px] font-black uppercase tracking-widest text-gray-500 hover:text-white transition-all">Approved</button>
        </div>
    </div>

    <!-- Results Table -->
    <div class="overflow-x-auto w-full">
        <table class="w-full text-left border-separate border-spacing-y-4 px-4">
            <thead class="text-gray-500 text-[10px] font-black uppercase tracking-widest">
                <tr>
                    <th class="pb-2 pl-6">Application ID</th>
                    <th class="pb-2">Legal Entity Name</th>
                    <th class="pb-2">Legal Status</th>
                    <th class="pb-2">Submitted By</th>
                    <th class="pb-2">Status</th>
                    <th class="pb-2 pr-6">Documents</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                <tr class="bg-white/[0.02] hover:bg-white/[0.05] transition-all border border-white/5 group translate-y-0 hover:-translate-y-1">
                    <td class="py-5 pl-6 rounded-l-3xl border-y border-l border-white/5">
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-6">{{ $app->application_no ?? "Draft" }}</span>
                        <p class="text-[9px] text-gray-600 font-bold uppercase tracking-wider mt-0.5">{{ $app->created_at->format('M d, Y H:i') }}</p>
                    </td>
                    <td class="py-5 border-y border-white/5">
                        <p class="text-white text-sm font-bold tracking-tight">{{ $app->legal_name }}</p>
                        <p class="text-[9px] text-gray-500 font-extrabold uppercase tracking-widest mt-0.5">{{ $app->trade_name ?? 'N/A' }}</p>
                    </td>
                    <td class="py-5 border-y border-white/5">
                        <span class="px-4 py-1 bg-white/5 rounded-full text-[9px] font-black text-gray-400 uppercase tracking-widest border border-white/5">{{ $app->user?->legal_status }}</span>
                    </td>
                    <td class="py-5 border-y border-white/5">
                        <p class="text-[11px] text-white font-bold tracking-tight">{{ $app->user?->name }}</p>
                        <p class="text-[10px] text-gray-500 transition-colors lowercase">{{ $app->user?->email }}</p>
                    </td>
                    <td class="py-5 border-y border-white/5">
                        @php
                            $statusColors = match($app->status) {
                                'approved' => 'text-emerald-500 bg-emerald-500/10 border-emerald-500/20 shadow-[0_0_15px_rgba(16,185,129,0.1)]',
                                'rejected', 'declined' => 'text-rose-500 bg-rose-500/10 border-rose-500/20',
                                default => 'text-yellow-500 bg-yellow-500/10 border-yellow-500/20',
                            };
                        @endphp
                        <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest border {{ $statusColors }}">
                            {{ strtoupper($app->status) }}
                        </span>
                    </td>
                    <td class="py-5 pr-6 rounded-r-3xl border-y border-r border-white/5">
                        @php
                            $docs = $app->uploaded_documents ?? [];
                            $docCount = is_array($docs) ? count($docs) : 0;
                        @endphp
                        <div class="flex items-center gap-3 group-hover:scale-105 transition-transform">
                            <div class="flex -space-x-2">
                                @for($i = 0; $i < min($docCount, 3); $i++)
                                    <div class="w-7 h-7 bg-white/10 rounded-full border border-[#030305] flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    </div>
                                @endfor
                                @if($docCount > 3)
                                    <div class="w-7 h-7 bg-[#ff014f] rounded-full border border-[#030305] flex items-center justify-center text-[8px] font-black text-white">
                                        +{{ $docCount - 3 }}
                                    </div>
                                @endif
                            </div>
                            <span class="text-[10px] text-gray-600 font-bold uppercase tracking-widest">{{ $docCount }} Files</span>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-20 text-center">
                         <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-gray-500 font-bold uppercase text-xs tracking-widest">No membership applications found</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tabbed Data (Optional Placeholder) -->
    <div class="mt-8 pt-8 border-t border-white/5 px-4 text-center">
        <p class="text-gray-600 italic text-[10px] font-black uppercase tracking-widest mb-4 italic">Security Note: You are viewing real-time encrypted application data</p>
        <div class="inline-flex gap-2">
            {{ $applications->links() }}
        </div>
    </div>
</div>
@endsection
