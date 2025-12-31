{{-- ============================================
    CONTACT SECTION COMPONENT
    Clean & Compact Contact Section with Map
    Usage: <x-contact-section />
    ============================================ --}}

<section class="contact-section relative py-8 sm:py-10 px-6 lg:px-16 overflow-hidden bg-white">
    {{-- Decorative Accent Line --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10"></div>
    
    {{-- Content Container --}}
    <div class="relative max-w-7xl mx-auto z-20">
        {{-- Section Header --}}
        <div class="text-center mb-6 sm:mb-8">
            {{-- Tagline --}}
            <p 
                class="text-theme-muted tracking-[0.3em] uppercase text-xs mb-2 font-medium"
                style="font-family: 'Satoshi', sans-serif;"
                data-animate="fade-up"
                data-delay="0.1"
            >
                Get In Touch
            </p>

            {{-- Heading --}}
            <h2 
                class="font-light text-xl md:text-2xl lg:text-3xl text-theme-primary leading-tight mb-2"
                style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                data-animate="fade-up"
                data-delay="0.2"
            >
                Contact Us
            </h2>

            {{-- Primary Divider --}}
            <div 
                class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto"
                data-animate="fade-up"
                data-delay="0.3"
            ></div>
        </div>

        {{-- Contact Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
            {{-- Left Section: Contact Information --}}
            <div class="flex flex-col justify-center space-y-5" data-animate="fade-up" data-delay="0.4">
                {{-- Address --}}
                <div class="flex items-start gap-4">
                    <div class="contact-icon-wrapper flex-shrink-0 w-10 h-10 rounded-lg flex items-center justify-center mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 contact-icon" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xs font-semibold uppercase tracking-wider mb-1.5" style="color: var(--color-secondary); font-family: 'Satoshi', sans-serif;">
                            Address
                        </h3>
                        <p class="text-gray-700 text-sm leading-relaxed" style="font-family: 'Satoshi', sans-serif;">
                            No.81/37, Ground Floor, The Hulkul,<br>
                            Lavelle Road, Bengaluru - 560001
                        </p>
                    </div>
                </div>

                {{-- Phone --}}
                <div class="flex items-start gap-4">
                    <div class="contact-icon-wrapper flex-shrink-0 w-10 h-10 rounded-lg flex items-center justify-center mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 contact-icon" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xs font-semibold uppercase tracking-wider mb-1.5" style="color: var(--color-secondary); font-family: 'Satoshi', sans-serif;">
                            Phone
                        </h3>
                        <a href="tel:+919001090010" class="text-gray-700 hover:text-theme-primary transition-colors text-sm" style="font-family: 'Satoshi', sans-serif;">
                            +91 9001090010
                        </a>
                    </div>
                </div>

                {{-- Email --}}
                <div class="flex items-start gap-4">
                    <div class="contact-icon-wrapper flex-shrink-0 w-10 h-10 rounded-lg flex items-center justify-center mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 contact-icon" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2"/>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xs font-semibold uppercase tracking-wider mb-1.5" style="color: var(--color-secondary); font-family: 'Satoshi', sans-serif;">
                            Email
                        </h3>
                        <a href="mailto:hello@nesthetix.com" class="text-gray-700 hover:text-theme-primary transition-colors text-sm" style="font-family: 'Satoshi', sans-serif;">
                            hello@nesthetix.com
                        </a>
                    </div>
                </div>
            </div>

            {{-- Right Section: Map --}}
            <div class="contact-map-container" data-animate="fade-up" data-delay="0.5">
                <div class="w-full h-full rounded-lg overflow-hidden shadow-lg border border-gray-200">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.0!2d77.6!3d12.97!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae13e8b8b8b8b8%3A0x8b8b8b8b8b8b8b8b!2sThe%20Hulkul%2C%20Lavelle%20Road%2C%20Bengaluru%2C%20Karnataka%20560001!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full contact-map-iframe"
                        title="Nesthetix Designs Location"
                    ></iframe>
                </div>
                {{-- Note: To get the correct embed URL, go to Google Maps, search for your address, click Share > Embed a map, and replace the src URL above --}}
            </div>
        </div>
    </div>
</section>

{{-- Component Styles --}}
<style>
    .contact-section {
        position: relative;
    }
    
    /* Contact Icon Styles - Fixed visibility issue */
    .contact-icon-wrapper {
        /* Light purple background with 10% opacity */
        background-color: rgba(50, 1, 47, 0.1);
        position: relative;
    }
    
    /* Use color-mix for dynamic theming in modern browsers */
    @supports (background-color: color-mix(in srgb, red 10%, transparent)) {
        .contact-icon-wrapper {
            background-color: color-mix(in srgb, var(--color-primary) 10%, transparent);
        }
    }
    
    .contact-icon {
        stroke: var(--color-primary);
        width: 1.25rem;
        height: 1.25rem;
        flex-shrink: 0;
        opacity: 1;
    }
    
    .contact-map-container {
        position: relative;
        height: 100%;
        display: flex;
        align-items: stretch;
    }
    
    .contact-map-container > div {
        width: 100%;
        height: 100%;
    }
    
    .contact-map-iframe {
        border-radius: 0.5rem;
        min-height: 280px;
        height: 100%;
    }
    
    /* Make map height match content on desktop */
    @media (min-width: 1024px) {
        .contact-map-container {
            height: auto;
        }
        
        .contact-map-iframe {
            height: 280px;
            min-height: 280px;
        }
    }
    
    /* Mobile Optimizations */
    @media (max-width: 1023px) {
        .contact-map-container {
            min-height: 300px;
        }
        
        .contact-map-iframe {
            min-height: 300px;
        }
    }
    
    @media (max-width: 640px) {
        .contact-section {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        
        .contact-map-container {
            min-height: 280px;
        }
        
        .contact-map-iframe {
            min-height: 280px;
        }
    }
</style>

