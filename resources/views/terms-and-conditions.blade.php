@extends('layouts.app')

@section('title', 'Terms and Conditions - Turivanta Alliance')

@section('content')
<main class="flex-grow pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-6 lg:px-12">
        <div class="mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Terms & <span class="text-gray-400 font-light">Conditions</span></h1>
            <p class="text-gray-400 text-sm">Effective Date: {{ date('F j, Y') }}</p>
            <div class="w-20 h-1 bg-[#ff014f] mt-6 rounded-full"></div>
        </div>

        <div class="prose prose-invert max-w-none text-gray-300 space-y-8 leading-relaxed">
            <div class="bg-white/5 p-8 rounded-3xl border border-white/10 backdrop-blur-sm mb-12">
                <p class="text-xl font-bold text-white mb-4">Connecting Global Tourism Businesses with Trust, Visibility, and Growth.</p>
                <p class="text-lg">
                    Welcome to Turivanta Alliance (“Turivanta”, “we”, “our”, “us”). These Terms & Conditions govern your access to and use of our platform, services, and global tourism ecosystem.
                </p>
                <p class="mt-4 font-medium text-[#ff014f]">
                    By registering, accessing, or using Turivanta, you agree to be legally bound by these Terms.
                </p>
            </div>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">1.</span> Purpose of Turivanta Alliance
                </h2>
                <p>Turivanta Alliance is a global tourism platform and business ecosystem designed to connect:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Travel agencies</li>
                    <li>Hospitality providers</li>
                    <li>Destination service providers</li>
                    <li>Tourism professionals worldwide</li>
                </ul>
                <p>The platform facilitates networking, business visibility, collaboration, and growth.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">2.</span> Membership & Eligibility
                </h2>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Users must be 18 years or older</li>
                    <li>Businesses must comply with local laws and licensing requirements</li>
                    <li>Turivanta reserves the right to approve, reject, or terminate membership at its sole discretion</li>
                </ul>
                <p class="text-sm text-gray-400 italic">This aligns with industry practices where organizations retain control over participation and access.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">3.</span> Account Responsibilities
                </h2>
                <p>Members agree to:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Provide accurate and up-to-date information</li>
                    <li>Maintain confidentiality of login credentials</li>
                    <li>Be fully responsible for all activities under their account</li>
                </ul>
                <p class="text-sm text-[#ff014f] font-medium">Unauthorized use or misuse of the platform may result in immediate suspension.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">4.</span> Use of Platform
                </h2>
                <p>You agree to use Turivanta only for lawful and professional purposes. Prohibited activities include:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Posting false, misleading, or fraudulent information</li>
                    <li>Sharing abusive, defamatory, or illegal content</li>
                    <li>Violating intellectual property rights</li>
                    <li>Attempting to disrupt or hack the platform</li>
                </ul>
                <p class="text-sm text-gray-400">Similar to global platforms, offensive or unlawful content is strictly prohibited.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">5.</span> Business Listings & Content
                </h2>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Members may publish listings and services.</li>
                    <li>You confirm that all content is accurate, lawful, and owned or authorized</li>
                    <li>By posting, you grant Turivanta a non-exclusive, worldwide license to display and promote such content</li>
                </ul>
                <p class="text-sm text-gray-400">Turivanta is not responsible for user-generated content.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">6.</span> Alliance Badge & Recognition
                </h2>
                <p>Approved members may receive a Turivanta Alliance Badge / Identity Recognition. This badge is:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Non-transferable</li>
                    <li>Revocable at any time</li>
                    <li>Misuse of the badge may result in termination</li>
                </ul>
                <p class="text-sm text-gray-400 italic">This reflects industry standards where recognition tools are licensed and controlled.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">7.</span> Payments & Services
                </h2>
                <p>Certain services may be paid (premium listings, promotions, certifications). All fees are:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Clearly communicated</li>
                    <li>Non-refundable unless stated otherwise</li>
                    <li>Turivanta may revise membership at any time</li>
                </ul>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">8.</span> Third-Party Services
                </h2>
                <p>Turivanta may connect users with third-party services such as:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Payment gateways</li>
                    <li>Travel partners</li>
                    <li>External booking platforms</li>
                </ul>
                <p class="text-sm text-gray-400 italic">We do not control or guarantee third-party services.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">9.</span> Disclaimer of Liability
                </h2>
                <p>Information on Turivanta is provided “as is”. We do not guarantee:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Accuracy</li>
                    <li>Completeness</li>
                    <li>Business outcomes</li>
                </ul>
                <p>Turivanta is not liable for loss of business, revenue, or data, errors or omissions in listings, or actions of other users or partners.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">10.</span> Intellectual Property
                </h2>
                <p>All Turivanta branding, logos, and platform content are protected. Users may not copy, reproduce, or misuse Turivanta assets without permission.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">11.</span> Suspension & Termination
                </h2>
                <p>We reserve the right to suspend or terminate accounts, remove content, or restrict access, especially in cases of policy violations, fraudulent activity, or misuse of platform or badge.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">12.</span> Data Protection & Privacy
                </h2>
                <p>Your use of Turivanta is also governed by our <a href="{{ route('privacy-policy') }}" class="text-[#ff014f] hover:underline">Privacy Policy</a>.</p>
                <p>We take appropriate measures to protect your data and comply with applicable laws.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">13.</span> Modifications to Terms
                </h2>
                <p>Turivanta may update these Terms at any time. Changes will be posted on the platform, and continued use implies acceptance of updated Terms.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">14.</span> Governing Law
                </h2>
                <p>These Terms shall be governed by applicable laws of Jammu and Kashmir in India. Any disputes shall be subject to the jurisdiction of the respective courts.</p>
            </section>

            <section class="space-y-6 pt-10 border-t border-white/10">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">15.</span> Contact Information
                </h2>
                <p>For any queries regarding these Terms:</p>
                <div class="bg-white/5 p-8 rounded-3xl border border-white/10 backdrop-blur-sm">
                    <p class="font-bold text-white text-xl mb-4">Turivanta Alliance</p>
                    <div class="space-y-3 text-gray-400">
                        <p class="flex items-center gap-3">
                            <span class="text-[#ff014f]">Email:</span> info@turivanta.com
                        </p>
                        <p class="flex items-start gap-3">
                            <span class="text-[#ff014f]">Address:</span> Ward No. 32, Lower Pouni Chack, Jammu, J&K, India
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
@endsection
