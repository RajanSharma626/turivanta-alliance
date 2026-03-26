<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Turivanta Alliance - The Identity of Modern Tourism')</title>
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
<body class="antialiased selection:bg-[#ff014f] selection:text-white relative min-h-screen flex flex-col bg-[#030510]">
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
            <a href="{{ route('faq') }}" class="px-6 py-2 text-sm font-medium {{ request()->routeIs('faq') ? 'text-white bg-white/10 shadow-[0_0_10px_rgba(255,255,255,0.1)]' : 'text-gray-400 hover:text-white hover:bg-white/5' }} rounded-full transition-all">FAQ's</a>
            <a href="{{ route('contact') }}" class="px-6 py-2 text-sm font-medium {{ request()->routeIs('contact') ? 'text-white bg-white/10 shadow-[0_0_10px_rgba(255,255,255,0.1)]' : 'text-gray-400 hover:text-white hover:bg-white/5' }} rounded-full transition-all">Contact</a>
        </div>

        <!-- Search Box -->
        <div class="hidden lg:flex flex-grow max-w-xs mx-8">
            <div class="relative w-full group">
                <input type="text" placeholder="Search identity..." class="w-full bg-white/5 border border-white/10 rounded-full px-12 py-2.5 text-xs font-medium text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f]/50 transition-all focus:bg-white/10 backdrop-blur-md hover:border-[#ff014f]/40 group-hover:border-[#ff014f]/40">
                <svg class="w-4 h-4 absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-500 group-focus-within:text-[#ff014f] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
        </div>


        <div class="hidden md:flex items-center justify-end">
            @guest
                <a href="{{ route('login') }}" class="text-white hover:text-[#ff014f] text-sm font-bold mr-6 transition-colors">Login</a>
                <a href="{{ route('register') }}" class="px-6 py-2 bg-[#ff014f] text-white text-sm font-bold rounded-full transition-all duration-300 hover:bg-[#e11d48] hover:shadow-[0_0_15px_rgba(255,1,79,0.3)] hover:-translate-y-0.5">Register</a>
            @else
                <div class="relative group">
                    <button class="flex items-center gap-3 bg-white/5 border border-white/10 rounded-full px-4 py-1.5 transition-all hover:bg-white/10">
                        <span class="text-sm font-bold text-white">{{ Auth::user()->first_name }}</span>
                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-[#ff014f] to-rose-400 flex items-center justify-center text-white font-black text-xs">
                            {{ substr(Auth::user()->first_name, 0, 1) }}{{ substr(Auth::user()->last_name, 0, 1) }}
                        </div>
                    </button>
                    <!-- Dropdown -->
                    <div class="absolute right-0 mt-2 w-48 bg-[#0a0a0f] border border-white/10 rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden">
                        <div class="px-6 py-4 border-b border-white/5 bg-white/5">
                            <p class="text-xs text-gray-500 uppercase tracking-widest font-bold mb-1">Signed in as</p>
                            <p class="text-sm text-white font-bold truncate">{{ Auth::user()->email }}</p>
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
            @endguest
        </div>
    </nav>

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
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Us</a></li>
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
