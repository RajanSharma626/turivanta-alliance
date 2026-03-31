@extends('layouts.admin')

@section('title', 'Manage Subscription - Turivanta Admin')
@section('page_title', 'Subscription Manager')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Back Button -->
    <a href="{{ route('admin.members') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-white transition-all mb-8 group">
        <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        <span class="text-xs font-black uppercase tracking-widest">Back to Members</span>
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- User Info & History -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Member Overview -->
            <div class="glass-panel p-8 rounded-[40px] border border-white/5 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-5">
                    <svg class="w-32 h-32 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                    </svg>
                </div>

                <div class="flex items-start gap-6 mb-10 relative z-10">
                    <div class="w-20 h-20 rounded-[2rem] bg-gradient-to-tr from-[#ff014f] to-rose-400 flex items-center justify-center text-white font-black text-3xl shadow-2xl">
                        {{ substr($member->name, 0, 1) }}
                    </div>
                    <div>
                        <h2 class="text-3xl font-black text-white tracking-tight leading-none mb-2">{{ $member->name }}</h2>
                        <div class="flex items-center gap-3">
                            <span class="text-[10px] font-black text-[#ff014f] uppercase tracking-widest bg-[#ff014f]/10 px-3 py-1 rounded-lg border border-[#ff014f]/20">GTIN: {{ $member->membership_id }}</span>
                            <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest">{{ $member->business_type ?? 'Individual' }}</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10">
                    <div class="space-y-1">
                        <p class="text-[10px] text-gray-500 font-black uppercase tracking-widest">ACTIVE PLAN</p>
                        <p class="text-white font-bold text-lg">
                            @php $current = $member->currentSubscription; @endphp
                            {{ $current ? $current->plan_name : 'No Active Plan' }}
                        </p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-[10px] text-gray-500 font-black uppercase tracking-widest">START DATE</p>
                        <p class="text-white font-bold text-lg italic">
                            {{ $current ? $current->starts_at->format('M d, Y') : '-' }}
                        </p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-[10px] text-gray-500 font-black uppercase tracking-widest">EXPIRY DATE</p>
                        <p class="text-white font-bold text-lg italic underline decoration-[#ff014f] decoration-2 underline-offset-4">
                            {{ $current ? $current->expires_at->format('M d, Y') : 'N/A' }}
                        </p>
                    </div>
                    <div class="space-y-1 text-right">
                        <p class="text-[10px] text-gray-500 font-black uppercase tracking-widest text-[#ff014f]">STATUS</p>
                        <span class="inline-block mt-1 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest {{ $current && $current->status === 'active' ? 'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20' : 'bg-gray-500/10 text-gray-500 border border-white/5' }}">
                            {{ $current ? ucfirst($current->status) : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Subscription History -->
            <div class="glass-panel p-8 rounded-[40px] border border-white/5 relative overflow-hidden">
                <div class="flex items-center justify-between mb-8">
                    <h4 class="text-white font-black uppercase tracking-[0.15em] text-sm italic">Subscription History</h4>
                    <span class="px-3 py-1 bg-white/5 rounded-lg text-[10px] font-bold text-gray-500">{{ $member->subscriptionHistories->count() }} Records</span>
                </div>

                <div class="relative">
                    @forelse($member->subscriptionHistories as $history)
                        <div class="flex items-start gap-6 pb-8 last:pb-0 border-l border-white/5 ml-4 relative">
                            <div class="absolute -left-2 top-0 w-4 h-4 rounded-full bg-[#111115] border-2 border-white/10 flex items-center justify-center">
                                <div class="w-1.5 h-1.5 rounded-full bg-[#ff014f]"></div>
                            </div>
                            <div class="flex-1 pl-4">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm font-bold text-white">{{ $history->plan_name }}</span>
                                        <span class="px-2 py-0.5 bg-white/5 rounded text-[8px] font-black uppercase tracking-widest text-gray-400 border border-white/5">{{ $history->action }}</span>
                                    </div>
                                    <span class="text-[10px] text-gray-500 font-bold">{{ $history->created_at->format('M d, Y - H:i') }}</span>
                                </div>
                                @if($history->notes)
                                    <p class="text-xs text-gray-500 font-medium leading-relaxed italic bg-white/[0.02] p-3 rounded-xl border border-white/[0.03]">"{{ $history->notes }}"</p>
                                @endif
                                <div class="mt-3 flex items-center gap-2">
                                    <span class="text-[9px] text-gray-600 font-black uppercase tracking-widest">Handled By:</span>
                                    <span class="text-[10px] text-gray-400 font-bold italic">{{ $history->admin->name ?? 'System' }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="py-12 text-center">
                            <p class="text-gray-600 text-xs font-bold uppercase tracking-widest">No historical records found for this account.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Manage Subscription Form -->
        <div class="lg:col-span-1">
            <div class="glass-panel p-8 rounded-[40px] border border-white/5 sticky top-32">
                <h4 class="text-white font-black uppercase tracking-[0.15em] text-sm italic mb-8">Manage / Renew</h4>
                
                <form action="{{ route('admin.members.subscription.update', $member) }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Plan Selection -->
                    <div class="space-y-4">
                        <div>
                            <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest ml-1 mb-2 block">Choose Plan Name</label>
                            <select name="plan_name" id="plan_select" required onchange="handlePlanChange(this.value)"
                                class="w-full bg-[#0a0a0f] border border-white/10 rounded-2xl px-5 py-3.5 text-sm text-white focus:border-[#ff014f] transition-all appearance-none">
                                <option value="" disabled selected>Select a membership plan...</option>
                                <option value="Students" data-price="300" {{ old('plan_name', $current->plan_name ?? '') === 'Students' ? 'selected' : '' }}>Students</option>
                                <option value="Business & Professionals" data-price="500" {{ old('plan_name', $current->plan_name ?? '') === 'Business & Professionals' ? 'selected' : '' }}>Business & Professionals</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="md:col-span-2">
                                <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest ml-1 mb-2 block">Price</label>
                                <input type="number" name="price" id="plan_price" required value="{{ old('price', $current->price ?? '') }}" 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3.5 text-sm text-white focus:border-[#ff014f] transition-all">
                            </div>
                            <div>
                                <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest ml-1 mb-2 block">Currency</label>
                                <select name="currency" id="plan_currency" class="w-full bg-[#0a0a0f] border border-white/10 rounded-2xl px-5 py-3.5 text-sm text-white focus:border-[#ff014f] transition-all appearance-none">
                                    <option value="INR" {{ old('currency', $current->currency ?? 'INR') === 'INR' ? 'selected' : '' }}>INR (₹)</option>
                                    <option value="USD" {{ old('currency', $current->currency ?? '') === 'USD' ? 'selected' : '' }}>USD ($)</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest ml-1 mb-2 block">START DATE</label>
                                <input type="date" name="starts_at" id="starts_at" required 
                                    value="{{ old('starts_at', $current ? $current->starts_at->format('Y-m-d') : now()->format('Y-m-d')) }}" 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3.5 text-sm text-white focus:border-[#ff014f] transition-all"
                                    onchange="updateExpiryDate(this.value)">
                            </div>
                            <div>
                                <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest ml-1 mb-2 block">EXPY DATE</label>
                                <input type="date" name="expires_at" id="expires_at" required 
                                    value="{{ old('expires_at', $current ? $current->expires_at->format('Y-m-d') : now()->addYear()->subDay()->format('Y-m-d')) }}" 
                                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3.5 text-sm text-white focus:border-[#ff014f] transition-all">
                            </div>
                        </div>

                        <div>
                            <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest ml-1 mb-2 block">Set Status</label>
                            <select name="status" class="w-full bg-[#0a0a0f] border border-white/10 rounded-2xl px-5 py-3.5 text-sm text-white focus:border-[#ff014f] transition-all appearance-none">
                                <option value="active" {{ old('status', $current->status ?? '') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="pending" {{ old('status', $current->status ?? '') === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="expired" {{ old('status', $current->status ?? '') === 'expired' ? 'selected' : '' }}>Expired</option>
                                <option value="cancelled" {{ old('status', $current->status ?? '') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-[10px] text-gray-500 font-black uppercase tracking-widest ml-1 mb-2 block">Notes / Reason</label>
                            <textarea name="notes" placeholder="e.g. Manual payment received via UPI" rows="3"
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3.5 text-sm text-white focus:border-[#ff014f] transition-all resize-none"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-5 bg-[#ff014f] text-white font-black text-xs uppercase tracking-widest rounded-2xl shadow-[0_10px_30px_rgba(255,1,79,0.3)] hover:shadow-[0_15px_40px_rgba(255,1,79,0.4)] hover:-translate-y-1 transition-all">
                        Update Subscription
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function handlePlanChange(val) {
        const select = document.getElementById('plan_select');
        const priceInput = document.getElementById('plan_price');
        
        // Auto-fill price from data attribute
        const selectedOption = select.options[select.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        if(price) {
            priceInput.value = price;
        }

        // Auto set dates if not already set
        const startInput = document.getElementById('starts_at');
        if(!startInput.value) {
            const now = new Date().toISOString().split('T')[0];
            startInput.value = now;
            updateExpiryDate(now);
        }
    }

    function updateExpiryDate(startDateString) {
        if (!startDateString) return;
        
        const start = new Date(startDateString);
        const end = new Date(start);
        
        // Add 1 year and subtract 1 day
        end.setFullYear(start.getFullYear() + 1);
        end.setDate(end.getDate() - 1);
        
        // Format as YYYY-MM-DD
        const y = end.getFullYear();
        const m = String(end.getMonth() + 1).padStart(2, '0');
        const d = String(end.getDate()).padStart(2, '0');
        
        document.getElementById('expires_at').value = `${y}-${m}-${d}`;
    }
</script>
@endsection
