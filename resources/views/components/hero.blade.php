{{-- ============================================
    HERO BANNER - Alpine.js Carousel
    Premium Interior Design Hero with Simple Slider
    Usage: <x-hero />
    ============================================ --}}

<section class="hero-banner relative min-h-[90vh] flex items-center overflow-hidden" x-data="heroCarousel()">
    {{-- Carousel Container --}}
    <div class="absolute inset-0">
        <template x-for="(slide, index) in slides" :key="index">
            <div 
                class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
                :class="currentSlide === index ? 'opacity-100 z-10' : 'opacity-0 z-0'"
            >
                <img 
                    :src="slide.image" 
                    :alt="slide.alt" 
                    class="w-full h-full object-cover"
                    :loading="index === 0 ? 'eager' : 'lazy'"
                />
                {{-- Dark Gradient Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/40"></div>
                {{-- Warm Purple Tint Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#32012F]/30"></div>
                {{-- Subtle Grain Texture --}}
                <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noise%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noise)%22/%3E%3C/svg%3E');"></div>
            </div>
        </template>
    </div>

    {{-- Decorative Elements --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#C9A86C]/30 to-transparent z-20"></div>
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#C9A86C]/30 to-transparent z-20"></div>
    
    {{-- Vertical Gold Lines (Decorative) --}}
    <div class="absolute left-8 lg:left-16 top-1/4 bottom-1/4 w-px bg-gradient-to-b from-transparent via-[#C9A86C]/20 to-transparent hidden lg:block z-20"></div>
    <div class="absolute right-8 lg:right-16 top-1/4 bottom-1/4 w-px bg-gradient-to-b from-transparent via-[#C9A86C]/20 to-transparent hidden lg:block z-20"></div>

    {{-- Main Content --}}
    <div class="relative z-30 w-full max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-12 lg:py-16">
        <div class="max-w-4xl">
            {{-- Pre-headline Badge --}}
            <div class="mb-6" data-animate="fade-up">
                <span class="inline-flex items-center gap-3 text-[#C9A86C] text-sm tracking-[0.3em] uppercase font-medium" style="font-family: 'Satoshi', sans-serif;">
                    <span class="w-12 h-px bg-[#C9A86C]"></span>
                    <span x-text="slides[currentSlide].badge"></span>
                </span>
            </div>

            {{-- Main Headline --}}
            <h1 class="hero-headline text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-light leading-[0.95] mb-6 text-white" data-animate="fade-up" data-delay="0.1" style="font-family: 'Canela Text Trial', serif;">
                <span x-text="slides[currentSlide].headline">Spaces That Hold Their Value.</span>
            </h1>

            {{-- Gold Divider --}}
            <div class="w-24 h-px bg-gradient-to-r from-[#C9A86C] to-transparent mb-6" data-animate="fade-up" data-delay="0.3"></div>

            {{-- Subheadline --}}
            <p class="text-base sm:text-lg lg:text-xl text-white/70 leading-relaxed max-w-2xl mb-8 font-light" data-animate="fade-up" data-delay="0.4" style="font-family: 'Satoshi', sans-serif;" x-text="slides[currentSlide].subheadline">
                Thoughtfully planned living rooms that balance natural light, circulation, and comfort — so your home feels open yet intimate.
            </p>

            {{-- Service Tags --}}
            <div class="flex flex-wrap items-center gap-3 sm:gap-4 mb-8" data-animate="fade-up" data-delay="0.5" style="font-family: 'Satoshi', sans-serif;">
                <template x-for="(tag, index) in slides[currentSlide].tags" :key="index">
                    <div class="flex items-center">
                        <span class="text-white/50 text-xs sm:text-sm tracking-wide" x-text="tag"></span>
                        <span x-show="index < slides[currentSlide].tags.length - 1" class="w-1 h-1 rounded-full bg-[#C9A86C] mx-3 sm:mx-4"></span>
                    </div>
                </template>
            </div>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-6" data-animate="fade-up" data-delay="0.6">
                {{-- Primary CTA - Opens Consultation Lightbox --}}
                <button type="button" class="banner-btn-primary group inline-flex items-center justify-center gap-3 px-8 py-4 font-medium tracking-wide transition-all duration-500" data-magnetic data-consultation-trigger style="font-family: 'Satoshi', sans-serif;">
                    <span>Get a Free Consultation</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
                {{-- Secondary CTA - Outline with fill hover --}}
                <a href="#portfolio" class="banner-btn-secondary group inline-flex items-center justify-center gap-3 px-8 py-4 font-medium tracking-wide transition-all duration-500" data-magnetic style="font-family: 'Satoshi', sans-serif;">
                    <span>View Our Work</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    {{-- Carousel Navigation Dots --}}
    <div class="absolute bottom-20 left-1/2 -translate-x-1/2 z-30 flex items-center gap-3">
        <template x-for="(slide, index) in slides" :key="index">
            <button 
                type="button" 
                @click="goToSlide(index)"
                class="transition-all duration-500 rounded-full"
                :class="currentSlide === index ? 'w-10 h-2 bg-[#C9A86C]' : 'w-2 h-2 bg-white/30 hover:bg-white/50'"
                :aria-label="'Go to slide ' + (index + 1)"
            ></button>
        </template>
    </div>

    {{-- Carousel Navigation Arrows --}}
    <button 
        type="button" 
        @click="prevSlide()"
        class="absolute left-6 lg:left-12 top-1/2 -translate-y-1/2 z-30 w-12 h-12 lg:w-14 lg:h-14 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white transition-all duration-300 hover:bg-white/20 hover:scale-110"
        aria-label="Previous slide"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:w-6 lg:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button 
        type="button" 
        @click="nextSlide()"
        class="absolute right-6 lg:right-12 top-1/2 -translate-y-1/2 z-30 w-12 h-12 lg:w-14 lg:h-14 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white transition-all duration-300 hover:bg-white/20 hover:scale-110"
        aria-label="Next slide"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:w-6 lg:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    {{-- Side Text (Desktop only) --}}
    <div class="absolute right-8 top-1/2 -translate-y-1/2 hidden xl:block z-30">
        <span class="text-white/20 text-xs tracking-[0.5em] uppercase writing-vertical" style="font-family: 'Satoshi', sans-serif;">
            Est. 2015 — Premium Interiors
        </span>
    </div>
</section>

{{-- Alpine.js Carousel Script --}}
<script>
    function heroCarousel() {
        return {
            currentSlide: 0,
            autoplayInterval: null,
            slides: [
                {
                    image: "{{ asset('images/alberto-castillo-q-mx4mSkK9zeo-unsplash.jpg') }}",
                    alt: "Luxury Interior Design - Open Concept Living",
                    headline: "Spaces That Hold Their Value.",
                    subheadline: "Thoughtfully planned living rooms that balance natural light, circulation, and comfort — so your home feels open yet intimate.",
                    badge: "Signature Living Spaces",
                    tags: ["Luxury Apartments", "Open-Plan Living", "Indoor–Outdoor Flow", "Turnkey Execution"]
                },
                {
                    image: "{{ asset('images/jason-wang-NxAwryAbtIw-unsplash.jpg') }}",
                    alt: "Modern Interior Design - Reading Nook",
                    headline: "Rooms That Invite You In.",
                    subheadline: "Soft textures, deep tones, and tailored furniture layouts that turn any corner into a quiet, luxurious retreat.",
                    badge: "Reading & Lounge Corners",
                    tags: ["Statement Seating", "Layered Lighting", "Accent Walls", "Styling & Décor"]
                },
                {
                    image: "{{ asset('images/spacejoy-9M66C_w_ToM-unsplash.jpg') }}",
                    alt: "Elegant Interior Design - Warm Modern Living",
                    headline: "Homes That Tell Your Story.",
                    subheadline: "Warm woods, tactile fabrics, and curated greenery that make your living room feel timeless, welcoming, and uniquely yours.",
                    badge: "Warm Modern Living",
                    tags: ["Family Living Rooms", "Custom Furniture", "Natural Materials", "End-to-End Interiors"]
                }
            ],
            init() {
                this.startAutoplay();
            },
            goToSlide(index) {
                this.currentSlide = index;
                this.resetAutoplay();
            },
            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                this.resetAutoplay();
            },
            prevSlide() {
                this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
                this.resetAutoplay();
            },
            startAutoplay() {
                this.autoplayInterval = setInterval(() => {
                    this.nextSlide();
                }, 6000); // 6 seconds
            },
            resetAutoplay() {
                clearInterval(this.autoplayInterval);
                this.startAutoplay();
            }
        }
    }
</script>

{{-- Banner Styles --}}
<style>
    .hero-banner {
        background-color: transparent;
    }
    
    .hero-headline {
        letter-spacing: -0.02em;
    }
    
    .writing-vertical {
        writing-mode: vertical-rl;
        text-orientation: mixed;
    }
    
    /* Banner Button Styles - Theme Based */
    .banner-btn-primary {
        background-color: var(--color-text);
        color: var(--color-primary);
        border: 2px solid var(--color-text);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .banner-btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--color-primary);
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        z-index: -1;
    }
    
    .banner-btn-primary:hover {
        color: var(--color-text);
        border-color: var(--color-text);
    }
    
    .banner-btn-primary:hover::before {
        transform: scaleX(1);
        transform-origin: left;
    }
    
    .banner-btn-secondary {
        background-color: transparent;
        color: var(--color-text);
        border: 1px solid rgba(255, 242, 225, 0.4);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .banner-btn-secondary::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--color-text);
        transform: scaleY(0);
        transform-origin: bottom;
        transition: transform 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        z-index: -1;
    }
    
    .banner-btn-secondary:hover {
        color: var(--color-primary);
        border-color: var(--color-text);
    }
    
    .banner-btn-secondary:hover::before {
        transform: scaleY(1);
        transform-origin: top;
    }
</style>

