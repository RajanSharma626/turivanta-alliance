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
                <form id="registration-form" action="{{ route('register.submit') }}" method="POST" class="w-full flex flex-col gap-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">First Name</label>
                            <input type="text" name="first_name" placeholder="John" value="{{ old('first_name') }}" class="w-full bg-[#131215] border @error('first_name') border-rose-500 @else border-white/10 @enderror rounded-xl px-5 py-3.5 text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                            @error('first_name') <span class="text-rose-500 text-[11px] font-bold ml-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <!-- Last Name -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Last Name</label>
                            <input type="text" name="last_name" placeholder="Doe" value="{{ old('last_name') }}" class="w-full bg-[#131215] border @error('last_name') border-rose-500 @else border-white/10 @enderror rounded-xl px-5 py-3.5 text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                            @error('last_name') <span class="text-rose-500 text-[11px] font-bold ml-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Gender -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Gender</label>
                            <div class="relative">
                                <select name="gender" class="w-full bg-[#131215] border @error('gender') border-rose-500 @else border-white/10 @enderror rounded-xl px-5 py-3.5 text-white appearance-none focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all shadow-lg" required>
                                    <option value="" disabled selected class="text-gray-600">Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <svg class="w-5 h-5 absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                @error('gender') <span class="text-rose-500 text-[11px] font-bold ml-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- D.O.B -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Date of Birth</label>
                            <input type="date" name="dob" value="{{ old('dob') }}" class="w-full bg-[#131215] border @error('dob') border-rose-500 @else border-white/10 @enderror rounded-xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all [color-scheme:dark]" required>
                            @error('dob') <span class="text-rose-500 text-[11px] font-bold ml-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Contact No. -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Contact No.</label>
                            <input type="tel" name="contact_no" placeholder="+1 (555) 000-0000" value="{{ old('contact_no') }}" class="w-full bg-[#131215] border @error('contact_no') border-rose-500 @else border-white/10 @enderror rounded-xl px-5 py-3.5 text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                            @error('contact_no') <span class="text-rose-500 text-[11px] font-bold ml-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Email -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Email Address</label>
                            <input type="email" name="email" placeholder="john@example.com" value="{{ old('email') }}" class="w-full bg-[#131215] border @error('email') border-rose-500 @else border-white/10 @enderror rounded-xl px-5 py-3.5 text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                            @error('email') <span class="text-rose-500 text-[11px] font-bold ml-1">{{ $message }}</span> @enderror
                        </div>
                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                         <!-- Business Type -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Business Type</label>
                            <div class="relative">
                                <select name="business_type" class="w-full bg-[#131215] border @error('business_type') border-rose-500 @else border-white/10 @enderror rounded-xl px-5 py-3.5 text-white appearance-none focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all shadow-lg" required>
                                    <option value="" disabled selected class="text-gray-600">Select Business Type</option>
                                    <option value="Accommodation" {{ old('business_type') == 'Accommodation' ? 'selected' : '' }}>Accommodation</option>
                                    <option value="Transportation" {{ old('business_type') == 'Transportation' ? 'selected' : '' }}>Transportation</option>
                                    <option value="Travel Agency" {{ old('business_type') == 'Travel Agency' ? 'selected' : '' }}>Travel Agency</option>
                                    <option value="Airline" {{ old('business_type') == 'Airline' ? 'selected' : '' }}>Airline</option>
                                </select>
                                <svg class="w-5 h-5 absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                @error('business_type') <span class="text-rose-500 text-[11px] font-bold ml-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-gray-300 ml-1">Password</label>
                            <input type="password" name="password" placeholder="••••••••" class="w-full bg-[#131215] border @error('password') border-rose-500 @else border-white/10 @enderror rounded-xl px-5 py-3.5 text-white placeholder-gray-600 focus:outline-none focus:border-[#ff014f] focus:ring-1 focus:ring-[#ff014f] transition-all" required>
                            @error('password') <span class="text-rose-500 text-[11px] font-bold ml-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6 mt-4 border-t border-white/5 text-center sm:text-right">
                        <button type="submit" id="submit-btn" class="inline-flex items-center justify-center gap-2 px-10 py-[14px] bg-[#ff014f] text-white font-bold rounded-full transition-all duration-300 hover:bg-[#e11d48] w-full sm:w-auto hover:shadow-[0_0_20px_rgba(255,1,79,0.4)] hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed">
                            <span id="btn-text" class="text-[15px]">Complete Registration</span>
                            <svg id="btn-icon" class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@push('scripts')
<script>
    const regForm = document.getElementById('registration-form');
    const submitBtn = document.getElementById('submit-btn');
    const btnTxt = document.getElementById('btn-text');
    const btnIcn = document.getElementById('btn-icon');

    if (regForm) {
        regForm.addEventListener('submit', function() {
            submitBtn.disabled = true;
            btnTxt.innerText = 'Creating Account...';
            btnIcn.classList.add('hidden');
        });
    }
</script>
@endpush
@endsection
