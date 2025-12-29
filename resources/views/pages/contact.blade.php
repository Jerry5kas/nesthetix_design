<x-layouts.app 
    title="Contact Us | {{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}"
    description="Get in touch with Nesthetix Designs. We're here to help bring your interior design vision to life. Contact us for consultations, inquiries, or to discuss your next project."
    canonical="{{ url('/contact') }}">
    
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
                    Get In Touch
                </p>

                {{-- Main Heading --}}
                <h1
                    class="font-light text-4xl md:text-5xl lg:text-6xl text-theme-primary leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    data-animate="fade-up"
                    data-delay="0.2"
                >
                    Contact Us
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
                    Ready to transform your space? We'd love to hear from you. Get in touch with our team to discuss your project, schedule a consultation, or learn more about our services.
                </p>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="relative py-16 px-6 lg:px-16 overflow-hidden bg-white" data-animate="fade-up">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                {{-- Contact Information --}}
                <div class="space-y-8" data-animate="fade-up">
                    <div>
                        <h2 
                            class="font-light text-3xl md:text-4xl text-theme-primary leading-tight mb-6"
                            style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                        >
                            Let's Start a Conversation
                        </h2>
                        <div class="w-16 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mb-8"></div>
                        <p class="text-gray-700 leading-relaxed mb-8" style="font-family: 'Satoshi', sans-serif;">
                            Whether you have a specific project in mind or just want to explore the possibilities, we're here to help. Reach out to us through any of the channels below, and we'll get back to you as soon as possible.
                        </p>
                    </div>

                    {{-- Contact Details --}}
                    <div class="space-y-6">
                        {{-- Email --}}
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[var(--color-primary)]/10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[var(--color-primary)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-theme-primary mb-1" style="font-family: 'Satoshi', sans-serif;">
                                    Email
                                </h3>
                                <a href="mailto:hello@nesthetix.com" class="text-gray-600 hover:text-[var(--color-primary)] transition-colors" style="font-family: 'Satoshi', sans-serif;">
                                    hello@nesthetix.com
                                </a>
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[var(--color-primary)]/10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[var(--color-primary)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-theme-primary mb-1" style="font-family: 'Satoshi', sans-serif;">
                                    Phone
                                </h3>
                                <a href="tel:+1234567890" class="text-gray-600 hover:text-[var(--color-primary)] transition-colors" style="font-family: 'Satoshi', sans-serif;">
                                    +1 (234) 567-890
                                </a>
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[var(--color-primary)]/10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[var(--color-primary)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-theme-primary mb-1" style="font-family: 'Satoshi', sans-serif;">
                                    Office
                                </h3>
                                <p class="text-gray-600" style="font-family: 'Satoshi', sans-serif;">
                                    Bangalore, Karnataka<br>
                                    India
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="bg-gray-50 rounded-lg p-8 md:p-10" data-animate="fade-up" data-delay="0.2">
                    <h2 
                        class="font-light text-2xl md:text-3xl text-theme-primary leading-tight mb-6"
                        style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    >
                        Send Us a Message
                    </h2>
                    <div class="w-16 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mb-8"></div>
                    
                    <form class="space-y-6" method="POST" action="#">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-semibold text-theme-primary mb-2" style="font-family: 'Satoshi', sans-serif;">
                                Name *
                            </label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent transition-all"
                                style="font-family: 'Satoshi', sans-serif;"
                            />
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-theme-primary mb-2" style="font-family: 'Satoshi', sans-serif;">
                                Email *
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent transition-all"
                                style="font-family: 'Satoshi', sans-serif;"
                            />
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-semibold text-theme-primary mb-2" style="font-family: 'Satoshi', sans-serif;">
                                Phone
                            </label>
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent transition-all"
                                style="font-family: 'Satoshi', sans-serif;"
                            />
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-theme-primary mb-2" style="font-family: 'Satoshi', sans-serif;">
                                Message *
                            </label>
                            <textarea 
                                id="message" 
                                name="message" 
                                rows="5"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent transition-all resize-none"
                                style="font-family: 'Satoshi', sans-serif;"
                            ></textarea>
                        </div>

                        <button 
                            type="submit"
                            class="w-full px-8 py-4 bg-[var(--color-primary)] text-white rounded-lg font-semibold tracking-wide hover:bg-[var(--color-secondary)] transition-all duration-300 shadow-md hover:shadow-lg"
                            style="font-family: 'Satoshi', sans-serif;"
                        >
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>

