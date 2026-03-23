@extends('layouts.app')

@section('title', 'Home - Turivanta Alliance')

@section('content')
    <!-- Hero Section -->
    <main class="flex-grow flex items-center justify-center w-full px-6 pt-32 pb-20 z-10 relative">
        <div class="max-w-4xl w-full flex flex-col items-center justify-center gap-10 lg:gap-14 mt-6">

            <!-- Top Image with Wave -->
            <div class="flex justify-center items-center h-[320px] sm:h-[420px] lg:h-[500px]">
                <div class="hero-img-container">
                    <div class="absolute inset-0 bg-[#ff014f]/20 blur-3xl rounded-full scale-110"></div>
                    <div class="hero-img-wave w-[260px] h-[260px] sm:w-[340px] sm:h-[340px] lg:w-[440px] lg:h-[440px]">
                        <div class="hero-img-inner">
                            <img src="{{ asset('assets/img/hero_img.jpg') }}" alt="Dreaming Person Face"
                                class="w-full h-full object-cover grayscale transition-all duration-700 hover:grayscale-0 hover:scale-110">
                        </div>
                    </div>
                    <div
                        class="absolute -top-6 -right-6 lg:-top-10 lg:-right-10 w-24 h-24 bg-gradient-to-r from-[#ff014f] to-[#be123c] rounded-full blur-2xl opacity-60 animate-pulse">
                    </div>
                    <div
                        class="absolute -bottom-8 -left-8 lg:-bottom-12 lg:-left-12 w-32 h-32 bg-gradient-to-r from-rose-600 to-[#c026d3] rounded-full blur-3xl opacity-50">
                    </div>
                </div>
            </div>

            <!-- Bottom Content (Text) -->
            <div class="flex flex-col items-center text-center space-y-4 lg:space-y-6">
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight leading-[1.1]">
                    <span class="gradient-text">Turivanta</span> <span class="text-white">Alliance</span>
                </h1>
                <h2
                    class="text-xl sm:text-2xl lg:text-3xl font-semibold italic tracking-wide min-h-[32px] sm:min-h-[40px] flex items-center justify-center">
                    <span id="typed-text"></span>
                </h2>
            </div>
        </div>
    </main>

    <!-- About Section -->
    <section id="about" class="w-full px-6 py-24 z-10 relative flex justify-center text-white">
        <div class="max-w-7xl w-full grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-12 lg:gap-20 items-center">

            <!-- Left Side: Experience Badges -->
            <div
                class="relative w-full h-[450px] sm:h-[550px] flex flex-col items-center lg:items-center justify-center pt-10">
                <div
                    class="absolute lg:left-0 top-1/2 transform -translate-y-1/2 w-[300px] lg:w-[350px] h-[300px] lg:h-[350px] bg-[#ff014f] rounded-full blur-[90px] opacity-70 pointer-events-none z-0">
                </div>

                <div
                    class="relative z-10 w-[85%] max-w-[340px] aspect-square bg-[#0f0f11]/70 backdrop-blur-3xl border border-[#ffffff0a] rounded-3xl flex flex-col items-center justify-center p-8 text-center shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                    <h3 class="text-6xl lg:text-7xl font-extrabold mb-4 tracking-tight">1</h3>
                    <p class="text-2xl lg:text-3xl font-bold leading-[1.3] tracking-wide">Identity<br />for tourism</p>
                </div>

                <div
                    class="absolute z-20 bottom-8 lg:-bottom-2 right-4 lg:-right-4 w-[85%] max-w-[340px] bg-[#0f0f11]/80 backdrop-blur-3xl border border-[#ffffff0a] rounded-2xl p-6 flex items-center gap-5 shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                    <div
                        class="w-14 h-14 rounded-full border border-[#ff014f]/30 flex items-center justify-center flex-shrink-0 bg-transparent">
                        <svg class="w-6 h-6 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                                d="M8 11V7a4 4 0 118 0v4M5 11h14v10a2 2 0 01-2 2H7a2 2 0 01-2-2V11z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold tracking-tight text-white mb-1">The Universal Stamp</h4>
                        <p class="">Swapandarshi</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Content -->
            <div class="flex flex-col space-y-7 z-10 relative">
                <div>
                    <h5 class="text-[#ff014f] font-bold text-[13px] tracking-[0.2em] uppercase mb-4">About Me</h5>
                    <h2
                        class="text-[36px] sm:text-[42px] lg:text-[46px] font-extrabold leading-[1.2] tracking-tight text-white">
                        Uniting Global Tourism Under <br class="hidden sm:block" /> One Mark
                    </h2>
                    <p class="text-gray-400 mt-5 text-[15px] leading-[1.8] max-w-[95%]">
                        Turivanta Alliance represents a bold vision. It stands as a powerful symbol for the global tourism
                        industry.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2">
                    <div
                        class="bg-[#111113] border border-white/5 rounded-2xl p-7 hover:border-[#ff014f]/30 transition-colors group">
                        <div
                            class="w-[50px] h-[50px] bg-[#ff014f] rounded-full flex items-center justify-center mb-5 group-hover:-translate-y-1 transition-transform">
                            <svg class="w-[22px] h-[22px] text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-[17px] font-bold mb-3 tracking-wide text-white">Scope</h4>
                        <p class="text-gray-400 text-[13px] leading-[1.7]">Network of tourism businesses, travel agencies,
                            hospitality providers, tour operators, and destination brands.</p>
                    </div>

                    <div
                        class="bg-[#111113] border border-white/5 rounded-2xl p-7 hover:border-[#ff014f]/30 transition-colors group">
                        <div
                            class="w-[50px] h-[50px] bg-[#ff014f] rounded-full flex items-center justify-center mb-5 group-hover:-translate-y-1 transition-transform">
                            <svg class="w-[22px] h-[22px] text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-[17px] font-bold mb-3 tracking-wide text-white">Mission</h4>
                        <p class="text-gray-400 text-[13px] leading-[1.7]">Turivanta symbol is an instant recognition of
                            trusted tourism business, travel service or hospitality provider.</p>
                    </div>
                </div>

                <div class="pt-5">
                    <a href="{{ route('about') }}"
                        class="inline-flex items-center gap-2 px-8 py-[14px] bg-[#ff014f] text-white font-bold rounded-full transition-all duration-300 hover:bg-[#e11d48] w-max">
                        <span class="text-[15px]">Read More About Me</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
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
