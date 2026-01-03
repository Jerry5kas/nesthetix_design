<x-layouts.app title="Portfolio | {{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}"
    description="Explore our portfolio of premium interior design projects. Browse through our completed work across Living Rooms, Modular Kitchens, Bedrooms, Wardrobes, False Ceilings, TV Units, Pooja Rooms, and more."
    canonical="{{ url('/portfolio') }}">

    {{-- Hero Section --}}
    {{-- Portfolio Header --}}
    {{-- Portfolio Header --}}
    <section class="py-8 px-6 lg:px-16 portfolio-background text-center" data-animate="fade-up">
        <div class="max-w-4xl mx-auto">
            <p class="text-[#D4AF37] tracking-[0.3em] uppercase text-xs mb-4 font-medium"
                style="font-family: 'Satoshi', sans-serif;">
                Excellence in Design
            </p>
            <h1 class="font-light text-5xl md:text-6xl lg:text-[5.5rem] text-white leading-[1.1] mb-8"
                style="font-family: 'Canela Text Trial', serif;">
                Selected Works
            </h1>
            <div class="w-24 h-px bg-gradient-to-r from-[#D4AF37] to-transparent mx-auto mb-8"></div>
            <p class="max-w-2xl mx-auto text-gray-50 text-lg leading-relaxed font-light"
                style="font-family: 'Satoshi', sans-serif;">
                Explore a curation of our most significant interior projects, where every detail tells a story of
                precision, passion, and modern luxury.
            </p>
        </div>
    </section>

    {{-- Portfolio Container --}}
    <div x-data="portfolioGallery()" class="min-h-screen portfolio-background">

        {{-- Gallery Grid (Masonry CSS Grid Layout) --}}
        <section class=" w-full">
            <div class="portfolio-grid w-full">
                <template x-for="(item, index) in filteredItems" :key="item.id">
                    <div class="portfolio-item group cursor-pointer" :style="getGridStyle(index)"
                        @click="openLightbox(item)">
                        <div class="relative w-full h-full overflow-hidden rounded-lg bg-white/5">
                            <img :src="item.image" :alt="item.title"
                                class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110 opacity-90 group-hover:opacity-100"
                                loading="lazy" />
                            {{-- Overlay on Hover --}}
                            <div
                                class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center border border-[#D4AF37]/30">
                                <div class="text-center px-4">
                                    <h3 class="font-light text-xl md:text-2xl text-white mb-2"
                                        style="font-family: 'Canela Text Trial', serif;" x-text="item.title"></h3>
                                    <p class="text-gray-50 text-sm mb-4" style="font-family: 'Satoshi', sans-serif;"
                                        x-text="item.description"></p>
                                    <span class="inline-flex items-center gap-2 text-[#D4AF37] text-sm font-medium"
                                        style="font-family: 'Satoshi', sans-serif;">
                                        View Project
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Empty State --}}
            <div x-show="filteredItems.length === 0" class="text-center py-32">
                <p class="text-gray-400 text-lg" style="font-family: 'Satoshi', sans-serif;">
                    No projects found in this category.
                </p>
            </div>
        </section>

        {{-- Lightbox Modal --}}
        <div x-show="lightboxOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click.self="closeLightbox()" @keydown.escape.window="closeLightbox()"
            class="fixed inset-0 z-[60] bg-black/95 flex items-center justify-center p-4" x-cloak>
            <button @click="closeLightbox()"
                class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <button @click="previousImage()"
                class="absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 transition-colors z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button @click="nextImage()"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 transition-colors z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <div class="max-w-6xl w-full">
                <img :src="lightboxImage?.image" :alt="lightboxImage?.title"
                    class="max-h-[90vh] w-auto mx-auto object-contain rounded-lg" />
                <div class="text-center mt-4 text-white">
                    <h3 class="font-light text-xl md:text-2xl mb-2" style="font-family: 'Canela Text Trial', serif;"
                        x-text="lightboxImage?.title"></h3>
                    <p class="text-gray-50 text-sm" style="font-family: 'Satoshi', sans-serif;"
                        x-text="lightboxImage?.description"></p>
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

            // Grid position patterns (17-item cycle that repeats dynamically)
            // Based on the exact CSS grid pattern provided
            gridPatterns: [
                { colSpan: 2, colStart: 1, rowSpan: 1, rowStart: 1 },      // div1: grid-column: span 2; (starts at 1, spans 2)
                { colSpan: 1, colStart: 3, rowSpan: 1, rowStart: 1 },      // div2: grid-column-start: 3; (spans 1)
                { colSpan: 1, colStart: 4, rowSpan: 1, rowStart: 1 },      // div3: grid-column-start: 4; (spans 1)
                { colSpan: 1, colStart: 5, rowSpan: 2, rowStart: 1 },      // div4: grid-row: span 2; grid-column-start: 5;
                { colSpan: 1, colStart: 1, rowSpan: 2, rowStart: 4 },      // div5: grid-row: span 2; grid-column-start: 1; grid-row-start: 4;
                { colSpan: 2, colStart: 3, rowSpan: 1, rowStart: 2 },      // div6: grid-column: span 2; grid-column-start: 3; grid-row-start: 2;
                { colSpan: 1, colStart: 1, rowSpan: 1, rowStart: 2 },      // div7: grid-column-start: 1; grid-row-start: 2;
                { colSpan: 1, colStart: 1, rowSpan: 1, rowStart: 3 },      // div8: grid-column-start: 1; grid-row-start: 3;
                { colSpan: 1, colStart: 2, rowSpan: 1, rowStart: 5 },      // div9: grid-column-start: 2; grid-row-start: 5;
                { colSpan: 1, colStart: 3, rowSpan: 1, rowStart: 5 },      // div10: grid-column-start: 3; grid-row-start: 5;
                { colSpan: 2, colStart: 4, rowSpan: 1, rowStart: 5 },      // div11: grid-column: span 2; grid-column-start: 4; grid-row-start: 5;
                { colSpan: 1, colStart: 5, rowSpan: 1, rowStart: 3 },      // div12: grid-column-start: 5; grid-row-start: 3;
                { colSpan: 1, colStart: 5, rowSpan: 1, rowStart: 4 },      // div13: grid-column-start: 5; grid-row-start: 4;
                { colSpan: 2, colStart: 2, rowSpan: 1, rowStart: 4 },      // div14: grid-column: span 2; grid-column-start: 2; grid-row-start: 4;
                { colSpan: 1, colStart: 2, rowSpan: 2, rowStart: 2 },      // div15: grid-row: span 2; grid-column-start: 2; grid-row-start: 2;
                { colSpan: 1, colStart: 4, rowSpan: 2, rowStart: 3 },      // div16: grid-row: span 2; grid-column-start: 4; grid-row-start: 3;
                { colSpan: 1, colStart: 3, rowSpan: 1, rowStart: 3 },     // div17: grid-column-start: 3; grid-row-start: 3;
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
                { id: 16, category: 'living-room', title: 'Luxury Family Lounge', image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg', description: 'Sophisticated entertainment area with premium furnishings' },
                { id: 17, category: 'modular-kitchen', title: 'Island Kitchen Design', image: 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg', description: 'Spacious kitchen with central island and modern amenities' },
                // { id: 18, category: 'bedroom', title: 'Luxury Bedroom Retreat', image: 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg', description: 'Opulent bedroom with elegant furnishings and premium finishes' },
            ],

            get filteredItems() {
                return this.portfolioItems;
            },

            getGridStyle(index) {
                const pattern = this.gridPatterns[index % this.gridPatterns.length];
                const cycle = Math.floor(index / this.gridPatterns.length);
                const baseRow = cycle * 5; // Each cycle adds 5 rows (pattern uses rows 1-5)
                const actualRowStart = baseRow + pattern.rowStart;

                // Build grid-column style - use shorthand: start / span count
                const colSpan = pattern.colSpan || 1;
                const colStart = pattern.colStart;
                const gridColumn = `${colStart} / span ${colSpan}`;

                // Build grid-row style - use shorthand: start / span count
                const rowSpan = pattern.rowSpan || 1;
                const gridRow = `${actualRowStart} / span ${rowSpan}`;

                return {
                    'grid-column': gridColumn,
                    'grid-row': gridRow,
                };
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

    /* Portfolio Grid Layout - 5 Column Masonry Grid */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-auto-rows: minmax(250px, auto);
        gap: 4px;
        width: 100%;
        padding: 0;
    }

    .portfolio-item {
        will-change: transform;
        animation: fadeIn 0.4s ease-in;
        position: relative;
        overflow: hidden;
        min-height: 250px;
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
    @media (max-width: 1280px) {
        .portfolio-grid {
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: minmax(220px, auto);
        }
    }

    @media (max-width: 1024px) {
        .portfolio-grid {
            grid-template-columns: repeat(3, 1fr);
            grid-auto-rows: minmax(200px, auto);
        }
    }

    @media (max-width: 768px) {
        .portfolio-grid {
            grid-template-columns: repeat(2, 1fr);
            grid-auto-rows: minmax(180px, auto);
            gap: 6px;
        }
    }

    @media (max-width: 640px) {
        .portfolio-grid {
            grid-template-columns: repeat(2, 1fr);
            grid-auto-rows: minmax(150px, auto);
            gap: 4px;
        }
    }

    /* Custom Portfolio Background Pattern */
    /* Custom Portfolio Background Pattern */
    .portfolio-background {
        --s: 60px;
        /* control the size*/
        --c1: #181616;
        --c2: #000000;

        --_g: #0000 83%, var(--c1) 85% 99%, #0000 101%;
        background:
            radial-gradient(27% 29% at right, var(--_g)) calc(var(--s)/ 2) var(--s),
            radial-gradient(27% 29% at left, var(--_g)) calc(var(--s)/-2) var(--s),
            radial-gradient(29% 27% at top, var(--_g)) 0 calc(var(--s)/ 2),
            radial-gradient(29% 27% at bottom, var(--_g)) 0 calc(var(--s)/-2) var(--c2);
        background-size: calc(2*var(--s)) calc(2*var(--s));
    }
</style>