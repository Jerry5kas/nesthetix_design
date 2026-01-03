@props([
    'heading' => 'Our Specialized Services',
    'subheading' => 'Elevating Every Space',
    'description' => 'At Nesthetix Designs, we blend artistic vision with technical precision to deliver bespoke interior solutions. From luxury residences to functional commercial spaces, our expertise ensures excellence at every touchpoint.',
    'services' => [
        [
            'title' => 'Luxury Interiors',
            'description' => 'Bespoke designs crafted with premium materials and exceptional attention to detail.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg',
            'link' => '/services#luxury'
        ],
        [
            'title' => 'Residential Interiors',
            'description' => 'Thoughtfully designed homes that reflect your unique lifestyle and personality.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
            'link' => '/services#residential'
        ],
        [
            'title' => 'Commercial Interiors',
            'description' => 'Productive and inspiring environments that strengthen your brand identity.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ranamatloob567-34823909_694baf216652f9.25031009_PrRZQjkTvi.jpg',
            'link' => '/services#commercial'
        ],
        [
            'title' => 'Modular Kitchens',
            'description' => 'Efficient, modern, and ergonomic kitchen solutions for the contemporary home.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg',
            'link' => '/services#kitchen'
        ],
        [
            'title' => 'Design-Only Services',
            'description' => 'Professional planning and detailed visualizations to guide your project.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg',
            'link' => '/services#design'
        ],
        [
            'title' => 'Execution-Only Services',
            'description' => 'Expert project management and skilled implementation of pre-defined designs.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
            'link' => '/services#execution'
        ],
        [
            'title' => 'Budget-Based Interiors',
            'description' => 'Smart and stylish design solutions tailored to your specific financial goals.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg',
            'link' => '/services#budget'
        ]
    ]
])

<section class="services-carousel-section relative py-20 lg:py-24 overflow-hidden" id="services" 
    x-data="{ 
        activeSlide: 0,
        totalSlides: {{ count($services) }},
        get visibleCount() {
            if (window.innerWidth >= 1024) return 3;
            if (window.innerWidth >= 768) return 2;
            return 1;
        },
        get maxScroll() {
            return Math.max(0, this.totalSlides - this.visibleCount);
        },
        get dotCount() {
            if (this.totalSlides <= 3) return this.totalSlides;
            return Math.min(5, this.maxScroll + 1);
        },
        next() {
            this.activeSlide = this.activeSlide >= this.maxScroll ? 0 : this.activeSlide + 1;
            this.scrollToActive();
        },
        prev() {
            this.activeSlide = this.activeSlide <= 0 ? this.maxScroll : this.activeSlide - 1;
            this.scrollToActive();
        },
        scrollToActive() {
            const container = this.$refs.slider;
            if (!container) return;
            const card = container.firstElementChild;
            const gap = parseInt(window.getComputedStyle(container).gap) || 32;
            const cardWidth = card.offsetWidth + gap;
            container.scrollTo({
                left: cardWidth * this.activeSlide,
                behavior: 'smooth'
            });
        },
        isActiveDot(dotIndex) {
            if (this.maxScroll === 0) return dotIndex === 0;
            const ratio = this.activeSlide / this.maxScroll;
            const targetDot = Math.round(ratio * (this.dotCount - 1));
            return dotIndex === targetDot;
        },
        goToDot(dotIndex) {
            if (this.dotCount <= 1) return;
            const ratio = dotIndex / (this.dotCount - 1);
            this.activeSlide = Math.round(ratio * this.maxScroll);
            this.scrollToActive();
        },
        init() {
            let timer = setInterval(() => this.next(), 6000);
            this.$refs.slider.addEventListener('mouseenter', () => clearInterval(timer));
            this.$refs.slider.addEventListener('mouseleave', () => timer = setInterval(() => this.next(), 6000));
            
            this.$refs.slider.addEventListener('scroll', () => {
                const container = this.$refs.slider;
                if (!container || !container.firstElementChild) return;
                const gap = parseInt(window.getComputedStyle(container).gap) || 32;
                const cardWidth = container.firstElementChild.offsetWidth + gap;
                this.activeSlide = Math.round(container.scrollLeft / cardWidth);
            }, { passive: true });

            window.addEventListener('resize', () => {
                if (this.activeSlide > this.maxScroll) this.activeSlide = this.maxScroll;
            });
        }
    }">
    
    {{-- User Requested Background Pattern --}}
    <div class="absolute inset-0 bg-pattern-services -z-20"></div>
    <div class="services-glow-overlay absolute inset-0 -z-10"></div>
    
    <div class="container mx-auto px-6 lg:px-16 relative z-10">
        {{-- Header Section --}}
        <div class="services-header text-center mb-12 md:mb-20 max-w-4xl mx-auto">
            <span class="services-badge uppercase tracking-[0.3em] text-[#D4AF37] text-xs font-semibold mb-4 block" 
                  data-animate="fade-up">
                {{ $subheading }}
            </span>
            <h2 class="services-title font-light text-2xl md:text-3xl lg:text-5xl text-white mb-4" 
                style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                data-text="split-lines">
                {{ $heading }}
            </h2>
            <div class="services-divider w-20 h-px bg-gradient-to-r from-[#D4AF37] to-transparent mx-auto mb-8" data-animate="fade-up"></div>
            <p class="services-desc text-gray-400 text-sm md:text-base leading-relaxed" 
               style="font-family: 'Satoshi', sans-serif;"
               data-animate="fade-up">
                {{ $description }}
            </p>
        </div>

        {{-- Carousel Wrapper --}}
        <div class="relative group">
            {{-- Navigation Buttons --}}
            <button @click="prev()" 
                    class="absolute -left-4 lg:-left-12 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full border border-white/10 bg-black/40 backdrop-blur-md flex items-center justify-center text-white/50 hover:text-[#D4AF37] hover:border-[#D4AF37]/50 transition-all duration-300 opacity-0 group-hover:opacity-100 hidden md:flex"
                    aria-label="Previous service">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            
            <button @click="next()" 
                    class="absolute -right-4 lg:-right-12 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full border border-white/10 bg-black/40 backdrop-blur-md flex items-center justify-center text-white/50 hover:text-[#D4AF37] hover:border-[#D4AF37]/50 transition-all duration-300 opacity-0 group-hover:opacity-100 hidden md:flex"
                    aria-label="Next service">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>

            {{-- Slider Container --}}
            <div x-ref="slider" 
                 class="services-slider flex gap-6 lg:gap-8 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-12 cursor-grab active:cursor-grabbing"
                 style="scrollbar-width: none; -ms-overflow-style: none;">
                
                @foreach($services as $index => $service)
                    <div class="service-slide min-w-[85vw] md:min-w-[calc(50%-12px)] lg:min-w-[calc(33.333%-22px)] snap-center md:snap-start">
                        <a href="{{ $service['link'] }}" class="service-card group block relative aspect-[4/5] overflow-hidden rounded-2xl border border-white/5 bg-[#0a0a0a]">
                            {{-- Image --}}
                            <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}" 
                                 class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110 opacity-70 group-hover:opacity-100"
                                 loading="lazy">

                            {{-- Numbering --}}
                            <div class="absolute top-6 left-6 text-2xl md:text-3xl font-light text-white/10 italic" style="font-family: 'Canela Text Trial', serif;">
                                0{{ $index + 1 }}
                            </div>

                            {{-- Solid Bottom Gradient --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent"></div>

                            {{-- Content --}}
                            <div class="absolute inset-0 p-6 md:p-8 flex flex-col justify-end transition-transform duration-700">
                                <h3 class="text-xl md:text-2xl text-white mb-2" style="font-family: 'Canela Text Trial', serif;">
                                    {{ $service['title'] }}
                                </h3>
                                <p class="text-xs md:text-sm text-gray-400 font-light leading-relaxed mb-4 opacity-0 group-hover:opacity-100 transition-all duration-700 delay-100" style="font-family: 'Satoshi', sans-serif;">
                                    {{ $service['description'] }}
                                </p>

                                {{-- Link with Gold Arrow --}}
                                <div class="flex items-center gap-3 text-[#D4AF37] text-[10px] md:text-sm font-semibold tracking-widest uppercase transition-all duration-700">
                                    <span>Discover</span>
                                    <div class="h-px w-6 bg-[#D4AF37] transition-all duration-500 group-hover:w-10"></div>
                                </div>
                            </div>

                            {{-- Premium Gold Border on Hover --}}
                            <div class="absolute inset-0 border-2 border-[#D4AF37] opacity-0 group-hover:opacity-20 transition-opacity duration-700 rounded-2xl pointer-events-none"></div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Indicators / Dots --}}
            <div class="flex justify-center gap-3 mt-4 md:mt-8" x-show="dotCount > 1">
                <template x-for="i in dotCount" :key="i">
                    <button @click="goToDot(i-1)"
                            class="h-1 transition-all duration-500 rounded-full"
                            :class="isActiveDot(i-1) ? 'w-10 bg-[#D4AF37]' : 'w-2 bg-white/20'"
                            :aria-label="'Go to service group ' + i">
                    </button>
                </template>
            </div>
        </div>
    </div>
