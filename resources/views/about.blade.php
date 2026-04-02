@extends('layouts.app')

@section('title', 'Global Tourism Alliance & Trusted Tourism Network | Turivanta')
@section('meta_description', 'Trusted tourism network connecting businesses worldwide. Join a global tourism alliance shaping the future of travel industry.')
@section('meta_keywords', 'trusted tourism network and global tourism alliance')

@section('content')
    <main class="flex-grow w-full relative z-10 pt-32 pb-20 px-6 overflow-x-hidden">
        <!-- Header -->
        <section class="max-w-6xl mx-auto flex flex-col items-center text-center mt-10 mb-20 relative">
            <h5 class="text-[#ff014f] font-bold text-[14px] tracking-[0.25em] uppercase mb-4">Turivanta Alliance</h5>
            <h2 class="text-4xl sm:text-6xl font-extrabold tracking-tight leading-[1.1] text-white mb-6 px-1">
                The Identity of <span class="gradient-text pr-2">Modern Tourism</span>
            </h2>
            <p class="text-gray-400 text-[18px] leading-[1.8] w-full">
                Turivanta Alliance represents a bold vision. It stands as a powerful symbol for the global tourism industry.
                Just as a medical store uses a plus sign for instant recognition, Turivanta Alliance creates a distinct and
                universal identity for tourism. <strong class="text-white">Anyone who sees the Turivanta mark immediately
                    connects it with tourism, travel services, hospitality businesses, and trusted tourism service
                    providers.</strong> It acts as a clear sign of credibility, trust, and professional belonging in the
                tourism ecosystem.
            </p>

        </section>

        <!-- Meaning Section (Split Layout) -->
        <section class="max-w-6xl mx-auto flex flex-col md:flex-row gap-12 items-center mb-16 relative">
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-[800px] h-[400px] bg-[#ff014f] rounded-full blur-[150px] opacity-[0.05] pointer-events-none z-0">
            </div>

            <div class="md:w-1/2 w-full relative z-10 text-center md:text-left">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-6 italic uppercase tracking-tight px-1">Meaning</h2>
                <p class="text-gray-400 text-[16px] leading-[1.8] mb-4 text-justify px-1">
                    The name Turivanta carries depth and purpose. <strong class="text-white">“Turi”</strong> is inspired by
                    Turiya, the state of higher awareness and transcendence. It reflects journeys that go beyond the
                    ordinary. It represents exploration, elevation, and transformation. <strong
                        class="text-white">“Vanta”</strong> means “one who possesses” or “one who is endowed with.”
                </p>
                <p class="text-gray-400 text-[16px] leading-[1.8] mb-4 text-justify">
                    Together, Turivanta means one who possesses higher vision and one who delivers meaningful and
                    transformative journeys.
                </p>
                <p class="text-gray-400 text-[16px] leading-[1.8]">
                    This meaning aligns perfectly with the tourism industry. Travel is not just movement. Travel creates
                    experiences. Travel builds understanding. Travel drives growth. Turivanta Alliance reflects this
                    philosophy in every aspect. It promotes purpose-driven tourism, experiential travel, and quality travel
                    services.
                </p>

            </div>

            <div class="md:w-1/2 w-full relative z-10 md:pl-10">
                <div
                    class="relative rounded-3xl overflow-hidden border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                    <img src="{{ asset('assets/img/hero_img.jpg') }}" alt="Turivanta Meaning"
                        class="w-full h-auto aspect-video md:aspect-[4/3] object-cover hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#030510] via-transparent to-transparent opacity-80">
                    </div>
                </div>
            </div>
        </section>

        <!-- Scope and Mission Cards -->
        <section class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mb-24 relative z-10">
            <!-- Scope -->
            <div
                class="bg-[#0f0f12] border border-white/5 rounded-3xl p-6 sm:p-12 shadow-2xl flex flex-col hover:-translate-y-2 transition-transform duration-500 group">
                <h3 class="text-2xl sm:text-3xl font-bold text-white mb-6 italic uppercase tracking-tight px-1">Scope</h3>
                <p class="text-gray-400 text-[15px] leading-relaxed mb-4 text-justify">
                    Turivanta Alliance builds a strong and connected network of tourism businesses, travel agencies,
                    hospitality providers, tour operators, and destination brands. It serves as a trusted endorsement
                    platform for the tourism industry - The Global Seal. It creates a recognizable mark that signals
                    authenticity and reliability.
                </p>
                <p class="text-gray-400 text-[15px] leading-relaxed mb-4 border-t border-white/5 pt-4 text-justify">
                    Businesses associated with Turivanta Alliance gain a strong and competitive identity. They stand out in
                    the crowded tourism market. Customers feel confident when they see the Turivanta symbol. They associate
                    it with trusted tourism services, professional travel agencies, and reliable hospitality businesses.
                </p>
                <p class="text-gray-400 text-[15px] leading-relaxed mt-auto border-t border-white/5 pt-4 text-justify">
                    This builds immediate trust and long-term loyalty. Turivanta Alliance actively promotes unity within the
                    tourism sector. It connects different segments of the industry.
                </p>
            </div>

            <!-- Mission -->
            <div
                class="bg-[#0f0f12] border border-white/5 rounded-3xl p-6 sm:p-12 shadow-2xl flex flex-col hover:-translate-y-2 transition-transform duration-500 group">
                <h3 class="text-2xl sm:text-3xl font-bold text-white mb-6 italic uppercase tracking-tight px-1">Mission</h3>
                <p class="text-gray-400 text-[15px] leading-relaxed mb-4 text-justify">
                    Our mission is clear and focused. We aim to make Turivanta Alliance a universal identity in tourism. We
                    aim to ensure that whenever someone sees the Turivanta symbol, they instantly recognize a trusted
                    tourism business, travel service, or hospitality provider.
                </p>
                <p class="text-gray-400 text-[15px] leading-relaxed mb-4 border-t border-white/5 pt-4 text-justify">
                    Turivanta builds a tourism endorsement platform that empowers certified tourism businesses. We create a trusted tourism network for verified travel service providers. We deliver a strong tourism identity platform and tourism membership platform. We grow a global tourism identity through a reliable tourism certification network that drives trust, visibility, and growth worldwide.
                </p>
                <p class="text-gray-400 text-[15px] leading-relaxed mt-auto border-t border-white/5 pt-4 text-justify">
                    We strive to build a future where the Turivanta mark becomes a global standard for tourism excellence,
                    travel services, and hospitality trust. We work to create clarity for customers and growth for
                    businesses.
                </p>
            </div>
        </section>

        <!-- Strong Highlight Block -->
        <section
            class="max-w-6xl mx-auto text-center bg-gradient-to-r from-rose-900/20 via-[#ff014f]/10 to-transparent border border-[#ff014f]/20 rounded-3xl p-10 sm:p-16 mb-32 backdrop-blur-sm">

            <h3 class="text-[22px] sm:text-[34px] font-bold text-white leading-tight italic uppercase tracking-tight px-1 text-center">
                With Turivanta Alliance, tourism gains a face. It gains a symbol. It gains a future. Tourism gains an identity.
            </h3>
            <p class="text-lg text-gray-300 mt-6 mx-auto">


                Turivanta Alliance connects businesses, builds trust, and drives the next era of tourism, travel services,
                hospitality innovation, and sustainable tourism growth.
            </p>
        </section>

        <!-- Contact Section -->
        <section id="contact"
            class="max-w-6xl mx-auto mb-10 bg-[#0f0f12] border border-white/5 rounded-[2.5rem] p-8 sm:p-10 flex flex-col md:flex-row justify-between gap-10">
            <div class="md:w-1/2 space-y-6">
                <div>
                    <h5 class="text-[#ff014f] font-bold text-[13px] uppercase tracking-widest mb-4">Get In Touch</h5>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-2 italic uppercase tracking-tight px-1 text-center md:text-left">Contact Us</h2>
                </div>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center shrink-0 border border-white/10">
                            <svg class="w-4 h-4 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-1">Office Address</h4>
                            <p class="text-gray-400 text-sm leading-relaxed">Ward No. 32, Lower Pouni Chack, Jammu, J&K, India - 180002</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center shrink-0 border border-white/10">
                            <svg class="w-4 h-4 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-1">Email</h4>
                            <p class="text-gray-400 text-sm leading-relaxed">info@turivanta.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-5/12">
                <div class="relative group rounded-3xl overflow-hidden shadow-2xl border border-white/5">
                    <img src="{{ asset('assets/img/hero_img.jpg') }}"
                        class="w-full aspect-[4/3] object-cover grayscale transition-all duration-700 group-hover:grayscale-0 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#ff014f]/20 to-transparent"></div>
                </div>
            </div>
        </section>
    </main>
@endsection
