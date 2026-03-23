@extends('layouts.app')

@section('title', 'Membership Application - Turivanta Alliance')

@section('content')
<main class="min-h-screen pt-32 pb-20 px-6 sm:px-12 bg-[#050505] relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#ff014f]/5 rounded-full blur-[120px] -z-10 translate-x-1/2 -translate-y-1/2"></div>
    
    <div class="max-w-6xl mx-auto">
        <!-- Welcome Message -->
        <div class="mb-12 animate-fadeInUp">
            <h1 class="text-4xl sm:text-5xl font-black text-white tracking-tight mb-4">
                Welcome, <span class="text-[#ff014f]">{{ $user->first_name }}!</span>
            </h1>
            <p class="text-gray-400 text-lg font-medium max-w-2xl">
                Ready to take your business to the next level? Complete your membership application below to join the Turivanta Alliance.
            </p>
        </div>

        <!-- Progress Stepper -->
        <div class="mb-12">
            <div class="flex items-center justify-between relative max-w-4xl mx-auto">
                <!-- Progress Line -->
                <div class="absolute top-1/2 left-0 w-full h-1 bg-white/5 -translate-y-1/2 -z-10"></div>
                <div class="absolute top-1/2 left-0 h-1 bg-[#ff014f] -translate-y-1/2 -z-10 transition-all duration-700" style="width: {{ (($user->current_step - 1) / 3) * 100 }}%"></div>

                @foreach(['Requirements', 'Basic Info', 'Application Form', 'Documents'] as $index => $stepName)
                    @php $s = $index + 1; @endphp
                    <div class="flex flex-col items-center gap-3">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold transition-all duration-500 {{ $user->current_step >= $s ? 'bg-[#ff014f] text-white shadow-[0_0_20px_rgba(255,1,79,0.4)]' : 'bg-[#131215] text-gray-500 border border-white/10' }}">
                            @if($user->current_step > $s)
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            @else
                                {{ $s }}
                            @endif
                        </div>
                        <span class="text-[11px] font-black uppercase tracking-widest {{ $user->current_step >= $s ? 'text-white' : 'text-gray-600' }}">{{ $stepName }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Step Content -->
        <div class="bg-[#0a0a0f] border border-white/5 rounded-3xl overflow-hidden shadow-2xl animate-fadeIn">
            @if($user->current_step == 1)
                <!-- Step 1: View Requirements -->
                <div class="p-8 sm:p-12">
                    <div class="max-w-6xl">
                        <h2 class="text-2xl font-bold text-white mb-8 border-b border-white/10 pb-4">Membership Requirements Checklist</h2>
                        
                        <div class="space-y-12">
                            <!-- Legal Business Entity -->
                            <section>
                                <h3 class="text-[#ff014f] font-black uppercase tracking-[0.2em] text-xs mb-6 px-4 py-2 bg-[#ff014f]/5 rounded-lg inline-block">Legal Business Entity</h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <!-- Company -->
                                    <div class="bg-white/[0.02] border border-white/5 p-6 rounded-2xl h-full">
                                        <h4 class="text-white font-bold mb-4 text-sm flex items-center gap-2">
                                            <span class="w-1.5 h-6 bg-[#ff014f] rounded-full"></span>
                                            If business entity: Company
                                        </h4>
                                        <ul class="space-y-3 text-gray-400 text-sm leading-relaxed">
                                            <li class="flex gap-3"><span>•</span> Notarized Certificate of Incorporation</li>
                                            <li class="flex gap-3"><span>•</span> Article & Memorandum of Association</li>
                                            <li class="flex gap-3"><span>•</span> Annual Return reflecting current share capital details (mandatory)</li>
                                            <li class="flex gap-3"><span>•</span> CA letter confirming the shareholding details & percentages</li>
                                            <li class="flex gap-3"><span>•</span> Valid Passport or Photo ID Card of each shareholders</li>
                                        </ul>
                                    </div>

                                    <!-- LLP -->
                                    <div class="bg-white/[0.02] border border-white/5 p-6 rounded-2xl h-full">
                                        <h4 class="text-white font-bold mb-4 text-sm flex items-center gap-2">
                                            <span class="w-1.5 h-6 bg-[#ff014f] rounded-full"></span>
                                            If business entity: LLP
                                        </h4>
                                        <ul class="space-y-3 text-gray-400 text-sm leading-relaxed">
                                            <li class="flex gap-3"><span>•</span> Notarized Certificate of Incorporation</li>
                                            <li class="flex gap-3"><span>•</span> Registered Limited Liability Partnership Agreement</li>
                                            <li class="flex gap-3"><span>•</span> CA Letter confirming the partnership details & percentage</li>
                                            <li class="flex gap-3"><span>•</span> Valid Passport or Photo ID Card of each partners</li>
                                            <li class="flex gap-3"><span>•</span> Signed Application Summary Form with signatory of all the partners</li>
                                        </ul>
                                    </div>

                                    <!-- Partnership -->
                                    <div class="bg-white/[0.02] border border-white/5 p-6 rounded-2xl h-full">
                                        <h4 class="text-white font-bold mb-4 text-sm flex items-center gap-2">
                                            <span class="w-1.5 h-6 bg-[#ff014f] rounded-full"></span>
                                            If business entity: Partnership
                                        </h4>
                                        <ul class="space-y-3 text-gray-400 text-sm leading-relaxed">
                                            <li class="flex gap-3"><span>•</span> Registered Deed of Partnership with Registrar of Firm</li>
                                            <li class="flex gap-3"><span>•</span> CA Letter confirming the partnership details & percentage</li>
                                            <li class="flex gap-3"><span>•</span> Valid Passport or Photo ID Card of each partners</li>
                                            <li class="flex gap-3"><span>•</span> Signed Application Summary Form with signatory of all the partners</li>
                                        </ul>
                                    </div>

                                    <!-- Sole Proprietor -->
                                    <div class="bg-white/[0.02] border border-white/5 p-6 rounded-2xl h-full">
                                        <h4 class="text-white font-bold mb-4 text-sm flex items-center gap-2">
                                            <span class="w-1.5 h-6 bg-[#ff014f] rounded-full"></span>
                                            If business entity: Sole Proprietor
                                        </h4>
                                        <ul class="space-y-3 text-gray-400 text-sm leading-relaxed">
                                            <li class="flex gap-3"><span>•</span> Valid Passport or Photo ID Card of sole proprietor</li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Proof of TAX -->
                                <section class="bg-white/[0.02] border border-white/5 p-6 rounded-2xl h-full">
                                    <h3 class="text-[#ff014f] font-black uppercase tracking-[0.2em] text-xs mb-6 px-4 py-2 bg-[#ff014f]/5 rounded-lg inline-block">Proof of TAX Registration</h3>
                                    <ul class="space-y-3 text-gray-400 text-sm leading-relaxed ml-4">
                                        <li class="flex gap-3"><span>•</span> Valid Proof of Tax Registration</li>
                                        <li class="flex gap-3"><span>•</span> Acknowledgement Receipt of Tax by Authorities</li>
                                    </ul>
                                </section>

                                <!-- Owner ID -->
                                <section class="bg-white/[0.02] border border-white/5 p-6 rounded-2xl h-full">
                                    <h3 class="text-[#ff014f] font-black uppercase tracking-[0.2em] text-xs mb-6 px-4 py-2 bg-[#ff014f]/5 rounded-lg inline-block">Owners / Shareholders Identification</h3>
                                    <p class="text-gray-500 text-[11px] font-bold mb-4 uppercase tracking-wider ml-4">Please provide details as following:</p>
                                    <ul class="space-y-3 text-gray-400 text-sm leading-relaxed ml-4">
                                        <li class="flex gap-3"><span>1.</span> Valid Passport Photo ID of the Owners / Shareholders</li>
                                        <li class="flex gap-3"><span>2.</span> If shareholders are corporation, provide certificate of incorporation of parent company</li>
                                    </ul>
                                </section>
                            </div>
                        </div>

                        <form action="{{ route('profile.next') }}" method="POST" class="mt-16 pt-8 border-t border-white/5">
                            @csrf
                            <input type="hidden" name="step" value="1">
                            <button type="submit" class="inline-flex items-center gap-3 px-10 py-4 bg-[#ff014f] text-white font-bold rounded-2xl hover:bg-[#e11d48] transition-all hover:shadow-[0_0_30px_rgba(255,1,79,0.3)] hover:-translate-y-1">
                                Proceed to Basic Details
                                <svg class="w-5 h-5 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>

            @elseif($user->current_step == 2)
                <!-- Step 2: Basic Details -->
                <div class="p-8 sm:p-12">
                    <h2 class="text-2xl font-bold text-white mb-2">Basic Information</h2>
                    <p class="text-gray-500 mb-8 font-medium">Please confirm your personal and primary business details.</p>

                    <form id="step2-form" action="{{ route('profile.next') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @csrf
                        <input type="hidden" name="step" value="2">

                        <div class="flex flex-col gap-2">
                            <label class="text-[11px] font-black text-gray-500 uppercase tracking-[0.2em] ml-1">Country Concerned</label>
                            <select name="country_concerned" class="bg-[#131215] border @error('country_concerned') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all appearance-none">
                                <option value="">Select Country</option>
                                @foreach(['Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, North', 'Korea, South', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Palestine', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe'] as $country)
                                    <option value="{{ $country }}" {{ old('country_concerned', $user->country_concerned) == $country ? 'selected' : '' }}>{{ $country }}</option>
                                @endforeach
                            </select>
                            @error('country_concerned') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-[11px] font-black text-gray-500 uppercase tracking-[0.2em] ml-1">Legal Status</label>
                            <select name="legal_status" class="bg-[#131215] border @error('legal_status') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all appearance-none">
                                @foreach(['Association', 'Co-operative', 'Corporation', 'Joint Venture', 'Limited Company', 'Limited Partnership', 'Partnership', 'Sole Proprietorship'] as $status)
                                    <option value="{{ $status }}" {{ old('legal_status', $user->legal_status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @error('legal_status') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-[11px] font-black text-gray-500 uppercase tracking-[0.2em] ml-1">First Name</label>
                            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="bg-[#131215] border @error('first_name') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all">
                            @error('first_name') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-[11px] font-black text-gray-500 uppercase tracking-[0.2em] ml-1">Last Name</label>
                            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="bg-[#131215] border @error('last_name') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all">
                            @error('last_name') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-[11px] font-black text-gray-500 uppercase tracking-[0.2em] ml-1">Gender</label>
                            <select name="gender" class="bg-[#131215] border @error('gender') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all appearance-none">
                                <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-[11px] font-black text-gray-500 uppercase tracking-[0.2em] ml-1">Date of Birth</label>
                            <input type="date" name="dob" value="{{ old('dob', $user->dob) }}" class="bg-[#131215] border @error('dob') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all [color-scheme:dark]">
                            @error('dob') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-[11px] font-black text-gray-500 uppercase tracking-[0.2em] ml-1">Contact No.</label>
                            <input type="tel" name="contact_no" value="{{ old('contact_no', $user->contact_no) }}" class="bg-[#131215] border @error('contact_no') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all">
                            @error('contact_no') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-[11px] font-black text-gray-500 uppercase tracking-[0.2em] ml-1">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="bg-[#131215] border @error('email') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all">
                            @error('email') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex flex-col gap-2 md:col-span-2">
                            <label class="text-[11px] font-black text-gray-500 uppercase tracking-[0.2em] ml-1">Business Type</label>
                            <select name="business_type" class="bg-[#131215] border @error('business_type') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] transition-all appearance-none">
                                <option value="Accommodation" {{ old('business_type', $user->business_type) == 'Accommodation' ? 'selected' : '' }}>Accommodation</option>
                                <option value="Transportation" {{ old('business_type', $user->business_type) == 'Transportation' ? 'selected' : '' }}>Transportation</option>
                                <option value="Travel Agency" {{ old('business_type', $user->business_type) == 'Travel Agency' ? 'selected' : '' }}>Travel Agency</option>
                                <option value="Airline" {{ old('business_type', $user->business_type) == 'Airline' ? 'selected' : '' }}>Airline</option>
                            </select>
                            @error('business_type') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:col-span-2 mt-10 pt-6 border-t border-white/5 flex gap-4">
                            <button type="submit" name="action" value="back" formaction="{{ route('profile.back') }}" class="px-8 py-4 border border-white/10 text-gray-400 font-bold rounded-2xl hover:bg-white/5 transition-all">
                                Previous Step
                            </button>
                            <button type="submit" class="flex-1 sm:flex-none px-12 py-4 bg-[#ff014f] text-white font-bold rounded-2xl hover:bg-[#e11d48] transition-all shadow-xl">
                                Save & Continue
                            </button>
                        </div>
                    </form>
                </div>

            @elseif($user->current_step == 3)
                <!-- Step 3: Complete Application Form -->
                <div class="p-8 sm:p-12">
                    <h2 class="text-2xl font-bold text-white mb-2">Application Form</h2>
                    <p class="text-gray-500 mb-10 font-medium">Detailed business and management identification.</p>

                    <form id="step3-form" action="{{ route('profile.next') }}" method="POST" class="flex flex-col gap-12">
                        @csrf
                        <input type="hidden" name="step" value="3">

                        <!-- Section 1 -->
                        <div class="space-y-8">
                            <h3 class="bg-[#ff014f]/10 text-[#ff014f] font-black uppercase text-xs tracking-widest px-4 py-2 rounded-lg inline-block">Section 1: Business Identification</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Legal Name</label>
                                    <input type="text" name="legal_name" value="{{ old('legal_name', $application->legal_name) }}" class="bg-[#131215] border @error('legal_name') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('legal_name') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Trade Name</label>
                                    <input type="text" name="trade_name" value="{{ old('trade_name', $application->trade_name) }}" class="bg-[#131215] border @error('trade_name') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('trade_name') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Office Phone</label>
                                    <input type="tel" name="office_phone" value="{{ old('office_phone', $application->office_phone) }}" class="bg-[#131215] border @error('office_phone') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('office_phone') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Office Email</label>
                                    <input type="email" name="office_email" value="{{ old('office_email', $application->office_email) }}" class="bg-[#131215] border @error('office_email') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('office_email') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Billing Country</label>
                                    <select name="billing_country" class="bg-[#131215] border @error('billing_country') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                        <option value="">Select Country</option>
                                        @foreach(['Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, North', 'Korea, South', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Palestine', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe'] as $country)
                                            <option value="{{ $country }}" {{ old('billing_country', $application->billing_country) == $country ? 'selected' : '' }}>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    @error('billing_country') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Billing City</label>
                                    <input type="text" name="billing_city" value="{{ old('billing_city', $application->billing_city) }}" class="bg-[#131215] border @error('billing_city') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('billing_city') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="flex flex-col gap-2">
                                <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Billing Street Address</label>
                                <input type="text" name="billing_street" value="{{ old('billing_street', $application->billing_street) }}" class="bg-[#131215] border @error('billing_street') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                @error('billing_street') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Service TAX ID</label>
                                    <input type="text" name="service_tax" value="{{ old('service_tax', $application->service_tax) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('service_tax') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Section 2 -->
                        <div class="space-y-8">
                            <h3 class="bg-[#ff014f]/10 text-[#ff014f] font-black uppercase text-xs tracking-widest px-4 py-2 rounded-lg inline-block">Section 2: Other Information</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Commencement of Business</label>
                                    <input type="date" name="commencement_date" value="{{ old('commencement_date', ($application->commencement_date ? $application->commencement_date->format('Y-m-d') : '')) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] [color-scheme:dark]">
                                    @error('commencement_date') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Trade Registration No.</label>
                                    <input type="text" name="trade_registration_no" value="{{ old('trade_registration_no', $application->trade_registration_no) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('trade_registration_no') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-10 pt-10 border-t border-white/5 flex gap-4">
                            <button type="submit" name="action" value="back" formaction="{{ route('profile.back') }}" class="px-8 py-4 border border-white/10 text-gray-400 font-bold rounded-2xl hover:bg-white/5 transition-all">
                                Previous Step
                            </button>
                            <button type="submit" class="flex-1 sm:flex-none px-12 py-4 bg-[#ff014f] text-white font-bold rounded-2xl hover:bg-[#e11d48] transition-all shadow-xl">
                                Final Step: Upload Documents
                            </button>
                        </div>
                    </form>
                </div>

            @elseif($user->current_step == 4)
                <!-- Step 4: Documents -->
                <div class="p-8 sm:p-12">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="w-10 h-10 bg-emerald-500/10 rounded-full flex items-center justify-center border border-emerald-500/20">
                            <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white">Document Submission</h2>
                    </div>
                    <p class="text-gray-500 mb-10 font-medium">Please upload the required documents as per your legal status: <span class="text-white font-black uppercase text-xs tracking-widest px-2 py-0.5 bg-white/5 rounded">{{ $user->legal_status }}</span></p>

                    @if($errors->any())
                        <div class="mb-10 p-6 bg-red-500/10 border border-red-500/20 rounded-2xl">
                            <h4 class="text-red-500 font-black uppercase text-xs tracking-widest mb-2">Submission Errors</h4>
                            <ul class="list-disc list-inside text-red-400 text-xs font-medium space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-10 p-6 bg-red-500/10 border border-red-500/20 rounded-2xl text-red-500 text-xs font-bold uppercase tracking-widest">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="mb-10 p-6 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl text-emerald-500 text-xs font-bold uppercase tracking-widest">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="step4-form" action="{{ route('profile.next') }}" method="POST" enctype="multipart/form-data" class="space-y-12">
                        @csrf
                        <input type="hidden" name="step" value="4">

                        <!-- Legal Entity Documents -->
                        <div>
                            <h3 class="text-[#ff014f] font-black uppercase tracking-[0.2em] text-[10px] mb-6 px-4 py-2 bg-[#ff014f]/5 rounded-lg inline-block">1. Legal Entity Documents</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if(in_array($user->legal_status, ['Corporation', 'Limited Company']))
                                    <!-- Company Docs -->
                                    <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Notarized Certificate of Incorporation</label>
                                        <input type="file" name="cert_inc" class="bg-[#131215] border @error('cert_inc') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('cert_inc') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Article & Memorandum of Association</label>
                                        <input type="file" name="art_mem" class="bg-[#131215] border @error('art_mem') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('art_mem') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Annual Return (Share Capital)</label>
                                        <input type="file" name="annual_return" class="bg-[#131215] border @error('annual_return') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('annual_return') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">CA Letter (Shareholding details)</label>
                                        <input type="file" name="ca_letter_share" class="bg-[#131215] border @error('ca_letter_share') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('ca_letter_share') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>

                                @elseif(in_array($user->legal_status, ['Limited Partnership', 'Partnership', 'Joint Venture']))
                                    <!-- Partnership Docs -->
                                    <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Partnership Deed / LLP Agreement</label>
                                        <input type="file" name="partnership_deed" class="bg-[#131215] border @error('partnership_deed') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('partnership_deed') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">CA Letter (Partnership Details)</label>
                                        <input type="file" name="ca_letter_part" class="bg-[#131215] border @error('ca_letter_part') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('ca_letter_part') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>

                                @else
                                    <!-- Sole Proprietor / Other -->
                                    <div class="flex flex-col gap-2 md:col-span-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Trade License / Incorporation Certificate</label>
                                        <input type="file" name="trade_license" class="bg-[#131215] border @error('trade_license') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('trade_license') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- TAX Documents -->
                        <div>
                            <h3 class="text-[#ff014f] font-black uppercase tracking-[0.2em] text-[10px] mb-6 px-4 py-2 bg-[#ff014f]/5 rounded-lg inline-block">2. TAX Registration</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Proof of TAX Registration (VAT/GST/TIN)</label>
                                    <input type="file" name="tax_proof" class="bg-[#131215] border @error('tax_proof') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                    @error('tax_proof') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Acknowledgement Receipt</label>
                                    <input type="file" name="tax_receipt" class="bg-[#131215] border @error('tax_receipt') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                    @error('tax_receipt') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- ID Documents -->
                        <div>
                            <h3 class="text-[#ff014f] font-black uppercase tracking-[0.2em] text-[10px] mb-6 px-4 py-2 bg-[#ff014f]/5 rounded-lg inline-block">3. ID Verification</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Passport / Photo ID (All Owners/Partners)</label>
                                    <input type="file" name="owner_ids[]" class="bg-[#131215] border @error('owner_ids') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer" multiple>
                                    @error('owner_ids') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    @error('owner_ids.*') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }} (Ensure all files are valid)</span> @enderror
                                    <p class="text-[9px] text-gray-600 mt-1 ml-1 lowercase tracking-normal italic">* You can select multiple files at once</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 pt-10 border-t border-white/5 flex gap-4">
                            <button type="submit" name="action" value="back" formaction="{{ route('profile.back') }}" class="px-8 py-5 border border-white/10 text-gray-400 font-bold rounded-2xl hover:bg-white/5 transition-all">
                                Previous Step
                            </button>
                            <button type="submit" class="flex-1 sm:flex-none px-12 py-5 bg-emerald-500 text-white font-black uppercase text-xs tracking-[0.2em] rounded-2xl hover:bg-emerald-600 transition-all shadow-xl hover:shadow-emerald-500/20 hover:-translate-y-1">
                                Complete Membership Application
                            </button>
                        </div>
                    </form>
                </div>

            @else
                <!-- Step 5: Success -->
                <div class="p-12 text-center py-24">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-emerald-500/10 rounded-full mb-8 border border-emerald-500/20 shadow-[0_0_50px_rgba(16,185,129,0.1)]">
                        <svg class="w-12 h-12 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <h2 class="text-4xl font-black text-white mb-2 tracking-tight">Application Submitted!</h2>
                    
                    <div class="flex flex-col items-center gap-2 mb-8 mt-6">
                        <span class="text-gray-500 font-black uppercase text-[10px] tracking-widest leading-none">Application ID</span>
                        <div class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-white font-bold tracking-widest uppercase">
                            {{ $application->application_no }}
                        </div>
                    </div>

                    @php
                        $status = strtolower($application->status ?? 'pending');
                        $classes = match($status) {
                            'approved' => [
                                'bg' => 'bg-emerald-500/10',
                                'border' => 'border-emerald-500/20',
                                'text' => 'text-emerald-500',
                                'dot' => 'bg-emerald-500'
                            ],
                            'rejected', 'declined' => [
                                'bg' => 'bg-red-500/10',
                                'border' => 'border-red-500/20',
                                'text' => 'text-red-500',
                                'dot' => 'bg-red-500'
                            ],
                            default => [
                                'bg' => 'bg-yellow-500/10',
                                'border' => 'border-yellow-500/20',
                                'text' => 'text-yellow-500',
                                'dot' => 'bg-yellow-500'
                            ],
                        };
                    @endphp

                    <div class="inline-flex items-center gap-3 px-6 py-3 {{ $classes['bg'] }} border {{ $classes['border'] }} rounded-full mb-10">
                        <span class="w-2 h-2 {{ $classes['dot'] }} rounded-full {{ $status == 'pending' ? 'animate-pulse' : '' }}"></span>
                        <span class="{{ $classes['text'] }} font-black uppercase text-[10px] tracking-widest">Status: {{ strtoupper($status) }}</span>
                    </div>

                    <p class="text-gray-400 max-w-lg mx-auto mb-10 text-lg font-medium leading-relaxed">
                        Fantastic! Your documents have been received. Our compliance team will audit your application and send a confirmation to <span class="text-white">{{ $user->email }}</span> within 2 working days.
                    </p>
                    
                    <a href="/" class="inline-block px-12 py-5 bg-white text-black font-black uppercase text-xs tracking-[0.2em] rounded-2xl hover:bg-gray-200 transition-all shadow-xl hover:-translate-y-1">
                        Return to Dashboard
                    </a>
                </div>
            @endif
        </div>
    </div>
</main>
@endsection
