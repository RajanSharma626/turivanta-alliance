<!DOCTYPE html>
<html lang="en" class="dark overflow-x-hidden">
<head>
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
        .gradient-text { background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-image: linear-gradient(90deg, #ff014f, #fb7185); }
        
        @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-15px); } 100% { transform: translateY(0px); } }
        @keyframes wave { 0%, 100% { border-radius: 40% 60% 70% 30% / 40% 40% 60% 50%; } 34% { border-radius: 70% 30% 50% 50% / 30% 30% 70% 70%; } 67% { border-radius: 100% 60% 60% 100% / 100% 100% 60% 60%; } }
        
        .hero-img-container { animation: float 6s ease-in-out infinite; position: relative; }
        .hero-img-wave { animation: wave 8s ease-in-out infinite alternate; box-shadow: 0 0 30px rgba(255, 1, 79, 0.4), inset 0 0 20px rgba(255, 1, 79, 0.4); transition: all 0.5s ease; position: relative; z-index: 2; overflow: hidden; background: linear-gradient(135deg, #e11d48, #ff014f); padding: 4px; }
        .hero-img-inner { width: 100%; height: 100%; animation: wave 8s ease-in-out infinite alternate; overflow: hidden; background: #030712; }
        
        main p { text-align: justify; }
        main input:hover, main select:hover, main textarea:hover { border-color: #ff014f !important; }
    </style>


</head>
<body class="antialiased selection:bg-[#ff014f] selection:text-white relative min-h-screen flex flex-col bg-[#030510] overflow-x-hidden">
    <div id="tsparticles" class="absolute inset-0 z-0"></div>
    <div class="absolute inset-0 w-full h-full overflow-hidden z-[-1] pointer-events-none">
        <div class="absolute -top-[200px] -left-[100px] w-[500px] h-[500px] bg-rose-600/20 rounded-full blur-[120px]"></div>
        <div class="absolute top-[100px] -right-[100px] w-[400px] h-[400px] bg-[#ff014f]/10 rounded-full blur-[100px]"></div>
    </div>

    <!-- Common Navbar -->
    <nav class="w-full z-50 px-6 py-4 lg:px-12 flex items-center justify-between bg-[#030712] border-b border-white/10 fixed top-0 transition-all duration-300">
        <div class="flex items-center cursor-pointer group">
            <a href="{{ route('home') }}"><img src="{{ asset('assets/img/Logo-of-Turivanta-Alliance.png') }}" alt="Logo" class="h-10 sm:h-12 w-auto object-contain rounded-md transition-transform duration-300 group-hover:scale-105"></a>
        </div>
        <div class="hidden md:flex items-center gap-1 bg-white/5 p-1 rounded-full border border-white/10 backdrop-blur-md">
            <a href="{{ route('home') }}" class="px-6 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-white bg-white/10 shadow-[0_0_10px_rgba(255,255,255,0.1)]' : 'text-gray-400 hover:text-white hover:bg-white/5' }} rounded-full transition-all">Home</a>
            <a href="{{ route('about') }}" class="px-6 py-2 text-sm font-medium {{ request()->routeIs('about') ? 'text-white bg-white/10 shadow-[0_0_10px_rgba(255,255,255,0.1)]' : 'text-gray-400 hover:text-white hover:bg-white/5' }} rounded-full transition-all">About</a>
            <a href="{{ route('membership') }}" class="px-6 py-2 text-sm font-medium {{ request()->routeIs('membership') ? 'text-white bg-white/10 shadow-[0_0_10px_rgba(255,255,255,0.1)]' : 'text-gray-400 hover:text-white hover:bg-white/5' }} rounded-full transition-all">Membership</a>
            
            <!-- More Dropdown -->
            <div class="relative group">
                <button class="px-6 py-2 text-sm font-medium {{ (request()->routeIs('benefits') || request()->routeIs('events') || request()->routeIs('contact') || request()->routeIs('faq')) ? 'text-white bg-white/10' : 'text-gray-400 hover:text-white hover:bg-white/5' }} rounded-full transition-all flex items-center gap-2">
                    More
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="absolute left-1/2 -translate-x-1/2 mt-2 w-48 bg-[#0a0a0f] border border-white/10 rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden backdrop-blur-xl">
                    <a href="{{ route('benefits') }}" class="block px-6 py-3 text-sm font-medium {{ request()->routeIs('benefits') ? 'text-[#ff014f] bg-white/5' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-all">Benefits</a>
                    <a href="{{ route('events') }}" class="block px-6 py-3 text-sm font-medium {{ request()->routeIs('events') ? 'text-[#ff014f] bg-white/5' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-all">Events</a>
                    <a href="{{ route('contact') }}" class="block px-6 py-3 text-sm font-medium {{ request()->routeIs('contact') ? 'text-[#ff014f] bg-white/5' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-all">Contact</a>
                    <a href="{{ route('faq') }}" class="block px-6 py-3 text-sm font-medium {{ request()->routeIs('faq') ? 'text-[#ff014f] bg-white/5' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-all">FAQ</a>
                </div>
            </div>
        </div>

        <!-- Search Box -->
        <div class="hidden lg:flex flex-grow max-w-xs mx-8">
            <form action="{{ route('search') }}" method="GET" class="relative w-full group">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search identity..." class="w-full bg-white/5 border border-white/10 rounded-full px-12 py-2.5 text-xs font-medium text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f]/50 transition-all focus:bg-white/10 backdrop-blur-md hover:border-[#ff014f]/40 group-hover:border-[#ff014f]/40">
                <svg class="w-4 h-4 absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-500 group-focus-within:text-[#ff014f] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </form>
        </div>


        <div class="hidden md:flex items-center justify-end flex-shrink-0">
            @if(auth('web')->check())
                <div class="relative group">
                    <button class="flex items-center gap-3 bg-white/5 border border-white/10 rounded-full px-4 py-1.5 transition-all hover:bg-white/10 cursor-pointer">
                        <span class="text-sm font-bold text-white">{{ auth('web')->user()->first_name }}</span>
                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-[#ff014f] to-rose-400 flex items-center justify-center text-white font-black text-xs uppercase">
                            {{ substr(auth('web')->user()->first_name, 0, 1) }}{{ substr(auth('web')->user()->last_name, 0, 1) }}
                        </div>
                    </button>
                    <!-- Dropdown -->
                    <div class="absolute right-0 mt-2 w-48 bg-[#0a0a0f] border border-white/10 rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden">
                        <div class="px-6 py-4 border-b border-white/5 bg-white/5">
                            <p class="text-xs text-gray-500 uppercase tracking-widest font-bold mb-1">Signed in as</p>
                            <p class="text-sm text-white font-bold truncate">{{ auth('web')->user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.index') }}" class="block px-6 py-3 text-sm text-gray-300 hover:text-white hover:bg-white/5 transition-colors">My Application</a>
                        <a href="{{ route('settings') }}" class="block px-6 py-3 text-sm text-gray-300 hover:text-white hover:bg-white/5 transition-colors">My Profile</a>
                        <div class="border-t border-white/5"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-6 py-3 text-sm text-rose-500 hover:text-rose-400 hover:bg-rose-500/5 transition-colors font-bold">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-white hover:text-[#ff014f] text-sm font-bold mr-6 transition-colors">Login</a>
                <a href="{{ route('register') }}" class="px-6 py-2 bg-[#ff014f] text-white text-sm font-bold rounded-full transition-all duration-300 hover:bg-[#e11d48] hover:shadow-[0_0_15px_rgba(255,1,79,0.3)] hover:-translate-y-0.5">Register</a>
            @endif
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="flex md:hidden w-10 h-10 items-center justify-center bg-white/5 border border-white/10 rounded-xl text-white transition-all hover:bg-white/10" onclick="toggleMobileMenu()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="hamburger-icon"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            <svg class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="close-icon"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </nav>

    <!-- Mobile Drawer -->
    <div id="mobile-drawer" class="fixed inset-0 z-40 bg-[#030510]/95 backdrop-blur-2xl transform translate-x-full transition-transform duration-300 md:hidden">
        <div class="flex flex-col h-full pt-32 pb-12 px-8 overflow-y-auto">
            <div class="flex flex-col gap-6 text-2xl font-bold">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-[#ff014f]' : 'text-white' }}" onclick="toggleMobileMenu()">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-[#ff014f]' : 'text-white' }}" onclick="toggleMobileMenu()">About</a>
                <a href="{{ route('membership') }}" class="{{ request()->routeIs('membership') ? 'text-[#ff014f]' : 'text-white' }}" onclick="toggleMobileMenu()">Membership</a>
                <a href="{{ route('benefits') }}" class="{{ request()->routeIs('benefits') ? 'text-[#ff014f]' : 'text-white' }}" onclick="toggleMobileMenu()">Benefits</a>
                <a href="{{ route('events') }}" class="{{ request()->routeIs('events') ? 'text-[#ff014f]' : 'text-white' }}" onclick="toggleMobileMenu()">Events</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-[#ff014f]' : 'text-white' }}" onclick="toggleMobileMenu()">Contact</a>
                <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'text-[#ff014f]' : 'text-white' }}" onclick="toggleMobileMenu()">FAQ</a>
            </div>

            <div class="mt-auto pt-12 border-t border-white/10">
                @if(auth('web')->check())
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-[#ff014f] to-rose-400 flex items-center justify-center text-white font-black text-lg">
                            {{ substr(auth('web')->user()->first_name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-white font-bold leading-tight">{{ auth('web')->user()->first_name }} {{ auth('web')->user()->last_name }}</p>
                            <p class="text-gray-500 text-sm">{{ auth('web')->user()->email }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <a href="{{ route('profile.index') }}" class="text-gray-400 font-bold hover:text-white" onclick="toggleMobileMenu()">My Application</a>
                        <a href="{{ route('settings') }}" class="text-gray-400 font-bold hover:text-white" onclick="toggleMobileMenu()">My Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-rose-500 font-bold">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="flex flex-col gap-4">
                        <a href="{{ route('login') }}" class="w-full py-4 text-center text-white font-bold border border-white/10 rounded-2xl" onclick="toggleMobileMenu()">Login</a>
                        <a href="{{ route('register') }}" class="w-full py-4 text-center text-white font-bold bg-[#ff014f] rounded-2xl" onclick="toggleMobileMenu()">Register</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @yield('content')

    <!-- Common Footer -->
    <footer class="w-full bg-[#0a0a0f] border-t border-white/5 pt-20 pb-8 relative z-10 mt-auto">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col md:flex-row justify-between gap-16 md:gap-8 mb-16">
            
            <!-- Left: Logo & Text -->
            <div class="md:w-1/3">
                <a href="{{ route('home') }}" class="inline-block mb-6">
                    <img src="{{ asset('assets/img/Logo-of-Turivanta-Alliance.png') }}" alt="Turivanta Alliance Logo" class="h-10 w-auto object-contain">
                </a>
                <h2 class="text-3xl font-extrabold text-white leading-tight">
                    Ready <span class="text-gray-400 font-light"> to be </span><br/> endorsed?
                </h2>
            </div>
            
            <!-- Middle: Quick Links -->
            <div class="md:w-1/3 flex flex-col md:items-center">
                <div class="flex flex-col border-l border-white/5 pl-8 md:pl-0 md:border-none">
                    <h3 class="text-white text-lg font-bold mb-6">Quick Links</h3>
                    <ul class="flex flex-col gap-4 text-gray-400 text-sm font-medium">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="{{ route('benefits') }}" class="hover:text-white transition-colors">Benefits</a></li>
                        <li><a href="{{ route('membership') }}" class="hover:text-white transition-colors">Membership</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="{{ route('events') }}" class="hover:text-white transition-colors">Events</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:text-white transition-colors">FAQ's</a></li>
                    </ul>
                </div>
            </div>

            <!-- Right: Contact -->
            <div class="md:w-1/3 flex flex-col border-l border-white/5 pl-8">
                <h3 class="text-white text-lg font-bold mb-6">Contact</h3>
                <ul class="flex flex-col gap-6 text-gray-400 text-sm">
                    <li class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span>info@turivanta.com</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="leading-relaxed">Ward No. 32, Lower Pouni Chack,<br>Jammu, J&K, India</span>
                    </li>
                </ul>

            </div>
        </div>

        <!-- Copyright Bar -->
        <div class="max-w-7xl mx-auto px-6 lg:px-12 border-t border-white/10 pt-8 mt-4 flex items-center justify-between">
            <p class="text-gray-500 text-sm font-medium">© {{ date('Y') }} | All Rights Reserved</p>
            <div class="flex gap-4">
                <a href="{{ route('privacy-policy') }}" class="text-gray-500 hover:text-white text-sm transition-colors">Privacy </a>
                <a href="{{ route('terms-conditions') }}" class="text-gray-500 hover:text-white text-sm transition-colors">Terms</a>
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

        tsParticles.load({
            id: "tsparticles",
            options: {
                background: { color: "transparent" },
                particles: {
                    number: { value: 50, density: { enable: true, width: 800, height: 800 } },
                    color: { value: ["#ff014f", "#fb7185", "#ffffff"] },
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
