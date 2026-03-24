@extends('layouts.app')

@section('title', 'Contact Us - Turivanta Alliance')

@section('content')
<main class="flex-grow w-full relative z-10 pt-40 pb-20 px-6">
        
        <!-- Top 2 Info Cards -->
        <section class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 mb-20">
            <!-- Address Card -->
            <div class="bg-[#101014] rounded-[24px] p-12 flex flex-col items-center text-center transition-transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-[#ff014f]/10 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-[#ff014f]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                </div>
                <h3 class="text-white text-[22px] font-bold mb-4">Address</h3>
                <p class="text-gray-400 text-[15px] leading-relaxed max-w-[250px]">
                    Ward No. 32, Lower Pouni Chack,<br/>Jammu, Jammu & Kashmir,<br/>India - 180002
                </p>
            </div>

            <!-- Email Card -->
            <div class="bg-[#101014] rounded-[24px] p-12 flex flex-col items-center text-center transition-transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-[#ff014f]/10 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-[#ff014f]" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                </div>
                <h3 class="text-white text-[22px] font-bold mb-4">E-Mail</h3>
                <p class="text-gray-400 text-[15px] leading-relaxed">
                    info@turivanta.com
                </p>

            </div>
        </section>


        <!-- Huge Form Section -->
        <section class="max-w-6xl mx-auto bg-[#101014] border border-white/5 rounded-3xl p-10 lg:p-16 flex flex-col lg:flex-row gap-16 items-start relative overflow-hidden mb-24">
            
            <!-- Left Header -->
            <div class="lg:w-5/12 w-full pt-4">
                <span class="text-[#ff014f] text-[13px] font-bold tracking-[0.2em] uppercase mb-4 block">Get In Touch</span>
                <h2 class="text-5xl font-extrabold text-white leading-[1.15] mb-6">
                    Get your tourism identity
                </h2>
                <p class="text-gray-400 text-[16px] leading-[1.8] pr-4">
                    Join Turivanta Alliance through Turivanta membership. Experience Turivanta tourism platform benefits. Get Turivanta certified tourism recognition. Connect within Turivanta global tourism network. Build identity.
                </p>
            </div>

            <!-- Right Form -->
            <div class="lg:w-7/12 w-full">
                <form action="#" method="POST" class="flex flex-col gap-6 w-full">
                    
                    <div class="flex flex-col sm:flex-row gap-6">
                        <input type="text" placeholder="Your Name" class="w-full bg-[#18181c] border border-white/5 rounded-xl px-6 py-[18px] text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all text-[15px]">
                    </div>

                    
                    <div class="flex flex-col sm:flex-row gap-6">
                        <input type="email" placeholder="Your Email" class="w-full bg-[#18181c] border border-white/5 rounded-xl px-6 py-[18px] text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all text-[15px]">
                        <input type="text" placeholder="Subject" class="w-full bg-[#18181c] border border-white/5 rounded-xl px-6 py-[18px] text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all text-[15px]">
                    </div>

                    <textarea placeholder="Your Message" rows="5" class="w-full bg-[#18181c] border border-white/5 rounded-xl px-6 py-[18px] text-white placeholder-gray-500 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all text-[15px] resize-none"></textarea>

                    <button type="submit" class="mt-2 w-full inline-flex items-center justify-center gap-2 px-10 py-[18px] bg-[#ff014f] text-white font-bold rounded-full transition-all duration-300 hover:bg-[#e11d48] hover:shadow-[0_0_20px_rgba(255,1,79,0.4)]">
                        <span class="text-[16px] tracking-wide inline-flex items-center">Submit Now &nbsp;&rarr;</span>
                    </button>


                </form>
            </div>
        </section>

    </main>
@endsection
