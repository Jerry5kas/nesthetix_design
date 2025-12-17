<x-layouts.app title="Nesthetix Designs | Premium Interior Design Studio">
    {{-- ============================================
        HERO SECTION - "Spaces That Hold Their Value"
        Premium Interior Design Hero
        ============================================ --}}
    <section class="hero-section relative min-h-[90vh] flex items-center overflow-hidden">
        {{-- Background Image with Overlay --}}
        <div class="absolute inset-0">
            <img src="https://images.pexels.com/photos/1648776/pexels-photo-1648776.jpeg?cs=srgb&dl=pexels-vika-glitter-392079-1648776.jpg&fm=jpg" 
                 alt="Luxury Interior Design" 
                 class="w-full h-full object-cover"
                 data-parallax-bg="0.3" />
            {{-- Dark Gradient Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/40"></div>
            {{-- Warm Gold Tint Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#32012F]/30"></div>
            {{-- Subtle Grain Texture --}}
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noise%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noise)%22/%3E%3C/svg%3E');"></div>
        </div>

        {{-- Decorative Elements --}}
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#C9A86C]/30 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#C9A86C]/30 to-transparent"></div>
        
        {{-- Vertical Gold Lines (Decorative) --}}
        <div class="absolute left-8 lg:left-16 top-1/4 bottom-1/4 w-px bg-gradient-to-b from-transparent via-[#C9A86C]/20 to-transparent hidden lg:block"></div>
        <div class="absolute right-8 lg:right-16 top-1/4 bottom-1/4 w-px bg-gradient-to-b from-transparent via-[#C9A86C]/20 to-transparent hidden lg:block"></div>

        {{-- Main Content --}}
        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-12 lg:py-16">
            <div class="max-w-4xl">
                {{-- Pre-headline Badge --}}
                <div class="mb-6" data-animate="fade-up">
                    <span class="inline-flex items-center gap-3 text-[#C9A86C] text-sm tracking-[0.3em] uppercase font-medium">
                        <span class="w-12 h-px bg-[#C9A86C]"></span>
                        Interior Design Studio
                                </span>
                </div>

                {{-- Main Headline --}}
                <h1 class="hero-headline text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-light leading-[0.95] mb-6 text-white" data-text="split-lines">
                    Spaces That
                    Hold Their Value.
                </h1>

                {{-- Gold Divider --}}
                <div class="w-24 h-px bg-gradient-to-r from-[#C9A86C] to-transparent mb-6" data-animate="fade-up" data-delay="0.3"></div>

                {{-- Subheadline --}}
                <p class="text-base sm:text-lg lg:text-xl text-white/70 leading-relaxed max-w-2xl mb-8 font-light" data-animate="fade-up" data-delay="0.4">
                    From smart budget interiors to bespoke luxury spaces, we design and execute interiors that age beautifully — in homes, workplaces, and kitchens.
                </p>

                {{-- Service Tags --}}
                <div class="flex flex-wrap items-center gap-3 sm:gap-4 mb-8" data-animate="fade-up" data-delay="0.5">
                    <span class="text-white/50 text-xs sm:text-sm tracking-wide">Residential</span>
                    <span class="w-1 h-1 rounded-full bg-[#C9A86C]"></span>
                    <span class="text-white/50 text-xs sm:text-sm tracking-wide">Commercial</span>
                    <span class="w-1 h-1 rounded-full bg-[#C9A86C]"></span>
                    <span class="text-white/50 text-xs sm:text-sm tracking-wide">Modular Kitchens</span>
                    <span class="w-1 h-1 rounded-full bg-[#C9A86C]"></span>
                    <span class="text-white/50 text-xs sm:text-sm tracking-wide">Design & Execution</span>
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6" data-animate="fade-up" data-delay="0.6">
                    {{-- Primary CTA - Cream/Gold with elegant hover --}}
                    <a href="#consultation" class="hero-btn-primary group inline-flex items-center justify-center gap-3 px-8 py-4 font-medium tracking-wide transition-all duration-500" data-magnetic>
                        <span>Get a Free Consultation</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                    {{-- Secondary CTA - Outline with fill hover --}}
                    <a href="#portfolio" class="hero-btn-secondary group inline-flex items-center justify-center gap-3 px-8 py-4 font-medium tracking-wide transition-all duration-500" data-magnetic>
                        <span>View Our Work</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                </div>
            </div>
        </div>

        {{-- Bottom Scroll Indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10" data-animate="fade-up" data-delay="1">
            <a href="#trust" class="scroll-indicator flex flex-col items-center gap-2 transition-colors duration-300">
                <span class="text-xs tracking-[0.2em] uppercase">Scroll</span>
                <div class="w-px h-12 bg-gradient-to-b from-current to-transparent relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-4 bg-current animate-scroll-line"></div>
                </div>
            </a>
        </div>

        {{-- Side Text (Desktop only) --}}
        <div class="absolute right-8 top-1/2 -translate-y-1/2 hidden xl:block" data-animate="fade-in" data-delay="0.8">
            <span class="text-white/20 text-xs tracking-[0.5em] uppercase writing-vertical">
                Est. 2015 — Premium Interiors
                            </span>
        </div>
    </section>

    {{-- ============================================
        TRUST STRIP - Below Hero
        ============================================ --}}
    <section id="trust" class="relative py-8 border-y border-white/10" style="background-color: var(--color-primary);">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8" data-animate="stagger" data-stagger="0.1">
                {{-- Trust Item 1 --}}
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full border border-[#C9A86C]/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#C9A86C]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="text-white/70 text-sm">Design-only & Execution</span>
                </div>
                {{-- Trust Item 2 --}}
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full border border-[#C9A86C]/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#C9A86C]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                    </svg>
                    </div>
                    <span class="text-white/70 text-sm">Transparent Budgets</span>
                </div>
                {{-- Trust Item 3 --}}
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full border border-[#C9A86C]/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#C9A86C]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                    </svg>
                    </div>
                    <span class="text-white/70 text-sm">Timelines You Can Trust</span>
                </div>
                {{-- Trust Item 4 --}}
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full border border-[#C9A86C]/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#C9A86C]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
                    </svg>
                    </div>
                    <span class="text-white/70 text-sm">Premium Materials</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Custom Hero Styles --}}
    <style>
        .hero-headline {
            font-family: var(--font-secondary), 'Poppins', sans-serif;
            letter-spacing: -0.02em;
        }
        
        .writing-vertical {
            writing-mode: vertical-rl;
            text-orientation: mixed;
        }
        
        @keyframes scroll-line {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(300%);
            }
        }
        
        .animate-scroll-line {
            animation: scroll-line 2s ease-in-out infinite;
        }
        
        /* Hero Section specific overrides */
        .hero-section {
            background-color: #0a0a0a;
        }
        
        /* ============================================
           HERO BUTTON STYLES - Theme Based
           Using: --color-text (#FFF2E1) as primary
           ============================================ */
        
        /* Primary Button - Warm Cream/Off-white */
        .hero-btn-primary {
            background-color: var(--color-text);
            color: var(--color-primary);
            border: 2px solid var(--color-text);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .hero-btn-primary::before {
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
        
        .hero-btn-primary:hover {
            color: var(--color-text);
            border-color: var(--color-text);
        }
        
        .hero-btn-primary:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }
        
        /* Secondary Button - Transparent with border */
        .hero-btn-secondary {
            background-color: transparent;
            color: var(--color-text);
            border: 1px solid rgba(255, 242, 225, 0.4);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .hero-btn-secondary::before {
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
        
        .hero-btn-secondary:hover {
            color: var(--color-primary);
            border-color: var(--color-text);
        }
        
        .hero-btn-secondary:hover::before {
            transform: scaleY(1);
            transform-origin: top;
        }
        
        /* Scroll Indicator */
        .scroll-indicator {
            color: rgba(255, 242, 225, 0.4);
        }
        
        .scroll-indicator:hover {
            color: var(--color-text);
        }
    </style>
</x-layouts.app>
