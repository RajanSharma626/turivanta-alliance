@extends('layouts.app')

@section('title', 'Membership Plans & Pricing | Turivanta Tourism Network')
@section('meta_description', 'Explore Turivanta membership plans for students and tourism professionals. Join our global network to gain verified status and grow your business credibility.')
@section('meta_keywords', 'membership plans, tourism certification pricing, join turivanta, travel business membership')

@section('content')
<main class="min-h-screen pt-32 pb-20 px-6 sm:px-12 bg-background relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px] -z-10 translate-x-1/4 -translate-y-1/4"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600/5 rounded-full blur-[120px] -z-10 -translate-x-1/4 translate-y-1/4"></div>

    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-20 animate-fadeInUp">
            <h2 class="text-primary font-black uppercase tracking-[0.3em] text-xs mb-4">Membership Plans</h2>
            <h1 class="text-4xl sm:text-6xl font-black text-foreground tracking-tight mb-6">
                Simple, <span class="gradient-text">Transparent</span> Membership
            </h1>
            <p class="text-muted-foreground text-lg font-medium max-w-2xl mx-auto">
                Join the global network of tourism professionals and businesses. Choose the plan that best fits your role in the industry.
            </p>
        </div>

        <!-- Membership Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Students Plan -->
            <div class="group relative bg-card border border-card-border rounded-[2.5rem] p-10 transition-all duration-500 hover:border-primary/30 hover:shadow-xl dark:hover:shadow-[0_20px_50px_rgba(3,18,115,0.1)] hover:-translate-y-2">
                <div class="absolute top-10 right-10 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-20 h-20 text-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                    </svg>
                </div>
                
                <h3 class="text-2xl font-bold text-foreground mb-2">Students</h3>
                <p class="text-muted-foreground text-sm mb-8 font-medium">For aspiring tourism professionals.</p>
                
                <div class="flex items-baseline gap-2 mb-10">
                    <span class="text-4xl font-black text-foreground">INR 300</span>
                    <span class="text-muted-foreground font-bold uppercase tracking-widest text-xs">/ Per Annum</span>
                </div>

                <div class="space-y-4 mb-12">
                    <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-6">What's Included</p>
                    <div class="flex items-start gap-4 text-muted-foreground group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_#0b21a8]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-foreground leading-relaxed">Career Development</span>
                    </div>
                    <div class="flex items-start gap-4 text-muted-foreground group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_#0b21a8]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-foreground leading-relaxed">Certification & Recognition</span>
                    </div>
                    <div class="flex items-start gap-4 text-muted-foreground group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_#0b21a8]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-foreground leading-relaxed">Networking & Industry Connections</span>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="block w-full py-4 text-center bg-muted border border-card-border text-foreground font-bold rounded-2xl transition-all hover:bg-primary hover:border-primary hover:text-white hover:shadow-[0_0_30px_rgba(3,18,115,0.3)]">
                    Get Started
                </a>
            </div>

            <!-- Professional/Business Plan -->
            <div class="group relative bg-card border border-primary/20 rounded-[2.5rem] p-10 transition-all duration-500 hover:border-primary/40 hover:shadow-xl dark:hover:shadow-[0_20px_50px_rgba(3,18,115,0.15)] hover:-translate-y-2">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1.5 bg-primary text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full shadow-[0_0_20px_rgba(3,18,115,0.4)]">
                    Most Popular
                </div>

                <div class="absolute top-10 right-10 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-20 h-20 text-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                
                <h3 class="text-2xl font-bold text-foreground mb-2">Business & Professionals</h3>
                <p class="text-muted-foreground text-sm mb-8 font-medium">For entities and service professionals.</p>
                
                <div class="flex items-baseline gap-2 mb-10">
                    <span class="text-4xl font-black text-foreground">INR 500</span>
                    <span class="text-muted-foreground font-bold uppercase tracking-widest text-xs">/ Per Annum</span>
                </div>

                <div class="space-y-4 mb-12">
                    <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-6">Premium Benefits</p>
                    <div class="flex items-start gap-4 text-muted-foreground group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_#0b21a8]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-foreground leading-relaxed">Certification & Trust Seal</span>
                    </div>
                    <div class="flex items-start gap-4 text-muted-foreground group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_#0b21a8]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-foreground leading-relaxed">Strategic Networking & Partnerships</span>
                    </div>
                    <div class="flex items-start gap-4 text-muted-foreground group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_#0b21a8]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-foreground leading-relaxed">Global Tourism Identity Number (GTIN)</span>
                    </div>
                    <div class="flex items-start gap-4 text-muted-foreground group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_#0b21a8]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-foreground leading-relaxed">Market Insights & Intelligence</span>
                    </div>
                    <div class="flex items-start gap-4 text-muted-foreground group/item">
                        <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_#0b21a8]"></div>
                        <span class="text-sm font-medium transition-colors group-hover/item:text-foreground leading-relaxed">Digital Business Profile</span>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="block w-full py-4 text-center bg-primary text-white font-bold rounded-2xl transition-all hover:bg-blue-800 hover:shadow-[0_0_40px_rgba(3,18,115,0.4)] hover:-translate-y-1">
                    Get Started
                </a>
            </div>
        </div>


        <!-- FAQ Note -->
        <div class="mt-20 text-center animate-fadeIn">
            <p class="text-muted-foreground text-sm">
                Have questions about our plans? <a href="{{ route('contact') }}" class="text-foreground hover:text-primary underline-offset-4 transition-all">Contact our support team</a>
            </p>
        </div>
    </div>
</main>
@endsection
