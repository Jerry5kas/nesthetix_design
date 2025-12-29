<x-layouts.app 
    title="Portfolio | {{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}"
    description="Explore our portfolio of premium interior design projects. Browse through our completed work across Living Rooms, Modular Kitchens, Bedrooms, Wardrobes, False Ceilings, TV Units, Pooja Rooms, and more."
    canonical="{{ url('/portfolio') }}">
    
    {{-- Hero Section --}}
    <section class="relative py-20 px-6 lg:px-16 overflow-hidden bg-gradient-to-b from-white to-gray-50" data-animate="fade-up">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-4xl mx-auto">
                {{-- Subheading Badge --}}
                <p 
                    class="text-theme-muted tracking-[0.3em] uppercase text-xs mb-3 font-medium"
                    style="font-family: 'Satoshi', sans-serif;"
                    data-animate="fade-up"
                    data-delay="0.1"
                >
                    Our Work
                </p>

                {{-- Main Heading --}}
                <h1
                    class="font-light text-4xl md:text-5xl lg:text-6xl text-theme-primary leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    data-animate="fade-up"
                    data-delay="0.2"
                >
                    Our Portfolio
                </h1>

                {{-- Primary Divider --}}
                <div 
                    class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto mb-6"
                    data-animate="fade-up"
                    data-delay="0.3"
                ></div>

                {{-- Description --}}
                <p 
                    class="max-w-4xl mx-auto text-gray-700 text-base md:text-lg leading-relaxed mb-8"
                    style="font-family: 'Satoshi', sans-serif;"
                    data-animate="fade-up"
                    data-delay="0.4"
                >
                    Discover our curated collection of interior design projects. Each space tells a unique story, crafted with precision, passion, and an unwavering commitment to excellence.
                </p>
            </div>
        </div>
    </section>

    {{-- Portfolio Container --}}
    <div x-data="portfolioGallery()" class="min-h-screen bg-white">
        {{-- Gallery Grid (Shuffled CSS Grid Layout) --}}
        <section class="py-12 px-6 lg:px-16">
            <div class="max-w-7xl mx-auto">
                <div class="shuffled-grid gap-5">
                    <template x-for="(item, index) in filteredItems" :key="item.id">
                        <div 
                            :class="getGridAreaClass(index)"
                            class="portfolio-item group cursor-pointer"
                            @click="openLightbox(item)"
                        >
                            <div class="relative w-full h-full overflow-hidden rounded-lg bg-gray-200">
                                <img 
                                    :src="item.image" 
                                    :alt="item.title"
                                    class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                                    loading="lazy"
                                />
                                {{-- Overlay on Hover --}}
                                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <div class="text-center px-4">
                                        <h3 
                                            class="font-light text-xl md:text-2xl text-white mb-2"
                                            style="font-family: 'Canela Text Trial', serif;"
                                            x-text="item.title"
                                        ></h3>
                                        <p 
                                            class="text-white/80 text-sm mb-4"
                                            style="font-family: 'Satoshi', sans-serif;"
                                            x-text="item.description"
                                        ></p>
                                        <span 
                                            class="inline-flex items-center gap-2 text-white text-sm font-medium"
                                            style="font-family: 'Satoshi', sans-serif;"
                                        >
                                            View Project
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- Empty State --}}
                <div 
                    x-show="filteredItems.length === 0"
                    class="text-center py-32"
                >
                    <p class="text-gray-500 text-lg" style="font-family: 'Satoshi', sans-serif;">
                        No projects found in this category.
                    </p>
                </div>
            </div>
        </section>

        {{-- Lightbox Modal --}}
        <div 
            x-show="lightboxOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click.self="closeLightbox()"
            @keydown.escape.window="closeLightbox()"
            class="fixed inset-0 z-[60] bg-black/95 flex items-center justify-center p-4"
            x-cloak
        >
            <button 
                @click="closeLightbox()"
                class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors z-10"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <button 
                @click="previousImage()"
                class="absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 transition-colors z-10"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            
            <button 
                @click="nextImage()"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 transition-colors z-10"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <div class="max-w-6xl w-full">
                <img 
                    :src="lightboxImage?.image" 
                    :alt="lightboxImage?.title"
                    class="max-h-[90vh] w-auto mx-auto object-contain rounded-lg"
                />
                <div class="text-center mt-4 text-white">
                    <h3 
                        class="font-light text-xl md:text-2xl mb-2"
                        style="font-family: 'Canela Text Trial', serif;"
                        x-text="lightboxImage?.title"
                    ></h3>
                    <p 
                        class="text-white/80 text-sm"
                        style="font-family: 'Satoshi', sans-serif;"
                        x-text="lightboxImage?.description"
                    ></p>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>

