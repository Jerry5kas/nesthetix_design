@props([
    'heading' => 'A Tour of Nesthetix Designs',
    'subheading' => 'Our Portfolio',
    'description' => 'Welcome to the virtual showcase of Nesthetix Designs\' projects! Explore our portfolio of modern, captivating interiors, thoughtfully designed for clients. Experience the beauty and functionality of our completed projects.',
    'projects' => [
        [
            'title' => '2 BHK, Luxury Apartment',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
            'link' => '/projects/luxury-apartment',
        ],
        [
            'title' => 'Independent House, Bangalore',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg',
            'link' => '/projects/independent-house',
        ],
        [
            'title' => 'Villa, Premium Residence',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg',
            'link' => '/projects/premium-villa',
        ],
        [
            'title' => 'Modern Office Space',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg',
            'link' => '/projects/office-space',
        ],
        [
            'title' => 'Luxury Penthouse',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg',
            'link' => '/projects/penthouse',
        ],
    ],
    'viewMoreText' => 'View More',
])

{{-- ============================================
    PROJECTS SHOWCASE COMPONENT
    Premium Interior Design - Projects Carousel Slider
    Usage: <x-projects-showcase />
    ============================================ --}}

<section 
    class="relative py-12 px-6 lg:px-16 overflow-hidden bg-white"
    aria-labelledby="projects-showcase"
    data-animate="fade-up"
    x-data="projectsCarousel()"
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
                id="projects-showcase"
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

        {{-- Projects Carousel Container --}}
        <div class="relative">
            {{-- Carousel Wrapper --}}
            <div 
                class="projects-carousel-container overflow-hidden"
                @touchstart="touchStart($event)"
                @touchmove="touchMove($event)"
                @touchend="touchEnd()"
            >
                <div 
                    class="projects-carousel-track flex transition-transform duration-700 ease-out"
                    x-bind:style="'transform: translateX(-' + getTransformValue() + '%)'"
                >
                    @foreach($projects as $index => $project)
                        <div 
                            class="projects-carousel-slide flex-shrink-0 px-3"
                            x-bind:style="'width: ' + getSlideWidth() + '%'"
                        >
                            <article class="group relative h-full">
                                <div class="relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-500 bg-white">
                                    {{-- Project Image --}}
                                    <div class="relative w-full h-64 md:h-80 lg:h-96 overflow-hidden bg-gray-200">
                                        <img 
                                            src="{{ $project['image'] ?? '' }}" 
                                            alt="{{ $project['title'] ?? 'Project Image' }}"
                                            class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                                            loading="{{ $index < 3 ? 'eager' : 'lazy' }}"
                                        />
                                        {{-- Gradient Overlay on Hover --}}
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    </div>

                                    {{-- Project Content --}}
                                    <div class="p-6 bg-white">
                                        <h3 
                                            class="font-light text-xl md:text-2xl text-theme-primary mb-4 leading-tight"
                                            style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.01em;"
                                        >
                                            {{ $project['title'] }}
                                        </h3>
                                        
                                        {{-- View More Button --}}
                                        <a 
                                            href="{{ $project['link'] ?? '#' }}"
                                            class="inline-flex items-center gap-2 text-theme-secondary hover:text-theme-primary transition-colors duration-300 group/btn"
                                            style="font-family: 'Satoshi', sans-serif;"
                                        >
                                            <span class="text-sm font-medium tracking-wide">{{ $viewMoreText }}</span>
                                            <svg 
                                                xmlns="http://www.w3.org/2000/svg" 
                                                class="w-4 h-4 transform group-hover/btn:translate-x-1 transition-transform duration-300" 
                                                fill="none" 
                                                viewBox="0 0 24 24" 
                                                stroke="currentColor"
                                            >
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Navigation Arrows --}}
            <button 
                type="button"
                @click="prevSlide()"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 lg:-translate-x-8 z-30 w-12 h-12 lg:w-14 lg:h-14 flex items-center justify-center rounded-full bg-white shadow-lg border border-gray-200 text-theme-primary transition-all duration-300 hover:bg-theme-primary hover:text-white hover:scale-110 projects-nav-btn"
                :class="{ 'opacity-50 cursor-not-allowed': currentIndex === 0 }"
                :disabled="currentIndex === 0"
                aria-label="Previous project"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:w-6 lg:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button 
                type="button"
                @click="nextSlide()"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 lg:translate-x-8 z-30 w-12 h-12 lg:w-14 lg:h-14 flex items-center justify-center rounded-full bg-white shadow-lg border border-gray-200 text-theme-primary transition-all duration-300 hover:bg-theme-primary hover:text-white hover:scale-110 projects-nav-btn"
                :class="{ 'opacity-50 cursor-not-allowed': currentIndex >= maxIndex }"
                :disabled="currentIndex >= maxIndex"
                aria-label="Next project"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:w-6 lg:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        {{-- Pagination Dots --}}
        <div class="flex items-center justify-center gap-2 mt-8" data-animate="fade-up" data-delay="0.6">
            <template x-for="(project, index) in projects" :key="index">
                <button 
                    type="button"
                    @click="goToSlide(index)"
                    class="transition-all duration-500 rounded-full"
                    :class="currentIndex === index ? 'w-10 h-2 bg-theme-primary' : 'w-2 h-2 bg-gray-300 hover:bg-gray-400'"
                    :aria-label="'Go to project ' + (index + 1)"
                ></button>
            </template>
        </div>
    </div>
