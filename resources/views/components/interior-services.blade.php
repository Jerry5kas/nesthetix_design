@props([
    'services' => [
        [
            'title' => 'Residential Interiors',
            'description' => 'Transform your home into a personalized sanctuary that reflects your unique lifestyle and aesthetic preferences.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
        ],
        [
            'title' => 'Commercial Interiors',
            'description' => 'Create inspiring workspaces and commercial environments that enhance productivity and reflect your brand identity.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ranamatloob567-34823909_694baf216652f9.25031009_PrRZQjkTvi.jpg',
        ],
        [
            'title' => 'Modular Kitchens',
            'description' => 'Modern, functional kitchens designed with precision and style, maximizing space and efficiency.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg',
        ],
        [
            'title' => 'Design-Only Services',
            'description' => 'Professional design consultation and planning services to bring your vision to life with detailed blueprints.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg',
        ],
        [
            'title' => 'Execution-Only Services',
            'description' => 'Expert project management and execution services to implement your design plans with precision and quality.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
        ],
        [
            'title' => 'Budget-Based Interiors',
            'description' => 'Thoughtful design solutions tailored to your budget without compromising on style and quality.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg',
        ],
        [
            'title' => 'Luxury Interiors',
            'description' => 'Premium, high-end interior design with exquisite materials and bespoke solutions for the most discerning clients.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg',
        ],
    ],
    'heading' => 'Customized Interiors Crafted by Professionals',
    'subheading' => 'Experience Excellence in Design',
    'description' => 'At Nesthetix Designs, we specialize in delivering tailor-made interior design solutions that balance aesthetics, functionality, and comfort. From elegant residences to sophisticated commercial spaces, every design is thoughtfully planned to reflect your lifestyle and brand identity.',
    'ctaText' => 'Explore Our Gallery',
    'ctaLink' => '/gallery',
])

{{-- ============================================
    INTERIOR SERVICES COMPONENT
    Premium Interior Design Services - Modular Grid
    Usage: <x-interior-services />
    ============================================ --}}

<section 
    class="relative py-12 px-6 lg:px-16 overflow-hidden" 
    style="background-color: #F9FAFB;" {{-- Tailwind gray-50 equivalent --}}
    aria-labelledby="interior-services" 
    data-animate="fade-up"
