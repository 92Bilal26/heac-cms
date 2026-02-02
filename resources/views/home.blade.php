@extends('layouts.app')

@push('structured-data')
    <x-structured-data :data="$organizationData ?? []" />
@endpush

@section('content')
{{-- Hero Section --}}
<section class="relative overflow-hidden text-white bg-slate-950 hero-section min-h-[600px] md:min-h-[700px]">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <img src="{{ asset('images/hero-background.png') }}" alt="" class="w-full h-full object-cover">
    </div>

    <!-- Overlay Effects -->
    <div class="absolute inset-0 z-[1] pointer-events-none">
        <!-- Dark overlay for text readability -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/70 to-slate-900/85"></div>
        <!-- Subtle blue tint -->
        <div class="absolute inset-0 bg-blue-900/25"></div>
    </div>

    <div class="relative z-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 lg:py-40">
            <div class="grid gap-8 lg:grid-cols-3 lg:items-start">
                <div class="space-y-8 lg:space-y-10 lg:col-span-2">
                    <div class="animate-fade-in-up">
                        <span class="inline-block px-5 py-2.5 rounded-full text-sm font-bold bg-white/15 text-white backdrop-blur-md border border-white/20 shadow-lg">
                            🌟 Halal Economy Advisory Centre - Global Shariah Leadership 
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold leading-tight tracking-tight animate-fade-in-up" style="animation-delay: 0.1s;">
                        {{ $heroTitle ?? 'Your Trusted Partner in Islamic Finance Solutions' }}
                    </h1>
                    <p class="text-lg md:text-xl lg:text-2xl text-slate-200/95 leading-relaxed max-w-2xl animate-fade-in-up" style="animation-delay: 0.2s;">
                        {{ $heroSubtitle ?? 'Advancing the halal economy globally through comprehensive Shariah-compliant solutions and expert guidance' }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 animate-fade-in-up" style="animation-delay: 0.3s;">
                        <a href="{{ route('contact.index') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition-all duration-200 shadow-xl hover:shadow-2xl hover:scale-105 transform">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Book a Consultation
                        </a>
                        <a href="{{ route('page.show', 'services') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-white/10 backdrop-blur-md rounded-xl border-2 border-white/30 hover:bg-white hover:text-blue-900 transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-105 transform">
                            Explore Services
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2 animate-fade-in-up" style="animation-delay: 0.4s;">
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-white/5 backdrop-blur-sm border border-white/10 hover:bg-white/10 transition-all duration-300">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-blue-500/20 flex items-center justify-center border border-blue-400/30">
                                <svg class="w-6 h-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-base font-bold text-white mb-1">Shariah Governance Experts</p>
                                <p class="text-sm text-slate-300/90 leading-relaxed">Accredited scholars guiding Islamic finance innovation across markets.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-white/5 backdrop-blur-sm border border-white/10 hover:bg-white/10 transition-all duration-300">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-indigo-500/20 flex items-center justify-center border border-indigo-400/30">
                                <svg class="w-6 h-6 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-base font-bold text-white mb-1">Global Multi-lingual Advisors</p>
                                <p class="text-sm text-slate-300/90 leading-relaxed">Serving banking, fintech, and halal enterprises across three continents.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-800/40 backdrop-blur-md border border-white/20 rounded-3xl p-8 shadow-2xl space-y-6 hover:bg-slate-800/50 transition-all duration-300 animate-fade-in-up lg:col-span-1 lg:sticky lg:top-24" style="animation-delay: 0.5s;">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-xs uppercase tracking-[0.15em] text-blue-300 font-bold mb-2">Comprehensive Support</p>
                            <h3 class="text-2xl font-bold text-white leading-tight">Tailored Shariah Solutions</h3>
                        </div>
                        <div class="px-3 py-1.5 bg-blue-600 rounded-lg shadow-lg flex-shrink-0">
                            <span class="text-xs font-bold text-white">24/7</span>
                        </div>
                    </div>
                    <p class="text-slate-200/90 leading-relaxed text-sm">
                        From product structuring to audits and certification, HEAC delivers end-to-end engagement anchored in AAOIFI and international best practices.
                    </p>
                    <ul class="space-y-3 text-sm text-slate-200/85">
                        <li class="flex items-start gap-3">
                            <span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-blue-500/20 text-blue-300 flex-shrink-0 mt-0.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>Strategic advisory boards for Islamic banks, fintech, and Takaful.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-blue-500/20 text-blue-300 flex-shrink-0 mt-0.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>Certified scholars delivering timely fatwas and halal certifications.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-blue-500/20 text-blue-300 flex-shrink-0 mt-0.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>Impact-focused training programs for executives and compliance teams.</span>
                        </li>
                    </ul>

                    <div class="pt-4 border-t border-white/10 space-y-4">
                        <div>
                            <div class="text-3xl font-bold text-white mb-1">100+</div>
                            <p class="text-xs uppercase tracking-wider text-blue-200/80">Institutions Guided Worldwide</p>
                        </div>
                        <a href="{{ route('contact.index') }}" class="inline-flex items-center justify-center w-full px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-105 transform text-sm">
                            Speak to an Advisor
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($statistics) && count($statistics) > 0)
    <div class="relative pb-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-3 lg:grid-cols-{{ min(count($statistics), 4) }} -mt-10 md:-mt-14">
                @foreach($statistics as $stat)
                <div class="hero-stat-card rounded-2xl p-6 text-center shadow-soft">
                    <div class="text-3xl md:text-4xl font-bold text-white mb-2">
                        {{ $stat['value'] }}
                    </div>
                    <div class="text-sm uppercase tracking-wide text-slate-200/75">
                        {{ $stat['label'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</section>

{{-- Trusted By Section --}}
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">
            <div class="max-w-xl">
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-primary-600">Trusted by leading institutions</p>
                <h2 class="mt-3 text-2xl font-semibold text-gray-900">
                    Strategic partner for banks, fintech innovators, and halal enterprises across the globe.
                </h2>
            </div>
            <div class="flex flex-wrap items-center gap-4 lg:justify-end">
                @foreach(['Al Noor Bank', 'Unity Islamic', 'Global Takaful', 'Sukuk Holdings', 'Halal Ventures'] as $client)
                <span class="client-logo">{{ $client }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Why Choose HEAC Section --}}
<section class="py-16 bg-slate-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-heading text-center">
            <span class="highlight-chip">Why Choose HEAC</span>
            <h2 class="mt-4 text-3xl md:text-4xl font-bold text-gray-900">
                Confidence, compliance, and growth for your Islamic finance vision
            </h2>
            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                We bring a multidisciplinary team of certified scholars and industry experts to every engagement, ensuring excellence from ideation to certification.
            </p>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
            <div class="advantage-card">
                <div class="icon-circle bg-blue-100 text-primary-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3>Recognized Shariah Authorities</h3>
                <p>AAOIFI-aligned scholars with decades of experience across banking, Takaful, and fintech.</p>
            </div>

            <div class="advantage-card">
                <div class="icon-circle bg-emerald-100 text-emerald-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3>End-to-End Service Portfolio</h3>
                <p>From advisory and structuring to certification and training, we manage the entire compliance lifecycle.</p>
            </div>

            <div class="advantage-card">
                <div class="icon-circle bg-amber-100 text-amber-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.423 3.423 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
                <h3>Licensed & Regulated</h3>
                <p>Registered with key regulators and compliant with international Shariah governance standards.</p>
            </div>

            <div class="advantage-card">
                <div class="icon-circle bg-purple-100 text-purple-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3>Worldwide Reach</h3>
                <p>Advisors fluent in Arabic, English, Malay, and Urdu supporting clients across 20+ markets.</p>
            </div>
        </div>
    </div>
</section>

{{-- Our Approach Section --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-heading text-center">
            <span class="highlight-chip">Our Methodology</span>
            <h2 class="mt-4 text-3xl md:text-4xl font-bold text-gray-900">
                A collaborative framework that delivers measurable impact
            </h2>
            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                Every engagement follows a disciplined pathway built around discovery, Shariah research, implementation, and continuous improvement.
            </p>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @php
                $approachSteps = [
                    ['title' => 'Discover & Diagnose', 'description' => 'Stakeholder workshops to understand objectives, regulatory context, and operational realities.', 'icon' => 'M13 7H7m6 10H7m10-3.586V17a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h8a2 2 0 012 2v2.414a2 2 0 01-.586 1.414l-1 1a2 2 0 010 2.828l1 1A2 2 0 0117 13.414z'],
                    ['title' => 'Research & Structuring', 'description' => 'Develop robust Shariah-compliant models with peer benchmarking and scenario analysis.', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1'],
                    ['title' => 'Review & Certification', 'description' => 'Iterative scholar reviews culminating in formal fatwa issuance and certification packs.', 'icon' => 'M9 12l2 2 4-4m0 0l-4-4m4 4H7m6 8H7'],
                    ['title' => 'Train & Support', 'description' => 'Executive coaching, compliance training, and digital resources that sustain long-term excellence.', 'icon' => 'M12 6v6l4 2'],
                ];
            @endphp
            @foreach($approachSteps as $step)
            <div class="approach-card">
                <div class="icon-circle icon-circle-outline">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $step['icon'] }}" />
                    </svg>
                </div>
                <h3>{{ $step['title'] }}</h3>
                <p>{{ $step['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- Featured Services Section --}}
<section id="services" class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-heading text-center">
            <span class="highlight-chip">Our Expertise</span>
            <h2 class="mt-4 text-3xl md:text-4xl font-bold text-gray-900">
                Comprehensive Shariah services designed for modern institutions
            </h2>
            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                HEAC delivers a full spectrum of advisory, certification, structuring, and training capabilities to accelerate your halal economy ambitions.
            </p>
        </div>

        @php
            $servicesOverview = [
                [
                    'title' => 'Shariah Advisory & Consultancy',
                    'description' => 'Strategic guidance for Islamic banks, fintech innovators, asset managers, and halal enterprises.',
                    'highlights' => ['Product structuring & innovation', 'Regulatory engagement & governance', 'Treasury, capital market, and fintech advisory'],
                    'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                    'cta' => ['label' => 'Discuss Advisory', 'route' => route('page.show', 'services')],
                ],
                [
                    'title' => 'Shariah Audit & Compliance',
                    'description' => 'Independent internal and external reviews that strengthen governance and investor confidence.',
                    'highlights' => ['Risk-based internal Shariah audit', 'Policy & SOP development', 'AAOIFI and IFSB compliance reports'],
                    'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
                    'cta' => ['label' => 'Book a Compliance Review', 'route' => route('page.show', 'services')],
                ],
                [
                    'title' => 'Sukuk & Islamic Structuring',
                    'description' => 'Tailored structures for Sukuk, Islamic funds, Takaful models, and emerging asset classes.',
                    'highlights' => ['Sustainable & ESG Sukuk design', 'Digital assets & fintech compliance', 'Islamic fund launch support'],
                    'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                    'cta' => ['label' => 'Plan Your Structure', 'route' => route('page.show', 'services')],
                ],
                [
                    'title' => 'Halal Certification & Fatwa Issuance',
                    'description' => 'Formal opinions, certification, and halal business audits delivered by renowned scholars.',
                    'highlights' => ['Consumer products & halal supply chains', 'Fintech & digital platform certification', 'Responsive fatwa and advisory desk'],
                    'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                    'cta' => ['label' => 'Request Certification', 'route' => route('page.show', 'services')],
                ],
                [
                    'title' => 'Training & Executive Education',
                    'description' => 'Immersive learning experiences for boards, executives, and Shariah compliance teams.',
                    'highlights' => ['Certified Shariah Auditor programs', 'Fintech & Shariah innovation labs', 'Customized corporate academies'],
                    'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                    'cta' => ['label' => 'Explore Trainings', 'route' => route('page.show', 'training')],
                ],
                [
                    'title' => 'Zakat, Waqf & Ethical Finance',
                    'description' => 'Holistic wealth purification, philanthropy, and ethical investment screening services.',
                    'highlights' => ['Corporate & personal Zakat strategy', 'Waqf governance frameworks', 'Shariah portfolio screening & reporting'],
                    'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z',
                    'cta' => ['label' => 'Schedule a Consultation', 'route' => route('page.show', 'services')],
                ],
            ];
        @endphp

        <div class="mt-12 grid gap-8 sm:grid-cols-2 xl:grid-cols-3">
            @foreach($servicesOverview as $service)
            <article class="service-card">
                <div class="service-icon">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $service['icon'] }}" />
                    </svg>
                </div>
                <h3>{{ $service['title'] }}</h3>
                <p>{{ $service['description'] }}</p>
                <ul class="service-list">
                    @foreach($service['highlights'] as $item)
                    <li>
                        <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ $item }}</span>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ $service['cta']['route'] }}" class="service-cta">
                    {{ $service['cta']['label'] }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </article>
            @endforeach
        </div>

        <div class="mt-16 grid gap-6 lg:grid-cols-3">
            <div class="info-banner">
                <h3>Industry-certified scholars</h3>
                <p>Our team includes AAOIFI, ISRA, and SECP-recognized scholars providing peer-reviewed opinions.</p>
            </div>
            <div class="info-banner">
                <h3>Global delivery model</h3>
                <p>Engagement hubs in Karachi, Kuala Lumpur, and London ensure rapid deployment across time zones.</p>
            </div>
            <div class="info-banner">
                <h3>Outcome-focused reporting</h3>
                <p>Each service culminates with actionable dashboards, audit trails, and implementation roadmaps.</p>
            </div>
        </div>
    </div>
</section>


{{-- Testimonials Section --}}
<section class="py-20 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white relative overflow-hidden" x-data="testimonialSlider()" x-init="init()" aria-labelledby="testimonial-heading">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-500 rounded-full blur-3xl"></div>
    </div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid gap-12 lg:grid-cols-[1.1fr_minmax(0,0.9fr)] items-start">
            <div>
                <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-white/10 text-white backdrop-blur-sm">Client Stories</span>
                <h2 id="testimonial-heading" class="mt-6 text-3xl md:text-4xl lg:text-5xl font-bold leading-tight">
                    Partners worldwide trust HEAC to deliver measurable impact
                </h2>
                <p class="mt-6 text-lg text-blue-100/90 max-w-2xl leading-relaxed">
                    Hear from the institutions who rely on our scholars to launch innovative Sukuk, strengthen Shariah governance, and upskill their teams.
                </p>
                <div class="mt-10 grid gap-6 sm:grid-cols-2">
                    <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 border border-white/10">
                        <div class="text-4xl md:text-5xl font-bold text-white mb-2">98%</div>
                        <p class="text-blue-100/80 text-sm">Client satisfaction score across advisory and audit engagements.</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 border border-white/10">
                        <div class="text-4xl md:text-5xl font-bold text-white mb-2">45+</div>
                        <p class="text-blue-100/80 text-sm">Successful Sukuk, fund, and fintech structures certified in the last 24 months.</p>
                    </div>
                </div>
            </div>

            <div class="relative" role="region" aria-live="polite" aria-atomic="true" @mouseenter="stop()" @mouseleave="start()" @focusin="stop()" @focusout="start()">
                <template x-for="(testimonial, index) in testimonials" :key="index">
                    <article x-show="active === index" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20 shadow-2xl">
                        <div class="flex items-center gap-3 text-xs font-bold uppercase tracking-widest text-blue-300 mb-6">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                            <span x-text="testimonial.sector"></span>
                        </div>
                        <blockquote class="text-xl md:text-2xl leading-relaxed text-white font-medium mb-8" x-text="testimonial.quote"></blockquote>
                        <div class="flex items-center justify-between gap-4 pt-6 border-t border-white/10">
                            <div>
                                <p class="text-lg font-bold text-white" x-text="testimonial.name"></p>
                                <p class="text-sm text-blue-200/80 mt-1" x-text="testimonial.role"></p>
                            </div>
                            <div class="px-4 py-2 bg-white/10 rounded-lg border border-white/20">
                                <span class="text-sm font-semibold text-white" x-text="testimonial.client"></span>
                            </div>
                        </div>
                    </article>
                </template>

                <div class="flex items-center justify-between mt-8">
                    <div class="flex items-center gap-3">
                        <button type="button" class="w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 border border-white/20 flex items-center justify-center transition-all duration-200 hover:scale-110" @click="prev()" aria-label="Previous testimonial">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button type="button" class="w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 border border-white/20 flex items-center justify-center transition-all duration-200 hover:scale-110" @click="next()" aria-label="Next testimonial">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center gap-2">
                        <template x-for="(testimonial, index) in testimonials" :key="`dot-${index}`">
                            <button
                                type="button"
                                class="w-2.5 h-2.5 rounded-full transition-all duration-200"
                                :class="active === index ? 'bg-white w-8' : 'bg-white/40 hover:bg-white/60'"
                                @click="goTo(index)"
                                aria-label="Go to testimonial"
                                :aria-current="active === index ? 'true' : null"
                            ></button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Featured Research Section --}}
