@extends('layouts.app')

@section('title', 'Settings - Turivanta Alliance')

@section('content')
<main class="min-h-screen pt-32 pb-20 px-6 sm:px-12 bg-[#050505] relative overflow-hidden">
    <!-- Background Accents -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#ff014f]/5 rounded-full blur-[120px] -z-10 translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#ff014f]/5 rounded-full blur-[120px] -z-10 -translate-x-1/2 translate-y-1/2"></div>

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col mb-10">
            <h1 class="text-4xl font-black text-white tracking-tight mb-2">Account Settings</h1>
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
                    <button onclick="switchTab('profile')" id="btn-profile" class="tab-btn active w-full flex items-center gap-3 px-5 py-4 rounded-2xl text-sm font-bold transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Profile Details
                    </button>
                    <button onclick="switchTab('security')" id="btn-security" class="tab-btn w-full flex items-center gap-3 px-5 py-4 rounded-2xl text-sm font-bold text-gray-500 hover:text-white hover:bg-white/5 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Security
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
                                    <option value="Accommodation" {{ old('business_type', $user->business_type) == 'Accommodation' ? 'selected' : '' }}>Accommodation</option>
                                    <option value="Transportation" {{ old('business_type', $user->business_type) == 'Transportation' ? 'selected' : '' }}>Transportation</option>
                                    <option value="Travel Agency" {{ old('business_type', $user->business_type) == 'Travel Agency' ? 'selected' : '' }}>Travel Agency</option>
                                    <option value="Airline" {{ old('business_type', $user->business_type) == 'Airline' ? 'selected' : '' }}>Airline</option>
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
