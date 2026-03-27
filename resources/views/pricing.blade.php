@extends('layouts.app')

@section('title', 'Pricing - Turivanta Alliance')

@section('content')
<main class="min-h-screen pt-32 pb-20 px-6 sm:px-12 bg-[#050505] relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-[#ff014f]/5 rounded-full blur-[120px] -z-10 translate-x-1/4 -translate-y-1/4"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-rose-600/5 rounded-full blur-[120px] -z-10 -translate-x-1/4 translate-y-1/4"></div>

    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-20 animate-fadeInUp">
            <h2 class="text-[#ff014f] font-black uppercase tracking-[0.3em] text-xs mb-4">Membership Plans</h2>
            <h1 class="text-4xl sm:text-6xl font-black text-white tracking-tight mb-6">
                Simple, <span class="gradient-text">Transparent</span> Pricing
            </h1>
            <p class="text-gray-400 text-lg font-medium max-w-2xl mx-auto">
                Join the global network of tourism professionals and businesses. Choose the plan that best fits your role in the industry.
            </p>
        </div>

        <!-- Pricing Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Students Plan -->
            <div class="group relative bg-[#0a0a0f] border border-white/5 rounded-[2.5rem] p-10 transition-all duration-500 hover:border-[#ff014f]/30 hover:shadow-[0_20px_50px_rgba(255,1,79,0.1)] hover:-translate-y-2">
                <div class="absolute top-10 right-10 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                    </svg>
                </div>
                
                <h3 class="text-2xl font-bold text-white mb-2">Students</h3>
                <p class="text-gray-500 text-sm mb-8 font-medium">For aspiring tourism professionals.</p>
                
                <div class="flex items-baseline gap-2 mb-10">
                    <span class="text-4xl font-black text-white">INR 300</span>
                    <span class="text-gray-500 font-bold uppercase tracking-widest text-xs">/ Per Annum</span>
                </div>

                <div class="space-y-4 mb-12">
                    <p class="text-[10px] font-black text-[#ff014f] uppercase tracking-widest mb-6">What's Included</p>
                    <div class="flex items-start gap-4 text-gray-400 group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-white leading-relaxed">Career Development</span>
                    </div>
                    <div class="flex items-start gap-4 text-gray-400 group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-white leading-relaxed">Certification & Recognition</span>
                    </div>
                    <div class="flex items-start gap-4 text-gray-400 group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-white leading-relaxed">Networking & Industry Connections</span>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="block w-full py-4 text-center bg-white/5 border border-white/10 text-white font-bold rounded-2xl transition-all hover:bg-[#ff014f] hover:border-[#ff014f] hover:shadow-[0_0_30px_rgba(255,1,79,0.3)]">
                    Get Started
                </a>
            </div>

            <!-- Professional/Business Plan -->
            <div class="group relative bg-gradient-to-b from-[#ff014f]/10 to-transparent border border-[#ff014f]/20 rounded-[2.5rem] p-10 transition-all duration-500 hover:border-[#ff014f]/40 hover:shadow-[0_20px_50px_rgba(255,1,79,0.15)] hover:-translate-y-2">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1.5 bg-[#ff014f] text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full shadow-[0_0_20px_rgba(255,1,79,0.4)]">
                    Most Popular
                </div>

                <div class="absolute top-10 right-10 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                
                <h3 class="text-2xl font-bold text-white mb-2">Business & Professionals</h3>
                <p class="text-gray-500 text-sm mb-8 font-medium">For entities and scaling professionals.</p>
                
                <div class="flex items-baseline gap-2 mb-10">
                    <span class="text-4xl font-black text-white">INR 500</span>
                    <span class="text-gray-500 font-bold uppercase tracking-widest text-xs">/ Per Annum</span>
                </div>

                <div class="space-y-4 mb-12">
                    <p class="text-[10px] font-black text-[#ff014f] uppercase tracking-widest mb-6">Premium Benefits</p>
                    <div class="flex items-start gap-4 text-gray-400 group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-white leading-relaxed">Certification & Trust Seal</span>
                    </div>
                    <div class="flex items-start gap-4 text-gray-400 group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-white leading-relaxed">Strategic Networking & Partnerships</span>
                    </div>
                    <div class="flex items-start gap-4 text-gray-400 group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-white leading-relaxed">Global Tourism Identity Number (GTIN)</span>
                    </div>
                    <div class="flex items-start gap-4 text-gray-400 group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-white leading-relaxed">Market Insights & Intelligence</span>
                    </div>
                    <div class="flex items-start gap-4 text-gray-400 group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-white leading-relaxed">Digital Business Profile</span>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="block w-full py-4 text-center bg-[#ff014f] text-white font-bold rounded-2xl transition-all hover:bg-[#e11d48] hover:shadow-[0_0_40px_rgba(255,1,79,0.4)] hover:-translate-y-1">
                    Get Started
                </a>
            </div>
        </div>

        <!-- FAQ Note -->
        <div class="mt-20 text-center animate-fadeIn">
            <p class="text-gray-500 text-sm">
                Have questions about our plans? <a href="{{ route('contact') }}" class="text-white hover:text-[#ff014f] underline-offset-4 transition-all">Contact our support team</a>
            </p>
        </div>
    </div>
</main>
@endsection
