@props([
    'heading' => 'Our Interior Design Expertise',
    'subheading' => 'What We Create',
    'description' => 'We design interiors that are practical, refined, and built to last. Our services are carefully structured to support you at every stage—whether you\'re shaping a new space or enhancing an existing one.',
    'expertise' => [
        [
            'icon' => 'design-build',
            'title' => 'Design & Turnkey Solutions',
            'description' => 'We handle both design and execution as a single, streamlined process. Our team ensures your space is thoughtfully planned, expertly built, and delivered with consistent quality from start to finish.',
        ],
        [
            'icon' => 'workplace',
            'title' => 'Workplace Planning & Advisory',
            'description' => 'We help organizations design work environments that encourage efficiency and collaboration. Our approach focuses on smart layouts, material intelligence, and spaces that align with your business culture.',
        ],
        [
            'icon' => 'furniture',
            'title' => 'Tailor-Made Furniture & Finishes',
            'description' => 'Our in-house capabilities allow us to create furniture and interior elements designed specifically for your space. Each piece is crafted to complement the design while ensuring comfort, durability, and visual balance.',
        ],
        [
            'icon' => 'project-management',
            'title' => 'Structured Project Coordination',
            'description' => 'From site supervision to vendor alignment, we manage every moving part of the project. Our process-driven coordination ensures smooth execution, controlled timelines, and reliable outcomes.',
        ],
        [
            'icon' => 'mep',
            'title' => 'MEP Planning & Integration',
            'description' => 'Technical services are carefully planned alongside design to ensure seamless functionality. Our coordinated MEP solutions support safety, efficiency, and comfort without disrupting the aesthetics of the space.',
        ],
        [
            'icon' => 'technology',
            'title' => 'Design Development & Insights',
            'description' => 'We invest time in understanding evolving lifestyles, materials, and technologies. This allows us to create interiors that remain relevant, functional, and visually appealing over time.',
        ],
    ],
])

{{-- ============================================
    EXPERTISE SECTION COMPONENT
    Premium Interior Design - Our Expertise Section
    Usage: <x-expertise-section />
    ============================================ --}}

<section 
    class="relative py-12 px-6 lg:px-16 overflow-hidden bg-white"
    aria-labelledby="our-expertise"
    data-animate="fade-up"
