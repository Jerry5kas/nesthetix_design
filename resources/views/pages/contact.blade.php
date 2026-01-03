<x-layouts.app title="Contact Us | {{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}"
    description="Get in touch with Nesthetix Designs. We're here to help bring your interior design vision to life. Contact us for consultations, inquiries, or to discuss your next project."
    canonical="{{ url('/contact') }}">

    {{-- Hero Section --}}
    <section class="relative py-12 px-6 lg:px-16 overflow-hidden hero-banner-section" data-animate="fade-up">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg"
                alt="Contact Us" class="w-full h-full object-cover" loading="eager" />
        </div>

        {{-- Black Overlay --}}
        <div class="absolute inset-0 z-[5] bg-black/50"></div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="text-center max-w-4xl mx-auto">
                {{-- Subheading Badge --}}
                <p class="text-[#D4AF37] tracking-[0.3em] uppercase text-xs mb-3 font-medium"
                    style="font-family: 'Satoshi', sans-serif;" data-animate="fade-up" data-delay="0.1">
                    Get In Touch
                </p>

                {{-- Main Heading --}}
                <h1 class="font-light text-4xl md:text-5xl lg:text-6xl text-white leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;" data-animate="fade-up"
                    data-delay="0.2">
                    Contact Us
                </h1>

                {{-- Primary Divider --}}
                <div class="w-20 h-px bg-gradient-to-r from-[#D4AF37] to-transparent mx-auto mb-6"
                    data-animate="fade-up" data-delay="0.3"></div>

                {{-- Description --}}
                <p class="max-w-4xl mx-auto text-white text-base md:text-lg leading-relaxed mb-8"
                    style="font-family: 'Satoshi', sans-serif;" data-animate="fade-up" data-delay="0.4">
                    Ready to transform your space? We'd love to hear from you. Get in touch with our team to discuss
                    your project, schedule a consultation, or learn more about our services.
                </p>
            </div>
        </div>
    </section>

    {{-- Contact Cards Section (Compact Dark) --}}
    <section class="relative py-8 px-4 lg:px-8 overflow-hidden bg-pattern-dark-radial" data-animate="fade-up">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white/5 rounded-xl border border-white/10 overflow-hidden backdrop-blur-sm">
                <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-white/10">
                    {{-- Address --}}
                    <div class="p-6 flex flex-col items-center text-center group hover:bg-white/5 transition-colors">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-[#D4AF37] mb-3 group-hover:scale-110 transition-transform shadow-inner border border-white/5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-white mb-2 font-sans">Address</h3>
                        <p class="text-sm text-gray-400 leading-relaxed font-sans font-light">
                            No.81/37, The Hulkul, Lavelle Road<br>Bengaluru - 560001
                        </p>
                    </div>

                    {{-- Phone --}}
                    <div class="p-6 flex flex-col items-center text-center group hover:bg-white/5 transition-colors">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-[#D4AF37] mb-3 group-hover:scale-110 transition-transform shadow-inner border border-white/5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-white mb-2 font-sans">Phone</h3>
                        <a href="tel:+919001090010" class="text-sm text-gray-400 hover:text-[#D4AF37] transition-colors font-sans font-light">
                            +91 9001090010
                        </a>
                    </div>

                    {{-- Email --}}
                    <div class="p-6 flex flex-col items-center text-center group hover:bg-white/5 transition-colors">
                        <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-[#D4AF37] mb-3 group-hover:scale-110 transition-transform shadow-inner border border-white/5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"/>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                        </div>
                        <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-white mb-2 font-sans">Email</h3>
                        <a href="mailto:hello@nesthetix.com" class="text-sm text-gray-400 hover:text-[#D4AF37] transition-colors font-sans font-light">
                            hello@nesthetix.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Form & Map Section --}}
    <section class="relative py-16 px-6 lg:px-16 overflow-hidden bg-white" data-animate="fade-up"
        style="opacity: 1; visibility: visible;">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                {{-- Contact Form --}}
                <div class="contact-form-modern" data-animate="fade-up" style="opacity: 1; visibility: visible;">
                    <div class="mb-8">
                        <h2 class="font-light text-3xl md:text-4xl text-theme-primary leading-tight mb-4"
                            style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;">
                            Send Us a Message
                        </h2>
                        <div class="w-16 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mb-6"></div>
                        <p class="text-gray-600 leading-relaxed" style="font-family: 'Satoshi', sans-serif;">
                            Fill out the form below and we'll get back to you within 24 hours. We're here to help bring
                            your vision to life.
                        </p>
                    </div>

                    <form class="space-y-6" method="POST" action="#">
                        @csrf
                        <div class="form-group-modern">
                            <label for="name" class="form-label-modern" style="font-family: 'Satoshi', sans-serif;">
                                Full Name *
                            </label>
                            <input type="text" id="name" name="name" required placeholder="John Doe"
                                class="form-input-modern" style="font-family: 'Satoshi', sans-serif;" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group-modern">
                                <label for="email" class="form-label-modern"
                                    style="font-family: 'Satoshi', sans-serif;">
                                    Email Address *
                                </label>
                                <input type="email" id="email" name="email" required placeholder="john@example.com"
                                    class="form-input-modern" style="font-family: 'Satoshi', sans-serif;" />
                            </div>

                            <div class="form-group-modern">
                                <label for="phone" class="form-label-modern"
                                    style="font-family: 'Satoshi', sans-serif;">
                                    Phone Number
                                </label>
                                <input type="tel" id="phone" name="phone" placeholder="+91 9000000000"
                                    class="form-input-modern" style="font-family: 'Satoshi', sans-serif;" />
                            </div>
                        </div>

                        <div class="form-group-modern">
                            <label for="subject" class="form-label-modern" style="font-family: 'Satoshi', sans-serif;">
                                Subject
                            </label>
                            <input type="text" id="subject" name="subject" placeholder="Project Inquiry"
                                class="form-input-modern" style="font-family: 'Satoshi', sans-serif;" />
                        </div>

                        <div class="form-group-modern">
                            <label for="message" class="form-label-modern" style="font-family: 'Satoshi', sans-serif;">
                                Message *
                            </label>
                            <textarea id="message" name="message" rows="6" required
                                placeholder="Tell us about your project..."
                                class="form-input-modern form-textarea-modern"
                                style="font-family: 'Satoshi', sans-serif;"></textarea>
                        </div>

                        <button type="submit" class="form-button-modern" style="font-family: 'Satoshi', sans-serif;">
                            <span>Send Message</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>
                </div>

                {{-- Map Section --}}
                <div class="contact-map-modern" data-animate="fade-up" data-delay="0.2"
                    style="opacity: 1; visibility: visible;">
                    <div class="mb-8">
                        <h2 class="font-light text-3xl md:text-4xl text-theme-primary leading-tight mb-4"
                            style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;">
                            Visit Our Office
                        </h2>
                        <div class="w-16 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mb-6"></div>
                        <p class="text-gray-600 leading-relaxed mb-6" style="font-family: 'Satoshi', sans-serif;">
                            We're located in the heart of Bangalore. Feel free to visit us during business hours or
                            schedule an appointment.
                        </p>
                        <div class="bg-gray-50 rounded-lg p-6 mb-6">
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[var(--color-primary)]"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-gray-900 text-sm"
                                            style="font-family: 'Satoshi', sans-serif;">Business Hours</p>
                                        <p class="text-gray-600 text-sm" style="font-family: 'Satoshi', sans-serif;">Mon
                                            - Sat: 9:00 AM - 6:00 PM</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[var(--color-primary)]"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-gray-900 text-sm"
                                            style="font-family: 'Satoshi', sans-serif;">Location</p>
                                        <p class="text-gray-600 text-sm" style="font-family: 'Satoshi', sans-serif;">The
                                            Hulkul, Lavelle Road, Bengaluru</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="map-container-modern">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.0!2d77.6!3d12.97!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae13e8b8b8b8b8%3A0x8b8b8b8b8b8b8b8b!2sThe%20Hulkul%2C%20Lavelle%20Road%2C%20Bengaluru%2C%20Karnataka%20560001!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="w-full h-full rounded-lg"
                            title="Nesthetix Designs Location"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>

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

    /* Modern Contact Cards */
    .contact-card-modern {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(50, 1, 47, 0.08);
        position: relative;
        overflow: hidden;
    }

    .contact-card-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--color-primary), var(--color-secondary));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .contact-card-modern:hover::before {
        transform: scaleX(1);
    }

    .contact-card-modern:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(50, 1, 47, 0.12);
        border-color: rgba(50, 1, 47, 0.15);
    }

    .contact-card-icon {
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 0.75rem;
        background: linear-gradient(135deg, rgba(50, 1, 47, 0.1), rgba(74, 25, 66, 0.1));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-primary);
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }

    .contact-card-modern:hover .contact-card-icon {
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        color: white;
        transform: scale(1.05);
    }

    .contact-card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--color-secondary);
        margin-bottom: 0.75rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .contact-card-text {
        color: #4b5563;
        line-height: 1.6;
        font-size: 0.9375rem;
    }

    .contact-card-link {
        color: var(--color-primary);
        font-weight: 500;
        font-size: 0.9375rem;
        transition: all 0.2s ease;
        display: inline-block;
    }

    .contact-card-link:hover {
        color: var(--color-secondary);
        transform: translateX(4px);
    }

    /* Modern Form Styles */
    .contact-form-modern {
        background: white;
        border-radius: 1.5rem;
        padding: 2.5rem;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(50, 1, 47, 0.08);
    }

    .form-group-modern {
        position: relative;
    }

    .form-label-modern {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--color-secondary);
        margin-bottom: 0.5rem;
        letter-spacing: 0.025em;
    }

    .form-input-modern {
        width: 100%;
        padding: 0.875rem 1.25rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.75rem;
        font-size: 0.9375rem;
        transition: all 0.3s ease;
        background: white;
        color: #1f2937;
    }

    .form-input-modern:focus {
        outline: none;
        border-color: var(--color-primary);
        box-shadow: 0 0 0 4px rgba(50, 1, 47, 0.1);
        background: white;
    }

    .form-input-modern::placeholder {
        color: #9ca3af;
    }

    .form-textarea-modern {
        min-height: 150px;
        resize: vertical;
    }

    .form-button-modern {
        width: 100%;
        padding: 1rem 2rem;
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-size: 1rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(50, 1, 47, 0.2);
    }

    .form-button-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(50, 1, 47, 0.3);
    }

    .form-button-modern:active {
        transform: translateY(0);
    }

    /* Map Section */
    .contact-map-modern {
        position: relative;
    }

    .map-container-modern {
        width: 100%;
        height: 500px;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(50, 1, 47, 0.08);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .contact-form-modern {
            padding: 2rem;
        }

        .map-container-modern {
            height: 400px;
        }
    }

    @media (max-width: 768px) {
        .contact-card-modern {
            padding: 1.5rem;
        }

        .contact-form-modern {
            padding: 1.5rem;
        }

        .map-container-modern {
            height: 350px;
        }
    }

    /* Ensure visibility - fallback if animations don't load */
    .contact-card-modern,
    .contact-form-modern,
    .contact-map-modern,
    section[data-animate] {
        opacity: 1 !important;
        visibility: visible !important;
        display: block !important;
    }

    /* Ensure sections are visible */
    section {
        display: block;
        position: relative;
    }

    /* Contact Cards Section */
    .bg-gray-50 {
        background-color: #f9fafb;
    }

    /* Contact Form Section */
    .bg-white {
        background-color: #ffffff;
    }

    /* Animation - only apply if JS is enabled */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Only animate if reduced motion is not preferred */
    @media (prefers-reduced-motion: no-preference) {

        .contact-card-modern,
        .contact-form-modern,
        .contact-map-modern {
            animation: fadeInUp 0.6s ease-out backwards;
        }
    }
</style>