</section>

{{-- Alpine.js Carousel Script --}}
<script>
function projectsCarousel() {
    return {
        currentIndex: 0,
        touchStartX: 0,
        touchEndX: 0,
        itemsPerView: 3, // Desktop: 3 items, will be adjusted on mobile
        
        get maxIndex() {
            return Math.max(0, this.projects.length - this.itemsPerView);
        },
        
        get projects() {
            return @json($projects);
        },
        
        getTransformValue() {
            return this.currentIndex * (100 / this.itemsPerView);
        },
        
        getSlideWidth() {
            return 100 / this.itemsPerView;
        },
        
        init() {
            this.updateItemsPerView();
            window.addEventListener('resize', () => {
                this.updateItemsPerView();
            });
        },
        
        updateItemsPerView() {
            if (window.innerWidth < 768) {
                this.itemsPerView = 1; // Mobile: 1 item
            } else if (window.innerWidth < 1024) {
                this.itemsPerView = 2; // Tablet: 2 items
            } else {
                this.itemsPerView = 3; // Desktop: 3 items
            }
            // Ensure currentIndex doesn't exceed maxIndex
            if (this.currentIndex > this.maxIndex) {
                this.currentIndex = this.maxIndex;
            }
        },
        
        nextSlide() {
            if (this.currentIndex < this.maxIndex) {
                this.currentIndex++;
            }
        },
        
        prevSlide() {
            if (this.currentIndex > 0) {
                this.currentIndex--;
            }
        },
        
        goToSlide(index) {
            if (index <= this.maxIndex) {
                this.currentIndex = index;
            } else {
                this.currentIndex = this.maxIndex;
            }
        },
        
        // Touch swipe support
        touchStart(e) {
            this.touchStartX = e.touches[0].clientX;
        },
        
        touchMove(e) {
            this.touchEndX = e.touches[0].clientX;
        },
        
        touchEnd() {
            if (!this.touchStartX || !this.touchEndX) return;
            
            const diff = this.touchStartX - this.touchEndX;
            const minSwipeDistance = 50;
            
            if (Math.abs(diff) > minSwipeDistance) {
                if (diff > 0) {
                    // Swipe left - next slide
                    this.nextSlide();
                } else {
                    // Swipe right - previous slide
                    this.prevSlide();
                }
            }
            
            this.touchStartX = 0;
            this.touchEndX = 0;
        }
    }
}
</script>

{{-- Carousel Styles --}}
<style>
.projects-carousel-container {
    padding: 0 60px; /* Space for navigation arrows */
}

@media (max-width: 1024px) {
    .projects-carousel-container {
        padding: 0 50px;
    }
}

@media (max-width: 768px) {
    .projects-carousel-container {
        padding: 0 40px;
    }
    
    .projects-nav-btn {
        width: 2.5rem;
        height: 2.5rem;
    }
}

.projects-carousel-track {
    will-change: transform;
}

.projects-carousel-slide {
    transition: opacity 0.3s ease;
}

/* Smooth scroll behavior */
@media (prefers-reduced-motion: reduce) {
    .projects-carousel-track {
        transition: none;
    }
    
    .projects-carousel-slide img {
        transition: none;
    }
}
</style>
