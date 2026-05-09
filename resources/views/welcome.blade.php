@extends('layouts.app')

@section('title', 'Turivanta Alliance | Tourism Endorsement & Industry Platform')
@section('meta_description', 'Turivanta Alliance is a global tourism endorsement platform and tourism industry platform
    connecting trusted travel and hospitality providers.')
@section('meta_keywords', 'tourism endorsement platform and tourism industry platform')

@section('content')
    <!-- Hero Section -->
    <main class="flex-grow flex items-center justify-center w-full px-6 pt-24 sm:pt-32 pb-16 z-10 relative">
        <div class="max-w-4xl w-full flex flex-col items-center justify-center gap-8 lg:gap-14 mt-4">

            <!-- Top Image with Wave -->
            <div class="flex justify-center items-center h-[320px] sm:h-[420px] lg:h-[500px]">
                <div class="hero-img-container">
                    <div class="absolute inset-0 bg-primary/20 blur-3xl rounded-full scale-110"></div>
                    <div class="hero-img-wave w-[260px] h-[260px] sm:w-[340px] sm:h-[340px] lg:w-[440px] lg:h-[440px]">
                        <div class="hero-img-inner">
                            <img src="{{ asset('assets/img/hero_img.png') }}" alt="Dreaming Person Face"
                                class="w-full h-full object-cover transition-all duration-700">
                        </div>
                    </div>
                    <div
                        class="absolute -top-6 -right-6 lg:-top-10 lg:-right-10 w-24 h-24 bg-gradient-to-r from-primary to-blue-900 rounded-full blur-2xl opacity-60 animate-pulse">
                    </div>
                    <div
                        class="absolute -bottom-8 -left-8 lg:-bottom-12 lg:-left-12 w-32 h-32 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-3xl opacity-50">
                    </div>
                </div>
            </div>

            <!-- Bottom Content (Text) -->
            <div class="flex flex-col items-center text-center space-y-4 lg:space-y-6">
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight leading-[1.1]">
                    <span class="gradient-text pr-2">Turivanta</span> <span class="text-foreground">Alliance</span>
                </h1>
                <h2
                    class="text-xl sm:text-2xl lg:text-3xl font-semibold italic tracking-wide min-h-[32px] sm:min-h-[40px] flex items-center justify-center">
                    <span id="typed-text"></span>
                </h2>
            </div>
        </div>
    </main>

    <!-- About Section -->
    <section id="about" class="w-full px-6 py-24 z-10 relative flex justify-center text-foreground">
        <div class="max-w-7xl w-full grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-12 lg:gap-20 items-center">

            <!-- Left Side: Experience Badges -->
            <div
                class="relative w-full h-[380px] sm:h-[550px] flex flex-col items-center lg:items-center justify-center pt-6 sm:pt-10">
                <div
                    class="absolute lg:left-0 top-1/2 transform -translate-y-1/2 w-[300px] lg:w-[350px] h-[300px] lg:h-[350px] bg-primary rounded-full blur-[90px] opacity-70 pointer-events-none z-0">
                </div>

                <div
                    class="relative z-10 w-[85%] max-w-[340px] aspect-square bg-card/70 backdrop-blur-3xl border border-card-border rounded-3xl flex flex-col items-center justify-center p-8 text-center shadow-sm dark:shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                    <h3 class="text-2xl lg:text-3xl font-extrabold tracking-tight mb-3">Single</h3>
                    <p class="text-2xl lg:text-3xl font-bold leading-[1.3] tracking-wide mb-3">Identity</p>
                    <p class="text-2xl lg:text-3xl font-bold leading-[1.3] tracking-wide">for tourism</p>
                </div>

                <div
                    class="absolute z-20 bottom-4 sm:bottom-8 lg:-bottom-2 left-1/2 -translate-x-1/2 lg:left-auto lg:right-[-10px] lg:translate-x-0 w-[90%] sm:w-[85%] max-w-[340px] bg-card/80 backdrop-blur-3xl border border-card-border rounded-2xl p-5 sm:p-6 flex items-center gap-5 shadow-sm dark:shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                    <div
                        class="w-14 h-14 rounded-full border border-primary/30 flex items-center justify-center flex-shrink-0 bg-transparent">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                d="M8 11V7a4 4 0 118 0v4M5 11h14v10a2 2 0 01-2 2H7a2 2 0 01-2-2V11z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold tracking-tight text-foreground mb-1">The Universal Stamp</h4>
                        <p class="text-muted-foreground">- By Swapandarshi</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Content -->
            <div class="flex flex-col space-y-7 z-10 relative">
                <div>
                    <h5 class="text-primary font-bold text-[13px] tracking-[0.25em] uppercase mb-4">Introduction</h5>
                    <h2
                        class="text-3xl sm:text-[42px] lg:text-[46px] font-extrabold leading-[1.2] tracking-tight text-foreground text-center lg:text-left">
                        Uniting Global Tourism <br class="hidden sm:block" /> Under One Mark
                    </h2>
                    <p class="text-muted-foreground mt-5 text-[15px] leading-[1.8] max-w-[95%] text-justify">
                        Turivanta Alliance represents a bold vision. It stands as a powerful symbol for the global tourism
                        industry.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2">
                    <div
                        class="bg-card border border-card-border rounded-2xl p-7 hover:border-primary/30 transition-all duration-300 group">
                        <div
                            class="w-[50px] h-[50px] bg-primary rounded-full flex items-center justify-center mb-5 group-hover:-translate-y-1 transition-transform">
                            <svg class="w-[22px] h-[22px] text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-[17px] font-bold mb-3 tracking-wide text-foreground">Scope</h4>
                        <p class="text-muted-foreground text-[13px] leading-[1.7] text-justify">Network of tourism
                            businesses, travel agencies,
                            hospitality providers, tour operators, and destination brands.</p>
                    </div>

                    <div
                        class="bg-card border border-card-border rounded-2xl p-7 hover:border-primary/30 transition-all duration-300 group">
                        <div
                            class="w-[50px] h-[50px] bg-primary rounded-full flex items-center justify-center mb-5 group-hover:-translate-y-1 transition-transform">
                            <svg class="w-[22px] h-[22px] text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-[17px] font-bold mb-3 tracking-wide text-foreground">Mission</h4>
                        <p class="text-muted-foreground text-[13px] leading-[1.7] text-justify">Turivanta symbol is an
                            instant recognition of
                            trusted tourism business, travel service or hospitality provider.</p>
                    </div>
                </div>

                <div class="pt-8 border-t border-card-border">
                    <h5 class="text-primary font-bold text-[13px] tracking-[0.2em] uppercase mb-4 text-center sm:text-left">
                        Excellence</h5>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-foreground mb-4 text-center sm:text-left">
                        Inspiring the World Through <br class="hidden sm:block" /> Tourism Excellence
                    </h3>
                    <p class="text-muted-foreground text-[15px] leading-[1.8] text-center sm:text-left text-justify">
                        Turivanta Alliance provides expert guidance and strategic support to tourism businesses, helping
                        them enhance performance, build trust, and achieve sustainable growth in the global travel and
                        hospitality industry.
                    </p>
                    <p
                        class="text-muted-foreground text-[13px] italic leading-[1.8] mt-6 border-l-2 border-primary/20 pl-4 text-justify">
                        Building a trusted Turivanta tourism platform for global tourism identity.
                    </p>
                </div>

                <div class="pt-5 flex justify-center sm:justify-start">
                    <a href="{{ route('about') }}"
                        class="inline-flex items-center gap-2 px-8 py-[14px] bg-primary text-white font-bold rounded-full transition-all duration-300 hover:bg-blue-800 w-max shadow-[0_10px_20px_rgba(3,18,115,0.2)] hover:shadow-[0_10px_25px_rgba(3,18,115,0.4)]">
                        <span class="text-[15px]">Learn More About Turivanta</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- Global Ecosystem Section -->
    <section class="w-full px-6 py-24 z-10 relative bg-background">
        <div class="max-w-7xl mx-auto">
            <div class="mb-16 text-center">
                <h5 class="text-primary font-bold text-[13px] tracking-[0.25em] uppercase mb-4">Ecosystem</h5>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-foreground leading-tight">
                    Our Global <span class="text-muted-foreground font-light">Tourism Focus</span>
                </h2>
                <div class="w-16 h-1 bg-primary mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- 1. Tourism Industry Platform -->
                <div
                    class="bg-card border border-card-border rounded-3xl p-8 hover:bg-muted hover:border-primary/30 transition-all duration-500 group">
                    <div
                        class="w-14 h-14 bg-gradient-to-tr from-primary to-blue-400 rounded-2xl flex items-center justify-center mb-6 shadow-xl group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-foreground mb-4">Tourism Industry Platform</h3>
                    <p class="text-muted-foreground text-sm leading-relaxed text-justify">Discover a powerful tourism
                        industry platform that connects global stakeholders, boosts visibility, and drives growth through a
                        trusted platform.</p>
                </div>

                <!-- 2. Tourism Business Network -->
                <div
                    class="bg-card border border-card-border rounded-3xl p-8 hover:bg-muted hover:border-primary/30 transition-all duration-500 group">
                    <div
                        class="w-14 h-14 bg-gradient-to-tr from-primary to-blue-400 rounded-2xl flex items-center justify-center mb-6 shadow-xl group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-foreground mb-4">Tourism Business Network</h3>
                    <p class="text-muted-foreground text-sm leading-relaxed text-justify">Join a dynamic tourism business
                        network that builds partnerships, expands reach, and accelerates growth through a global ecosystem.
                    </p>
                </div>

                <!-- 3. Global Tourism Alliance -->
                <div
                    class="bg-card border border-card-border rounded-3xl p-8 hover:bg-muted hover:border-primary/30 transition-all duration-500 group">
                    <div
                        class="w-14 h-14 bg-gradient-to-tr from-primary to-blue-400 rounded-2xl flex items-center justify-center mb-6 shadow-xl group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.5a3.5 3.5 0 013.5 3.5V17m-6-10a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-foreground mb-4">Global Tourism Alliance</h3>
                    <p class="text-muted-foreground text-sm leading-relaxed text-justify">Be part of a global tourism
                        alliance that unites industry leaders, fosters collaboration, and drives innovation through a
                        scalable network.</p>
                </div>

                <!-- 4. Travel and Hospitality Network -->
                <div
                    class="bg-card border border-card-border rounded-3xl p-8 hover:bg-muted hover:border-primary/30 transition-all duration-500 group">
                    <div
                        class="w-14 h-14 bg-gradient-to-tr from-primary to-blue-400 rounded-2xl flex items-center justify-center mb-6 shadow-xl group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9h18">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-foreground mb-4">Travel and Hospitality Network</h3>
                    <p class="text-muted-foreground text-sm leading-relaxed text-justify">Explore a leading travel and
                        hospitality network that connects brands, enhances services, and creates opportunities globally.</p>
                </div>

                <!-- 5. Tourism Service Providers -->
                <div
                    class="bg-card border border-card-border rounded-3xl p-8 hover:bg-muted hover:border-primary/30 transition-all duration-500 group">
                    <div
                        class="w-14 h-14 bg-gradient-to-tr from-primary to-blue-400 rounded-2xl flex items-center justify-center mb-6 shadow-xl group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-foreground mb-4">Tourism Service Providers</h3>
                    <p class="text-muted-foreground text-sm leading-relaxed text-justify">Connect with top tourism service
                        providers, showcase services, and grow your business using a trusted platform designed for global
                        providers.</p>
                </div>

                <!-- 6. Tourism Business Directory -->
                <div
                    class="bg-card border border-card-border rounded-3xl p-8 hover:bg-muted hover:border-primary/30 transition-all duration-500 group">
                    <div
                        class="w-14 h-14 bg-gradient-to-tr from-primary to-blue-400 rounded-2xl flex items-center justify-center mb-6 shadow-xl group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.246.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-foreground mb-4">Tourism Business Directory</h3>
                    <p class="text-muted-foreground text-sm leading-relaxed text-justify">List your company in a tourism
                        business directory that improves visibility, attracts leads, and drives growth through a global
                        directory.</p>
                </div>

                <!-- 7. Travel Industry Association -->
                <div
                    class="bg-card border border-card-border rounded-3xl p-8 hover:bg-muted hover:border-primary/30 transition-all duration-500 group">
                    <div
                        class="w-14 h-14 bg-gradient-to-tr from-primary to-blue-400 rounded-2xl flex items-center justify-center mb-6 shadow-xl group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-foreground mb-4">Travel Industry Association</h3>
                    <p class="text-muted-foreground text-sm leading-relaxed text-justify">Join a trusted travel industry
                        association that supports members, influences policy, and promotes standards globally.</p>
                </div>

                <!-- 8. Hospitality Business Network -->
                <div
                    class="bg-card border border-card-border rounded-3xl p-8 hover:bg-muted hover:border-primary/30 transition-all duration-500 group">
                    <div
                        class="w-14 h-14 bg-gradient-to-tr from-primary to-blue-400 rounded-2xl flex items-center justify-center mb-6 shadow-xl group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-foreground mb-4">Hospitality Business Network</h3>
                    <p class="text-muted-foreground text-sm leading-relaxed text-justify">Grow with a hospitality business
                        network that connects hotels, partners, and suppliers while boosting global opportunities.</p>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Typed('#typed-text', {
                strings: ['The Universal Stamp of Tourism'],
                typeSpeed: 60,
                backSpeed: 40,
                startDelay: 300,
                backDelay: 3000,
                loop: true,
                showCursor: true,
                cursorChar: '|'
            });
        });
    </script>
@endpush
