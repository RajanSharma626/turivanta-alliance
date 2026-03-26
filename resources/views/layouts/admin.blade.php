<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel - Turivanta Alliance')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #030305;
            color: #ffffff;
            overflow-x: hidden;
        }
        .heading-font { font-family: 'Outfit', sans-serif; }
        
        .glass-panel {
            background: rgba(10, 10, 15, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar-link.active {
            background: rgba(255, 1, 79, 0.1);
            color: #ff014f;
            border-right: 3px solid #ff014f;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
        }
        ::-webkit-scrollbar-thumb:hover { background: rgba(255, 1, 79, 0.5); }
    </style>
</head>
<body class="antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 glass-panel border-r border-white/5 flex flex-col z-50">
            <div class="p-8">
                <a href="/" class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-[#ff014f] rounded-lg flex items-center justify-center font-black text-white italic">T</div>
                    <span class="font-black heading-font tracking-tighter text-xl italic uppercase">Turivanta</span>
                </a>
            </div>

            <nav class="flex-grow px-4 space-y-2 py-4">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 mb-4 ml-4">Main Navigation</p>
                
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link px-4 py-3 rounded-xl flex items-center gap-3 text-sm font-semibold transition-all hover:bg-white/5 {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-gray-400' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.members') }}" class="sidebar-link px-4 py-3 rounded-xl flex items-center gap-3 text-sm font-semibold transition-all hover:bg-white/5 {{ request()->routeIs('admin.members') ? 'active' : 'text-gray-400' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Registered Members
                </a>

                <a href="{{ route('admin.applications') }}" class="sidebar-link px-4 py-3 rounded-xl flex items-center gap-3 text-sm font-semibold transition-all hover:bg-white/5 {{ request()->routeIs('admin.applications*') ? 'active' : 'text-gray-400' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Applications Data
                </a>

                <a href="{{ route('admin.admins') }}" class="sidebar-link px-4 py-3 rounded-xl flex items-center gap-3 text-sm font-semibold transition-all hover:bg-white/5 {{ request()->routeIs('admin.admins*') ? 'active' : 'text-gray-400' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Manage Admins
                </a>
            </nav>

            <div class="p-6 mt-auto">
                <div class="bg-white/5 rounded-2xl p-4 border border-white/5 text-center">
                    <p class="text-[10px] text-gray-500 uppercase font-black tracking-widest mb-1">System Health</p>
                    <p class="text-xs font-bold text-emerald-500">All Systems Online</p>
                </div>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-grow flex flex-col overflow-hidden bg-[#030305]">
            <!-- Top Navbar -->
            <header class="h-20 glass-panel border-b border-white/5 flex items-center justify-between px-10 z-40">
                <div class="flex items-center gap-4">
                    <h1 class="text-white font-black heading-font text-lg tracking-tight uppercase">@yield('page_title', 'Dashboard')</h1>
                </div>

                <div class="flex items-center gap-6">
                    <!-- Profile Dropdown -->
                    <div class="relative group">
                        <div class="flex items-center gap-3 cursor-pointer p-2 rounded-2xl hover:bg-white/5 transition-all outline-none">
                            <div class="text-right hidden sm:block">
                                <p class="text-xs font-black text-white uppercase tracking-wider">{{ auth('admin')->user()->name }}</p>
                                <p class="text-[10px] text-gray-500 font-bold uppercase">{{ auth('admin')->user()->role }}</p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#ff014f] to-[#e11d48] border-2 border-white/10 flex items-center justify-center font-black text-white shadow-lg overflow-hidden transition-transform group-hover:scale-105">
                                <span class="text-sm italic">{{ substr(auth('admin')->user()->name, 0, 1) }}</span>
                            </div>
                        </div>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 top-full mt-2 w-48 bg-[#0f0f15] border border-white/10 shadow-2xl rounded-2xl p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                            <a href="/" class="flex items-center gap-3 px-4 py-3 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-white hover:bg-white/5 rounded-xl transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                Back to Website
                            </a>
                            <div class="h-px bg-white/5 my-1 mx-2"></div>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-[10px] font-black uppercase tracking-widest text-[#ff014f] hover:bg-[#ff014f]/10 rounded-xl transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-grow overflow-y-auto p-10">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
