@extends('layouts.app')

@section('title', 'Privacy Policy - Turivanta Alliance')

@section('content')
<main class="flex-grow pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-6 lg:px-12">
        <div class="mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Privacy <span class="text-gray-400 font-light">Policy</span></h1>
            <p class="text-gray-400 text-sm">Effective Date: {{ date('F j, Y') }}</p>
            <div class="w-20 h-1 bg-[#ff014f] mt-6 rounded-full"></div>
        </div>

        <div class="prose prose-invert max-w-none text-gray-300 space-y-8 leading-relaxed">
            <p class="text-lg">
                Turivanta Alliance ensures global-standard data protection for tourism businesses, travel businesses, partners, hospitality providers like accommodation units, tour operators and destination brands worldwide. Turivanta Alliance (“we”, “our”, “us”, Turivanta) is committed to protecting your privacy and ensuring transparency in how your personal information is collected, used, and safeguarded. This Privacy Policy explains how we process your data when you use our platform, website, and services.
            </p>

            <p class="text-lg font-medium text-white italic">
                We align our practices with globally recognized data protection standards such as GDPR and other applicable privacy laws.
            </p>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">1.</span> Scope of Policy
                </h2>
                <p>This Privacy Policy applies to:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>All Turivanta websites, domains, and digital platforms</li>
                    <li>Mobile applications and online services</li>
                    <li>Business listings, partnerships, and user interactions</li>
                </ul>
                <p>By accessing or using Turivanta, you agree to the terms outlined in this policy.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">2.</span> Information We Collect
                </h2>
                <p>We collect only the information necessary to provide and improve our services.</p>
                
                <div class="grid md:grid-cols-2 gap-6 mt-6">
                    <div class="bg-white/5 p-6 rounded-2xl border border-white/10">
                        <h3 class="text-white font-bold mb-3">a. Personal Information</h3>
                        <ul class="text-sm space-y-2 text-gray-400">
                            <li>• Name and business name</li>
                            <li>• Email address and phone number</li>
                            <li>• Location and address</li>
                            <li>• Billing and transaction details</li>
                        </ul>
                    </div>
                    <div class="bg-white/5 p-6 rounded-2xl border border-white/10">
                        <h3 class="text-white font-bold mb-3">b. Technical Information</h3>
                        <ul class="text-sm space-y-2 text-gray-400">
                            <li>• IP address</li>
                            <li>• Browser type and device details</li>
                            <li>• Cookies and usage data</li>
                        </ul>
                    </div>
                </div>
                <p class="text-sm text-gray-400 mt-4 italic">Personal data refers to any information that can identify you directly or indirectly.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">3.</span> How We Use Your Information
                </h2>
                <p>We use your data to:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Provide and manage your Turivanta account</li>
                    <li>Enable business listings and global visibility</li>
                    <li>Improve platform performance and user experience</li>
                    <li>Communicate updates, offers, and support</li>
                    <li>Ensure security and prevent fraud</li>
                </ul>
                <p>We only process data for specific and legitimate purposes.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">4.</span> Data Sharing and Disclosure
                </h2>
                <p class="font-bold text-white underline decoration-[#ff014f]">We do not sell your personal data.</p>
                <p>We may share information with:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Trusted service providers and partners</li>
                    <li>Payment gateways for secure transactions</li>
                    <li>Legal authorities when required by law</li>
                </ul>
                <p class="text-sm text-gray-400">Third-party platforms have their own privacy policies, and we encourage users to review them.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">5.</span> Cookies and Tracking Technologies
                </h2>
                <p>Turivanta Alliance uses cookies to:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Enhance user experience</li>
                    <li>Analyze traffic and performance</li>
                    <li>Personalize content</li>
                </ul>
                <p>You can control or disable cookies through your browser settings.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">6.</span> Data Security
                </h2>
                <p>We implement industry-standard security measures including:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Encryption (SSL) for sensitive data</li>
                    <li>Secure servers and access controls</li>
                    <li>Regular monitoring and updates</li>
                </ul>
                <p>These measures help protect your information from unauthorized access.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">7.</span> Data Retention
                </h2>
                <p>We retain your data only as long as necessary to:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Fulfill service obligations</li>
                    <li>Comply with legal requirements</li>
                    <li>Resolve disputes</li>
                </ul>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">8.</span> Your Rights
                </h2>
                <p>Depending on your jurisdiction, you may have the right to:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Access your personal data</li>
                    <li>Request correction or deletion</li>
                    <li>Withdraw consent</li>
                    <li>Object to data processing</li>
                </ul>
                <p>To exercise your rights, contact us at the details below.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">9.</span> Third-Party Links
                </h2>
                <p>Our platform may contain links to external websites.</p>
                <p>We are not responsible for the privacy practices of third-party sites and recommend reviewing their policies before sharing information.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">10.</span> Children’s Privacy
                </h2>
                <p>Turivanta services are not intended for individuals under the age of 18. We do not knowingly collect data from minors.</p>
            </section>

            <section class="space-y-4">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">11.</span> Changes to This Policy
                </h2>
                <p>We may update this Privacy Policy from time to time.</p>
                <p>Any changes will be posted on this page with an updated effective date.</p>
            </section>

            <section class="space-y-6 pt-10 border-t border-white/10">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <span class="text-[#ff014f]">12.</span> Contact Us
                </h2>
                <p>If you have questions, concerns, or complaints regarding this Privacy Policy, please contact:</p>
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