@if(isset($featuredResearch) && $featuredResearch->count() > 0)
<section class="py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                Knowledge Hub
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Latest Publications & Insights
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Explore our latest research and thought leadership on Islamic finance
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredResearch as $research)
            <article class="group bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200 hover:-translate-y-2">
                @if($research->thumbnail)
                <div class="aspect-w-16 aspect-h-9 bg-gray-200 overflow-hidden">
                    <img src="{{ Storage::url($research->thumbnail) }}" alt="{{ $research->title }}" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                @else
                <div class="h-56 bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-600 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 opacity-20">
                        <div class="absolute top-0 left-0 w-40 h-40 bg-white rounded-full blur-3xl"></div>
                        <div class="absolute bottom-0 right-0 w-40 h-40 bg-white rounded-full blur-3xl"></div>
                    </div>
                    <svg class="w-20 h-20 text-white opacity-80 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                @endif

                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        @if($research->categories->count() > 0)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                            {{ $research->categories->first()->name }}
                        </span>
                        @endif
                        <span class="text-sm text-gray-500 font-medium">
                            {{ $research->publication_date->format('M d, Y') }}
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2 leading-tight">
                        <a href="{{ route('research.show', $research->slug) }}">
                            {{ $research->title }}
                        </a>
                    </h3>

                    <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed">
                        {{ $research->abstract }}
                    </p>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="{{ route('research.show', $research->slug) }}" class="text-blue-600 hover:text-blue-700 font-semibold text-sm inline-flex items-center group/link">
                            Read More
                            <svg class="w-4 h-4 ml-1 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                        <div class="flex items-center gap-4 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                {{ $research->views_count ?? 0 }}
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                {{ $research->downloads_count ?? 0 }}
                            </span>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-16">
            <a href="{{ route('research.index') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105">
                View All Research
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

