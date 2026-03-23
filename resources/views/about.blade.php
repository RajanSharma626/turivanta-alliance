@extends('layouts.app')

@section('title', 'About Us - Turivanta Alliance')

@section('content')
    <main class="flex-grow w-full relative z-10 pt-32 pb-20 px-6">
        <!-- Header -->
        <section class="max-w-6xl mx-auto flex flex-col items-center text-center mt-10 mb-20 relative">
            <h5 class="text-[#ff014f] font-bold text-[14px] tracking-[0.25em] uppercase mb-4">Turivanta Alliance</h5>
            <h1 class="text-5xl sm:text-6xl font-extrabold tracking-tight leading-[1.1] text-white mb-6">
                The Identity of <span class="gradient-text">Modern Tourism</span>
            </h1>
            <p class="text-gray-400 text-[18px] leading-[1.8] max-w-4xl mx-auto">
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
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-[#ff014f] rounded-full blur-[150px] opacity-[0.05] pointer-events-none z-0">
            </div>

            <div class="md:w-1/2 w-full relative z-10">
                <h2 class="text-4xl font-extrabold text-white mb-6">Meaning</h2>
                <p class="text-gray-400 text-[16px] leading-[1.8] mb-4">
                    The name Turivanta carries depth and purpose. <strong class="text-white">“Turi”</strong> is inspired by
                    Turiya, the state of higher awareness and transcendence. It reflects journeys that go beyond the
                    ordinary. It represents exploration, elevation, and transformation. <strong
                        class="text-white">“Vanta”</strong> means “one who possesses” or “one who is endowed with.”
                </p>
                <p class="text-gray-400 text-[16px] leading-[1.8] mb-4">
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
                class="bg-[#0f0f12] border border-white/5 rounded-3xl p-8 sm:p-12 shadow-2xl flex flex-col hover:-translate-y-2 transition-transform duration-500 group">
                <h3 class="text-3xl font-bold text-white mb-6">Scope</h3>
                <p class="text-gray-400 text-[15px] leading-relaxed mb-4">
                    Turivanta Alliance builds a strong and connected network of tourism businesses, travel agencies,
                    hospitality providers, tour operators, and destination brands. It serves as a trusted endorsement
                    platform for the tourism industry - The Global Seal. It creates a recognizable mark that signals
                    authenticity and reliability.
                </p>
                <p class="text-gray-400 text-[15px] leading-relaxed mb-4 border-t border-white/5 pt-4">
                    Businesses associated with Turivanta Alliance gain a strong and competitive identity. They stand out in
                    the crowded tourism market. Customers feel confident when they see the Turivanta symbol. They associate
                    it with trusted tourism services, professional travel agencies, and reliable hospitality businesses.
                </p>
                <p class="text-gray-400 text-[15px] leading-relaxed mt-auto border-t border-white/5 pt-4">
                    This builds immediate trust and long-term loyalty. Turivanta Alliance actively promotes unity within the
                    tourism sector. It connects different segments of the industry.
                </p>
            </div>

            <!-- Mission -->
            <div
                class="bg-[#0f0f12] border border-white/5 rounded-3xl p-8 sm:p-12 shadow-2xl flex flex-col hover:-translate-y-2 transition-transform duration-500 group">
                <h3 class="text-3xl font-bold text-white mb-6">Mission</h3>
                <p class="text-gray-400 text-[15px] leading-relaxed mb-4">
                    Our mission is clear and focused. We aim to make Turivanta Alliance a universal identity in tourism. We
                    aim to ensure that whenever someone sees the Turivanta symbol, they instantly recognize a trusted
                    tourism business, travel service, or hospitality provider.
                </p>
                <p class="text-gray-400 text-[15px] leading-relaxed mt-auto border-t border-white/5 pt-4">
                    We strive to build a future where the Turivanta mark becomes a global standard for tourism excellence,
                    travel services, and hospitality trust. We work to create clarity for customers and growth for
                    businesses.
                </p>
            </div>
        </section>

        <!-- Strong Highlight Block -->
        <section
            class="max-w-4xl mx-auto text-center bg-gradient-to-r from-rose-900/20 via-[#ff014f]/10 to-transparent border border-[#ff014f]/20 rounded-3xl p-10 sm:p-16 mb-32 backdrop-blur-sm">
            <h3 class="text-[28px] sm:text-[34px] font-bold text-white leading-tight">
                With Turivanta Alliance, tourism gains a face. It gains a symbol. It gains a future.
            </h3>
            <p class="text-lg text-gray-300 mt-6 max-w-2xl mx-auto">
                Turivanta Alliance connects businesses, builds trust, and drives the next era of tourism, travel services,
                hospitality innovation, and sustainable tourism growth.
            </p>
        </section>

        <!-- Contact Section -->
        <section id="contact"
            class="max-w-6xl mx-auto mb-10 bg-[#0f0f12] border border-white/5 rounded-3xl p-10 flex justify-between">
            <div>
                <h5 class="text-[#ff014f] font-bold text-[13px] uppercase mb-4">Get In Touch</h5>
                <h2 class="text-4xl font-extrabold text-white mb-6">Contact Us</h2>
                <div class="mb-4">
                    <h4 class="text-white font-bold">Office Address</h4>
                    <p class="text-gray-400">Ward No. 32, Lower Pouni Chack, Jammu, J&K, India - 180002</p>
                </div>
                <div>
                    <h4 class="text-white font-bold">Email</h4>
                    <p class="text-gray-400">info@turivanta.com</p>
                </div>
            </div>
            <div class="hidden md:block w-4/12">
                <img src="{{ asset('assets/img/hero_img.jpg') }}"
                    class="w-full aspect-[4/3] object-cover rounded-2xl grayscale" />
            </div>
        </section>
    </main>
@endsection
