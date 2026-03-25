@extends('layouts.admin')

@section('title', 'Dashboard - Turivanta Admin')
@section('page_title', 'Dashboard Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <!-- Total Users -->
    <div class="glass-panel p-6 rounded-3xl border border-white/5 hover:border-[#ff014f]/20 transition-all group overflow-hidden relative">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-[#ff014f]/5 rounded-full blur-3xl group-hover:bg-[#ff014f]/10 transition-colors"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center text-gray-400 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <span class="text-emerald-500 text-xs font-black uppercase tracking-widest">+12%</span>
            </div>
            <h3 class="text-gray-500 text-[10px] font-black uppercase tracking-[0.2em] mb-1">Total Users</h3>
            <p class="text-3xl font-black heading-font tracking-tight">{{ $stats['total_users'] }}</p>
        </div>
    </div>

    <!-- Pending Applications -->
    <div class="glass-panel p-6 rounded-3xl border border-white/5 hover:border-yellow-500/20 transition-all group overflow-hidden relative">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-yellow-500/5 rounded-full blur-3xl group-hover:bg-yellow-500/10 transition-colors"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center text-gray-400 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <span class="text-yellow-500 text-xs font-black uppercase tracking-widest">Awaiting Review</span>
            </div>
            <h3 class="text-gray-500 text-[10px] font-black uppercase tracking-[0.2em] mb-1">Pending Apps</h3>
            <p class="text-3xl font-black heading-font tracking-tight">{{ $stats['pending_applications'] }}</p>
        </div>
    </div>

    <!-- Approved Members -->
    <div class="glass-panel p-6 rounded-3xl border border-white/5 hover:border-emerald-500/20 transition-all group overflow-hidden relative">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-emerald-500/5 rounded-full blur-3xl group-hover:bg-emerald-500/10 transition-colors"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center text-gray-400 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-emerald-500 text-xs font-black uppercase tracking-widest">+5.2%</span>
            </div>
            <h3 class="text-gray-500 text-[10px] font-black uppercase tracking-[0.2em] mb-1">Approved Members</h3>
            <p class="text-3xl font-black heading-font tracking-tight">{{ $stats['approved_members'] }}</p>
        </div>
    </div>

    <!-- Total Applications -->
    <div class="glass-panel p-6 rounded-3xl border border-white/5 hover:border-blue-500/20 transition-all group overflow-hidden relative">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-blue-500/5 rounded-full blur-3xl group-hover:bg-blue-500/10 transition-colors"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center text-gray-400 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <span class="text-blue-500 text-xs font-black uppercase tracking-widest">Lifetime</span>
            </div>
            <h3 class="text-gray-500 text-[10px] font-black uppercase tracking-[0.2em] mb-1">Total Submissions</h3>
            <p class="text-3xl font-black heading-font tracking-tight">{{ $stats['total_applications'] }}</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Activity -->
    <div class="lg:col-span-2 glass-panel p-8 rounded-[40px] border border-white/5">
        <div class="flex items-center justify-between mb-8 px-4">
            <h3 class="text-white font-black heading-font text-lg tracking-tight uppercase italic">Recent Applications Activity</h3>
            <a href="{{ route('admin.applications') }}" class="text-[10px] font-black text-[#ff014f] uppercase tracking-widest hover:underline transition-all">View All</a>
        </div>
        
        <div class="space-y-4">
            @php
                $recentApps = \App\Models\Application::with('user')->orderBy('created_at', 'desc')->limit(5)->get();
            @endphp
            @forelse($recentApps as $app)
                <div class="p-5 rounded-3xl bg-white/[0.02] border border-white/5 flex items-center justify-between group hover:bg-white/[0.04] transition-all">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-[#ff014f]/10 flex items-center justify-center font-black text-[#ff014f] group-hover:scale-105 transition-transform">
                            {{ substr($app->legal_name ?? 'U', 0, 1) }}
                        </div>
                        <div>
                            <p class="text-white text-sm font-bold tracking-tight">{{ $app->legal_name }}</p>
                            <p class="text-gray-500 text-[10px] uppercase font-black tracking-widest mt-0.5">{{ $app->application_no }} • {{ $app->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        @php
                            $statusColors = match($app->status) {
                                'approved' => 'text-emerald-500 bg-emerald-500/10 border-emerald-500/20',
                                'rejected', 'declined' => 'text-rose-500 bg-rose-500/10 border-rose-500/20',
                                default => 'text-yellow-500 bg-yellow-500/10 border-yellow-500/20',
                            };
                        @endphp
                        <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest border {{ $statusColors }}">
                            {{ strtoupper($app->status) }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="py-20 text-center">
                    <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-gray-500 font-bold uppercase text-xs tracking-widest">No recent applications found</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Quick Stats & Reports -->
    <div class="glass-panel p-8 rounded-[40px] border border-white/5 h-full">
        <h3 class="text-white font-black heading-font text-lg tracking-tight uppercase italic mb-8 px-4">Monthly Report</h3>
        
        <div class="space-y-8 px-4">
            <div>
                <div class="flex justify-between items-center mb-3">
                    <span class="text-gray-400 text-[10px] font-black uppercase tracking-widest">Growth Rate</span>
                    <span class="text-emerald-500 text-xs font-bold font-black tracking-widest">78%</span>
                </div>
                <div class="w-full bg-white/5 h-2 rounded-full overflow-hidden">
                    <div class="bg-gradient-to-r from-[#ff014f] to-[#e11d48] h-full rounded-full shadow-[0_0_10px_rgba(255,1,79,0.3)]" style="width: 78%"></div>
                </div>
            </div>

            <div class="pt-6 border-t border-white/5">
                <p class="text-white font-black uppercase tracking-[0.2em] text-[11px] mb-6 underline decoration-[#ff014f] decoration-2 underline-offset-8">Quick Actions</p>
                <div class="grid grid-cols-2 gap-4">
                    <button class="p-4 rounded-3xl bg-white/5 border border-white/5 hover:bg-[#ff014f]/10 hover:border-[#ff014f]/30 transition-all text-center group">
                        <div class="text-[#ff014f] mb-2 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <span class="text-[9px] font-black uppercase tracking-widest text-gray-400 group-hover:text-white transition-colors">Export DB</span>
                    </button>
                    <button class="p-4 rounded-3xl bg-white/5 border border-white/5 hover:bg-blue-500/10 hover:border-blue-500/30 transition-all text-center group">
                        <div class="text-blue-500 mb-2 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="text-[9px] font-black uppercase tracking-widest text-gray-400 group-hover:text-white transition-colors">Email All</span>
                    </button>
                </div>
            </div>
            

        </div>
    </div>
</div>
@endsection
