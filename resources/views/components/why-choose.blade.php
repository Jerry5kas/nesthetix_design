{{-- ============================================
    WHY CHOOSE SECTION COMPONENT
    Premium Interior Design - Why Choose Us Section
    Usage: <x-why-choose />
    ============================================ --}}

<section
    class="relative py-12 px-6 lg:px-16 overflow-hidden bg-white"
    data-animate="fade-up"
>
    {{-- Decorative Accent Line --}}
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10"></div>

    {{-- Content Container --}}
    <div class="relative max-w-6xl mx-auto text-center z-20">
        {{-- Tagline --}}
        <p 
            class="text-theme-muted tracking-[0.3em] uppercase text-xs mb-3 font-medium"
            style="font-family: 'Satoshi', sans-serif;"
            data-animate="fade-up"
            data-delay="0.1"
        >
            Premium Interior Design
        </p>

        {{-- Heading --}}
        <h2 
            class="font-light text-2xl md:text-4xl lg:text-5xl text-theme-primary leading-tight mb-4"
            style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
            data-animate="fade-up"
            data-delay="0.2"
        >
            WHY CHOOSE <br class="hidden md:block"> NESTHETIX DESIGNS?
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
            We transform spaces into timeless sanctuaries that reflect your unique vision. From initial concept to final execution, 
            our team of expert designers and craftsmen delivers exceptional results on time and within budget. 
            Experience the difference of thoughtful design — where every detail matters and luxury meets functionality.
        </p>

        {{-- Stats Card --}}
        <div
            class="bg-white text-theme-dark px-6 py-6 grid grid-cols-2 md:grid-cols-4 gap-6 mb-2 font-bold"
            x-data
            data-animate="fade-up"
            data-delay="0.5"
        >
            {{-- Stat 1 --}}
            <div class="text-center">
                <p class="text-theme-secondary font-semibold text-3xl md:text-4xl lg:text-5xl mb-1.5" style="font-family: 'Canela Text Trial', serif;">
                    10+
                </p>
                <p class="text-xs font-medium text-gray-700" style="font-family: 'Satoshi', sans-serif;">
                    Years Of Excellence
                </p>
            </div>

            {{-- Stat 2 --}}
            <div class="text-center">
                <p class="text-theme-secondary font-semibold text-3xl md:text-4xl lg:text-5xl mb-1.5" style="font-family: 'Canela Text Trial', serif;">
                    500+
                </p>
                <p class="text-xs font-medium text-gray-700" style="font-family: 'Satoshi', sans-serif;">
                    Completed Projects
                </p>
            </div>

            {{-- Stat 3 --}}
            <div class="text-center">
                <p class="text-theme-secondary font-semibold text-3xl md:text-4xl lg:text-5xl mb-1.5" style="font-family: 'Canela Text Trial', serif;">
                    98%
                </p>
                <p class="text-xs font-medium text-gray-700" style="font-family: 'Satoshi', sans-serif;">
                    Client Satisfaction
                </p>
            </div>

            {{-- Stat 4 --}}
            <div class="text-center">
                <p class="text-theme-secondary font-semibold text-3xl md:text-4xl lg:text-5xl mb-1.5" style="font-family: 'Canela Text Trial', serif;">
                    50+
                </p>
                <p class="text-xs font-medium text-gray-700" style="font-family: 'Satoshi', sans-serif;">
                    Design Awards
                </p>
            </div>
        </div>

        
    </div>
</section>

