@extends('layouts.app')

@section('title', 'Tourism Certification Network & Business Directory | Turivanta')
@section('meta_description', 'Turivanta is a tourism certification network and tourism business directory connecting verified travel businesses worldwide.')
@section('meta_keywords', 'tourism certification network and tourism business directory')

@section('content')
<main class="min-h-screen pt-32 pb-20 px-6 sm:px-12 bg-background relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px] -z-10 translate-x-1/4 -translate-y-1/4"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600/5 rounded-full blur-[120px] -z-10 -translate-x-1/4 translate-y-1/4"></div>

    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-20 animate-fadeInUp">
            <h2 class="text-primary font-black uppercase tracking-[0.3em] text-xs mb-4">Network Benefits</h2>
            <h1 class="text-4xl sm:text-6xl font-black text-foreground tracking-tight mb-6 px-1">
                Why Choose <span class="gradient-text pr-2">Turivanta</span>?
            </h1>
            <p class="text-muted-foreground text-lg font-medium max-w-2xl mx-auto">
                Discover how our certification network adds value to your business and provides trust to global travelers.
            </p>
        </div>

        <!-- Informational Sections (Moved from Membership) -->
        <div class="space-y-32">
            <!-- Section 1 & 2: Benefits & Why Choose -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start">
                <div class="space-y-8">
                    <div class="inline-block px-4 py-1.5 bg-primary/10 rounded-full border border-primary/20">
                        <span class="text-primary text-[10px] font-black uppercase tracking-widest">Network Impact</span>
                    </div>
                    <h2 class="text-3xl font-black text-foreground uppercase italic tracking-tight px-1">Benefits of Turivanta Tourism <br class="hidden sm:block"> Certification Network</h2>
                    <ul class="space-y-4 text-muted-foreground font-medium">
                        <li class="flex items-start gap-4">
                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(3,18,115,0.4)]"></div>
                            <span>Turivanta builds trust in the global travel industry.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(3,18,115,0.4)]"></div>
                            <span>It connects verified businesses through a powerful system.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(3,18,115,0.4)]"></div>
                            <span>We operate as a tourism certification network and a tourism business directory.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(3,18,115,0.4)]"></div>
                            <span>We help travelers choose reliable services.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(3,18,115,0.4)]"></div>
                            <span>We help businesses grow with credibility.</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-card p-10 rounded-[3rem] border border-card-border relative overflow-hidden group">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary/5 rounded-full blur-[100px] group-hover:bg-primary/10 transition-colors"></div>
                    <h3 class="text-2xl font-black text-foreground uppercase italic tracking-tight mb-8 px-1">Why Choose Turivanta</h3>
                    <ul class="space-y-4 text-muted-foreground font-medium">
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
                    <div class="absolute inset-0 bg-primary/10 blur-[120px] rounded-full"></div>
                    <div class="relative bg-card border border-card-border rounded-[40px] p-10 space-y-8">
                        <h3 class="text-2xl font-black text-foreground uppercase italic tracking-tight px-1">Our Verification Process</h3>
                        <p class="text-muted-foreground text-sm font-medium">We verify every business carefully. We check identity, documents, and service claims. We validate business operations and presence. We ensure accuracy of information.</p>
                        
                        <div class="space-y-4">
                            <p class="text-[10px] font-black text-primary uppercase tracking-widest">Multi-step Model:</p>
                            <div class="flex flex-col gap-3">
                                <div class="flex items-center gap-4 bg-muted p-4 rounded-2xl border border-card-border">
                                    <span class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-black text-xs">01</span>
                                    <span class="text-foreground text-sm font-bold uppercase tracking-wider">Business identity check</span>
                                </div>
                                <div class="flex items-center gap-4 bg-muted p-4 rounded-2xl border border-card-border">
                                    <span class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-black text-xs">02</span>
                                    <span class="text-foreground text-sm font-bold uppercase tracking-wider">Document validation</span>
                                </div>
                                <div class="flex items-center gap-4 bg-muted p-4 rounded-2xl border border-card-border">
                                    <span class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-black text-xs">03</span>
                                    <span class="text-foreground text-sm font-bold uppercase tracking-wider">Service credibility review</span>
                                </div>
                                <div class="flex items-center gap-4 bg-muted p-4 rounded-2xl border border-card-border">
                                    <span class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-black text-xs">04</span>
                                    <span class="text-foreground text-sm font-bold uppercase tracking-wider">Profile approval</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted-foreground/60 text-xs italic">This process builds a reliable tourism business directory. It ensures only genuine businesses are listed.</p>
                    </div>
                </div>

                <div class="order-1 md:order-2 space-y-8">
                    <h3 class="text-3xl font-black text-foreground uppercase italic tracking-tight px-1">How Tourism <br class="hidden sm:block"> Certification Works</h3>
                    <div class="space-y-6">
                        <div class="flex items-start gap-6 group">
                            <div class="w-1.5 h-10 bg-primary/20 rounded-full group-hover:bg-primary transition-all"></div>
                            <div class="space-y-2">
                                <p class="text-foreground font-bold uppercase tracking-widest text-xs">Step-by-Step Flow</p>
                                <p class="text-muted-foreground text-sm leading-relaxed">
                                    We follow a simple and clear process. You apply for certification. You submit your business details. We review your information step by step. Our system evaluates authenticity and service quality. We ensure your business meets industry standards. We then approve and certify your profile. Once approved, you receive a certification status. Your business becomes part of our tourism certification network. You gain trust and global visibility.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 5 & 6: Detailed Benefits -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-card border border-card-border rounded-[3rem] p-12 hover:bg-muted transition-all group">
                    <h3 class="text-2xl font-black text-foreground uppercase italic tracking-tight mb-8 px-1">Key Benefits for Businesses</h3>
                    <ul class="grid grid-cols-1 gap-5 text-muted-foreground font-medium">
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-primary opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="group-hover/item:text-foreground transition-colors">You build trust with global travelers.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="group-hover/item:text-foreground transition-colors">You improve your brand reputation.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="group-hover/item:text-foreground transition-colors">You stand out from unverified competitors.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="group-hover/item:text-foreground transition-colors">You get listed in a trusted tourism business directory.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="group-hover/item:text-foreground transition-colors">You join a recognized tourism certification network.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="group-hover/item:text-foreground transition-colors">You increase visibility and reach.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="group-hover/item:text-foreground transition-colors">You attract more customers with verified status.</span>
                        </li>
                        <li class="flex items-center gap-4 group/item">
                            <svg class="w-5 h-5 text-[#ff014f] opacity-50 group-hover/item:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="group-hover/item:text-foreground transition-colors">You gain long-term credibility in the market.</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-card border border-primary/10 rounded-[3rem] p-12 flex flex-col justify-center">
                    <h3 class="text-2xl font-black text-foreground uppercase italic tracking-tight mb-8">Benefits for Travelers</h3>
                    <ul class="space-y-6 text-muted-foreground font-bold uppercase tracking-wider text-xs">
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-primary"></span>
                            <span class="text-foreground/80">Travelers find verified service providers.</span>
                        </li>
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-primary"></span>
                            <span class="text-foreground/80">They make safe and informed decisions.</span>
                        </li>
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-primary"></span>
                            <span class="text-foreground/80">They avoid unreliable businesses.</span>
                        </li>
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-primary"></span>
                            <span class="text-foreground/80">They explore a trusted tourism business directory.</span>
                        </li>
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-primary"></span>
                            <span class="text-foreground/80">They rely on a strong tourism certification network.</span>
                        </li>
                        <li class="flex items-center gap-5">
                            <span class="w-2 h-2 rounded-full bg-primary"></span>
                            <span class="text-foreground/80">They experience better travel services.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Section 7 & 8: Final CTA -->
            <div class="py-24 border-t border-card-border text-center max-w-4xl mx-auto space-y-12">
                <div class="space-y-6 px-1">
                    <h3 class="text-4xl font-black text-foreground uppercase italic tracking-tight">Build Trust with Turivanta</h3>
                    <p class="text-muted-foreground text-lg font-medium">Trust drives the tourism industry. Turivanta strengthens that trust. We connect verified businesses worldwide. Join our tourism certification network today. Grow your presence in our tourism business directory. Build credibility. Gain visibility. Expand globally.</p>
                </div>

                <div class="bg-card p-16 rounded-[4rem] border border-card-border space-y-8 relative overflow-hidden group text-center">
                    {{-- <div class="absolute inset-0 bg-gradient-to-tr from-[#ff014f]/10 to-transparent"></div> --}}
                    <img src="{{ asset('assets/img/Logo-of-Turivanta-light.png') }}" class="h-16 mx-auto mb-8 relative z-10 opacity-50 group-hover:opacity-100 transition-opacity logo-light">
                    <img src="{{ asset('assets/img/Logo-of-Turivanta-Alliance.png') }}" class="h-16 mx-auto mb-8 relative z-10 opacity-50 group-hover:opacity-100 transition-opacity logo-dark">
                    <h4 class="text-2xl font-black text-foreground uppercase italic tracking-tight relative z-10 px-1">Why Join Turivanta</h4>
                    <p class="text-muted-foreground font-medium relative z-10 max-w-2xl mx-auto leading-relaxed">We verify your presence. We build your credibility. We connect you globally. Turivanta is more than a platform. It is a global tourism identity system. It is a growing hospitality business network.</p>
                    <div class="pt-8 border-t border-card-border relative z-10 flex justify-center">
                        <p class="text-foreground font-black text-3xl uppercase tracking-tight italic">Turivanta = <span class="gradient-text pr-2">Tourism Identity</span></p>
                    </div>
                </div>
            </div>
            
            <div class="text-center animate-fadeIn px-1">
                <h2 class="text-foreground text-3xl font-black mb-8 uppercase italic tracking-tight">Ready to join our network?</h2>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="{{ route('membership') }}" class="px-10 py-5 bg-primary text-white font-black uppercase tracking-widest text-sm rounded-2xl transition-all hover:bg-blue-800 hover:shadow-[0_0_40px_rgba(3,18,115,0.4)] hover:-translate-y-1">
                        View Membership Plans
                    </a>
                    <a href="{{ route('contact') }}" class="px-10 py-5 bg-muted border border-card-border text-foreground font-black uppercase tracking-widest text-sm rounded-2xl transition-all hover:bg-muted/80">
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