{{-- Team & Training Section --}}
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            {{-- Our Team & Scholars --}}
            <article class="group bg-gradient-to-br from-slate-50 to-blue-50 rounded-2xl p-8 border border-gray-200 hover:border-blue-300 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-blue-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Nov 05, 2025</span>
                </div>

                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors">
                    Our Team & Scholars
                </h3>

                <p class="text-gray-600 mb-6 leading-relaxed">
                    Meet our team of recognized Shariah scholars and Islamic finance experts serving clients worldwide.
                </p>

                <a href="{{ route('page.show', 'team') }}" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-all duration-200 hover:shadow-lg hover:scale-105">
                    Read More
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </article>

            {{-- Training & Events --}}
            <article class="group bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 border border-gray-200 hover:border-indigo-300 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-indigo-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Nov 05, 2025</span>
                </div>

                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 group-hover:text-indigo-600 transition-colors">
                    Training & Events
                </h3>

                <p class="text-gray-600 mb-6 leading-relaxed">
                    Professional training programs, executive workshops, and certification courses in Islamic finance and Shariah compliance.
                </p>

                <a href="{{ route('page.show', 'training') }}" class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-all duration-200 hover:shadow-lg hover:scale-105">
                    Read More
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </article>
        </div>
    </div>
</section>