</section>

<style>
    /* User Requested Background Pattern */
    .bg-pattern-services {
        --s: 60px; /* control the size*/
        --c1: #181616;
        --c2: #000000;
        
        --_g: #0000 83%, var(--c1) 85% 99%, #0000 101%;
        background:
            radial-gradient(27% 29% at right, var(--_g)) calc(var(--s)/ 2) var(--s),
            radial-gradient(27% 29% at left, var(--_g)) calc(var(--s)/-2) var(--s),
            radial-gradient(29% 27% at top, var(--_g)) 0 calc(var(--s)/ 2),
            radial-gradient(29% 27% at bottom, var(--_g)) 0 calc(var(--s)/-2)
            var(--c2);
        background-size: calc(2*var(--s)) calc(2*var(--s));
    }
    
    .services-glow-overlay {
        background-image: 
            radial-gradient(circle at 50% -20%, rgba(212, 175, 55, 0.12) 0%, transparent 50%),
            radial-gradient(circle at 50% 120%, rgba(212, 175, 55, 0.05) 0%, transparent 50%);
        pointer-events: none;
    }

    /* Hide Scrollbar */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    /* Slider Snap Behavior */
    .services-slider {
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        scroll-behavior: smooth;
    }

    /* Card Transition Easing */
    .service-card {
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
    }
    
    .service-card:hover {
        box-shadow: 0 20px 60px rgba(212, 175, 55, 0.15);
    }

    /* Mobile Peeking Responsiveness */
    @media (max-width: 768px) {
        .services-slider {
            /* Adjust gap for smaller screens */
            gap: 1.5rem;
            padding-left: 0;
            padding-right: 0;
        }
        
        .service-slide {
            /* The 85vw width creates the peeking effect */
            min-width: 85vw;
        }
    }
</style>
