@props([
    'heading' => 'Our Story',
    'subheading' => 'Where design evolves into a lifestyle.',
    'image' => 'https://ik.imagekit.io/AthaConstruction/assets/design_6953a3f3a04282.55079441_JiCtRKkl5.png',
    'imageAlt' => 'Nesthetix Designs - Thoughtfully designed interior space',
])

{{-- ============================================
    ABOUT STORY COMPONENT
    Premium Interior Design - Company Story Section
    Usage: <x-about-story />
    ============================================ --}}

<section 
    class="relative py-12 sm:py-16 lg:py-20 px-6 lg:px-16 overflow-hidden bg-white"
    aria-labelledby="about-story-heading"
    data-animate="fade-up"
>
    {{-- Decorative Accent Line --}}
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10"></div>
    
    <div class="relative w-full z-20">
        {{-- Header Section --}}
        <div class="text-center max-w-3xl mx-auto mb-12" data-animate="fade-up">
            {{-- Subtle Authority Line --}}
            <p 
                class="text-theme-muted text-xs md:text-sm tracking-[0.25em] uppercase mb-3 font-medium"
                style="font-family: 'Satoshi', sans-serif;"
                data-animate="fade-up"
                data-delay="0.1"
            >
                {{ $subheading }}
            </p>

            {{-- Main Heading --}}
            <h2
                id="about-story-heading"
                class="font-light text-2xl md:text-4xl lg:text-5xl text-theme-primary leading-tight mb-4"
                style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                data-animate="fade-up"
                data-delay="0.2"
            >
                Shaping Thoughtfully Designed Spaces
            </h2>

            {{-- Primary Divider --}}
            <div 
                class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto"
                data-animate="fade-up"
                data-delay="0.3"
            ></div>
        </div>

        {{-- Two-Column Story --}}
        <div 
            class="grid grid-cols-1 md:grid-cols-[0.9fr_1.1fr] gap-10 md:gap-14 items-stretch max-w-6xl mx-auto"
            data-animate="fade-up"
            data-delay="0.4"
        >
            {{-- Left Column – Image --}}
            <div class="relative h-full flex max-w-md mx-auto md:mx-0">
                <div class="w-full h-full overflow-hidden rounded-lg">
                    <img 
                        src="{{ $image }}"
                        alt="{{ $imageAlt }}"
                        class="w-full h-full object-cover"
                        loading="lazy"
                    />
                </div>
                {{-- Optional subtle overlay gradient --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent pointer-events-none rounded-lg"></div>
            </div>

            {{-- Right Column – Story Content --}}
            <div class="space-y-4 h-full flex flex-col justify-start">
                {{-- Origin & Philosophy --}}
                <p 
                    class="text-gray-700 text-sm md:text-base leading-relaxed"
                    style="font-family: 'Satoshi', sans-serif;"
                >
                    <span class="font-semibold text-[var(--color-primary)]" style="color: var(--color-primary);">Nesthetix Designs LLP</span> was born from a <span class="font-medium" style="color: #C9A86C;">natural evolution</span> — a response to the growing demand for interiors that move beyond <span class="italic">surface aesthetics</span> and genuinely <span class="font-medium" style="color: #C9A86C;">reflect the individuality</span> of those who inhabit them.
                </p>
                <p 
                    class="text-gray-700 text-sm md:text-base leading-relaxed"
                    style="font-family: 'Satoshi', sans-serif;"
                >
                    What began as a focused design initiative matured into a <span class="font-medium" style="color: #C9A86C;">dedicated interior design practice</span>, committed to creating <span class="font-medium">personalized, sophisticated environments</span>. By quietly blending <span class="font-medium">contemporary sensibilities with timeless elegance</span>, Nesthetix has shaped a design philosophy rooted in <span class="font-semibold" style="color: var(--color-primary);">balance, restraint, and intent</span>.
                </p>
                <p 
                    class="text-gray-700 text-sm md:text-base leading-relaxed"
                    style="font-family: 'Satoshi', sans-serif;"
                >
                    Each space is approached as a <span class="font-medium italic" style="color: #C9A86C;">narrative</span> — <span class="font-medium">thoughtfully planned, meticulously detailed</span>, and tailored to complement modern living while remaining <span class="font-medium">enduring in character</span>.
                </p>
                
                {{-- Growth, Expertise & Positioning --}}
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <p 
                        class="text-gray-700 text-sm md:text-base leading-relaxed mb-4"
                        style="font-family: 'Satoshi', sans-serif;"
                    >
                        With a clear focus on <span class="font-semibold" style="color: var(--color-primary);">bespoke luxury interiors</span> and <span class="font-medium" style="color: #C9A86C;">architectural enhancements</span>, Nesthetix Designs LLP refined its practice to serve a <span class="font-medium">discerning clientele</span>. <span class="font-medium" style="color: #C9A86C;">Advanced design methodologies</span>, curated material palettes, and considered integration of automation quietly elevate both the <span class="font-medium">aesthetics and performance</span> of every project.
                    </p>
                    <p 
                        class="text-gray-700 text-sm md:text-base leading-relaxed"
                        style="font-family: 'Satoshi', sans-serif;"
                    >
                        Supported by a <span class="font-medium" style="color: #C9A86C;">dedicated team of architects and designers</span>, Nesthetix has delivered refined interiors across <span class="font-medium">luxury residences, commercial environments, and hospitality spaces</span>. <span class="font-semibold" style="color: var(--color-primary);">Precision in detailing</span>, structured execution, and a measured approach to craftsmanship have become <span class="font-medium italic" style="color: #C9A86C;">defining pillars</span> of the studio.
                    </p>
                    <p 
                        class="text-gray-700 text-sm md:text-base leading-relaxed mt-4"
                        style="font-family: 'Satoshi', sans-serif;"
                    >
                        This evolution has positioned Nesthetix Designs as a <span class="font-semibold" style="color: var(--color-primary);">trusted name in high-end interior design</span> — setting a calm, confident foundation for continued <span class="font-medium" style="color: #C9A86C;">growth, innovation, and excellence</span>.
                    </p>
                </div>
            </div>
        </div>

        {{-- Optional Closing Line --}}
        <div class="mt-10 md:mt-12 text-center">
            <p 
                class="text-xs md:text-sm tracking-[0.2em] uppercase text-theme-muted"
                style="font-family: 'Satoshi', sans-serif;"
            >
                Crafted with intent. Executed with precision.
            </p>
        </div>
    </div>
</section>

