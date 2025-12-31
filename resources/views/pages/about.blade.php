<x-layouts.app 
    title="About Us | {{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}"
    description="Learn about Nesthetix Designs - a premier interior design studio with a passion for creating beautiful, functional spaces. Discover our story, values, and commitment to excellence."
    canonical="{{ url('/about') }}">
    
    {{-- Hero Section --}}
    <section class="relative py-12 px-6 lg:px-16 overflow-hidden hero-banner-section" data-animate="fade-up" style="opacity: 1; visibility: visible;">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img 
                src="https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg" 
                alt="About Nesthetix Designs"
                class="w-full h-full object-cover"
                loading="eager"
            />
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="text-center max-w-4xl mx-auto">
                {{-- Subheading Badge --}}
                <p 
                    class="text-[#D4AF37] tracking-[0.3em] uppercase text-xs mb-3 font-medium"
                    style="font-family: 'Satoshi', sans-serif;"
                    data-animate="fade-up"
                    data-delay="0.1"
                >
                    Our Story
                </p>

                {{-- Main Heading --}}
                <h1
                    class="font-light text-4xl md:text-5xl lg:text-6xl text-white leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    data-animate="fade-up"
                    data-delay="0.2"
                >
                    About Nesthetix Designs
                </h1>

                {{-- Primary Divider --}}
                <div 
                    class="w-20 h-px bg-gradient-to-r from-[#D4AF37] to-transparent mx-auto mb-6"
                    data-animate="fade-up"
                    data-delay="0.3"
                ></div>

                {{-- Description --}}
                <p 
                    class="max-w-4xl mx-auto text-white text-base md:text-lg leading-relaxed mb-8"
                    style="font-family: 'Satoshi', sans-serif;"
                    data-animate="fade-up"
                    data-delay="0.4"
                >
                    Where design evolves into a lifestyle. Crafted with intent. Executed with precision.
                </p>
            </div>
        </div>
    </section>

    {{-- Story Timeline Section --}}
    <section class="relative py-12 px-6 lg:px-16 overflow-hidden bg-white" data-animate="fade-up" style="opacity: 1; visibility: visible;">
        <div class="">
            {{-- Section Header --}}
            <div class="text-center mb-10">
                <p 
                    class="text-theme-muted tracking-[0.25em] uppercase text-xs mb-2 font-medium"
                    style="font-family: 'Satoshi', sans-serif;"
                >
                    Our Journey
                </p>
                <h2 
                    class="font-light text-2xl md:text-3xl lg:text-4xl text-theme-primary leading-tight mb-3"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                >
                    Shaping Thoughtfully Designed Spaces
                </h2>
                <div class="w-16 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto"></div>
            </div>

            {{-- Timeline & Gallery Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-stretch">
                {{-- Left: Timeline --}}
                <div class="timeline-compact flex flex-col">
                    {{-- Timeline Item 1 --}}
                    <div class="timeline-item-compact">
                        <div class="timeline-marker-compact">
                            <div class="timeline-dot-compact"></div>
                        </div>
                        <div class="timeline-content-compact">
                            <div class="timeline-year-compact">The Beginning</div>
                            <h3 class="timeline-title-compact" style="font-family: 'Canela Text Trial', serif;">
                                Natural Evolution
                            </h3>
                            <p class="timeline-text-compact" style="font-family: 'Satoshi', sans-serif;">
                                <span class="font-semibold text-[var(--color-primary)]">Nesthetix Designs LLP</span> was born from a <span class="font-medium text-[#C9A86C]">natural evolution</span> — a response to the growing demand for interiors that move beyond <span class="italic">surface aesthetics</span> and genuinely <span class="font-medium text-[#C9A86C]">reflect the individuality</span> of those who inhabit them.
                            </p>
                        </div>
                    </div>

                    {{-- Timeline Item 2 --}}
                    <div class="timeline-item-compact">
                        <div class="timeline-marker-compact">
                            <div class="timeline-dot-compact"></div>
                        </div>
                        <div class="timeline-content-compact">
                            <div class="timeline-year-compact">Philosophy Formation</div>
                            <h3 class="timeline-title-compact" style="font-family: 'Canela Text Trial', serif;">
                                Design Practice Maturation
                            </h3>
                            <p class="timeline-text-compact" style="font-family: 'Satoshi', sans-serif;">
                                What began as a focused design initiative matured into a <span class="font-medium text-[#C9A86C]">dedicated interior design practice</span>, committed to creating <span class="font-medium">personalized, sophisticated environments</span>. By quietly blending <span class="font-medium">contemporary sensibilities with timeless elegance</span>, Nesthetix has shaped a design philosophy rooted in <span class="font-semibold text-[var(--color-primary)]">balance, restraint, and intent</span>.
                            </p>
                        </div>
                    </div>

                    {{-- Timeline Item 3 --}}
                    <div class="timeline-item-compact">
                        <div class="timeline-marker-compact">
                            <div class="timeline-dot-compact"></div>
                        </div>
                        <div class="timeline-content-compact">
                            <div class="timeline-year-compact">Narrative Approach</div>
                            <h3 class="timeline-title-compact" style="font-family: 'Canela Text Trial', serif;">
                                Thoughtful Planning
                            </h3>
                            <p class="timeline-text-compact" style="font-family: 'Satoshi', sans-serif;">
                                Each space is approached as a <span class="font-medium italic text-[#C9A86C]">narrative</span> — <span class="font-medium">thoughtfully planned, meticulously detailed</span>, and tailored to complement modern living while remaining <span class="font-medium">enduring in character</span>.
                            </p>
                        </div>
                    </div>

                    {{-- Timeline Item 4 --}}
                    <div class="timeline-item-compact">
                        <div class="timeline-marker-compact">
                            <div class="timeline-dot-compact"></div>
                        </div>
                        <div class="timeline-content-compact">
                            <div class="timeline-year-compact">Refinement</div>
                            <h3 class="timeline-title-compact" style="font-family: 'Canela Text Trial', serif;">
                                Bespoke Luxury Focus
                            </h3>
                            <p class="timeline-text-compact" style="font-family: 'Satoshi', sans-serif;">
                                With a clear focus on <span class="font-semibold text-[var(--color-primary)]">bespoke luxury interiors</span> and <span class="font-medium text-[#C9A86C]">architectural enhancements</span>, Nesthetix Designs LLP refined its practice to serve a <span class="font-medium">discerning clientele</span>. <span class="font-medium text-[#C9A86C]">Advanced design methodologies</span>, curated material palettes, and considered integration of automation quietly elevate both the <span class="font-medium">aesthetics and performance</span> of every project.
                            </p>
                        </div>
                    </div>

                    {{-- Timeline Item 5 --}}
                    <div class="timeline-item-compact">
                        <div class="timeline-marker-compact">
                            <div class="timeline-dot-compact"></div>
                        </div>
                        <div class="timeline-content-compact">
                            <div class="timeline-year-compact">Today</div>
                            <h3 class="timeline-title-compact" style="font-family: 'Canela Text Trial', serif;">
                                Trusted Excellence
                            </h3>
                            <p class="timeline-text-compact" style="font-family: 'Satoshi', sans-serif;">
                                Supported by a <span class="font-medium text-[#C9A86C]">dedicated team of architects and designers</span>, Nesthetix has delivered refined interiors across <span class="font-medium">luxury residences, commercial environments, and hospitality spaces</span>. <span class="font-semibold text-[var(--color-primary)]">Precision in detailing</span>, structured execution, and a measured approach to craftsmanship have become <span class="font-medium italic text-[#C9A86C]">defining pillars</span> of the studio.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Right: Image Gallery --}}
                <div class="about-gallery">
                    <div class="gallery-grid">
                        <div class="gallery-item gallery-item-1">
                            <img 
                                src="https://ik.imagekit.io/AthaConstruction/assets/design_6953a3f3a04282.55079441_JiCtRKkl5.png" 
                                alt="Nesthetix Designs - Thoughtfully designed interior space"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            />
                            <div class="gallery-overlay">
                                <p class="gallery-caption" style="font-family: 'Satoshi', sans-serif;">Our Design Philosophy</p>
                            </div>
                        </div>
                        <div class="gallery-item gallery-item-2">
                            <img 
                                src="https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg" 
                                alt="Luxury Interior Design"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            />
                        </div>
                        <div class="gallery-item gallery-item-3">
                            <img 
                                src="https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg" 
                                alt="Modern Interior Design"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            />
                        </div>
                        <div class="gallery-item gallery-item-4">
                            <img 
                                src="https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg" 
                                alt="Premium Interior Design"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            />
                        </div>
                        <div class="gallery-item gallery-item-5">
                            <img 
                                src="https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg" 
                                alt="Luxury Interior Design"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            />
                        </div>
                        <div class="gallery-item gallery-item-6">
                            <img 
                                src="https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg" 
                                alt="Modern Interior Design"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- What We Offer Section --}}
    <section class="relative py-16 px-6 lg:px-16 overflow-hidden bg-gray-50" data-animate="fade-up" style="opacity: 1; visibility: visible;">
        <div class="max-w-7xl mx-auto">
            {{-- Section Header --}}
            <div class="text-center mb-12">
                <p 
                    class="text-theme-muted tracking-[0.25em] uppercase text-xs mb-3 font-medium"
                    style="font-family: 'Satoshi', sans-serif;"
                >
                    What We Deliver
                </p>
                <h2 
                    class="font-light text-3xl md:text-4xl text-theme-primary leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                >
                    What We Will Give You
                </h2>
                <div class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto"></div>
            </div>

            {{-- Offerings Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                {{-- Offering 1 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        Bespoke Design Solutions
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Fully customized interior designs that reflect your unique personality and lifestyle, crafted with meticulous attention to detail.
                    </p>
                </div>

                {{-- Offering 2 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        Premium Materials & Finishes
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Curated selection of premium materials, imported finishes, and luxury hardware that elevate every space.
                    </p>
                </div>

                {{-- Offering 3 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        Precision Execution
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Structured execution with quality craftsmanship, ensuring every detail is flawlessly implemented from concept to completion.
                    </p>
                </div>

                {{-- Offering 4 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        Advanced Methodologies
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Cutting-edge design methodologies and technology integration for smart, efficient, and future-ready spaces.
                    </p>
                </div>

                {{-- Offering 5 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        Expert Team Support
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Dedicated team of architects and designers working collaboratively to bring your vision to life.
                    </p>
                </div>

                {{-- Offering 6 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        End-to-End Service
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Complete turnkey solutions from initial concept development to final installation and handover.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="relative py-16 px-6 lg:px-16 overflow-hidden bg-white" data-animate="fade-up" style="opacity: 1; visibility: visible;">
        <div class="max-w-7xl mx-auto">
            {{-- Section Header --}}
            <div class="text-center mb-12">
                <p 
                    class="text-theme-muted tracking-[0.25em] uppercase text-xs mb-3 font-medium"
                    style="font-family: 'Satoshi', sans-serif;"
                >
                    Meet The Team
                </p>
                <h2 
                    class="font-light text-3xl md:text-4xl text-theme-primary leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                >
                    Our Creative Minds
                </h2>
                <div class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto"></div>
            </div>

            {{-- Team Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Team Member 1 --}}
                <div class="team-card">
                    <div class="team-image-wrapper">
                        <div class="team-image-placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <div class="team-info">
                        <h3 class="team-name" style="font-family: 'Canela Text Trial', serif;">
                            Lead Architect
                        </h3>
                        <p class="team-role" style="font-family: 'Satoshi', sans-serif;">
                            Design Director
                        </p>
                    </div>
                </div>

                {{-- Team Member 2 --}}
                <div class="team-card">
                    <div class="team-image-wrapper">
                        <div class="team-image-placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <div class="team-info">
                        <h3 class="team-name" style="font-family: 'Canela Text Trial', serif;">
                            Senior Designer
                        </h3>
                        <p class="team-role" style="font-family: 'Satoshi', sans-serif;">
                            Interior Design Lead
                        </p>
                    </div>
                </div>

                {{-- Team Member 3 --}}
                <div class="team-card">
                    <div class="team-image-wrapper">
                        <div class="team-image-placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <div class="team-info">
                        <h3 class="team-name" style="font-family: 'Canela Text Trial', serif;">
                            Project Manager
                        </h3>
                        <p class="team-role" style="font-family: 'Satoshi', sans-serif;">
                            Execution Specialist
                        </p>
                    </div>
                </div>

                {{-- Team Member 4 --}}
                <div class="team-card">
                    <div class="team-image-wrapper">
                        <div class="team-image-placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <div class="team-info">
                        <h3 class="team-name" style="font-family: 'Canela Text Trial', serif;">
                            Design Consultant
                        </h3>
                        <p class="team-role" style="font-family: 'Satoshi', sans-serif;">
                            Creative Strategist
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Values Section --}}
    <section class="relative py-16 px-6 lg:px-16 overflow-hidden bg-gray-50" data-animate="fade-up" style="opacity: 1; visibility: visible;">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <p 
                    class="text-theme-muted tracking-[0.25em] uppercase text-xs mb-3 font-medium"
                    style="font-family: 'Satoshi', sans-serif;"
                >
                    Our Foundation
                </p>
                <h2 
                    class="font-light text-3xl md:text-4xl text-theme-primary leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                >
                    Our Core Values
                </h2>
                <div class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="value-card">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="value-title" style="font-family: 'Canela Text Trial', serif;">
                        Excellence
                    </h3>
                    <p class="value-text" style="font-family: 'Satoshi', sans-serif;">
                        We strive for perfection in every detail, ensuring the highest quality in design and execution.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="value-title" style="font-family: 'Canela Text Trial', serif;">
                        Client-Centric
                    </h3>
                    <p class="value-text" style="font-family: 'Satoshi', sans-serif;">
                        Your vision is our priority. We listen, understand, and collaborate to bring your dreams to reality.
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="value-title" style="font-family: 'Canela Text Trial', serif;">
                        Innovation
                    </h3>
                    <p class="value-text" style="font-family: 'Satoshi', sans-serif;">
                        We embrace new ideas, technologies, and design trends to create cutting-edge solutions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    <x-testimonials />

</x-layouts.app>

<style>
/* Hero Banner Section Styles */
.hero-banner-section {
    min-height: 40vh;
    display: flex;
    align-items: center;
}

.hero-banner-section .absolute img {
    filter: brightness(0.85);
}

@media (max-width: 768px) {
    .hero-banner-section {
        min-height: 35vh;
        padding-top: 3rem;
        padding-bottom: 3rem;
    }
}

/* Compact Timeline Styles */
.timeline-compact {
    position: relative;
    padding-left: 1.5rem;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.timeline-compact::before {
    content: '';
    position: absolute;
    left: 0.5rem;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, var(--color-primary), var(--color-secondary));
}

.timeline-item-compact {
    position: relative;
    padding-left: 2.5rem;
    padding-bottom: 1.5rem;
    display: flex;
    align-items: flex-start;
    flex: 1;
}

.timeline-item-compact:last-child {
    padding-bottom: 0;
}

.timeline-marker-compact {
    position: absolute;
    left: -0.25rem;
    top: 0.25rem;
    z-index: 10;
}

.timeline-dot-compact {
    width: 0.75rem;
    height: 0.75rem;
    border-radius: 50%;
    background: var(--color-primary);
    border: 2px solid white;
    box-shadow: 0 0 0 3px rgba(50, 1, 47, 0.1);
    transition: all 0.3s ease;
}

.timeline-item-compact:hover .timeline-dot-compact {
    transform: scale(1.4);
    box-shadow: 0 0 0 4px rgba(50, 1, 47, 0.2);
}

.timeline-content-compact {
    background: white;
    border-radius: 0.75rem;
    padding: 1.25rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    border: 1px solid rgba(50, 1, 47, 0.08);
    transition: all 0.3s ease;
    flex: 1;
}

.timeline-item-compact:hover .timeline-content-compact {
    transform: translateX(4px);
    box-shadow: 0 4px 16px rgba(50, 1, 47, 0.1);
    border-color: rgba(50, 1, 47, 0.15);
}

.timeline-year-compact {
    font-size: 0.625rem;
    font-weight: 600;
    color: var(--color-primary);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 0.375rem;
    font-family: 'Satoshi', sans-serif;
}

.timeline-title-compact {
    font-size: 1.125rem;
    font-weight: 300;
    color: var(--color-secondary);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.timeline-text-compact {
    color: #4b5563;
    line-height: 1.6;
    font-size: 0.8125rem;
}

/* About Gallery Styles */
.about-gallery {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-template-rows: repeat(5, 1fr);
    gap: 0.5rem;
    height: 100%;
    flex: 1;
}

.gallery-item {
    position: relative;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    cursor: pointer;
    min-height: 0;
}

.gallery-item:hover {
    transform: scale(1.02);
    box-shadow: 0 8px 24px rgba(50, 1, 47, 0.15);
    z-index: 10;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.gallery-item-1 { grid-area: 1 / 5 / 3 / 6; }
.gallery-item-2 { grid-area: 1 / 4 / 3 / 5; }
.gallery-item-3 { grid-area: 3 / 4 / 5 / 6; }
.gallery-item-4 { grid-area: 5 / 4 / 6 / 5; }
.gallery-item-5 { grid-area: 5 / 5 / 6 / 6; }
.gallery-item-6 { grid-area: 1 / 1 / 6 / 4; }

.gallery-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(50, 1, 47, 0.7), transparent);
    display: flex;
    align-items: flex-end;
    padding: 1.5rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-caption {
    color: white;
    font-size: 0.875rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* Offering Cards */
.offering-card {
    background: white;
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    border: 1px solid rgba(50, 1, 47, 0.08);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.offering-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, var(--color-primary), var(--color-secondary));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.offering-card:hover::before {
    transform: scaleX(1);
}

.offering-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 32px rgba(50, 1, 47, 0.15);
    border-color: rgba(50, 1, 47, 0.2);
}

.offering-icon {
    width: 3.5rem;
    height: 3.5rem;
    border-radius: 0.75rem;
    background: linear-gradient(135deg, rgba(50, 1, 47, 0.1), rgba(74, 25, 66, 0.1));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary);
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
}

.offering-card:hover .offering-icon {
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    color: white;
    transform: scale(1.1) rotate(5deg);
}

.offering-title {
    font-size: 1.25rem;
    font-weight: 300;
    color: var(--color-secondary);
    margin-bottom: 0.75rem;
    line-height: 1.4;
}

.offering-text {
    color: #4b5563;
    line-height: 1.6;
    font-size: 0.9375rem;
}

/* Team Cards */
.team-card {
    text-align: center;
    transition: all 0.3s ease;
}

.team-image-wrapper {
    margin-bottom: 1.5rem;
    position: relative;
}

.team-image-placeholder {
    width: 100%;
    aspect-ratio: 1;
    border-radius: 1rem;
    background: linear-gradient(135deg, rgba(50, 1, 47, 0.1), rgba(74, 25, 66, 0.1));
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 2px solid rgba(50, 1, 47, 0.1);
}

.team-card:hover .team-image-placeholder {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(50, 1, 47, 0.15);
    border-color: var(--color-primary);
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
}

.team-card:hover .team-image-placeholder svg {
    color: white;
    transform: scale(1.1);
}

.team-info {
    padding: 0 1rem;
}

.team-name {
    font-size: 1.125rem;
    font-weight: 300;
    color: var(--color-secondary);
    margin-bottom: 0.5rem;
}

.team-role {
    font-size: 0.875rem;
    color: #6b7280;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* Value Cards */
.value-card {
    background: white;
    border-radius: 1rem;
    padding: 2.5rem;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    border: 1px solid rgba(50, 1, 47, 0.08);
    transition: all 0.3s ease;
}

.value-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 32px rgba(50, 1, 47, 0.15);
    border-color: rgba(50, 1, 47, 0.2);
}

.value-icon {
    width: 4rem;
    height: 4rem;
    margin: 0 auto 1.5rem;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(50, 1, 47, 0.1), rgba(74, 25, 66, 0.1));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary);
    transition: all 0.3s ease;
}

.value-card:hover .value-icon {
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    color: white;
    transform: scale(1.1);
}

.value-title {
    font-size: 1.5rem;
    font-weight: 300;
    color: var(--color-secondary);
    margin-bottom: 1rem;
}

.value-text {
    color: #4b5563;
    line-height: 1.6;
    font-size: 0.9375rem;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .timeline-compact {
        padding-left: 1.25rem;
    }
    
    .timeline-compact::before {
        left: 0.375rem;
    }
    
    .timeline-item-compact {
        padding-left: 2rem;
        padding-bottom: 1.25rem;
    }
    
    .timeline-marker-compact {
        left: -0.125rem;
    }
    
    .gallery-grid {
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(4, 1fr);
        gap: 0.375rem;
    }
    
    .gallery-item-1 { grid-area: 1 / 3 / 2 / 4; }
    .gallery-item-2 { grid-area: 1 / 2 / 2 / 3; }
    .gallery-item-3 { grid-area: 2 / 2 / 4 / 4; }
    .gallery-item-4 { grid-area: 4 / 2 / 5 / 3; }
    .gallery-item-5 { grid-area: 4 / 3 / 5 / 4; }
    .gallery-item-6 { grid-area: 1 / 1 / 5 / 2; }
}

@media (max-width: 768px) {
    .timeline-compact {
        padding-left: 1rem;
        margin-bottom: 2rem;
    }
    
    .timeline-compact::before {
        left: 0.25rem;
    }
    
    .timeline-item-compact {
        padding-left: 1.75rem;
        padding-bottom: 1rem;
    }
    
    .timeline-marker-compact {
        left: 0;
    }
    
    .timeline-content-compact {
        padding: 1rem;
    }
    
    .timeline-title-compact {
        font-size: 1rem;
    }
    
    .timeline-text-compact {
        font-size: 0.75rem;
    }
    
    .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(6, 1fr);
        gap: 0.375rem;
    }
    
    .gallery-item-1 { grid-area: 1 / 2 / 2 / 3; }
    .gallery-item-2 { grid-area: 2 / 2 / 3 / 3; }
    .gallery-item-3 { grid-area: 3 / 2 / 5 / 3; }
    .gallery-item-4 { grid-area: 5 / 2 / 6 / 3; }
    .gallery-item-5 { grid-area: 6 / 2 / 7 / 3; }
    .gallery-item-6 { grid-area: 1 / 1 / 7 / 2; }
    
    .offering-card,
    .value-card {
        padding: 1.5rem;
    }
    
    .team-image-placeholder {
        border-radius: 0.75rem;
    }
}

/* Ensure visibility */
section[data-animate] {
    opacity: 1 !important;
    visibility: visible !important;
}
</style>
