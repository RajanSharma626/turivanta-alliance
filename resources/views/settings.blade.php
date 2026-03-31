@extends('layouts.app')

@section('title', 'My Profile - Turivanta Alliance')

@section('content')
<main class="min-h-screen pt-32 pb-20 px-6 sm:px-12 bg-[#050505] relative overflow-hidden">
    <!-- Background Accents -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#ff014f]/5 rounded-full blur-[120px] -z-10 translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#ff014f]/5 rounded-full blur-[120px] -z-10 -translate-x-1/2 translate-y-1/2"></div>

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col mb-10">
            <h1 class="text-4xl font-black text-white tracking-tight mb-2">My Profile</h1>
            <p class="text-gray-500 font-medium">Manage your profile information and security preferences.</p>
        </div>

        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl flex items-center gap-3 text-emerald-500 font-bold animate-fadeIn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Sidebar Navigation -->
            <div class="lg:col-span-3">
                <div class="bg-[#0a0a0f] border border-white/5 rounded-3xl p-3 flex flex-col gap-1">
                    <button onclick="switchTab('profile')" id="btn-profile" class="tab-btn active w-full flex items-center gap-3 px-5 py-4 rounded-2xl text-sm font-bold transition-all duration-300 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Profile Details
                    </button>
                    <button onclick="switchTab('security')" id="btn-security" class="tab-btn w-full flex items-center gap-3 px-5 py-4 rounded-2xl text-sm font-bold text-gray-500 hover:text-white hover:bg-white/5 transition-all duration-300 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Security
                    </button>
                    <button onclick="switchTab('subscription')" id="btn-subscription" class="tab-btn w-full flex items-center gap-3 px-5 py-4 rounded-2xl text-sm font-bold text-gray-500 hover:text-white hover:bg-white/5 transition-all duration-300 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                        Subscription
                    </button>
                </div>
            </div>

            <!-- Content Area -->
            <div class="lg:col-span-9">
                <!-- Profile Section -->
                <div id="section-profile" class="tab-content animate-fadeIn">
                    <div class="bg-[#0a0a0f] border border-white/5 rounded-3xl overflow-hidden">
                        <div class="p-8 border-b border-white/5">
                            <h3 class="text-xl font-bold text-white">Profile Details</h3>
                            <p class="text-sm text-gray-500">Update your public profile and contact information.</p>
                        </div>
                        <form action="{{ route('settings.update') }}" method="POST" class="p-8 flex flex-col gap-6">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">First Name</label>
                                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] transition-all">
                                    @error('first_name') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Last Name</label>
                                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] transition-all">
                                    @error('last_name') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Email Address</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] transition-all">
                                    @error('email') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Contact No.</label>
                                    <input type="tel" name="contact_no" value="{{ old('contact_no', $user->contact_no) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] transition-all">
                                    @error('contact_no') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                                </div>
                            </div>



                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Gender</label>
                                    <select name="gender" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] transition-all appearance-none">
                                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Date of Birth</label>
                                    <input type="date" name="dob" value="{{ old('dob', $user->dob) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] [color-scheme:dark] transition-all">
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Business Type</label>
                                <select name="business_type" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] transition-all appearance-none">
                                    <option value="Accommodation"
                                        {{ old('business_type', $user->business_type) == 'Accommodation' ? 'selected' : '' }}>
                                        Accommodation</option>
                                    <option value="Transportation"
                                        {{ old('business_type', $user->business_type) == 'Transportation' ? 'selected' : '' }}>
                                        Transportation</option>
                                    <option value="Travel Agency"
                                        {{ old('business_type', $user->business_type) == 'Travel Agency' ? 'selected' : '' }}>
                                        Travel Agency</option>
                                    <option value="Airline"
                                        {{ old('business_type', $user->business_type) == 'Airline' ? 'selected' : '' }}>
                                        Airline</option>
                                    <option value="Tourism Board"
                                        {{ old('business_type', $user->business_type) == 'Tourism Board' ? 'selected' : '' }}>
                                        Tourism Board</option>
                                    <option value="In Service Professional"
                                        {{ old('business_type', $user->business_type) == 'In Service Professional' ? 'selected' : '' }}>
                                        In Service Professional</option>
                                    <option value="Student"
                                        {{ old('business_type', $user->business_type) == 'Student' ? 'selected' : '' }}>
                                        Student</option>
                                </select>
                            </div>

                            <div class="pt-4 flex justify-end">
                                <button type="submit" class="px-10 py-4 bg-[#ff014f] text-white font-bold rounded-2xl hover:bg-[#e11d48] transition-all shadow-[0_0_20px_rgba(255,1,79,0.3)] hover:shadow-[0_0_30px_rgba(255,1,79,0.5)] hover:-translate-y-1">
                                    Save Profile Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Security Section -->
                <div id="section-security" class="tab-content hidden animate-fadeIn">
                    <div class="bg-[#0a0a0f] border border-white/5 rounded-3xl overflow-hidden">
                        <div class="p-8 border-b border-white/5">
                            <h3 class="text-xl font-bold text-white">Password & Security</h3>
                            <p class="text-sm text-gray-500">Keep your account secure by updating your password regularly.</p>
                        </div>
                        <form action="{{ route('settings.password') }}" method="POST" class="p-8 flex flex-col gap-6">
                            @csrf
                            <div class="flex flex-col gap-2">
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Current Password</label>
                                <input type="password" name="current_password" placeholder="••••••••" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] transition-all">
                                @error('current_password') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">New Password</label>
                                    <input type="password" name="new_password" placeholder="••••••••" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] transition-all">
                                    @error('new_password') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" placeholder="••••••••" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-3.5 text-white focus:outline-none focus:border-[#ff014f] transition-all">
                                </div>
                            </div>
                            <div class="pt-4 flex justify-end">
                                <button type="submit" class="px-10 py-4 bg-white/5 border border-white/10 text-white font-bold rounded-2xl hover:bg-[#ff014f] hover:border-[#ff014f] transition-all hover:shadow-[0_0_20px_rgba(255,1,79,0.3)] hover:-translate-y-1">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Subscription Section -->
                <div id="section-subscription" class="tab-content hidden animate-fadeIn">
                    <div class="bg-[#0a0a0f] border border-white/5 rounded-3xl overflow-hidden">
                        <div class="p-8 border-b border-white/5">
                            <h3 class="text-xl font-bold text-white">Subscription Plan</h3>
                            <p class="text-sm text-gray-500">Manage your membership plan and billing details.</p>
                        </div>
                        <div class="p-8">
                            @php $sub = $user->currentSubscription; @endphp
                            @if($sub)
                                <div class="bg-white/5 border border-[#ff014f]/20 rounded-3xl p-8 relative overflow-hidden group">
                                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-[#ff014f]/5 rounded-full blur-3xl group-hover:bg-[#ff014f]/10 transition-colors"></div>
                                    <div class="relative z-10">
                                        <div class="flex justify-between items-start mb-8">
                                            <div>
                                                <span class="text-[10px] font-black text-[#ff014f] uppercase tracking-[0.2em] mb-2 block">Current Plan</span>
                                                <h4 class="text-3xl font-black text-white italic tracking-tight uppercase">{{ $sub->plan_name }}</h4>
                                            </div>
                                            <div class="px-4 py-1.5 bg-emerald-500/10 border border-emerald-500/20 rounded-full">
                                                <span class="text-[10px] font-black text-emerald-500 uppercase tracking-widest">{{ strtoupper($sub->status) }}</span>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mb-8">
                                            <div>
                                                <p class="text-[9px] text-gray-500 font-black uppercase tracking-widest mb-1">Pricing Plan</p>
                                                <p class="text-white font-bold text-sm">{{ $sub->currency }} {{ number_format($sub->price, 2) }}</p>
                                            </div>
                                            <div>
                                                <p class="text-[9px] text-gray-500 font-black uppercase tracking-widest mb-1">Start Date</p>
                                                <p class="text-white font-bold text-sm">{{ $sub->starts_at->format('M d, Y') }}</p>
                                            </div>
                                            <div>
                                                <p class="text-[9px] text-gray-500 font-black uppercase tracking-widest mb-1">Expiry Date</p>
                                                <p class="text-white font-bold text-sm italic underline decoration-[#ff014f] underline-offset-4">{{ $sub->expires_at->format('M d, Y') }}</p>
                                            </div>
                                        </div>

                                        <div class="pt-6 border-t border-white/5 flex flex-col sm:flex-row gap-4 items-center justify-between">
                                            <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest italic leading-normal">Renewal will be processed manually via invoice</p>
                                            <div class="flex items-center gap-3">
                                                <a href="{{ route('settings.invoice') }}" class="px-8 py-3 bg-white/5 border border-white/10 text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-white/10 transition-all">
                                                    Download Invoice
                                                </a>
                                                <a href="{{ route('membership') }}" class="px-8 py-3 bg-[#ff014f] text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-[#e11d48] transition-all shadow-lg shadow-[#ff014f]/20">
                                                    View Other Plans
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="bg-white/5 border border-white/10 rounded-3xl p-10 text-center">
                                    <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center mx-auto mb-6 text-gray-600">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                                    </div>
                                    <h4 class="text-white font-bold text-lg mb-2">No Active Membership</h4>
                                    <p class="text-gray-500 text-sm mb-8 mx-auto max-w-sm">Unlock the full potential of Turivanta Alliance by choosing one of our professional membership plans.</p>
                                    <a href="{{ route('membership') }}" class="inline-block px-10 py-4 bg-[#ff014f] text-white font-bold rounded-2xl hover:bg-[#e11d48] transition-all shadow-[0_0_20px_rgba(255,1,79,0.3)]">
                                        Explore Membership Plans
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .tab-btn.active {
        background-color: #ff014f;
        color: white;
        box-shadow: 0 10px 20px rgba(255, 1, 79, 0.2);
    }
</style>

<script>
    function switchTab(tab) {
        // Update Buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active', 'bg-[#ff014f]', 'text-white');
            btn.classList.add('text-gray-500', 'hover:text-white', 'hover:bg-white/5');
            btn.style.boxShadow = 'none';
        });
        
        const activeBtn = document.getElementById('btn-' + tab);
        activeBtn.classList.add('active');
        activeBtn.classList.remove('text-gray-500', 'hover:bg-white/5');
        
        // Update Content
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        document.getElementById('section-' + tab).classList.remove('hidden');
    }

    // Handle incoming errors to switch to security tab if password update fails
    @if($errors->has('current_password') || $errors->has('new_password'))
        switchTab('security');
    @endif
</script>
@endsection
