<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">
<head>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            // Default was requested to be light, so we only force dark if explicitly set or if no preference and system is dark
            // But user said "by default light mode", so let's adjust logic.
        }

        // Revised logic for "default light":
        if (localStorage.getItem('color-theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Turivanta Alliance - The Identity of Modern Tourism')</title>
    <meta name="description" content="@yield('meta_description', 'Turivanta Alliance - The Identity of Modern Tourism')">
    <meta name="keywords" content="@yield('meta_keywords', 'tourism, travel, hospitality, alliance')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/Logo-of-Turivanta-Alliance.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    <style>
        .gradient-text { background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-image: linear-gradient(90deg, #0b21a8, #2563eb); }
        
        @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-15px); } 100% { transform: translateY(0px); } }
        @keyframes wave { 0%, 100% { border-radius: 40% 60% 70% 30% / 40% 40% 60% 50%; } 34% { border-radius: 70% 30% 50% 50% / 30% 30% 70% 70%; } 67% { border-radius: 100% 60% 60% 100% / 100% 100% 60% 60%; } }
        
        .hero-img-container { animation: float 6s ease-in-out infinite; position: relative; }
        /* Hero image styles moved to app.css */
        .hero-img-inner { width: 100%; height: 100%; animation: wave 8s ease-in-out infinite alternate; overflow: hidden; background: var(--background); }
        
        main p { text-align: justify; }
        main input:hover, main select:hover, main textarea:hover { border-color: #0b21a8 !important; }
        
        /* Theme Transition handled in app.css */

        .logo-light { display: block; }
        .logo-dark { display: none; }
        .dark .logo-light { display: none !important; }
        .dark .logo-dark { display: block !important; }

        /* Date picker popup theme fix */
        html {
            color-scheme: light;
        }
        html.dark {
            color-scheme: dark;
        }

        /* Date picker icon theme fix */
        input[type="date"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            filter: invert(0);
            opacity: 0.5;
            transition: opacity 0.2s;
        }
        .dark input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }
        input[type="date"]:hover::-webkit-calendar-picker-indicator {
            opacity: 1;
        }
    </style>


