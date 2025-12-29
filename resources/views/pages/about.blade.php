<x-layouts.app 
    title="About Us | {{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}"
    description="Learn about Nesthetix Designs - a premier interior design studio with a passion for creating beautiful, functional spaces. Discover our story, values, and commitment to excellence."
    canonical="{{ url('/about') }}">
    
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
                    Our Story
                </p>

                {{-- Main Heading --}}
                <h1
                    class="font-light text-4xl md:text-5xl lg:text-6xl text-theme-primary leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    data-animate="fade-up"
                    data-delay="0.2"
                >
                    About Nesthetix Designs
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
                    We are passionate interior designers dedicated to creating spaces that inspire, delight, and enhance the lives of those who inhabit them.
                </p>
            </div>
        </div>
    </section>

    {{-- About Content Section --}}
    <section class="relative py-16 px-6 lg:px-16 overflow-hidden bg-white" data-animate="fade-up">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Content --}}
                <div class="space-y-6" data-animate="fade-up">
                    <h2 
                        class="font-light text-3xl md:text-4xl text-theme-primary leading-tight"
                        style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    >
                        Crafting Beautiful Spaces Since Day One
                    </h2>
                    <div class="w-16 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent"></div>
                    <div class="space-y-4 text-gray-700 leading-relaxed" style="font-family: 'Satoshi', sans-serif;">
                        <p>
                            Nesthetix Designs was founded with a simple yet powerful vision: to transform ordinary spaces into extraordinary environments. With over a decade of experience in the interior design industry, we have established ourselves as a trusted name in luxury residential and commercial design.
                        </p>
                        <p>
                            Our team of talented designers and craftsmen work collaboratively to bring your vision to life. We believe that great design is not just about aesthetics—it's about creating spaces that are both beautiful and functional, spaces that tell your story and reflect your unique personality.
                        </p>
                        <p>
                            Every project we undertake is approached with meticulous attention to detail, a deep understanding of space planning, and an unwavering commitment to quality. From concept development to final installation, we ensure that every element is thoughtfully curated and flawlessly executed.
                        </p>
                    </div>
                </div>

                {{-- Image --}}
                <div class="relative" data-animate="fade-up" data-delay="0.2">
                    <div class="relative w-full h-96 md:h-[500px] rounded-lg overflow-hidden shadow-xl">
                        <img 
                            src="https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg" 
                            alt="About Nesthetix Designs"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Values Section --}}
    <section class="relative py-16 px-6 lg:px-16 overflow-hidden bg-gray-50" data-animate="fade-up">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 
                    class="font-light text-3xl md:text-4xl text-theme-primary leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                >
                    Our Core Values
                </h2>
                <div class="w-16 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8 bg-white rounded-lg shadow-md" data-animate="fade-up">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-[var(--color-primary)]/10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[var(--color-primary)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-theme-primary mb-3" style="font-family: 'Canela Text Trial', serif;">
                        Excellence
                    </h3>
                    <p class="text-gray-600" style="font-family: 'Satoshi', sans-serif;">
                        We strive for perfection in every detail, ensuring the highest quality in design and execution.
                    </p>
                </div>

                <div class="text-center p-8 bg-white rounded-lg shadow-md" data-animate="fade-up" data-delay="0.1">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-[var(--color-primary)]/10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[var(--color-primary)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-theme-primary mb-3" style="font-family: 'Canela Text Trial', serif;">
                        Client-Centric
                    </h3>
                    <p class="text-gray-600" style="font-family: 'Satoshi', sans-serif;">
                        Your vision is our priority. We listen, understand, and collaborate to bring your dreams to reality.
                    </p>
                </div>

                <div class="text-center p-8 bg-white rounded-lg shadow-md" data-animate="fade-up" data-delay="0.2">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-[var(--color-primary)]/10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[var(--color-primary)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-theme-primary mb-3" style="font-family: 'Canela Text Trial', serif;">
                        Innovation
                    </h3>
                    <p class="text-gray-600" style="font-family: 'Satoshi', sans-serif;">
                        We embrace new ideas, technologies, and design trends to create cutting-edge solutions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Expertise Section --}}
    <x-expertise-section />

    {{-- Testimonials Section --}}
    <x-testimonials />

</x-layouts.app>