>
    {{-- Decorative Accent Line --}}
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10"></div>
    
    <div class="relative max-w-7xl mx-auto z-20">
        {{-- Header Section --}}
        <div class="text-center max-w-4xl mx-auto mb-10" data-animate="fade-up">
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
                id="interior-services"
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

        {{-- Services Cards Grid --}}
        @php
            $totalServices = count($services);
            $remainder = $totalServices % 3;
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 mb-10 services-grid" data-animate="stagger" data-animate-custom="true" data-stagger="0.1">
            @foreach($services as $index => $service)
                @php
                    // Calculate if this item is in the last row
                    $itemsInLastRow = $remainder === 0 ? 3 : $remainder;
                    $lastRowStartIndex = $totalServices - $itemsInLastRow;
                    $isInLastRow = $index >= $lastRowStartIndex;
                    
                    // Determine column span for items in the last row
                    $spanClass = '';
                    if ($isInLastRow && $remainder === 1) {
                        // If last row has only 1 card, make it span all 3 columns
                        if ($index === $totalServices - 1) {
                            $spanClass = 'lg:col-span-3';
                        }
                    } elseif ($isInLastRow && $remainder === 2) {
                        // If last row has 2 cards, make the second card span 2 columns
                        if ($index === $totalServices - 1) {
                            $spanClass = 'lg:col-span-2';
                        }
                    }
                @endphp
                <article 
                    class="group relative rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-500 service-card {{ $spanClass }}"
                >
                    {{-- Background Image --}}
                    <div 
                        class="relative w-full h-56 sm:h-64 lg:h-72 overflow-hidden"
                    >
                        {{-- Lazy-loaded background image --}}
                        <div 
                            class="absolute inset-0 bg-cover bg-center service-image"
                            data-bg-image="{{ $service['image'] ?? '' }}"
                            data-loaded="false"
                        ></div>
                        {{-- Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/45 to-black/15 group-hover:from-black/70 group-hover:via-black/35 group-hover:to-black/5 transition-colors duration-500"></div>

                        {{-- Content --}}
                        <div class="relative z-10 flex h-full flex-col justify-end p-5 sm:p-6">
                            <h3 class="font-fancy text-white text-xl sm:text-2xl mb-2 tracking-wide" style="font-family: 'Canela Text Trial', serif; text-shadow: 0 2px 15px rgba(0,0,0,0.7);">
                                {{ $service['title'] }}
                            </h3>
                            <p class="text-white/85 text-xs sm:text-sm leading-relaxed max-w-md" style="font-family: 'Satoshi', sans-serif;">
                                {{ $service['description'] ?? '' }}
                            </p>

                            {{-- Bottom Indicator --}}
                            <div class="mt-4 flex items-center justify-between text-[11px] sm:text-xs text-white/80" style="font-family: 'Satoshi', sans-serif;">
                                <span class="inline-flex items-center gap-2">
                                    <span class="w-6 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent"></span>
                                    <span>Interior {{ $service['title'] }}</span>
                                </span>
                                <span class="inline-flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span>View</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- CTA Section --}}
        <div class="text-center" data-animate="fade-up" data-delay="0.6">
            <a
                href="{{ $ctaLink }}"
                class="cta-button inline-flex items-center gap-2 px-8 py-3 rounded-full text-sm tracking-wide group shadow-md"
                aria-label="{{ $ctaText }}"
                style="font-family: 'Satoshi', sans-serif;"
            >
                <span>{{ $ctaText }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300 ease-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>

    {{-- Bottom Accent Line --}}
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10"></div>
</section>

{{-- Lazy Loading and Scroll Animation Script --}}
<script>
(function() {
    'use strict';
    
    let imagesLoaded = 0;
    let totalImages = 0;
    let staggerAnimationCreated = false;
    
    // Wait for DOM and GSAP to be ready
    function initServiceImages() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            setTimeout(initServiceImages, 100);
            return;
        }

        const serviceImages = document.querySelectorAll('.service-image[data-loaded="false"]');
        totalImages = serviceImages.length;
        
        // Intersection Observer for lazy loading images
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const imgElement = entry.target;
                    const imageUrl = imgElement.dataset.bgImage;
                    
                    if (imageUrl && imgElement.dataset.loaded === 'false') {
                        imgElement.dataset.loaded = 'loading';
                        
                        // Preload image
                        const img = new Image();
                        img.onload = function() {
                            imgElement.style.backgroundImage = `url('${imageUrl}')`;
                            imgElement.dataset.loaded = 'true';
                            imgElement.classList.add('loaded');
                            
                            imagesLoaded++;
                            
                            // Refresh ScrollTrigger after images load
                            if (typeof ScrollTrigger !== 'undefined' && imagesLoaded === totalImages) {
                                setTimeout(() => {
                                    ScrollTrigger.refresh();
                                    initStaggerAnimation();
                                }, 100);
                            }
                        };
                        img.onerror = function() {
                            imgElement.dataset.loaded = 'error';
                            imgElement.style.backgroundColor = '#f0f0f0';
                            imagesLoaded++;
                            
                            if (typeof ScrollTrigger !== 'undefined' && imagesLoaded === totalImages) {
                                setTimeout(() => {
                                    ScrollTrigger.refresh();
                                    initStaggerAnimation();
                                }, 100);
                            }
                        };
                        img.src = imageUrl;
                        
                        observer.unobserve(imgElement);
                    }
                }
            });
        }, {
            rootMargin: '100px',
            threshold: 0.01
        });

        // Observe all service images
        serviceImages.forEach(img => {
            imageObserver.observe(img);
        });

        // Initialize stagger animation (it will work even if images are still loading)
        setTimeout(() => {
            if (!staggerAnimationCreated) {
                initStaggerAnimation();
            }
        }, 500);

        // Fallback: Refresh after all images should be loaded
        setTimeout(() => {
            if (typeof ScrollTrigger !== 'undefined') {
                ScrollTrigger.refresh();
            }
        }, 1500);
    }

    function initStaggerAnimation() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined' || staggerAnimationCreated) {
            return;
        }

        const servicesGrid = document.querySelector('.services-grid');
        if (!servicesGrid) return;

        const serviceCards = servicesGrid.querySelectorAll('.service-card');
        
        if (serviceCards.length === 0) return;

        // Set initial state for all cards
        gsap.set(serviceCards, {
            opacity: 0,
            y: 60
        });

        // Create stagger animation from parent container
        const staggerValue = parseFloat(servicesGrid.dataset.stagger) || 0.1;

        gsap.to(serviceCards, {
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: staggerValue,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: servicesGrid,
                start: 'top 85%',
                toggleActions: 'play none none none',
                once: true,
                onEnter: () => {
                    gsap.to(serviceCards, {
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
        document.addEventListener('DOMContentLoaded', initServiceImages);
    } else {
        initServiceImages();
    }

    // Refresh ScrollTrigger on window load and resize
    window.addEventListener('load', () => {
        setTimeout(() => {
            if (typeof ScrollTrigger !== 'undefined') {
                ScrollTrigger.refresh();
            }
        }, 300);
    });

    // Refresh on resize
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
.service-image {
    opacity: 0;
    transition: opacity 0.6s ease-in-out;
    z-index: 1;
    transform: scale(1);
    transition: opacity 0.6s ease-in-out, transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.service-image.loaded {
    opacity: 1;
}

/* Smooth scale on hover with custom easing */
.service-card:hover .service-image {
    transform: scale(1.08);
}

.service-card {
    will-change: transform, opacity;
}

/* Placeholder gradient that doesn't interfere with image */
.service-image::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%);
    z-index: -1;
    opacity: 1;
    transition: opacity 0.6s ease-in-out;
}

.service-image.loaded::before {
    opacity: 0;
}

/* Ensure overlay stays above image */
.service-card .absolute.inset-0.bg-gradient-to-t {
    z-index: 2;
}

/* Ensure content stays above everything */
.service-card .relative.z-10 {
    z-index: 3;
}

/* CTA Button Styles with Theme Colors */
.cta-button {
    background-color: var(--color-primary);
    color: var(--color-text);
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    border: 2px solid var(--color-primary);
}

.cta-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: var(--color-secondary);
    transform: scaleX(0);
    transform-origin: right;
    transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    z-index: 0;
}

.cta-button > span,
.cta-button > svg {
    position: relative;
    z-index: 1;
    transition: color 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    color: var(--color-text);
}

.cta-button:hover {
    border-color: var(--color-secondary);
    box-shadow: 0 10px 25px rgba(50, 1, 47, 0.3);
    transform: translateY(-2px);
}

.cta-button:hover > span,
.cta-button:hover > svg {
    color: #FFFFFF;
}

.cta-button:hover::before {
    transform: scaleX(1);
    transform-origin: left;
}

.cta-button:active {
    transform: translateY(0);
    box-shadow: 0 5px 15px rgba(50, 1, 47, 0.2);
}
</style>

