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
                    <div class="flex-shrink-0 w-10 h-10 rounded-lg flex items-center justify-center mt-0.5" style="background-color: var(--color-primary); opacity: 0.1;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" style="color: var(--color-primary);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
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
                    <div class="flex-shrink-0 w-10 h-10 rounded-lg flex items-center justify-center mt-0.5" style="background-color: var(--color-primary); opacity: 0.1;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" style="color: var(--color-primary);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
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
                    <div class="flex-shrink-0 w-10 h-10 rounded-lg flex items-center justify-center mt-0.5" style="background-color: var(--color-primary); opacity: 0.1;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" style="color: var(--color-primary);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
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

