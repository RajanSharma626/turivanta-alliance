@extends('layouts.admin')

@section('title', 'Review Application - Turivanta Admin')
@section('page_title', 'Alliance Membership Audit')

@section('content')
<div class="max-w-7xl mx-auto space-y-10">
    <!-- Section 1: Audit Form Control -->
    <div class="glass-panel p-10 rounded-[40px] border border-white/5 relative overflow-hidden group">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#ff014f]/5 rounded-full blur-[100px]"></div>
        
        <div class="flex flex-col md:flex-row items-center justify-between gap-8 relative z-10">
            <div class="flex items-center gap-8">
                <div class="w-24 h-24 bg-gradient-to-tr from-[#ff014f] to-[#e11d48] rounded-[30px] flex items-center justify-center font-black text-3xl italic text-white shadow-2xl">
                    {{ substr($application->legal_name ?? $application->user->name, 0, 1) }}
                </div>
                <div class="max-w-xl">
                    <h3 class="text-white font-black heading-font text-3xl tracking-tighter uppercase italic mb-1">{{ $application->legal_name ?? 'Incomplete Application' }}</h3>
                    <p class="text-gray-500 font-bold uppercase tracking-[0.3em] text-[10px] mb-4">Application GTIN: {{ $application->application_no ?? 'DRAFT' }}</p>
                    <div class="flex flex-wrap items-center gap-3">
                        @php
                            $displayStatus = $application->application_no ? $application->status : 'draft';
                            $statusColors = match($displayStatus) {
                                'approved' => 'text-emerald-500 bg-emerald-500/10 border-emerald-500/20',
                                'rejected' => 'text-rose-500 bg-rose-500/10 border-rose-500/20',
                                'draft' => 'text-gray-500 bg-gray-500/10 border-gray-500/20',
                                default => 'text-yellow-500 bg-yellow-500/10 border-yellow-500/20',
                            };
                        @endphp
                        <span class="px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-[0.2em] border {{ $statusColors }} italic">
                           Current Status: {{ $displayStatus }}
                        </span>

                        @if($application->status === 'rejected' && $application->rejection_reason)
                             <span class="px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-[0.2em] border border-[#ff014f]/20 bg-[#ff014f]/5 text-[#ff014f] italic">
                                Reason logged
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-3 min-w-[240px]">
                @if($application->application_no)
                    <div class="w-full">
                        <button type="button" 
                                onclick="openActionModal('approved')"
                                class="w-full py-4 bg-emerald-500 text-black font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-emerald-400 transition-all shadow-lg shadow-emerald-500/20 active:scale-95 cursor-pointer">
                            Approve Membership
                        </button>
                    </div>
                    <div class="w-full">
                        <button type="button" 
                                onclick="openActionModal('rejected')"
                                class="w-full py-4 bg-white/5 text-rose-500 border border-rose-500/20 font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-rose-500/10 transition-all active:scale-95 cursor-pointer">
                            Decline Application
                        </button>
                    </div>

                    <!-- Action Forms (Hidden, triggered by modal) -->
                    <form id="approve-form" action="{{ route('admin.applications.status', $application) }}" method="POST" class="hidden">
                        @csrf
                        <input type="hidden" name="status" value="approved">
                    </form>
                    <form id="reject-form" action="{{ route('admin.applications.status', $application) }}" method="POST" class="hidden">
                        @csrf
                        <input type="hidden" name="status" value="rejected">
                        <input type="hidden" name="rejection_reason" id="rejection_reason_field">
                    </form>
                @else
                    <div class="p-6 rounded-3xl bg-white/5 border border-white/10 text-center">
                        <p class="text-gray-500 text-[10px] font-black uppercase tracking-widest italic leading-relaxed">Identity Audit Restricted:<br>Submission Incomplete</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
        <!-- Main Application Form Area -->
        <div class="lg:col-span-3 space-y-12">
            
            <!-- STEP 2 DATA: Basic Information -->
            <div class="glass-panel p-8 sm:p-10 rounded-[35px] border border-white/5 relative overflow-hidden">
                <div class="flex items-center gap-4 mb-8">
                    <span class="w-8 h-8 rounded-xl bg-[#ff014f] text-white flex items-center justify-center font-black italic text-xs">A</span>
                    <h3 class="text-white font-black heading-font text-lg tracking-tight uppercase italic grow">Basic Information</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @php $basicInfo = [
                        'Country Concerned' => $application->user->country_concerned,
                        'Legal Status' => $application->user->legal_status,
                        'First Name' => $application->user->first_name,
                        'Last Name' => $application->user->last_name,
                        'Gender' => ucfirst($application->user->gender),
                        'Date of Birth' => $application->user->dob,
                        'Contact No.' => $application->user->contact_no,
                        'Email' => $application->user->email,
                        'Business Type' => $application->user->business_type
                    ]; @endphp

                    @foreach($basicInfo as $label => $value)
                    <div class="flex flex-col gap-2.5">
                        <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">{{ $label }}</label>
                        <div class="bg-white/[0.02] border border-white/5 rounded-2xl px-6 py-4 text-white/50 text-sm font-bold italic">
                            {{ $value ?? 'N/A' }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- STEP 3 DATA: SECTION 1 -->
            <div class="glass-panel p-8 sm:p-10 rounded-[35px] border border-white/5 relative overflow-hidden">
                <div class="flex items-center gap-4 mb-8">
                    <span class="w-8 h-8 rounded-xl bg-[#ff014f] text-white flex items-center justify-center font-black italic text-xs">1</span>
                    <h3 class="text-white font-black heading-font text-lg tracking-tight uppercase italic GROW">SECTION 1 - Identification of Business</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                    @php $section1 = [
                        'Legal Name' => $application->legal_name,
                        'Trade Name' => $application->trade_name,
                        'Office Phone' => $application->office_phone,
                        'Office Email' => $application->office_email,
                        'Mobile' => $application->mobile,
                        'Website' => $application->website,
                        'Fax' => $application->fax,
                        'Service TAX' => $application->service_tax
                    ]; @endphp

                    @foreach($section1 as $label => $value)
                    <div class="flex flex-col gap-2.5">
                        <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">{{ $label }}</label>
                        <div class="bg-white/[0.02] border border-white/5 rounded-2xl px-6 py-4 text-white/50 text-sm font-bold italic">
                            {{ $value ?? 'N/A' }}
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Addresses -->
                <div class="space-y-10">
                    <h4 class="text-white font-bold text-sm mb-4">Full Address of the Office for which Application for Approval is made</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="space-y-6">
                            @php $billing = [
                                'Country' => $application->billing_country,
                                'State/Province' => $application->billing_state,
                                'City' => $application->billing_city,
                                'Street Name & Number' => $application->billing_street,
                                'Postal code' => $application->billing_postal_code
                            ]; @endphp
                            @foreach($billing as $l => $v)
                                <div class="flex items-center justify-between py-3 border-b border-white/5">
                                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">{{ $l }}</span>
                                    <span class="text-white font-bold text-[11px]">{{ $v ?? '-' }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="space-y-6">
                            @php $shipping = [
                                'Shipping Country' => $application->shipping_country,
                                'Shipping State' => $application->shipping_state,
                                'Shipping City' => $application->shipping_city,
                                'Shipping Street' => $application->shipping_street,
                                'Shipping Postal Code' => $application->shipping_postal_code
                            ]; @endphp
                            @foreach($shipping as $l => $v)
                                <div class="flex items-center justify-between py-3 border-b border-white/5">
                                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">{{ $l }}</span>
                                    <span class="text-white font-bold text-[11px]">{{ $v ?? '-' }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 3 DATA: SECTION 2 -->
            <div class="glass-panel p-8 sm:p-10 rounded-[35px] border border-white/5 relative overflow-hidden">
                <div class="flex items-center gap-4 mb-8">
                    <span class="w-8 h-8 rounded-xl bg-[#ff014f] text-white flex items-center justify-center font-black italic text-xs">2</span>
                    <h3 class="text-white font-black heading-font text-lg tracking-tight uppercase italic grow">SECTION 2 - Company Contacts</h3>
                </div>

                <div class="overflow-x-auto w-full mb-10">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="text-gray-500 text-[10px] font-black uppercase tracking-widest">
                                <th class="pb-2">First Name</th>
                                <th class="pb-2">Last Name</th>
                                <th class="pb-2">Business E-mail</th>
                                <th class="pb-2 text-center">Owner</th>
                                <th class="pb-2 text-center">Manager</th>
                                <th class="pb-2 text-center">Auth. Signatory</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $contacts = is_array($application->contacts) ? $application->contacts : json_decode($application->contacts, true) ?? []; @endphp
                            @forelse($contacts as $contact)
                            <tr class="bg-white/[0.02] border border-white/5">
                                <td class="py-4 px-4 rounded-l-2xl text-white font-bold text-xs italic">{{ $contact['first_name'] ?? '-' }}</td>
                                <td class="py-4 px-4 text-white font-bold text-xs italic">{{ $contact['last_name'] ?? '-' }}</td>
                                <td class="py-4 px-4 text-gray-400 text-xs lowercase">{{ $contact['email'] ?? '-' }}</td>
                                <td class="py-4 px-4 text-center">
                                    <div class="w-5 h-5 mx-auto rounded-md {{ isset($contact['owner']) && $contact['owner'] ? 'bg-[#ff014f]' : 'bg-white/5' }} flex items-center justify-center">
                                        @if(isset($contact['owner']) && $contact['owner']) <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg> @endif
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="w-5 h-5 mx-auto rounded-md {{ isset($contact['manager']) && $contact['manager'] ? 'bg-[#ff014f]' : 'bg-white/5' }} flex items-center justify-center">
                                        @if(isset($contact['manager']) && $contact['manager']) <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg> @endif
                                    </div>
                                </td>
                                <td class="py-4 px-4 rounded-r-2xl text-center">
                                    <div class="w-5 h-5 mx-auto rounded-md {{ isset($contact['signatory']) && $contact['signatory'] ? 'bg-[#ff014f]' : 'bg-white/5' }} flex items-center justify-center">
                                        @if(isset($contact['signatory']) && $contact['signatory']) <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg> @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="6" class="py-10 text-center text-gray-700 font-black uppercase text-[10px] italic">No contacts registered</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Breach Disclosure -->
                <div class="p-6 rounded-[2.5rem] bg-[#ff014f]/5 border border-[#ff014f]/10 mb-8">
                    <h4 class="text-white font-bold text-xs mb-4 uppercase tracking-widest flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        Important disclosure
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                        <div class="flex items-center justify-between py-2 border-b border-white/5">
                            <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest italic">Disclosure Status</span>
                            <span class="px-4 py-1 rounded-full text-[9px] font-black uppercase italic {{ $application->fiduciary_breach ? 'bg-rose-500/20 text-rose-500' : 'bg-emerald-500/20 text-emerald-500' }}">
                                {{ $application->fiduciary_breach ? 'FLAGGED (YES)' : 'CLEAN (NO)' }}
                            </span>
                        </div>
                        @if($application->fiduciary_breach)
                            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                                @foreach(['Full Name' => $application->breach_full_name, 'Concerned Company' => $application->breach_concerned_company, 'Relationship' => $application->breach_relationship, 'TAX ID' => $application->breach_tax_id] as $l => $v)
                                    <div class="p-4 bg-black/40 rounded-2xl border border-white/5">
                                        <p class="text-[8px] text-gray-500 uppercase font-black tracking-widest mb-1">{{ $l }}</p>
                                        <p class="text-white font-bold text-xs italic">{{ $v ?? '-' }}</p>
                                    </div>
                                @endforeach
                                <div class="md:col-span-2 p-4 bg-black/40 rounded-2xl border border-white/5">
                                    <p class="text-[8px] text-gray-500 uppercase font-black tracking-widest mb-1">Additional Pertinent Details</p>
                                    <p class="text-gray-400 font-medium text-xs leading-relaxed italic">{{ $application->breach_details ?? 'No details provided.' }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- STEP 3 DATA: SECTION 3 -->
            <div class="glass-panel p-8 sm:p-10 rounded-[35px] border border-white/5 relative overflow-hidden">
                <div class="flex items-center gap-4 mb-8">
                    <span class="w-8 h-8 rounded-xl bg-[#ff014f] text-white flex items-center justify-center font-black italic text-xs">3</span>
                    <h3 class="text-white font-black heading-font text-lg tracking-tight uppercase italic grow">SECTION 3 - Other Information</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @php $section3 = [
                        'Date of Commencement of business' => $application->commencement_date ? $application->commencement_date->format('M d, Y') : '-',
                        'Trade registration Number' => $application->trade_registration_no,
                        'Registrant' => $application->registrant,
                        'Date Registration was Granted' => $application->registration_granted_date ? $application->registration_granted_date->format('M d, Y') : '-',
                        'Is your business an IATA Registered?' => $application->iata_registered ? 'Yes' : 'No',
                        'IATA No.' => $application->iata_no ?? '(NOT APPLICABLE)',
                        'Tourism Board Registration' => $application->tourism_board_registered ? 'Registered' : 'No',
                        'Name of Tourism Board' => $application->tourism_board_name ?? '-',
                        'Registration Number' => $application->tourism_board_reg_no ?? '-'
                    ]; @endphp

                    @foreach($section3 as $label => $value)
                    <div class="flex flex-col gap-2.5">
                        <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">{{ $label }}</label>
                        <div class="bg-white/[0.02] border border-white/5 rounded-2xl px-6 py-4 text-white/50 text-sm font-bold italic">
                            {{ $value ?? 'N/A' }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
             <!-- Evidence Audit -->
            <div class="glass-panel p-8 rounded-[35px] border border-white/5">
                 <h4 class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-6">Submitted Evidence</h4>
                 @php
                    $docInfo = is_array($application->uploaded_documents) ? $application->uploaded_documents : json_decode($application->uploaded_documents, true) ?? [];
                 @endphp
                 <div class="space-y-4">
                    @forelse($docInfo as $key => $doc)
                        <div class="p-4 rounded-2xl bg-white/[0.02] border border-white/5 flex items-center justify-between group transition-all">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-[#ff014f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[9px] text-[#ff014f] font-black uppercase tracking-[0.2em] mb-0.5">{{ str_replace('_', ' ', $key) }}</p>
                                    <p class="text-[10px] text-white font-bold truncate max-w-[140px] italic">{{ $doc['name'] }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6">
                            <p class="text-[10px] text-gray-700 font-black uppercase italic">No digital proofs found</p>
                        </div>
                    @endforelse
                 </div>
            </div>

            <!-- Internal Audit Info -->
            <div class="p-8 rounded-[35px] border border-white/5 bg-[#ff014f]/5">
                 <h4 class="text-[10px] font-black text-[#ff014f] uppercase tracking-widest mb-6 italic">Audit Readiness</h4>
                 <div class="space-y-4">
                    <div class="flex items-center justify-between text-[10px] uppercase font-bold">
                        <span class="text-gray-500">IATA Verified</span>
                        <span class="{{ $application->iata_registered ? 'text-emerald-500' : 'text-gray-600' }}">{{ $application->iata_registered ? 'YES' : 'NO' }}</span>
                    </div>
                    <div class="flex items-center justify-between text-[10px] uppercase font-bold">
                        <span class="text-gray-500">Board Reg.</span>
                        <span class="{{ $application->tourism_board_registered ? 'text-emerald-500' : 'text-gray-600' }}">{{ $application->tourism_board_registered ? 'YES' : 'NO' }}</span>
                    </div>
                    <div class="flex items-center justify-between text-[10px] uppercase font-bold">
                        <span class="text-gray-500">Disclosure</span>
                        <span class="{{ !$application->fiduciary_breach ? 'text-emerald-500' : 'text-rose-500' }}">{{ !$application->fiduciary_breach ? 'CLEAN' : 'FLAGGED' }}</span>
                    </div>
                 </div>
            </div>

            @if($application->rejection_reason)
                <div class="p-8 rounded-[35px] border border-rose-500/20 bg-rose-500/5">
                     <h4 class="text-[10px] font-black text-rose-500 uppercase tracking-widest mb-4 italic">Logged Audit Feedback</h4>
                     <p class="text-[11px] text-gray-400 font-medium leading-relaxed italic border-l border-rose-500/30 pl-4 py-1">
                        "{{ $application->rejection_reason }}"
                     </p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div id="actionModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-6 bg-black/80 backdrop-blur-md">
    <div class="glass-panel max-w-lg w-full p-10 rounded-[40px] border border-white/10 shadow-2xl overflow-hidden relative group">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-[#ff014f]/5 rounded-full blur-[100px]"></div>
        
        <div class="relative z-10 text-center">
            <div id="modalIcon" class="w-16 h-16 rounded-[20px] mx-auto mb-6 flex items-center justify-center">
                <!-- Icon will be inserted here -->
            </div>
            
            <h3 id="modalTitle" class="text-white font-black heading-font text-2xl tracking-tighter uppercase italic mb-3">Confirm Action</h3>
            <p id="modalMessage" class="text-gray-500 text-xs font-bold uppercase tracking-widest leading-relaxed mb-6 max-w-sm mx-auto">Are you sure you want to proceed with this application action?</p>
            
            <!-- Rejection Reason Input -->
            <div id="rejectionArea" class="hidden mb-10 text-left space-y-3">
                <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Reason for Rejection <span class="text-rose-500">*</span></label>
                <textarea id="rejection_reason_input" 
                          class="w-full bg-[#131215] border border-white/10 rounded-2xl p-5 text-white text-xs font-bold italic focus:outline-none focus:border-rose-500/50 min-h-[140px] placeholder-gray-700 shadow-inner" 
                          placeholder="Please provide specific feedback for the applicant. This will be visible to the user."></textarea>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <button onclick="closeActionModal()" class="flex-1 py-4 bg-white/5 text-gray-400 font-bold uppercase text-[10px] tracking-widest rounded-2xl hover:bg-white/10 transition-all active:scale-95 border border-white/5 cursor-pointer">
                    Cancel
                </button>
                <button id="confirmBtn" onclick="confirmAction()" class="flex-1 py-4 font-black uppercase text-[10px] tracking-widest rounded-2xl transition-all active:scale-95 shadow-lg cursor-pointer">
                    Confirm Action
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let currentMode = '';

    function openActionModal(mode) {
        currentMode = mode;
        const modal = document.getElementById('actionModal');
        const title = document.getElementById('modalTitle');
        const message = document.getElementById('modalMessage');
        const icon = document.getElementById('modalIcon');
        const confirmBtn = document.getElementById('confirmBtn');
        const rejectionArea = document.getElementById('rejectionArea');

        if (mode === 'approved') {
            rejectionArea.classList.add('hidden');
            title.innerText = 'Approve Membership?';
            message.innerText = 'This will grant full access to the Turivanta Alliance ecosystem and notify the applicant.';
            icon.className = 'w-16 h-16 rounded-[20px] mx-auto mb-6 flex items-center justify-center bg-emerald-500/10 border border-emerald-500/20 text-emerald-500';
            icon.innerHTML = '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>';
            confirmBtn.className = 'flex-1 py-4 bg-emerald-500 text-black font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-emerald-400 transition-all active:scale-95 shadow-lg shadow-emerald-500/20 cursor-pointer';
            confirmBtn.innerText = 'Approve Now';
        } else {
            rejectionArea.classList.remove('hidden');
            title.innerText = 'Decline Application?';
            message.innerText = 'Membership rejection requires a logged reason for the applicant\'s correction reference.';
            icon.className = 'w-16 h-16 rounded-[20px] mx-auto mb-6 flex items-center justify-center bg-rose-500/10 border border-rose-500/20 text-rose-500';
            icon.innerHTML = '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>';
            confirmBtn.className = 'flex-1 py-4 bg-rose-500 text-white font-black uppercase text-[10px] tracking-widest rounded-2xl hover:bg-rose-600 transition-all active:scale-95 shadow-lg shadow-rose-500/20 cursor-pointer';
            confirmBtn.innerText = 'Confirm Decline';
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeActionModal() {
        const modal = document.getElementById('actionModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    function confirmAction() {
        if (currentMode === 'approved') {
            document.getElementById('approve-form').submit();
        } else {
            const reason = document.getElementById('rejection_reason_input').value;
            if (!reason || reason.trim() === '') {
                alert('Audit protocol requires a logged reason for application rejection.');
                return;
            }
            document.getElementById('rejection_reason_field').value = reason;
            document.getElementById('reject-form').submit();
        }
    }
</script>
@endsection