>
    {{-- Decorative Accent Line --}}
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10"></div>

    <div class="relative max-w-7xl mx-auto z-20">
        {{-- Header Section --}}
        <div class="text-center max-w-4xl mx-auto mb-12" data-animate="fade-up">
            {{-- Subheading Badge --}}
            <p 
                class="text-theme-muted tracking-[0.3em] uppercase text-xs mb-3 font-medium"
                style="font-family: 'Satoshi', sans-serif;"
                data-animate="fade-up"
                data-delay="0.1"
            >
                {{ $subheading }}
            </p>

            {{-- Main Heading --}}
            <h2
                id="our-expertise"
                class="font-light text-2xl md:text-4xl lg:text-5xl text-theme-primary leading-tight mb-4"
                style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                data-animate="fade-up"
                data-delay="0.2"
            >
                {{ $heading }}
            </h2>

            {{-- Primary Divider --}}
            <div 
                class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto mb-6"
                data-animate="fade-up"
                data-delay="0.3"
            ></div>

            {{-- Description --}}
            <p 
                class="max-w-4xl mx-auto text-gray-700 text-sm md:text-base leading-relaxed mb-8"
                style="font-family: 'Satoshi', sans-serif;"
                data-animate="fade-up"
                data-delay="0.4"
            >
                {{ $description }}
            </p>
        </div>

        {{-- Expertise Grid --}}
        @php
            $totalItems = count($expertise);
            $remainder = $totalItems % 3;
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mb-12 expertise-grid" data-animate="stagger" data-animate-custom="true" data-stagger="0.1">
            @foreach($expertise as $index => $item)
                @php
                    // Calculate if this item is in the last row
                    $itemsInLastRow = $remainder === 0 ? 3 : $remainder;
                    $lastRowStartIndex = $totalItems - $itemsInLastRow;
                    $isInLastRow = $index >= $lastRowStartIndex;
                    
                    // Determine column span for items in the last row
                    $spanClass = '';
                    if ($isInLastRow && $remainder === 1) {
                        // If last row has only 1 card, make it span all 3 columns
                        if ($index === $totalItems - 1) {
                            $spanClass = 'lg:col-span-3';
                        }
                    } elseif ($isInLastRow && $remainder === 2) {
                        // If last row has 2 cards, make the second card span 2 columns
                        if ($index === $totalItems - 1) {
                            $spanClass = 'lg:col-span-2';
                        }
                    }
                @endphp
                <article 
                    class="group relative expertise-item {{ $spanClass }}"
                    data-animate="fade-up"
                    data-delay="{{ $index * 0.1 }}"
                >
                    <div class="h-full flex flex-col">
                        {{-- Icon Container --}}
                        <div class="flex-shrink-0 mb-4">
                            <div 
                                class="w-14 h-14 rounded-lg flex items-center justify-center transition-all duration-300 group-hover:scale-110 expertise-icon"
                                style="background-color: var(--color-primary); color: var(--color-text);"
                            >
                                @php
                                    $iconName = $item['icon'] ?? 'default';
                                    $iconPaths = [
                                        'design-build' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
                                        'workplace' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                                        'furniture' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                                        'project-management' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
                                        'mep' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                                        'technology' => 'M13 10V3L4 14h7v7l9-11h-7z',
                                        'default' => 'M13 10V3L4 14h7v7l9-11h-7z',
                                    ];
                                    $iconPath = $iconPaths[$iconName] ?? $iconPaths['default'];
                                @endphp
                                <svg 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    class="w-7 h-7" 
                                    fill="none" 
                                    viewBox="0 0 24 24" 
                                    stroke="currentColor" 
                                    stroke-width="1.5"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}" />
                                </svg>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="flex-1">
                            <h3 
                                class="font-light text-xl md:text-2xl text-theme-primary mb-3 leading-tight"
                                style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.01em;"
                            >
                                {{ $item['title'] }}
                            </h3>
                            <p 
                                class="text-gray-600 text-sm md:text-base leading-relaxed"
                                style="font-family: 'Satoshi', sans-serif;"
                            >
                                {{ $item['description'] }}
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</section>

{{-- Stagger Animation Script --}}
<script>
(function() {
    'use strict';
    
    let staggerAnimationCreated = false;
    
    function initExpertiseAnimations() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined' || staggerAnimationCreated) {
            if (!staggerAnimationCreated) {
                setTimeout(initExpertiseAnimations, 100);
            }
            return;
        }

        const expertiseGrid = document.querySelector('.expertise-grid');
        if (!expertiseGrid) return;

        const expertiseItems = expertiseGrid.querySelectorAll('.expertise-item');
        
        if (expertiseItems.length === 0) return;

        // Set initial state for all items
        gsap.set(expertiseItems, {
            opacity: 0,
            y: 40
        });

        // Create stagger animation from parent container
        const staggerValue = parseFloat(expertiseGrid.dataset.stagger) || 0.1;

        gsap.to(expertiseItems, {
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: staggerValue,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: expertiseGrid,
                start: 'top 85%',
                toggleActions: 'play none none none',
                once: true,
                onEnter: () => {
                    gsap.to(expertiseItems, {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        stagger: staggerValue,
                        ease: 'power3.out',
                        overwrite: true
                    });
                }
            }
        });

        staggerAnimationCreated = true;

        // Refresh ScrollTrigger after animation is set up
        setTimeout(() => {
            if (typeof ScrollTrigger !== 'undefined') {
                ScrollTrigger.refresh();
            }
        }, 100);
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initExpertiseAnimations);
    } else {
        initExpertiseAnimations();
    }

    // Refresh ScrollTrigger on window load and resize
    window.addEventListener('load', () => {
        setTimeout(() => {
            if (typeof ScrollTrigger !== 'undefined') {
                ScrollTrigger.refresh();
            }
        }, 300);
    });

    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (typeof ScrollTrigger !== 'undefined') {
                ScrollTrigger.refresh();
            }
        }, 250);
    });
})();
</script>

<style>
.expertise-item {
    will-change: transform, opacity;
}
</style>
