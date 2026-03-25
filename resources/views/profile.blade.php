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

                                    <!-- Servicing Professionals -->
                                    <div class="bg-white/[0.02] border border-white/5 p-6 rounded-2xl h-full">
                                        <h4 class="text-white font-bold mb-4 text-sm flex items-center gap-2">
                                            <span class="w-1.5 h-6 bg-[#ff014f] rounded-full"></span>
                                            Servicing Professionals
                                        </h4>
                                        <ul class="space-y-3 text-gray-400 text-sm leading-relaxed">
                                             <li class="flex gap-3"><span>•</span> Valid Passport Photo ID of the applicant.</li>
                                             <li class="flex gap-3"><span>•</span> Experience certificate of 10 Years from Tourism Industry.</li>
                                        </ul>
                                    </div>

                                    <!-- Students -->
                                    <div class="bg-white/[0.02] border border-white/5 p-6 rounded-2xl h-full">
                                        <h4 class="text-white font-bold mb-4 text-sm flex items-center gap-2">
                                            <span class="w-1.5 h-6 bg-[#ff014f] rounded-full"></span>
                                            Students
                                        </h4>
                                        <ul class="space-y-3 text-gray-400 text-sm leading-relaxed">
                                            <li class="flex gap-3"><span>•</span> Valid Passport Photo ID of the applicant.</li>
                                            <li class="flex gap-3"><span>•</span> Letter of endorsement by designated HOD and principal of institution in case of students.</li>
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
                                        <li class="flex gap-3"><span>•</span> Valid Passport Photo ID of the Owners / Shareholders</li>
                                        <li class="flex gap-3"><span>•</span> If shareholders are corporation, provide certificate of incorporation of parent company</li>
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
                    <p class="text-gray-500 mb-6 font-medium">Please confirm your personal and primary business details.</p>

                    <!-- Important Note -->
                    <div class="mb-10 p-6 bg-[#ff014f]/5 border border-[#ff014f]/10 rounded-2xl">
                        <h4 class="text-white font-bold text-sm mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Important Note
                        </h4>
                        <ul class="space-y-3 text-gray-400 text-[13px] leading-relaxed">
                            <li class="flex gap-3"><span>•</span> Date of Commencement of business must be 4 Years Old from the date of application</li>
                            <li class="flex gap-3"><span class="text-[#ff014f] font-black uppercase text-[10px] mt-0.5">OR</span> <span>You must have minimum <span class="text-white font-bold">10 years</span> of Experience of the industry</span></li>
                            <li class="flex gap-3"><span>•</span> Letter of recommendation from Turivanta Member on their letter head with date, sign and stamp.</li>
                            <li class="flex gap-3"><span>•</span> A separate online application is required for each agency location for which approval is sought.</li>
                            <li class="flex gap-3"><span>•</span> Draft Applications must be submitted within 7 days, otherwise you will need to restart the process.</li>
                        </ul>
                    </div>

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
                                <option value="">Select Legal Status</option>
                                @foreach(['Association', 'Co-operative', 'Corporation', 'Joint Venture', 'Limited Company', 'Limited Partnership', 'Partnership', 'Sole Proprietorship', 'State Owned Enterprise', 'Trust Company', 'Servicing Professionals', 'Students'] as $status)
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
                                <option value="">Select Gender</option>
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
                                <option value="">Select Business Type</option>
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
                            <h3 class="bg-[#ff014f]/10 text-[#ff014f] font-black uppercase text-xs tracking-widest px-4 py-2 rounded-lg inline-block">SECTION 1 - Identification of Business for which Approval Requested</h3>
                            
                            <!-- Identification Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                                <!-- Row 1 -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Legal Name <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="text" name="legal_name" value="{{ old('legal_name', $application->legal_name) }}" class="bg-[#131215] border @error('legal_name') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('legal_name') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Trade Name</label>
                                    <input type="text" name="trade_name" value="{{ old('trade_name', $application->trade_name) }}" class="bg-[#131215] border @error('trade_name') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('trade_name') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>

                                <!-- Row 2 -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Office Phone <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="tel" name="office_phone" value="{{ old('office_phone', $application->office_phone) }}" class="bg-[#131215] border @error('office_phone') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('office_phone') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Office Email <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="email" name="office_email" value="{{ old('office_email', $application->office_email) }}" class="bg-[#131215] border @error('office_email') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('office_email') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>

                                <!-- Row 3 -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Mobile</label>
                                    <input type="tel" name="mobile" value="{{ old('mobile', $application->mobile) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('mobile') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Website</label>
                                    <input type="text" name="website" value="{{ old('website', $application->website) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('website') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>

                                <!-- Row 4 -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Fax</label>
                                    <input type="text" name="fax" value="{{ old('fax', $application->fax) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('fax') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Service TAX <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="text" name="service_tax" value="{{ old('service_tax', $application->service_tax) }}" class="bg-[#131215] border @error('service_tax') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('service_tax') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <hr class="border-white/5 my-10">

                            <!-- Address Section -->
                            <h4 class="text-white font-bold text-sm mb-4">Full Address of the Office for which Application for Approval is made</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                                <!-- Row 1: Country -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Country <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <select name="billing_country" id="billing_country" class="bg-[#131215] border @error('billing_country') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                        <option value="">Select Country</option>
                                        @foreach(['Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, North', 'Korea, South', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Palestine', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe'] as $country)
                                            <option value="{{ $country }}" {{ old('billing_country', $application->billing_country) == $country ? 'selected' : '' }}>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    @error('billing_country') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Shipping Country <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <select name="shipping_country" id="shipping_country" class="bg-[#131215] border @error('shipping_country') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                        <option value="">Select Shipping Country</option>
                                        @foreach(['Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, North', 'Korea, South', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Palestine', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe'] as $country)
                                            <option value="{{ $country }}" {{ old('shipping_country', $application->shipping_country) == $country ? 'selected' : '' }}>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    @error('shipping_country') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>

                                <!-- Row 2: State -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        State/Province <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="text" name="billing_state" id="billing_state" value="{{ old('billing_state', $application->billing_state) }}" class="bg-[#131215] border @error('billing_state') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('billing_state') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Shipping State</label>
                                    <input type="text" name="shipping_state" id="shipping_state" value="{{ old('shipping_state', $application->shipping_state) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('shipping_state') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>

                                <!-- Row 3: City -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        City <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="text" name="billing_city" id="billing_city" value="{{ old('billing_city', $application->billing_city) }}" class="bg-[#131215] border @error('billing_city') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('billing_city') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Shipping City <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="text" name="shipping_city" id="shipping_city" value="{{ old('shipping_city', $application->shipping_city) }}" class="bg-[#131215] border @error('shipping_city') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('shipping_city') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>

                                <!-- Row 4: Street -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Street Name & Number <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="text" name="billing_street" id="billing_street" value="{{ old('billing_street', $application->billing_street) }}" class="bg-[#131215] border @error('billing_street') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('billing_street') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Shipping Street <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="text" name="shipping_street" id="shipping_street" value="{{ old('shipping_street', $application->shipping_street) }}" class="bg-[#131215] border @error('shipping_street') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('shipping_street') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>

                                <!-- Row 5: Postal Code -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Postal code</label>
                                    <input type="text" name="billing_postal_code" id="billing_postal_code" value="{{ old('billing_postal_code', $application->billing_postal_code) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('billing_postal_code') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Shipping Postal Code</label>
                                    <input type="text" name="shipping_postal_code" id="shipping_postal_code" value="{{ old('shipping_postal_code', $application->shipping_postal_code) }}" class="bg-[#131215] border border-white/5 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('shipping_postal_code') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Copy Address Checkbox -->
                            <div class="mt-10 flex items-center gap-2">
                                <input type="checkbox" name="same_as_billing" id="same_as_billing" class="rounded-lg border-white/10 bg-[#131215] accent-[#ff014f] cursor-pointer" {{ old('same_as_billing', $application->same_as_billing) ? 'checked' : '' }}>
                                <label for="same_as_billing" class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] cursor-pointer hover:text-white transition-colors">Copy Billing Address to Shipping Address</label>
                            </div>

                            <!-- JS to handle copy -->
                            <script>
                                document.getElementById('same_as_billing').addEventListener('change', function() {
                                    if(this.checked) {
                                        document.getElementById('shipping_country').value = document.getElementById('billing_country').value;
                                        document.getElementById('shipping_state').value = document.getElementById('billing_state').value;
                                        document.getElementById('shipping_city').value = document.getElementById('billing_city').value;
                                        document.getElementById('shipping_street').value = document.getElementById('billing_street').value;
                                        document.getElementById('shipping_postal_code').value = document.getElementById('billing_postal_code').value;
                                    }
                                });
                            </script>
                        </div>

                        <!-- Section 2 -->
                        <div class="space-y-12">
                            <h3 class="bg-[#ff014f]/10 text-[#ff014f] font-black uppercase text-xs tracking-widest px-4 py-2 rounded-lg inline-block">SECTION 2 - Company Contacts</h3>
                            
                            <div class="p-8 bg-white/[0.02] border border-white/5 rounded-3xl">
                                <p class="text-sm text-gray-400 font-medium leading-relaxed mb-10">
                                    If your agency is fully- or partially-owned by one or more people, please enter their details here as owners, partners or shareholders (except where your organization is a legal entity whose shares are listed on a security exchange or are regularly traded in an 'over-the-counter' market).<br/><br/>
                                    Enter the names and titles for the directors or officers of a corporation, and the details of the managers of the agency.<br/><br/>
                                    Select at least one authorised signatory, and choose the Financial Assessment contact and Portal Administrator.
                                </p>

                                <div class="overflow-x-auto -mx-4 sm:mx-0">
                                    <table class="w-full text-left border-collapse min-w-[800px]" id="contacts-table">
                                        <thead>
                                            <tr class="border-b border-white/10 text-[#ff014f]">
                                                <th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest">First Name</th>
                                                <th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest">Last Name</th>
                                                <th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest">Business E-mail</th>
                                                <th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-center w-20">Owner</th>
                                                <th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-center w-20">Manager</th>
                                                <th class="py-4 px-4 text-[10px] font-black uppercase tracking-widest text-center w-28">Auth. Signatory</th>
                                                <th class="py-4 px-4 w-12"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="contacts-body">
                                            @php 
                                                $contacts = old('contacts', $application->contacts ?? [['first_name' => '', 'last_name' => '', 'email' => '', 'owner' => false, 'manager' => false, 'signatory' => false]]); 
                                            @endphp
                                            @foreach($contacts as $index => $contact)
                                            <tr class="contact-row border-b border-white/5 transition-colors hover:bg-white/[0.02]">
                                                <td class="py-4 px-4">
                                                    <input type="text" name="contacts[{{ $index }}][first_name]" value="{{ $contact['first_name'] ?? '' }}" class="bg-[#0f0f15] border border-white/5 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-[#ff014f] w-full transition-all">
                                                </td>
                                                <td class="py-4 px-4">
                                                    <input type="text" name="contacts[{{ $index }}][last_name]" value="{{ $contact['last_name'] ?? '' }}" class="bg-[#0f0f15] border border-white/5 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-[#ff014f] w-full transition-all">
                                                </td>
                                                <td class="py-4 px-4">
                                                    <input type="email" name="contacts[{{ $index }}][email]" value="{{ $contact['email'] ?? '' }}" class="bg-[#0f0f15] border border-white/5 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-[#ff014f] w-full transition-all">
                                                </td>
                                                <td class="py-4 px-4 text-center">
                                                    <input type="checkbox" name="contacts[{{ $index }}][owner]" {{ ($contact['owner'] ?? false) ? 'checked' : '' }} class="accent-[#ff014f] w-5 h-5 cursor-pointer">
                                                </td>
                                                <td class="py-4 px-4 text-center">
                                                    <input type="checkbox" name="contacts[{{ $index }}][manager]" {{ ($contact['manager'] ?? false) ? 'checked' : '' }} class="accent-[#ff014f] w-5 h-5 cursor-pointer">
                                                </td>
                                                <td class="py-4 px-4 text-center">
                                                    <input type="checkbox" name="contacts[{{ $index }}][signatory]" {{ ($contact['signatory'] ?? false) ? 'checked' : '' }} class="accent-[#ff014f] w-5 h-5 cursor-pointer">
                                                </td>
                                                <td class="py-4 px-4">
                                                    <button type="button" onclick="removeRow(this)" class="text-gray-600 hover:text-rose-500 p-2 transition-all hover:bg-rose-500/10 rounded-lg">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                <button type="button" onclick="addRow()" class="mt-8 inline-flex items-center gap-3 px-6 py-3 bg-white/5 border border-white/10 rounded-2xl text-[10px] font-black text-white uppercase tracking-[0.2em] hover:bg-[#ff014f] hover:border-[#ff014f] transition-all group shadow-xl">
                                    <svg class="w-4 h-4 text-[#ff014f] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                                    Add New Person
                                </button>
                            </div>

                            <div class="p-8 bg-zinc-950/20 border border-white/5 rounded-3xl space-y-10">
                                <label class="text-sm font-bold text-gray-300 leading-relaxed block max-w-5xl">
                                    <span class="text-[#ff014f] font-black mr-3 uppercase text-[10px] tracking-widest leading-none bg-[#ff014f]/10 px-2 py-1 rounded">Important disclosure</span>
                                    Have you, or any person who is a director of, or who holds a material financial interest or a position of management in the Applicant currently or previously been involved in any fiduciary breach or crime, or subject to bankruptcy proceedings, or been a director of or had a financial interest or held a position of management in an Agent which has been removed from the Agency List or is currently subject to review or default action by Turivanta for non-compliance with the conditions of its Accreditation?
                                </label>
                                
                                <div class="flex items-center gap-8 pl-1">
                                    <label class="flex items-center gap-4 cursor-pointer group">
                                        <input type="radio" name="fiduciary_breach" value="yes" id="breach_yes" class="sr-only peer" {{ old('fiduciary_breach', $application->fiduciary_breach ? 'yes' : 'no') == 'yes' ? 'checked' : '' }}>
                                        <div class="w-6 h-6 rounded-full border-2 border-white/10 flex items-center justify-center peer-checked:border-[#ff014f] peer-checked:bg-[#ff014f] transition-all group-hover:border-white/20">
                                            <div class="w-2 h-2 rounded-full bg-white opacity-0 peer-checked:opacity-100 transition-all"></div>
                                        </div>
                                        <span class="text-[10px] font-black uppercase text-gray-500 tracking-widest peer-checked:text-white transition-colors">Yes, I have been involved</span>
                                    </label>

                                    <label class="flex items-center gap-4 cursor-pointer group">
                                        <input type="radio" name="fiduciary_breach" value="no" id="breach_no" class="sr-only peer" {{ old('fiduciary_breach', $application->fiduciary_breach ? 'yes' : 'no') == 'no' ? 'checked' : '' }}>
                                        <div class="w-6 h-6 rounded-full border-2 border-white/10 flex items-center justify-center peer-checked:border-[#ff014f] peer-checked:bg-[#ff014f] transition-all group-hover:border-white/20">
                                            <div class="w-2 h-2 rounded-full bg-white opacity-0 peer-checked:opacity-100 transition-all"></div>
                                        </div>
                                        <span class="text-[10px] font-black uppercase text-gray-500 tracking-widest peer-checked:text-white transition-colors">No, never involved</span>
                                    </label>
                                </div>

                                <div id="breach_details_container" class="space-y-4 animate-fadeIn transition-all {{ old('fiduciary_breach', $application->fiduciary_breach) == 'yes' ? '' : 'hidden' }}">
                                    <label class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1 flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#ff014f]"></span>
                                        Please provide full details below (including agency name, location, relationship, dates, and TAX ID)
                                    </label>
                                    <textarea name="breach_details" class="w-full bg-[#0f0f15] border border-white/5 rounded-3xl p-6 text-sm text-white focus:outline-none focus:border-[#ff014f] min-h-[180px] placeholder-gray-700 transition-all" placeholder="Enter all pertinent details here...">{{ old('breach_details', $application->breach_details) }}</textarea>
                                    @error('breach_details') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <script>
                            function addRow() {
                                const body = document.getElementById('contacts-body');
                                const index = body.children.length;
                                const row = document.createElement('tr');
                                row.className = 'contact-row border-b border-white/5 transition-colors hover:bg-white/[0.02]';
                                row.innerHTML = `
                                    <td class="py-4 px-4">
                                        <input type="text" name="contacts[${index}][first_name]" class="bg-[#0f0f15] border border-white/5 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-[#ff014f] w-full transition-all">
                                    </td>
                                    <td class="py-4 px-4">
                                        <input type="text" name="contacts[${index}][last_name]" class="bg-[#0f0f15] border border-white/5 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-[#ff014f] w-full transition-all">
                                    </td>
                                    <td class="py-4 px-4">
                                        <input type="email" name="contacts[${index}][email]" class="bg-[#0f0f15] border border-white/5 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-[#ff014f] w-full transition-all">
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <input type="checkbox" name="contacts[${index}][owner]" class="accent-[#ff014f] w-5 h-5 cursor-pointer">
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <input type="checkbox" name="contacts[${index}][manager]" class="accent-[#ff014f] w-5 h-5 cursor-pointer">
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <input type="checkbox" name="contacts[${index}][signatory]" class="accent-[#ff014f] w-5 h-5 cursor-pointer">
                                    </td>
                                    <td class="py-4 px-4">
                                        <button type="button" onclick="removeRow(this)" class="text-gray-600 hover:text-rose-500 p-2 transition-all hover:bg-rose-500/10 rounded-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </td>
                                `;
                                body.appendChild(row);
                            }

                            function removeRow(btn) {
                                if (document.querySelectorAll('.contact-row').length > 1) {
                                    btn.closest('tr').remove();
                                } else {
                                    alert('At least one contact is required.');
                                }
                            }

                            document.getElementById('breach_yes').addEventListener('change', function() {
                                document.getElementById('breach_details_container').classList.remove('hidden');
                            });
                            document.getElementById('breach_no').addEventListener('change', function() {
                                document.getElementById('breach_details_container').classList.add('hidden');
                            });
                        </script>

                        <!-- Section 3 -->
                        <div class="space-y-8">
                            <h3 class="bg-[#ff014f]/10 text-[#ff014f] font-black uppercase text-xs tracking-widest px-4 py-2 rounded-lg inline-block">SECTION 3 - Other Information</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex flex-col gap-1">
                                        <div class="flex items-center gap-1">Date of Commencement of business <span class="text-[#ff014f]">*</span></div>
                                        <span class="text-[9px] lowercase italic font-bold text-gray-600 tracking-normal">(Should be minimum 4 Years Old as on date)</span>
                                    </label>
                                    <input type="date" name="commencement_date" value="{{ old('commencement_date', ($application->commencement_date ? $application->commencement_date->format('Y-m-d') : '')) }}" class="bg-[#131215] border @error('commencement_date') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] [color-scheme:dark]">
                                    @error('commencement_date') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Trade registration Number of the business <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="text" name="trade_registration_no" value="{{ old('trade_registration_no', $application->trade_registration_no) }}" class="bg-[#131215] border @error('trade_registration_no') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('trade_registration_no') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Date Registration was Granted <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="date" name="registration_granted_date" value="{{ old('registration_granted_date', ($application->registration_granted_date ? $application->registration_granted_date->format('Y-m-d') : '')) }}" class="bg-[#131215] border @error('registration_granted_date') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f] [color-scheme:dark]">
                                    @error('registration_granted_date') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        Is your business an IATA Registered? <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <select name="iata_registered" id="iata_registered" class="bg-[#131215] border @error('iata_registered') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                        <option value="">Select Option</option>
                                <option value="yes" {{ old('iata_registered', $application->iata_registered ? 'yes' : 'no') == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ old('iata_registered', $application->iata_registered ? 'yes' : 'no') == 'no' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('iata_registered') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                <div id="iata_no_container" class="flex flex-col gap-2 {{ old('iata_registered', $application->iata_registered) == 'yes' ? '' : 'hidden' }}">
                                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex items-center gap-1">
                                        IATA No. <span class="text-[#ff014f]">*</span>
                                    </label>
                                    <input type="text" name="iata_no" id="iata_no" value="{{ old('iata_no', $application->iata_no) }}" class="bg-[#131215] border @error('iata_no') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#ff014f]">
                                    @error('iata_no') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <script>
                                document.getElementById('iata_registered').addEventListener('change', function() {
                                    const container = document.getElementById('iata_no_container');
                                    if (this.value === 'yes') {
                                        container.classList.remove('hidden');
                                    } else {
                                        container.classList.add('hidden');
                                        document.getElementById('iata_no').value = '';
                                    }
                                });
                            </script>
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
                                    <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Partnership Deed / JV / LLP Agreement</label>
                                        <input type="file" name="partnership_deed" class="bg-[#131215] border @error('partnership_deed') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('partnership_deed') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">CA Letter (Entity Details)</label>
                                        <input type="file" name="ca_letter_part" class="bg-[#131215] border @error('ca_letter_part') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('ca_letter_part') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex flex-col gap-2 md:col-span-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Signed Application Summary Form</label>
                                        <input type="file" name="summary_form" class="bg-[#131215] border @error('summary_form') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('summary_form') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>

                                @elseif(in_array($user->legal_status, ['Co-operative', 'Association', 'State Owned Enterprise']))
                                    <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Registration Certificate / Government Decree</label>
                                        <input type="file" name="registration_cert" class="bg-[#131215] border @error('registration_cert') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('registration_cert') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Bye-laws / Constitution / Charter</label>
                                        <input type="file" name="bye_laws" class="bg-[#131215] border @error('bye_laws') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('bye_laws') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>

                                @elseif($user->legal_status == 'Servicing Professionals')
                                    <div class="flex flex-col gap-2 md:col-span-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Experience Certificate (10+ Years)</label>
                                        <input type="file" name="exp_cert" class="bg-[#131215] border @error('exp_cert') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('exp_cert') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>

                                @elseif($user->legal_status == 'Students')
                                    <div class="flex flex-col gap-2 md:col-span-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Letter of Recommendation (HOD/Principal)</label>
                                        <input type="file" name="endorsement_letter" class="bg-[#131215] border @error('endorsement_letter') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('endorsement_letter') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>

                                @elseif($user->legal_status == 'Trust Company')
                                   <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Incorporation Certificate</label>
                                        <input type="file" name="trade_license" class="bg-[#131215] border @error('trade_license') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('trade_license') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Trust Deed / Registration Document</label>
                                        <input type="file" name="trust_deed" class="bg-[#131215] border @error('trust_deed') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('trust_deed') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>

                                @else
                                    <div class="flex flex-col gap-2 md:col-span-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Trade License / Incorporation Certificate</label>
                                        <input type="file" name="trade_license" class="bg-[#131215] border @error('trade_license') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('trade_license') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                    </div>
                                @endif

                                <!-- Global Mandatory: Recommendation Letter -->
                                <div class="flex flex-col gap-2 md:col-span-2">
                                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Recommendation Letter (from Turivanta Member)</label>
                                    <input type="file" name="recommendation_letter" class="bg-[#131215] border @error('recommendation_letter') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                    @error('recommendation_letter') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
                                </div>
                                
                                @if($application->iata_registered)
                                    <div class="flex flex-col gap-2 md:col-span-2">
                                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">IATA Registration Certificate</label>
                                        <input type="file" name="iata_cert" class="bg-[#131215] border @error('iata_cert') border-[#ff014f]/50 @else border-white/5 @enderror rounded-2xl p-4 text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-[#ff014f] file:text-white hover:file:bg-[#e11d48] cursor-pointer">
                                        @error('iata_cert') <span class="text-[#ff014f] text-[10px] font-bold mt-1 ml-1 uppercase tracking-wider">{{ $message }}</span> @enderror
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
@push('scripts')
<script>
    const profileForms = ['#step2-form', '#step3-form', '#step4-form'];
    profileForms.forEach(formId => {
        const form = document.querySelector(formId);
        if (form) {
            form.addEventListener('submit', function(e) {
                // If the "back" button was clicked, don't disable (though it uses formaction)
                const submitter = e.submitter;
                if (submitter && submitter.value === 'back') return;

                const btn = form.querySelector('button[type="submit"]:not([value="back"])');
                if (btn) {
                    btn.disabled = true;
                    const originalText = btn.innerText;
                    btn.innerHTML = `
                        <svg class="animate-spin h-5 w-5 text-white mr-3 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing...
                    `;
                }
            });
        }
    });
</script>
@endpush
@endsection

