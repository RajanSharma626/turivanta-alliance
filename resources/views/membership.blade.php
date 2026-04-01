@extends('layouts.app')

@section('title', 'Tourism Certification Network & Business Directory | Turivanta')
@section('meta_description', 'Turivanta is a tourism certification network and tourism business directory connecting verified travel businesses worldwide.')
@section('meta_keywords', 'tourism certification network and tourism business directory')

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
                Simple, <span class="gradient-text">Transparent</span> Membership
            </h1>
            <p class="text-gray-400 text-lg font-medium max-w-2xl mx-auto">
                Join the global network of tourism professionals and businesses. Choose the plan that best fits your role in the industry.
            </p>
        </div>

        <!-- Membership Grid -->
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
                <p class="text-gray-500 text-sm mb-8 font-medium">For entities and service professionals.</p>
                
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

        <!-- Informational Sections -->
        <div class="mt-32 space-y-32">
            <!-- Section 1 & 2: Benefits & Why Choose -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start">
                <div class="space-y-8">
                    <div class="inline-block px-4 py-1.5 bg-[#ff014f]/10 rounded-full border border-[#ff014f]/20">
                        <span class="text-[#ff014f] text-[10px] font-black uppercase tracking-widest">Network Impact</span>
                    </div>
                    <h2 class="text-3xl font-black text-white uppercase italic tracking-tight">Benefits of Turivanta Tourism <br class="hidden sm:block"> Certification Network</h2>
                    <ul class="space-y-4 text-gray-400 font-medium">
                        <li class="flex items-start gap-4">
                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                            <span>Turivanta builds trust in the global travel industry.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                            <span>It connects verified businesses through a powerful system.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                            <span>We operate as a tourism certification network and a tourism business directory.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                            <span>We help travelers choose reliable services.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#ff014f] shadow-[0_0_10px_#ff014f]"></div>
                            <span>We help businesses grow with credibility.</span>
                        </li>
                    </ul>
                </div>

                <div class="glass-panel p-10 rounded-[3rem] border border-white/5 relative overflow-hidden group">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#ff014f]/5 rounded-full blur-[100px] group-hover:bg-[#ff014f]/10 transition-colors"></div>
                    <h3 class="text-2xl font-black text-white uppercase italic tracking-tight mb-8">Why Choose Turivanta</h3>
                    <ul class="space-y-4 text-gray-400 font-medium">
                        <li>Turivanta gives your business a strong identity.</li>
                        <li>It places you inside a trusted ecosystem.</li>
                        <li>You gain visibility in a global tourism business directory.</li>
                        <li>You earn recognition through a structured tourism certification network.</li>
                        <li>We focus on trust, quality, and transparency.</li>
                        <li>We support travel, hospitality, and destination services.</li>
                    </ul>
                </div>
            </div>

            <!-- Section 3 & 4: Process & Verification -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="order-2 md:order-1 relative">
                    <div class="absolute inset-0 bg-[#ff014f]/10 blur-[120px] rounded-full"></div>
                    <div class="relative bg-[#0a0a0f] border border-white/5 rounded-[40px] p-10 space-y-8">
                        <h3 class="text-2xl font-black text-white uppercase italic tracking-tight">Our Verification Process</h3>
                        <p class="text-gray-400 text-sm font-medium">We verify every business carefully. We check identity, documents, and service claims. We validate business operations and presence. We ensure accuracy of information.</p>
                        
                        <div class="space-y-4">
                            <p class="text-[10px] font-black text-[#ff014f] uppercase tracking-widest">Multi-step Model:</p>
                            <div class="flex flex-col gap-3">
                                <div class="flex items-center gap-4 bg-white/5 p-4 rounded-2xl border border-white/5">
                                    <span class="w-8 h-8 rounded-full bg-[#ff014f] flex items-center justify-center text-white font-black text-xs">01</span>
                                    <span class="text-white text-sm font-bold uppercase tracking-wider">Business identity check</span>
                                </div>
                                <div class="flex items-center gap-4 bg-white/5 p-4 rounded-2xl border border-white/5">
                                    <span class="w-8 h-8 rounded-full bg-[#ff014f] flex items-center justify-center text-white font-black text-xs">02</span>
                                    <span class="text-white text-sm font-bold uppercase tracking-wider">Document validation</span>
                                </div>
                                <div class="flex items-center gap-4 bg-white/5 p-4 rounded-2xl border border-white/5">
                                    <span class="w-8 h-8 rounded-full bg-[#ff014f] flex items-center justify-center text-white font-black text-xs">03</span>
                                    <span class="text-white text-sm font-bold uppercase tracking-wider">Service credibility review</span>
                                </div>
                                <div class="flex items-center gap-4 bg-white/5 p-4 rounded-2xl border border-white/5">
                                    <span class="w-8 h-8 rounded-full bg-[#ff014f] flex items-center justify-center text-white font-black text-xs">04</span>
                                    <span class="text-white text-sm font-bold uppercase tracking-wider">Profile approval</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-500 text-xs italic">This process builds a reliable tourism business directory. It ensures only genuine businesses are listed.</p>
                    </div>
                </div>

                <div class="order-1 md:order-2 space-y-8">
                    <h3 class="text-3xl font-black text-white uppercase italic tracking-tight">How Tourism <br class="hidden sm:block"> Certification Works</h3>
                    <div class="space-y-6">
                        <div class="flex items-start gap-6 group">
                            <div class="w-1.5 h-10 bg-[#ff014f]/20 rounded-full group-hover:bg-[#ff014f] transition-all"></div>
                            <div class="space-y-2">
                                <p class="text-white font-bold uppercase tracking-widest text-xs">Step-by-Step Flow</p>
                                <p class="text-gray-400 text-sm leading-relaxed">
                                    We follow a simple and clear process. You apply for certification. You submit your business details. We review your information step by step. Our system evaluates authenticity and service quality. We ensure your business meets industry standards. We then approve and certify your profile. Once approved, you receive a certification status. Your business becomes part of our tourism certification network. You gain trust and global visibility.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 5 & 6: Detailed Benefits -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white/5 border border-white/5 rounded-[3rem] p-12 hover:bg-white/[0.07] transition-all group">
                    <h3 class="text-2xl font-black text-white uppercase italic tracking-tight mb-8">Key Benefits for Businesses</h3>
                    <ul class="grid grid-cols-1 gap-5 text-gray-400 font-medium">
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>You build trust with global travelers.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>You improve your brand reputation.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>You stand out from unverified competitors.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>You get listed in a trusted tourism business directory.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>You join a recognized tourism certification network.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>You increase visibility and reach.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>You attract more customers with verified status.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>You gain long-term credibility in the market.</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-[#ff014f]/5 border border-[#ff014f]/10 rounded-[3rem] p-12 flex flex-col justify-center">
                    <h3 class="text-2xl font-black text-white uppercase italic tracking-tight mb-8">Benefits for Travelers</h3>
                    <ul class="space-y-6 text-gray-300 font-bold uppercase tracking-wider text-xs">
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-[#ff014f]"></span>
                            <span>Travelers find verified service providers.</span>
                        </li>
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-[#ff014f]"></span>
                            <span>They make safe and informed decisions.</span>
                        </li>
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-[#ff014f]"></span>
                            <span>They avoid unreliable businesses.</span>
                        </li>
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-[#ff014f]"></span>
                            <span>They explore a trusted tourism business directory.</span>
                        </li>
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-[#ff014f]"></span>
                            <span>They rely on a strong tourism certification network.</span>
                        </li>
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-[#ff014f]"></span>
                            <span>They experience better travel services.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Section 7 & 8: Final CTA -->
            <div class="py-24 border-t border-white/5 text-center max-w-4xl mx-auto space-y-12">
                <div class="space-y-6">
                    <h3 class="text-4xl font-black text-white uppercase italic tracking-tighter">Build Trust with Turivanta</h3>
                    <p class="text-gray-400 text-lg font-medium">Trust drives the tourism industry. Turivanta strengthens that trust. We connect verified businesses worldwide. Join our tourism certification network today. Grow your presence in our tourism business directory. Build credibility. Gain visibility. Expand globally.</p>
                </div>

                <div class="glass-panel p-16 rounded-[4rem] border border-white/5 space-y-8 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-tr from-[#ff014f]/10 to-transparent"></div>
                    <img src="{{ asset('assets/img/Logo-of-Turivanta-Alliance.png') }}" class="h-16 mx-auto mb-8 relative z-10 opacity-50 group-hover:opacity-100 transition-opacity">
                    <h4 class="text-2xl font-black text-white uppercase italic tracking-tight relative z-10">Why Join Turivanta</h4>
                    <p class="text-gray-400 font-medium relative z-10">We verify your presence. We build your credibility. We connect you globally. Turivanta is more than a platform. It is a global tourism identity system. It is a growing hospitality business network.</p>
                    <div class="pt-8 border-t border-white/5 relative z-10">
                        <p class="text-white font-black text-3xl uppercase tracking-tighter italic">Turivanta = <span class="gradient-text">Tourism Identity</span></p>
                    </div>
                </div>
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
