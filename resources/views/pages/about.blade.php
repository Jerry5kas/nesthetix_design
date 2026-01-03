<x-layouts.app title="About Us | {{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}"
    description="Learn about Nesthetix Designs - a premier interior design studio with a passion for creating beautiful, functional spaces. Discover our story, values, and commitment to excellence."
    canonical="{{ url('/about') }}">

    {{-- Hero Section --}}
    <section class="relative py-12 px-6 lg:px-16 overflow-hidden hero-banner-section" data-animate="fade-up"
        style="opacity: 1; visibility: visible;">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg"
                alt="About Nesthetix Designs" class="w-full h-full object-cover" loading="eager" />
        </div>

        {{-- Black Overlay --}}
        <div class="absolute inset-0 z-[5] bg-black/50"></div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="text-center max-w-4xl mx-auto">
                {{-- Subheading Badge --}}
                <p class="text-[#D4AF37] tracking-[0.3em] uppercase text-xs mb-3 font-medium"
                    style="font-family: 'Satoshi', sans-serif;" data-animate="fade-up" data-delay="0.1">
                    Our Story
                </p>

                {{-- Main Heading --}}
                <h1 class="font-light text-4xl md:text-5xl lg:text-6xl text-white leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;" data-animate="fade-up"
                    data-delay="0.2">
                    About Nesthetix Designs
                </h1>

                {{-- Primary Divider --}}
                <div class="w-20 h-px bg-gradient-to-r from-[#D4AF37] to-transparent mx-auto mb-6"
                    data-animate="fade-up" data-delay="0.3"></div>

                {{-- Description --}}
                <p class="max-w-4xl mx-auto text-white text-base md:text-lg leading-relaxed mb-8"
                    style="font-family: 'Satoshi', sans-serif;" data-animate="fade-up" data-delay="0.4">
                    Where design evolves into a lifestyle. Crafted with intent. Executed with precision.
                </p>
            </div>
        </div>
    </section>

    {{-- Story Chapters Section - Editorial Layout --}}
    <section class="relative py-10 lg:py-14 px-6 lg:px-16 overflow-hidden bg-white" data-animate="fade-up"
        style="opacity: 1; visibility: visible;">
        <div class="max-w-6xl mx-auto">
            {{-- Section Header --}}
            <div class="text-center mb-12 lg:mb-16">
                <p class="text-[#D4AF37] tracking-[0.25em] uppercase text-xs mb-3 font-medium"
                    style="font-family: 'Satoshi', sans-serif;">
                    The Narrative
                </p>
                <h2 class="font-light text-3xl md:text-4xl lg:text-5xl text-[var(--color-primary)] leading-tight mb-6"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;">
                    Design is not what we do.<br class="hidden md:block" /> It's who we are.
                </h2>
                <div class="w-20 h-px bg-gradient-to-r from-[#D4AF37] to-transparent mx-auto"></div>
            </div>

            {{-- Chapter 1: The Beginning --}}
            <div class="story-chapter mb-10 lg:mb-14">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 items-center">
                    {{-- Image Left --}}
                    <div class="chapter-image order-2 lg:order-1">
                        <div class="image-wrapper">
                            <img src="https://ik.imagekit.io/AthaConstruction/assets/design_6953a3f3a04282.55079441_JiCtRKkl5.png"
                                alt="Nesthetix Designs - Thoughtfully designed interior space"
                                class="w-full h-full object-cover" loading="lazy" />
                        </div>
                    </div>
                    {{-- Content Right --}}
                    <div class="chapter-content order-1 lg:order-2">
                        <div class="chapter-label">Chapter One</div>
                        <h2 class="chapter-title" style="font-family: 'Canela Text Trial', serif;">
                            The Beginning
                        </h2>
                        <div class="chapter-divider"></div>
                        <div class="chapter-text" style="font-family: 'Satoshi', sans-serif;">
                            <p>
                                <span class="font-semibold text-[var(--color-primary)]">Nesthetix Designs LLP</span> was
                                born from a <span class="font-medium text-[#6B7280]">natural evolution</span> — a
                                response to the growing demand for interiors that move beyond <span
                                    class="italic">surface aesthetics</span> and genuinely <span
                                    class="font-medium text-[#6B7280]">reflect the individuality</span> of those who
                                inhabit them.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Chapter 2: The Evolution --}}
            <div class="story-chapter mb-10 lg:mb-14">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 items-center">
                    {{-- Content Left --}}
                    <div class="chapter-content">
                        <div class="chapter-label">Chapter Two</div>
                        <h2 class="chapter-title" style="font-family: 'Canela Text Trial', serif;">
                            The Evolution
                        </h2>
                        <div class="chapter-divider"></div>
                        <div class="chapter-text" style="font-family: 'Satoshi', sans-serif;">
                            <p class="mb-3">
                                What began as a focused design initiative matured into a <span
                                    class="font-medium text-[#6B7280]">dedicated interior design practice</span>,
                                committed to creating <span class="font-medium">personalized, sophisticated
                                    environments</span>. By quietly blending <span class="font-medium">contemporary
                                    sensibilities with timeless elegance</span>, Nesthetix has shaped a design
                                philosophy rooted in <span class="font-semibold text-[var(--color-primary)]">balance,
                                    restraint, and intent</span>.
                            </p>
                            <p>
                                Each space is approached as a <span
                                    class="font-medium italic text-[#6B7280]">narrative</span> — <span
                                    class="font-medium">thoughtfully planned, meticulously detailed</span>, and tailored
                                to complement modern living while remaining <span class="font-medium">enduring in
                                    character</span>.
                            </p>
                        </div>
                    </div>
                    {{-- Image Right --}}
                    <div class="chapter-image">
                        <div class="image-wrapper">
                            <img src="https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg"
                                alt="Luxury Interior Design" class="w-full h-full object-cover" loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- Chapter 3: The Philosophy --}}
            <div class="story-chapter mb-10 lg:mb-14">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 items-center">
                    {{-- Image Left --}}
                    <div class="chapter-image order-2 lg:order-1">
                        <div class="image-wrapper">
                            <img src="https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg"
                                alt="Modern Interior Design" class="w-full h-full object-cover" loading="lazy" />
                        </div>
                    </div>
                    {{-- Content Right --}}
                    <div class="chapter-content order-1 lg:order-2">
                        <div class="chapter-label">Chapter Three</div>
                        <h2 class="chapter-title" style="font-family: 'Canela Text Trial', serif;">
                            The Philosophy
                        </h2>
                        <div class="chapter-divider"></div>
                        <div class="chapter-text" style="font-family: 'Satoshi', sans-serif;">
                            <p>
                                With a clear focus on <span class="font-semibold text-[var(--color-primary)]">bespoke
                                    luxury interiors</span> and <span class="font-medium text-[#6B7280]">architectural
                                    enhancements</span>, Nesthetix Designs LLP refined its practice to serve a <span
                                    class="font-medium">discerning clientele</span>. <span
                                    class="font-medium text-[#6B7280]">Advanced design methodologies</span>, curated
                                material palettes, and considered integration of automation quietly elevate both the
                                <span class="font-medium">aesthetics and performance</span> of every project.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Chapter 4: The Present & Beyond --}}
            <div class="story-chapter">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 items-center">
                    {{-- Content Left --}}
                    <div class="chapter-content">
                        <div class="chapter-label">Chapter Four</div>
                        <h2 class="chapter-title" style="font-family: 'Canela Text Trial', serif;">
                            The Present & Beyond
                        </h2>
                        <div class="chapter-divider"></div>
                        <div class="chapter-text" style="font-family: 'Satoshi', sans-serif;">
                            <p class="mb-3">
                                Supported by a <span class="font-medium text-[#6B7280]">dedicated team of architects and
                                    designers</span>, Nesthetix has delivered refined interiors across <span
                                    class="font-medium">luxury residences, commercial environments, and hospitality
                                    spaces</span>. <span class="font-semibold text-[var(--color-primary)]">Precision in
                                    detailing</span>, structured execution, and a measured approach to craftsmanship
                                have become <span class="font-medium italic text-[#6B7280]">defining pillars</span> of
                                the studio.
                            </p>
                            <p>
                                This evolution has positioned Nesthetix Designs as a <span
                                    class="font-semibold text-[var(--color-primary)]">trusted name in high-end interior
                                    design</span> — setting a calm, confident foundation for continued <span
                                    class="font-medium text-[#6B7280]">growth, innovation, and excellence</span>.
                            </p>
                        </div>
                    </div>
                    {{-- Image Right --}}
                    <div class="chapter-image">
                        <div class="image-wrapper">
                            <img src="https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg"
                                alt="Premium Interior Design" class="w-full h-full object-cover" loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- What We Offer Section --}}
    <section class="relative py-12 lg:py-14 px-6 lg:px-16 overflow-hidden bg-pattern-dark-radial" data-animate="fade-up"
        style="opacity: 1; visibility: visible;">
        <div class="max-w-7xl mx-auto">
            {{-- Section Header --}}
            <div class="text-center mb-10 lg:mb-12">
                <p class="text-[#D4AF37] tracking-[0.25em] uppercase text-xs mb-2 font-medium"
                    style="font-family: 'Satoshi', sans-serif;">
                    What We Deliver
                </p>
                <h2 class="font-light text-3xl lg:text-4xl text-white leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;">
                    Our Expertise
                </h2>
                <div class="w-16 h-px bg-gradient-to-r from-[#D4AF37] to-transparent mx-auto"></div>
            </div>

            {{-- Offerings Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
                {{-- Offering 1 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        Bespoke Design
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Fully customized interiors reflecting your unique personality and lifestyle.
                    </p>
                </div>

                {{-- Offering 2 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        Premium Materials
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Curated selection of premium materials, imported finishes, and luxury hardware.
                    </p>
                </div>

                {{-- Offering 3 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        Precision Execution
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Structured execution with quality craftsmanship, ensuring flawless implementation.
                    </p>
                </div>

                {{-- Offering 4 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        Advanced Methods
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Cutting-edge design methodologies and tech for smart, future-ready spaces.
                    </p>
                </div>

                {{-- Offering 5 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        Expert Support
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Dedicated architects and designers collaboratively bringing your vision to life.
                    </p>
                </div>

                {{-- Offering 6 --}}
                <div class="offering-card">
                    <div class="offering-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="offering-title" style="font-family: 'Canela Text Trial', serif;">
                        End-to-End Service
                    </h3>
                    <p class="offering-text" style="font-family: 'Satoshi', sans-serif;">
                        Complete turnkey solutions from concept development to final handover.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Values Section --}}
    <section class="relative py-12 lg:py-14 px-6 lg:px-16 overflow-hidden bg-white" data-animate="fade-up"
        style="opacity: 1; visibility: visible;">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-10 lg:mb-12">
                <p class="text-[#D4AF37] tracking-[0.25em] uppercase text-xs mb-2 font-medium"
                    style="font-family: 'Satoshi', sans-serif;">
                    Our Foundation
                </p>
                <h2 class="font-light text-3xl lg:text-4xl text-[var(--color-primary)] leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;">
                    Core Values
                </h2>
                <div class="w-16 h-px bg-gradient-to-r from-[#D4AF37] to-transparent mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-6">
                <div class="value-card group">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="value-title" style="font-family: 'Canela Text Trial', serif;">
                            Excellence
                        </h3>
                        <p class="value-text" style="font-family: 'Satoshi', sans-serif;">
                            We strive for perfection in every detail, ensuring the highest quality in design and
                            execution.
                        </p>
                    </div>
                </div>

                <div class="value-card group">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="value-title" style="font-family: 'Canela Text Trial', serif;">
                            Client-Centric
                        </h3>
                        <p class="value-text" style="font-family: 'Satoshi', sans-serif;">
                            Your vision is our priority. We listen, understand, and collaborate to bring your dreams to
                            reality.
                        </p>
                    </div>
                </div>

                <div class="value-card group">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="value-title" style="font-family: 'Canela Text Trial', serif;">
                            Innovation
                        </h3>
                        <p class="value-text" style="font-family: 'Satoshi', sans-serif;">
                            We embrace new ideas, technologies, and design trends to create cutting-edge solutions.
                        </p>
                    </div>
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

    /* Editorial Story Chapters Styles */
    .story-chapter {
        opacity: 1;
    }

    .chapter-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #D4AF37;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        margin-bottom: 0.75rem;
        font-family: 'Satoshi', sans-serif;
    }

    .chapter-title {
        font-size: clamp(2rem, 4vw, 2.75rem);
        font-weight: 300;
        line-height: 1.1;
        color: var(--color-primary);
        letter-spacing: -0.03em;
        margin-bottom: 1rem;
    }

    .chapter-divider {
        width: 80px;
        height: 1px;
        background: linear-gradient(to right, #D4AF37, transparent);
        margin-bottom: 1.25rem;
    }

    .chapter-text {
        font-size: 1.125rem;
        line-height: 1.7;
        color: #374151;
    }

    .chapter-image {
        position: relative;
    }

    .image-wrapper {
        position: relative;
        width: 80%;
        /* Reduced width */
        margin: 0 auto;
        /* Center in column */
        aspect-ratio: 1 / 1;
        /* Square for compactness */
        overflow: hidden;
        border-radius: 0.375rem;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        transition: box-shadow 0.3s ease;
    }

    .chapter-image:hover .image-wrapper {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    }

    .image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .chapter-image:hover .image-wrapper img {
        transform: scale(1.02);
    }

    .chapter-content {
        padding: 0.5rem 0;
    }

    /* Offering Cards */
    .offering-card {
        background: #1a1a1a;
        border-radius: 0.75rem;
        padding: 1.5rem;
        border: 1px solid rgba(212, 175, 55, 0.3);
        transform: translateY(-4px);
        box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.5);
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
        height: 1px;
        background: linear-gradient(90deg, transparent, #D4AF37, transparent);
        transform: scaleX(1);
        transform-origin: center;
        transition: transform 0.3s ease;
    }

    .offering-icon {
        width: 2.75rem;
        height: 2.75rem;
        border-radius: 0.5rem;
        background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-primary);
        margin-bottom: 1rem;
        transform: scale(1.05);
        transition: all 0.3s ease;
        border: 1px solid rgba(212, 175, 55, 0.4);
    }

    .offering-title {
        font-size: 1.125rem;
        font-weight: 300;
        color: white;
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .offering-text {
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.5;
        font-size: 0.875rem;
        transition: color 0.3s ease;
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
        border-radius: 0.75rem;
        padding: 1.5rem;
        text-align: left;
        /* Aligned left for modern minimal look */
        display: flex;
        gap: 1rem;
        align-items: flex-start;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .value-card:hover {
        border-color: #D4AF37;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        transform: translateY(-2px);
    }

    .value-icon {
        width: 2.5rem;
        height: 2.5rem;
        flex-shrink: 0;
        /* Prevent squishing */
        border-radius: 0.5rem;
        background: #f9fafb;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-primary);
        transition: all 0.3s ease;
        border: 1px solid #f3f4f6;
    }

    .value-card:hover .value-icon {
        background: var(--color-primary);
        color: #D4AF37;
        border-color: var(--color-primary);
    }

    .value-title {
        font-size: 1.125rem;
        font-weight: 300;
        color: var(--color-primary);
        margin-bottom: 0.375rem;
    }

    .value-text {
        color: #6b7280;
        line-height: 1.5;
        font-size: 0.875rem;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .quote-text {
            font-size: clamp(1.25rem, 3vw, 1.75rem);
        }

        .chapter-title {
            font-size: clamp(1.25rem, 3vw, 1.75rem);
        }

        .chapter-text {
            font-size: 0.875rem;
        }

        .story-chapter {
            margin-bottom: 2rem;
        }
    }

    @media (max-width: 768px) {
        .editorial-quote {
            margin-bottom: 2rem;
        }

        .quote-text {
            font-size: clamp(1.125rem, 4vw, 1.5rem);
            margin-bottom: 0.75rem;
        }

        .quote-divider {
            width: 60px;
        }

        .story-chapter {
            margin-bottom: 2rem;
        }

        .chapter-content {
            padding: 0.75rem 0;
        }

        .chapter-label {
            font-size: 0.625rem;
            margin-bottom: 0.5rem;
        }

        .chapter-title {
            font-size: clamp(1.125rem, 3.5vw, 1.5rem);
            margin-bottom: 0.5rem;
        }

        .chapter-divider {
            width: 50px;
            margin-bottom: 0.75rem;
        }

        .chapter-text {
            font-size: 0.875rem;
            line-height: 1.6;
        }

        .image-wrapper {
            aspect-ratio: 4 / 5;
        }

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