</head>
<body class="antialiased selection:bg-primary selection:text-white relative min-h-screen flex flex-col bg-background text-foreground overflow-x-hidden">
    <div id="tsparticles" class="absolute inset-0 z-0"></div>
    <div class="absolute inset-0 w-full h-full overflow-hidden z-[-1] pointer-events-none">
        <div class="absolute -top-[200px] -left-[100px] w-[500px] h-[500px] bg-blue-600/20 rounded-full blur-[120px]"></div>
        <div class="absolute top-[100px] -right-[100px] w-[400px] h-[400px] bg-[#0b21a8]/10 rounded-full blur-[100px]"></div>
    </div>

    <!-- Common Navbar -->
    <nav class="w-full z-50 px-6 py-4 lg:px-12 flex items-center justify-between bg-nav-bg glass-nav fixed top-0 transition-all duration-300">
        <div class="flex items-center cursor-pointer group">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/img/Logo-of-Turivanta-light.png') }}" alt="Logo" class="h-10 sm:h-12 w-auto object-contain rounded-md transition-transform duration-300 group-hover:scale-105 logo-light">
                <img src="{{ asset('assets/img/Logo-of-Turivanta-Alliance.png') }}" alt="Logo" class="h-10 sm:h-12 w-auto object-contain rounded-md transition-transform duration-300 group-hover:scale-105 logo-dark">
            </a>
        </div>
        <div class="hidden md:flex items-center gap-1 bg-muted p-1 rounded-full border border-card-border backdrop-blur-md">
            <a href="{{ route('home') }}" class="px-6 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-foreground bg-background shadow-sm' : 'text-muted-foreground hover:text-foreground hover:bg-background/50' }} rounded-full transition-all">Home</a>
            <a href="{{ route('about') }}" class="px-6 py-2 text-sm font-medium {{ request()->routeIs('about') ? 'text-foreground bg-background shadow-sm' : 'text-muted-foreground hover:text-foreground hover:bg-background/50' }} rounded-full transition-all">About</a>
            <a href="{{ route('membership') }}" class="px-6 py-2 text-sm font-medium {{ request()->routeIs('membership') ? 'text-foreground bg-background shadow-sm' : 'text-muted-foreground hover:text-foreground hover:bg-background/50' }} rounded-full transition-all">Membership</a>
            
            <!-- More Dropdown -->
            <div class="relative group" id="more-dropdown">
                <button type="button" onclick="toggleMoreDropdown(event)" class="px-6 py-2 text-sm font-medium {{ (request()->routeIs('benefits') || request()->routeIs('events') || request()->routeIs('contact') || request()->routeIs('faq')) ? 'text-foreground bg-background' : 'text-muted-foreground hover:text-foreground hover:bg-background/50' }} rounded-full transition-all flex items-center gap-2 outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 dark:focus-visible:ring-offset-background cursor-pointer">
                    More
                    <svg id="more-arrow" class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div id="more-menu" class="absolute left-1/2 -translate-x-1/2 mt-2 w-48 bg-card border border-card-border rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden backdrop-blur-xl">
                    <a href="{{ route('benefits') }}" class="block px-6 py-3 text-sm font-medium {{ request()->routeIs('benefits') ? 'text-primary bg-muted' : 'text-muted-foreground hover:text-foreground hover:bg-muted' }} transition-all">Benefits</a>
                    <a href="{{ route('events') }}" class="block px-6 py-3 text-sm font-medium {{ request()->routeIs('events') ? 'text-primary bg-muted' : 'text-muted-foreground hover:text-foreground hover:bg-muted' }} transition-all">Events</a>
                    <a href="{{ route('contact') }}" class="block px-6 py-3 text-sm font-medium {{ request()->routeIs('contact') ? 'text-primary bg-muted' : 'text-muted-foreground hover:text-foreground hover:bg-muted' }} transition-all">Contact</a>
                    <a href="{{ route('faq') }}" class="block px-6 py-3 text-sm font-medium {{ request()->routeIs('faq') ? 'text-primary bg-muted' : 'text-muted-foreground hover:text-foreground hover:bg-muted' }} transition-all">FAQ</a>
                </div>
            </div>
        </div>

        <!-- Search Box -->
        <div class="hidden lg:flex flex-grow max-w-xs mx-8">
            <form action="{{ route('search') }}" method="GET" class="relative w-full group">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search identity..." class="w-full bg-muted/50 border border-card-border rounded-full px-12 py-2.5 text-xs font-medium text-foreground placeholder-muted-foreground focus:outline-none focus:border-primary/50 transition-all focus:bg-muted backdrop-blur-md hover:border-primary/40 group-hover:border-primary/40">
                <svg class="w-4 h-4 absolute left-5 top-1/2 transform -translate-y-1/2 text-muted-foreground group-focus-within:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </form>
        </div>


        <div class="hidden md:flex items-center justify-end flex-shrink-0 gap-4">
            <!-- Theme Toggle Button -->
            <button id="theme-toggle" type="button" class="text-foreground hover:bg-card-border focus:outline-none rounded-full text-sm p-2.5 transition-colors cursor-pointer">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.707.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>

            @if(auth('web')->check())
                <div class="relative group">
                    <button class="flex items-center gap-3 bg-muted border border-card-border rounded-full px-4 py-1.5 transition-all hover:bg-card-border cursor-pointer">
                        <span class="text-sm font-bold text-foreground">{{ auth('web')->user()->first_name }}</span>
                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-primary to-blue-400 flex items-center justify-center text-white font-black text-xs uppercase">
                            {{ substr(auth('web')->user()->first_name, 0, 1) }}{{ substr(auth('web')->user()->last_name, 0, 1) }}
                        </div>
                    </button>
                    <!-- Dropdown -->
                    <div class="absolute right-0 mt-2 w-48 bg-card border border-card-border rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden">
                        <div class="px-6 py-4 border-b border-card-border bg-muted">
                            <p class="text-xs text-muted-foreground uppercase tracking-widest font-bold mb-1">Signed in as</p>
                            <p class="text-sm text-foreground font-bold truncate">{{ auth('web')->user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.index') }}" class="block px-6 py-3 text-sm text-muted-foreground hover:text-foreground hover:bg-muted transition-colors">My Application</a>
                        <a href="{{ route('settings') }}" class="block px-6 py-3 text-sm text-muted-foreground hover:text-foreground hover:bg-muted transition-colors">My Profile</a>
                        <div class="border-t border-card-border"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-6 py-3 text-sm text-rose-500 hover:text-rose-400 hover:bg-rose-500/5 transition-colors font-bold">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-foreground hover:text-primary text-sm font-bold mr-6 transition-colors">Login</a>
                <a href="{{ route('register') }}" class="px-6 py-2 bg-primary text-white text-sm font-bold rounded-full transition-all duration-300 hover:bg-blue-800 hover:shadow-[0_0_15px_rgba(3,18,115,0.3)] hover:-translate-y-0.5">Register</a>
            @endif
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="flex items-center gap-2">
            <!-- Theme Toggle Button (Mobile) -->
            <button id="theme-toggle-mobile" type="button" class="text-foreground hover:bg-card-border focus:outline-none rounded-full text-sm p-2.5 transition-colors md:hidden cursor-pointer">
                <svg id="theme-toggle-dark-icon-mobile" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon-mobile" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.707.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
            <button class="flex md:hidden w-10 h-10 items-center justify-center bg-card/50 border border-card-border rounded-xl text-foreground transition-all hover:bg-card cursor-pointer" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="hamburger-icon"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                <svg class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="close-icon"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Drawer -->
    <div id="mobile-drawer" class="fixed inset-0 z-40 bg-background/95 backdrop-blur-2xl transform translate-x-full transition-transform duration-300 md:hidden">
        <div class="flex flex-col h-full pt-32 pb-12 px-8 overflow-y-auto">
            <div class="flex flex-col gap-6 text-2xl font-bold">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-primary' : 'text-foreground' }}" onclick="toggleMobileMenu()">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-primary' : 'text-foreground' }}" onclick="toggleMobileMenu()">About</a>
                <a href="{{ route('membership') }}" class="{{ request()->routeIs('membership') ? 'text-primary' : 'text-foreground' }}" onclick="toggleMobileMenu()">Membership</a>
                <a href="{{ route('benefits') }}" class="{{ request()->routeIs('benefits') ? 'text-primary' : 'text-foreground' }}" onclick="toggleMobileMenu()">Benefits</a>
                <a href="{{ route('events') }}" class="{{ request()->routeIs('events') ? 'text-primary' : 'text-foreground' }}" onclick="toggleMobileMenu()">Events</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-primary' : 'text-foreground' }}" onclick="toggleMobileMenu()">Contact</a>
                <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'text-primary' : 'text-foreground' }}" onclick="toggleMobileMenu()">FAQ</a>
            </div>

            <div class="mt-auto pt-12 border-t border-card-border">
                @if(auth('web')->check())
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-primary to-blue-400 flex items-center justify-center text-white font-black text-lg">
                            {{ substr(auth('web')->user()->first_name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-foreground font-bold leading-tight">{{ auth('web')->user()->first_name }} {{ auth('web')->user()->last_name }}</p>
                            <p class="text-muted-foreground text-sm">{{ auth('web')->user()->email }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <a href="{{ route('profile.index') }}" class="text-muted-foreground font-bold hover:text-foreground" onclick="toggleMobileMenu()">My Application</a>
                        <a href="{{ route('settings') }}" class="text-muted-foreground font-bold hover:text-foreground" onclick="toggleMobileMenu()">My Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-rose-500 font-bold">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="flex flex-col gap-4">
                        <a href="{{ route('login') }}" class="w-full py-4 text-center text-foreground font-bold border border-card-border rounded-2xl" onclick="toggleMobileMenu()">Login</a>
                        <a href="{{ route('register') }}" class="w-full py-4 text-center text-white font-bold bg-primary rounded-2xl" onclick="toggleMobileMenu()">Register</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @yield('content')

    <!-- Common Footer -->
    <footer class="w-full bg-card border-t border-card-border pt-20 pb-8 relative z-10 mt-auto">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col md:flex-row justify-between gap-16 md:gap-8 mb-16">
            
            <!-- Left: Logo & Text -->
            <div class="md:w-1/3">
                <a href="{{ route('home') }}" class="inline-block mb-6">
                    <img src="{{ asset('assets/img/Logo-of-Turivanta-light.png') }}" alt="Turivanta Alliance Logo" class="h-10 w-auto object-contain logo-light">
                    <img src="{{ asset('assets/img/Logo-of-Turivanta-Alliance.png') }}" alt="Turivanta Alliance Logo" class="h-10 w-auto object-contain logo-dark">
                </a>
                <h2 class="text-3xl font-extrabold text-foreground leading-tight">
                    Ready <span class="text-muted-foreground font-light"> to be </span><br/> endorsed?
                </h2>
            </div>
            
            <!-- Middle: Quick Links -->
            <div class="md:w-1/3 flex flex-col md:items-center">
                <div class="flex flex-col border-l border-card-border pl-8 md:pl-0 md:border-none">
                    <h3 class="text-foreground text-lg font-bold mb-6">Quick Links</h3>
                    <ul class="flex flex-col gap-4 text-muted-foreground text-sm font-medium">
                        <li><a href="{{ route('home') }}" class="hover:text-foreground transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-foreground transition-colors">About Us</a></li>
                        <li><a href="{{ route('benefits') }}" class="hover:text-foreground transition-colors">Benefits</a></li>
                        <li><a href="{{ route('membership') }}" class="hover:text-foreground transition-colors">Membership</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-foreground transition-colors">Contact Us</a></li>
                        <li><a href="{{ route('events') }}" class="hover:text-foreground transition-colors">Events</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:text-foreground transition-colors">FAQ's</a></li>
                    </ul>
                </div>
            </div>

            <!-- Right: Contact -->
            <div class="md:w-1/3 flex flex-col border-l border-card-border pl-8">
                <h3 class="text-foreground text-lg font-bold mb-6">Contact</h3>
                <ul class="flex flex-col gap-6 text-muted-foreground text-sm">
                    <li class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-muted flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span>info@turivanta.com</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-muted flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="leading-relaxed">Ward No. 32, Lower Pouni Chack,<br>Jammu, J&K, India</span>
                    </li>
                </ul>

            </div>
        </div>

        <!-- Copyright Bar -->
        <div class="max-w-7xl mx-auto px-6 lg:px-12 border-t border-card-border pt-8 mt-4 flex items-center justify-between">
            <p class="text-muted-foreground text-sm font-medium">© {{ date('Y') }} | All Rights Reserved</p>
            <div class="flex gap-4">
                <a href="{{ route('privacy-policy') }}" class="text-muted-foreground hover:text-foreground text-sm transition-colors">Privacy </a>
                <a href="{{ route('terms-conditions') }}" class="text-muted-foreground hover:text-foreground text-sm transition-colors">Terms</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/tsparticles@3.5.0/tsparticles.bundle.min.js"></script>
    <script>
        function toggleMobileMenu() {
            const drawer = document.getElementById('mobile-drawer');
            const hamburgerIcon = document.getElementById('hamburger-icon');
            const closeIcon = document.getElementById('close-icon');
            const isOpening = drawer.classList.contains('translate-x-full');

            if (isOpening) {
                drawer.classList.remove('translate-x-full');
                drawer.classList.add('translate-x-0');
                hamburgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            } else {
                drawer.classList.remove('translate-x-0');
                drawer.classList.add('translate-x-full');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        }

        // Theme Toggle Logic
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        const themeToggleDarkIconMobile = document.getElementById('theme-toggle-dark-icon-mobile');
        const themeToggleLightIconMobile = document.getElementById('theme-toggle-light-icon-mobile');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
            themeToggleLightIconMobile.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
            themeToggleDarkIconMobile.classList.remove('hidden');
        }

        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleBtnMobile = document.getElementById('theme-toggle-mobile');

        function toggleTheme() {
            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');
            themeToggleDarkIconMobile.classList.toggle('hidden');
            themeToggleLightIconMobile.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

            // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        }

        themeToggleBtn.addEventListener('click', toggleTheme);
        themeToggleBtnMobile.addEventListener('click', toggleTheme);

        // More Dropdown Toggle
        function toggleMoreDropdown(e) {
            e.stopPropagation();
            const menu = document.getElementById('more-menu');
            const arrow = document.getElementById('more-arrow');
            const isOpen = menu.classList.contains('opacity-100');

            if (isOpen) {
                menu.classList.remove('opacity-100', 'visible');
                menu.classList.add('opacity-0', 'invisible');
                arrow.classList.remove('rotate-180');
            } else {
                menu.classList.remove('opacity-0', 'invisible');
                menu.classList.add('opacity-100', 'visible');
                arrow.classList.add('rotate-180');
            }
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            const menu = document.getElementById('more-menu');
            const arrow = document.getElementById('more-arrow');
            if (menu && !document.getElementById('more-dropdown').contains(e.target)) {
                menu.classList.remove('opacity-100', 'visible');
                menu.classList.add('opacity-0', 'invisible');
                arrow.classList.remove('rotate-180');
            }
        });

        tsParticles.load({
            id: "tsparticles",
            options: {
                background: { color: "transparent" },
                particles: {
                    number: { value: 50, density: { enable: true, width: 800, height: 800 } },
                    color: { value: ["#0b21a8", "#3b82f6", "#ffffff"] },
                    shape: { type: "circle" },
                    opacity: { value: { min: 0.1, max: 0.6 }, animation: { enable: true, speed: 1.5, sync: false } },
                    size: { value: { min: 1, max: 4 } },
                    move: { enable: true, speed: 0.7, direction: "none", random: true, straight: false, outModes: { default: "out" } }
                }
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
