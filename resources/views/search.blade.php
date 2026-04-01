@extends('layouts.app')

@section('title', $query ? 'Turivanta Tourism Identity Platform for Travel & Hospitality Network' : 'Certified Tourism Businesses | Global Tourism Business Network | Turivanta')
@section('meta_description', $query ? 'Turivanta is a tourism identity platform connecting a global travel and hospitality network of trusted, verified service providers.' : 'Explore certified tourism businesses in a global tourism business network connecting trusted travel and hospitality providers worldwide.')
@section('meta_keywords', $query ? 'tourism identity platform, travel and hospitality network' : 'certified tourism businesses and tourism business network')

@section('content')
    <main class="min-h-screen pt-32 pb-20 px-6 sm:px-12 bg-[#050505] relative overflow-hidden">
        <!-- Background Accents -->
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#ff014f]/5 rounded-full blur-[120px] -z-10 translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-rose-600/5 rounded-full blur-[120px] -z-10 -translate-x-1/2 translate-y-1/2">
        </div>

        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-12 animate-fadeInUp">
                <h1 class="text-4xl sm:text-5xl font-black text-white tracking-tight mb-4">
                    Search <span class="text-[#ff014f]">Results</span>
                </h1>
                <p class="text-gray-400 text-lg font-medium">
                    @if ($query)
                        Showing results for "<span class="text-white font-bold">{{ $query }}</span>"
                    @else
                        Discover company of the Turivanta Alliance.
                    @endif
                </p>
            </div>

            @if ($results->isEmpty())
                <div class="bg-[#0a0a0f] border border-white/5 rounded-[2.5rem] p-10 text-center animate-fadeIn">
                    <div
                        class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-8 border border-white/10">
                        <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">No matching identities found</h3>
                    <p class="text-gray-500 max-w-md mx-auto">We couldn't find any company matching your search criteria.
                        Please double-check the ID or company name.</p>
                    <div class="mt-10">
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center gap-2 px-8 py-4 bg-white/5 border border-white/10 text-white font-bold rounded-2xl hover:bg-white/10 transition-all">
                            Return to Homepage
                        </a>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @php
                        $viewer = auth()->user();
                        $viewerHasSubscription = $viewer && $viewer->currentSubscription ? true : false;
                    @endphp
                    @foreach ($results as $user)
                        @php $app = $user->application; @endphp
                        <div
                            class="group bg-[#0a0a0f] border border-white/5 rounded-[2rem] p-8 hover:border-[#ff014f]/30 transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                            <!-- Card Glow -->
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-[#ff014f]/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>

                            <!-- Membership ID Badge -->
                            <div class="relative z-10 flex justify-between items-start mb-8">
                                <div class="px-3 py-1 bg-[#ff014f]/10 border border-[#ff014f]/20 rounded-lg">
                                    <span class="text-[10px] font-black text-[#ff014f] uppercase tracking-widest">GTIN:
                                        {{ $user->membership_id }}</span>
                                </div>
                                <div
                                    class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#ff014f] to-rose-400 flex items-center justify-center text-white font-black text-lg uppercase shadow-lg group-hover:scale-110 transition-transform">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="relative z-10">
                                <h3 class="text-xl font-extrabold text-white mb-1 group-hover:text-[#ff014f] transition-colors line-clamp-1">
                                    {{ $app->trade_name ?? ($app->legal_name ?? $user->name) }}
                                </h3>
                                <p class="text-[#ff014f] text-[11px] font-black uppercase tracking-widest mb-4">
                                    {{ $user->business_type }}
                                </p>

                                <hr class="border-white/5 mb-6">

                                <div class="space-y-4">
                                    @if ($viewerHasSubscription)
                                        <!-- Full Info -->
                                        <div class="flex flex-col gap-1">
                                            <span class="text-[10px] text-gray-500 font-black uppercase tracking-widest leading-none">User / Owner Name</span>
                                            <span class="text-gray-300 font-bold text-xs">{{ $user->name }}</span>
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <span class="text-[10px] text-gray-500 font-black uppercase tracking-widest leading-none">Contact No.</span>
                                            <span class="text-gray-300 font-bold text-xs">{{ $user->contact_no ?? 'Private' }}</span>
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <span class="text-[10px] text-gray-500 font-black uppercase tracking-widest leading-none">Email ID</span>
                                            <span class="text-gray-300 font-bold text-xs lowercase">{{ $user->email }}</span>
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <span class="text-[10px] text-gray-500 font-black uppercase tracking-widest leading-none">Address</span>
                                            <span class="text-gray-300 font-bold text-xs italic line-clamp-2">
                                                {{ $app->billing_street }}, {{ $app->billing_city }}, {{ $app->billing_country }}
                                            </span>
                                        </div>
                                    @else
                                        <!-- Limited Info -->
                                        <div class="flex flex-col gap-1">
                                            <span class="text-[10px] text-gray-500 font-black uppercase tracking-widest leading-none">Location</span>
                                            <span class="text-gray-400 font-medium text-xs">
                                                {{ $app->billing_country ?? ($user->country_concerned ?? 'Universal') }}
                                            </span>
                                        </div>
                                        
                                        <!-- Call to Action -->
                                        <div class="mt-6 pt-6 border-t border-white/5">
                                            <div class="p-4 bg-[#ff014f]/5 border border-[#ff014f]/10 rounded-2xl text-center group/sub">
                                                <p class="text-[9px] text-gray-400 font-black uppercase tracking-widest mb-3">Subscription Required</p>
                                                <a href="{{ route('membership') }}" class="inline-block text-[10px] text-white font-black uppercase tracking-widest hover:text-[#ff014f] transition-colors">
                                                    Upgrade to view contact
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Decorative Element -->
                            <div
                                class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#ff014f]/5 rounded-full blur-2xl group-hover:bg-[#ff014f]/20 transition-all">
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-16">
                    {{ $results->links('vendor.pagination.tailwind-custom') }}
                </div>

                @if (!$viewerHasSubscription)
                    <div class="mt-20 p-10 bg-[#0a0a0f] border border-[#ff014f]/20 rounded-[2.5rem] relative overflow-hidden group animate-fadeInUp" style="animation-delay: 0.3s">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-[#ff014f]/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                            <div class="text-center md:text-left">
                                <h3 class="text-2xl font-black text-white mb-2 italic uppercase tracking-tight">Unlock Professional <span class="text-[#ff014f]">Access</span></h3>
                                <p class="text-gray-400 text-sm max-w-xl">You are currently viewing a limited data preview. Subscribe to the Turivanta Alliance to unlock full contact details, ownership information, and verified addresses of all registered members.</p>
                            </div>
                            <a href="{{ route('membership') }}" class="px-10 py-4 bg-[#ff014f] text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-[0_10px_30px_rgba(255,1,79,0.3)] hover:-translate-y-1 transition-all whitespace-nowrap">
                                View Membership Plans
                            </a>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </main>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-fadeIn {
            animation: fadeInUp 0.5s ease forwards;
        }
    </style>
@endsection
