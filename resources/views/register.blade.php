@extends('layouts.app')

@section('title', 'Register - Turivanta Alliance')

@section('content')
<main class="flex-grow flex items-center justify-center w-full pt-32 pb-20 z-10 relative mt-10">
        <div class="max-w-4xl w-full flex flex-col items-center relative z-10 px-6">
            <div class="text-center mb-12">
                <h5 class="text-[#ff014f] font-bold text-[13px] tracking-[0.2em] uppercase mb-4">Join The Alliance</h5>
                <h2 class="text-[36px] sm:text-[42px] font-extrabold leading-[1.2] tracking-tight text-white mb-4">
                    Register Your Business
                </h2>
                <p class="text-gray-400 text-[15px] max-w-xl mx-auto">
                    Take the first step in uniting your tourism, travel, or hospitality brand under the universal mark.
                </p>
            </div>

            <!-- Glassmorphic Form Card -->
            <div class="w-full bg-[#0a0a0f]/80 backdrop-blur-2xl border border-white/10 rounded-3xl p-8 sm:p-12 shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                <form action="#" method="POST" class="w-full flex flex-col gap-6">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">First Name</label>
                            <input type="text" placeholder="John" class="w-full bg-[#131215] border border-white/10 rounded-xl px-5 py-3.5 text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                        </div>
                        
                        <!-- Last Name -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Last Name</label>
                            <input type="text" placeholder="Doe" class="w-full bg-[#131215] border border-white/10 rounded-xl px-5 py-3.5 text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Gender -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Gender</label>
                            <div class="relative">
                                <select class="w-full bg-[#131215] border border-white/10 rounded-xl px-5 py-3.5 text-white appearance-none focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                                    <option value="" disabled selected class="text-gray-600">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                <svg class="w-5 h-5 absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>

                        <!-- D.O.B -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Date of Birth</label>
                            <input type="date" class="w-full bg-[#131215] border border-white/10 rounded-xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all [color-scheme:dark]">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Contact No. -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Contact No.</label>
                            <input type="tel" placeholder="+1 (555) 000-0000" class="w-full bg-[#131215] border border-white/10 rounded-xl px-5 py-3.5 text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                        </div>

                        <!-- Email -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Email Address</label>
                            <input type="email" placeholder="john@example.com" class="w-full bg-[#131215] border border-white/10 rounded-xl px-5 py-3.5 text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                        </div>
                    </div>

                    <!-- Business Type -->
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-gray-300 ml-1">Business Type</label>
                        <div class="relative">
                            <select class="w-full bg-[#131215] border border-white/10 rounded-xl px-5 py-3.5 text-white appearance-none focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all">
                                <option value="" disabled selected class="text-gray-600">Select Business Type</option>
                                <option value="Accommodation">Accommodation</option>
                                <option value="Transportation">Transportation</option>
                                <option value="Travel Agency">Travel Agency</option>
                                <option value="Airline">Airline</option>
                            </select>
                            <svg class="w-5 h-5 absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6 mt-4 border-t border-white/5 text-center sm:text-right">
                        <button type="submit" class="inline-flex items-center justify-center gap-2 px-10 py-[14px] bg-[#ff014f] text-white font-bold rounded-full transition-all duration-300 hover:bg-[#e11d48] w-full sm:w-auto hover:shadow-[0_0_20px_rgba(255,1,79,0.4)] hover:-translate-y-1">
                            <span class="text-[15px]">Complete Registration</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection
