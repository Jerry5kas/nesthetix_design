{{-- ============================================
    CTA BANNER SECTION COMPONENT
    Clean & Compact Call-to-Action Banner
    Usage: <x-cta-banner />
    ============================================ --}}

<section class="cta-banner-section relative py-12 sm:py-16 lg:py-20 overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0 pointer-events-none" style="background-image: url('https://ik.imagekit.io/AthaConstruction/assets/Motivation_March_Banner_6953b54ca25656.18338853_wrefZE2DM.png'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
    
    {{-- Primary Color Overlay for Readability --}}
    <div class="absolute inset-0 pointer-events-none" style="background-color: var(--color-primary); opacity: 0.75;"></div>
    
    {{-- Content Container --}}
    <div class="relative max-w-4xl mx-auto px-6 sm:px-8 lg:px-12 text-center z-10">
        {{-- Tagline --}}
        <p 
            class="text-white/70 tracking-[0.3em] uppercase text-xs mb-3 font-medium"
            style="font-family: 'Satoshi', sans-serif;"
            data-animate="fade-up"
            data-delay="0.1"
        >
            Ready to Transform Your Space?
        </p>

        {{-- Heading --}}
        <h2 
            class="font-light text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-white leading-tight mb-4"
            style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
            data-animate="fade-up"
            data-delay="0.2"
        >
            Let's Create Something <br class="hidden sm:block"> Extraordinary Together
        </h2>

        {{-- Primary Divider --}}
        <div 
            class="w-20 h-px bg-gradient-to-r from-transparent via-white/50 to-transparent mx-auto mb-6"
            data-animate="fade-up"
            data-delay="0.3"
        ></div>

        {{-- Description --}}
        <p 
            class="max-w-2xl mx-auto text-white/80 text-sm sm:text-base leading-relaxed mb-8"
            style="font-family: 'Satoshi', sans-serif;"
            data-animate="fade-up"
            data-delay="0.4"
        >
            Schedule a free consultation and discover how we can bring your vision to life. 
            Our expert team is ready to guide you through every step of your design journey.
        </p>

        {{-- CTA Button --}}
        <div data-animate="fade-up" data-delay="0.5">
            <button 
                type="button"
                data-consultation-trigger
                class="cta-button inline-flex items-center justify-center gap-2 px-8 py-3.5 sm:px-10 sm:py-4 rounded-lg font-medium text-white text-sm sm:text-base transition-all duration-300 hover:opacity-90 hover:transform hover:-translate-y-0.5 shadow-lg"
                style="background-color: var(--color-primary); font-family: 'Satoshi', sans-serif;"
            >
                <span>Get Free Consultation</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>
    </div>
</section>

{{-- Component Styles --}}
<style>
    .cta-banner-section {
        position: relative;
    }
    
    .cta-button {
        position: relative;
        overflow: hidden;
    }
    
    .cta-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .cta-button:hover::before {
        left: 100%;
    }
    
    .cta-button:active {
        transform: translateY(0);
    }
    
    /* Mobile Optimizations */
    @media (max-width: 640px) {
        .cta-banner-section {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }
    }
</style>