{{-- Call to Action Section --}}
<section class="relative py-24 md:py-32 text-white overflow-hidden">
    <div class="absolute inset-0 -z-10">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-800"></div>
        <div class="absolute inset-0 hero-overlay-pattern opacity-30"></div>
        <div class="absolute -top-24 -left-16 w-96 h-96 bg-sky-400/30 blur-3xl rounded-full animate-pulse"></div>
        <div class="absolute -bottom-32 right-0 w-96 h-96 bg-indigo-500/30 blur-3xl rounded-full animate-pulse" style="animation-delay: 1.5s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-blue-500/10 blur-[120px] rounded-full"></div>
    </div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[1.1fr_auto] items-center">
            <div>
                <span class="highlight-chip" style="--chip-bg: rgba(255, 255, 255, 0.14); --chip-color: #ffffff;">Partner with HEAC</span>
                <h2 class="mt-4 text-3xl md:text-4xl font-bold leading-tight">
                    Let’s build your next Shariah-compliant success story
                </h2>
                <p class="mt-5 text-blue-100/90 max-w-2xl">
                    Whether you need a rapid compliance review, a new Sukuk structure, or executive training, our scholars and analysts respond within one business day.
                </p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-sky-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm text-blue-100/90">Dedicated engagement managers for banks, fintech, and halal enterprises.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-sky-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm text-blue-100/90">Transparent deliverables with actionable playbooks and certification roadmaps.</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('contact.index') }}" class="btn-primary btn-lg shadow-soft">
                    Request a Strategy Call
                </a>
                <a href="{{ route('page.show', 'services') }}" class="btn btn-outline border-white text-white hover:bg-white hover:text-indigo-700">
                    Explore Services
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
