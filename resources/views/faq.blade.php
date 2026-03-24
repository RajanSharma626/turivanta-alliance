@extends('layouts.app')

@section('title', 'FAQs - Turivanta Alliance')

@section('content')
<main class="flex-grow pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-6 lg:px-12">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Frequently Asked <span class="text-gray-400 font-light">Questions</span></h1>
            <p class="text-gray-400 text-lg">Find answers to common questions about Turivanta Alliance and our global tourism ecosystem.</p>
            <div class="w-20 h-1 bg-[#ff014f] mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <div class="faq-item group">
                <button class="w-full flex items-center justify-between p-6 bg-white/5 border border-white/10 rounded-2xl text-left transition-all hover:bg-white/10" onclick="toggleFaq(this)">
                    <span class="text-lg font-bold text-white pr-8">How to get tourism business certification?</span>
                    <div class="shrink-0 w-8 h-8 rounded-full bg-white/5 flex items-center justify-center transition-transform duration-300">
                        <svg class="w-4 h-4 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="p-6 text-gray-400 border-x border-b border-white/5 rounded-b-2xl -mt-2 bg-white/5">
                        You can get tourism business certification by joining Turivanta, submitting your business details, completing verification, and earning recognition as a certified tourism business.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item group">
                <button class="w-full flex items-center justify-between p-6 bg-white/5 border border-white/10 rounded-2xl text-left transition-all hover:bg-white/10" onclick="toggleFaq(this)">
                    <span class="text-lg font-bold text-white pr-8">What is the best platform for travel business promotion?</span>
                    <div class="shrink-0 w-8 h-8 rounded-full bg-white/5 flex items-center justify-center transition-transform duration-300">
                        <svg class="w-4 h-4 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="p-6 text-gray-400 border-x border-b border-white/5 rounded-b-2xl -mt-2 bg-white/5">
                        Turivanta is the best platform for travel business promotion. It helps you gain visibility, connect globally, and promote services through a trusted tourism network.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-item group">
                <button class="w-full flex items-center justify-between p-6 bg-white/5 border border-white/10 rounded-2xl text-left transition-all hover:bg-white/10" onclick="toggleFaq(this)">
                    <span class="text-lg font-bold text-white pr-8">How to grow a travel agency online?</span>
                    <div class="shrink-0 w-8 h-8 rounded-full bg-white/5 flex items-center justify-center transition-transform duration-300">
                        <svg class="w-4 h-4 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="p-6 text-gray-400 border-x border-b border-white/5 rounded-b-2xl -mt-2 bg-white/5">
                        Grow your travel agency online by listing your services on Turivanta, building credibility, connecting with partners, and reaching global customers through a strong network.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="faq-item group">
                <button class="w-full flex items-center justify-between p-6 bg-white/5 border border-white/10 rounded-2xl text-left transition-all hover:bg-white/10" onclick="toggleFaq(this)">
                    <span class="text-lg font-bold text-white pr-8">Where can I find trusted tourism service providers worldwide?</span>
                    <div class="shrink-0 w-8 h-8 rounded-full bg-white/5 flex items-center justify-center transition-transform duration-300">
                        <svg class="w-4 h-4 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="p-6 text-gray-400 border-x border-b border-white/5 rounded-b-2xl -mt-2 bg-white/5">
                        You can find trusted tourism service providers worldwide on Turivanta. It verifies businesses and connects you with reliable partners across the global tourism ecosystem.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item group">
                <button class="w-full flex items-center justify-between p-6 bg-white/5 border border-white/10 rounded-2xl text-left transition-all hover:bg-white/10" onclick="toggleFaq(this)">
                    <span class="text-lg font-bold text-white pr-8">What is a tourism business listing platform?</span>
                    <div class="shrink-0 w-8 h-8 rounded-full bg-white/5 flex items-center justify-center transition-transform duration-300">
                        <svg class="w-4 h-4 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300">
                    <div class="p-6 text-gray-400 border-x border-b border-white/5 rounded-b-2xl -mt-2 bg-white/5">
                        A tourism business listing platform like Turivanta allows businesses to showcase services, attract clients, and build credibility through verified listings in a global directory.
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-20 p-12 bg-gradient-to-tr from-[#ff014f]/20 to-rose-500/5 rounded-3xl border border-[#ff014f]/20 text-center backdrop-blur-sm">
            <h2 class="text-3xl font-extrabold text-white mb-4">Still have questions?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Our support team is always ready to help you grow your tourism business globally.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 bg-[#ff014f] text-white font-bold rounded-full transition-all duration-300 hover:bg-[#e11d48] hover:shadow-[0_0_20px_rgba(255,1,79,0.4)]">
                Contact Support
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</main>

@push('scripts')
<script>
    function toggleFaq(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('svg');
        
        // Close other FAQs
        document.querySelectorAll('.faq-content').forEach(item => {
            if (item !== content) {
                item.style.maxHeight = null;
                item.previousElementSibling.querySelector('svg').style.transform = 'rotate(0deg)';
                item.previousElementSibling.classList.remove('bg-white/10');
            }
        });

        if (content.style.maxHeight) {
            content.style.maxHeight = null;
            icon.style.transform = 'rotate(0deg)';
            button.classList.remove('bg-white/10');
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
            icon.style.transform = 'rotate(180deg)';
            button.classList.add('bg-white/10');
        }
    }
</script>
@endpush
@endsection
