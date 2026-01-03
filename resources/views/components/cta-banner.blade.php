{{-- ============================================
CTA BANNER SECTION COMPONENT
Clean & Compact Call-to-Action Banner
Usage: <x-cta-banner />
============================================ --}}

<section
    class="cta-banner-section relative py-12 sm:py-16 lg:py-20 overflow-hidden cta-bg-pattern border-t border-white/10">

    {{-- Content Container --}}
    <div class="relative max-w-4xl mx-auto px-6 sm:px-8 lg:px-12 text-center z-10">
        {{-- Tagline --}}
        <p class="text-[#D4AF37] tracking-[0.3em] uppercase text-xs mb-3 font-medium"
            style="font-family: 'Satoshi', sans-serif;" data-animate="fade-up" data-delay="0.1">
            Ready to Transform Your Space?
        </p>

        {{-- Heading --}}
        <h2 class="font-light text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-white leading-tight mb-4"
            style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;" data-animate="fade-up"
            data-delay="0.2">
            Let's Create Something <br class="hidden sm:block"> Extraordinary Together
        </h2>

        {{-- Primary Divider --}}
        <div class="w-20 h-px bg-gradient-to-r from-transparent via-[#D4AF37]/50 to-transparent mx-auto mb-6"
            data-animate="fade-up" data-delay="0.3"></div>

        {{-- Description --}}
        <p class="max-w-2xl mx-auto text-gray-400 text-sm sm:text-base leading-relaxed mb-8"
            style="font-family: 'Satoshi', sans-serif;" data-animate="fade-up" data-delay="0.4">
            Schedule a free consultation and discover how we can bring your vision to life.
            Our expert team is ready to guide you through every step of your design journey.
        </p>

        {{-- CTA Button --}}
        <div data-animate="fade-up" data-delay="0.5">
            <button type="button" data-consultation-trigger
                class="cta-button inline-flex items-center justify-center gap-2 px-8 py-3.5 sm:px-10 sm:py-4 rounded-lg font-medium text-white text-sm sm:text-base transition-all duration-300 hover:opacity-90 hover:transform hover:-translate-y-0.5 shadow-lg"
                style="background-color: #7A0C68; font-family: 'Satoshi', sans-serif;">
                <span>Get Free Consultation</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>
    </div>
</section>

{{-- Component Styles --}}
<style>
    /* Custom CTA Background Pattern */
    .cta-bg-pattern {
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