<script>
function portfolioGallery() {
    return {
        lightboxOpen: false,
        lightboxImage: null,
        lightboxIndex: 0,
        
        // Grid area classes in sequence (15 patterns that repeat for better coverage)
        gridAreas: [
            'grid-area-1',  // Column 1, span 2 rows
            'grid-area-2',  // Column 2, span 1 row
            'grid-area-3',  // Column 3, span 1 row
            'grid-area-4',  // Column 1, span 2 rows
            'grid-area-5',  // Column 2, span 1 row
            'grid-area-6',  // Column 3, span 2 rows
            'grid-area-7',  // Column 2, span 1 row
            'grid-area-8',  // Column 2, span 1 row
            'grid-area-9',  // Column 3, span 2 rows
            'grid-area-10', // Column 2, span 1 row
            'grid-area-11', // Column 1, span 1 row
            'grid-area-12', // Column 4, span 2 rows
            'grid-area-13', // Column 5, span 1 row
            'grid-area-14', // Column 4, span 1 row
            'grid-area-15', // Column 5, span 2 rows
        ],

        portfolioItems: [
            { id: 1, category: 'living-room', title: 'Modern Living Room', image: 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg', description: 'Contemporary design with clean lines' },
            { id: 2, category: 'false-ceiling', title: 'Elegant False Ceiling', image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg', description: 'Intricate ceiling design with modern lighting' },
            { id: 3, category: 'tv-units', title: 'Minimalist TV Unit', image: 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg', description: 'Sleek wall-mounted entertainment center' },
            { id: 4, category: 'modular-kitchen', title: 'Luxury Modular Kitchen', image: 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg', description: 'State-of-the-art kitchen with premium finishes' },
            { id: 5, category: 'pooja-room', title: 'Traditional Pooja Room', image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg', description: 'Sacred space with traditional elements' },
            { id: 6, category: 'bedroom', title: 'Master Bedroom Suite', image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg', description: 'Serene bedroom with luxurious touches' },
            { id: 7, category: 'wardrobe', title: 'Custom Wardrobe Design', image: 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg', description: 'Maximized storage with elegant design' },
            { id: 8, category: 'living-room', title: 'Cozy Living Space', image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg', description: 'Warm and inviting family room' },
            { id: 9, category: 'modular-kitchen', title: 'Contemporary Kitchen', image: 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg', description: 'Functional and stylish kitchen design' },
            { id: 10, category: 'bedroom', title: 'Guest Bedroom', image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg', description: 'Comfortable and welcoming guest space' },
            { id: 11, category: 'wardrobe', title: 'Walk-in Wardrobe', image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg', description: 'Spacious walk-in closet design' },
            { id: 12, category: 'false-ceiling', title: 'Modern Ceiling Design', image: 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg', description: 'Contemporary ceiling with geometric patterns' },
            { id: 13, category: 'tv-units', title: 'Wall Unit Design', image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg', description: 'Stylish entertainment wall unit' },
            { id: 14, category: 'pooja-room', title: 'Modern Pooja Space', image: 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg', description: 'Contemporary prayer room design' },
            { id: 15, category: 'others', title: 'Home Office', image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg', description: 'Productive workspace design' },
        ],

        get filteredItems() {
            return this.portfolioItems;
        },

        getGridAreaClass(index) {
            return this.gridAreas[index % this.gridAreas.length];
        },

        openLightbox(item) {
            this.lightboxImage = item;
            this.lightboxIndex = this.filteredItems.findIndex(i => i.id === item.id);
            this.lightboxOpen = true;
            document.body.style.overflow = 'hidden';
        },

        closeLightbox() {
            this.lightboxOpen = false;
            document.body.style.overflow = '';
        },

        nextImage() {
            if (this.filteredItems.length > 0) {
                this.lightboxIndex = (this.lightboxIndex + 1) % this.filteredItems.length;
                this.lightboxImage = this.filteredItems[this.lightboxIndex];
            }
        },

        previousImage() {
            if (this.filteredItems.length > 0) {
                this.lightboxIndex = (this.lightboxIndex - 1 + this.filteredItems.length) % this.filteredItems.length;
                this.lightboxImage = this.filteredItems[this.lightboxIndex];
            }
        },

        init() {
            // Keyboard navigation for lightbox
            this.handleKeydown = (e) => {
                if (this.lightboxOpen) {
                    if (e.key === 'ArrowRight') {
                        this.nextImage();
                    } else if (e.key === 'ArrowLeft') {
                        this.previousImage();
                    } else if (e.key === 'Escape') {
                        this.closeLightbox();
                    }
                }
            };

            this.$watch('lightboxOpen', (value) => {
                if (value) {
                    document.addEventListener('keydown', this.handleKeydown);
                } else {
                    document.removeEventListener('keydown', this.handleKeydown);
                }
            });
        }
    }
}
</script>

<style>
/* Shuffled Grid Layout - Using CSS Grid with auto-placement */
.shuffled-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-auto-rows: minmax(300px, auto);
}

/* Grid Area Definitions - Based on the provided pattern */
/* Pattern repeats every 11 items with varying row spans */
.grid-area-1 { grid-row: span 2; }  /* Tall item - spans 2 rows */
.grid-area-2 { grid-row: span 1; }  /* Regular item */
.grid-area-3 { grid-row: span 1; }  /* Regular item */
.grid-area-4 { grid-row: span 2; }  /* Tall item */
.grid-area-5 { grid-row: span 1; }  /* Regular item */
.grid-area-6 { grid-row: span 2; }  /* Tall item */
.grid-area-7 { grid-row: span 1; }  /* Regular item */
.grid-area-8 { grid-row: span 1; }  /* Regular item */
.grid-area-9 { grid-row: span 2; }  /* Tall item */
.grid-area-10 { grid-row: span 1; } /* Regular item */
.grid-area-11 { grid-row: span 1; } /* Regular item */

/* Extended pattern for items beyond 11 */
.grid-area-12 { grid-row: span 2; }
.grid-area-13 { grid-row: span 1; }
.grid-area-14 { grid-row: span 1; }
.grid-area-15 { grid-row: span 2; }

.portfolio-item {
    will-change: transform;
    animation: fadeIn 0.4s ease-in;
    position: relative;
    overflow: hidden;
}

.portfolio-item:hover {
    transform: translateY(-4px);
    z-index: 10;
}

.portfolio-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Smooth transitions */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 1024px) {
    .shuffled-grid {
        grid-template-columns: repeat(3, 1fr);
        grid-auto-rows: minmax(250px, auto);
    }
    
    /* Simplified: all items same height on tablets */
    .grid-area-1,
    .grid-area-2,
    .grid-area-3,
    .grid-area-4,
    .grid-area-5,
    .grid-area-6,
    .grid-area-7,
    .grid-area-8,
    .grid-area-9,
    .grid-area-10,
    .grid-area-11,
    .grid-area-12,
    .grid-area-13,
    .grid-area-14,
    .grid-area-15 {
        grid-row: span 1;
    }
}

@media (max-width: 640px) {
    .shuffled-grid {
        grid-template-columns: repeat(2, 1fr);
        grid-auto-rows: minmax(200px, auto);
        gap: 0.5rem;
    }
}
</style>

