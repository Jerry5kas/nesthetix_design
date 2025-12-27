@props([
    'heading' => 'Hear From Our Satisfied Clients',
    'subheading' => 'Our Happy Customers',
    'description' => 'Discover what our clients have to say about their experience with Nesthetix Designs. Our dedication to excellence has transformed spaces and delighted customers. Read their testimonials to see how we\'ve turned visions into reality, creating beautiful and functional interiors that inspire and impress.',
    'testimonials' => [
        [
            'name' => 'Priya Menon',
            'location' => 'Bangalore, Karnataka',
            'rating' => 5,
            'review' => 'Nesthetix Designs transformed our 3BHK apartment into a beautiful modern home. The team\'s attention to detail and understanding of our requirements was exceptional. They completed the project on time and within budget. Highly recommend their services!',
            'time_ago' => '2 years ago',
            'avatar' => 'P',
        ],
        [
            'name' => 'Rajesh Kumar',
            'location' => 'Chennai, Tamil Nadu',
            'rating' => 5,
            'review' => 'Outstanding work! They designed our entire home with such elegance and functionality. The modular kitchen they created is the highlight of our home. Professional team, great communication, and excellent execution. Thank you Nesthetix!',
            'time_ago' => '1 year ago',
            'avatar' => 'RK',
        ],
        [
            'name' => 'Lakshmi Nair',
            'location' => 'Kochi, Kerala',
            'rating' => 5,
            'review' => 'We are extremely happy with our new office interior design. The workspace is now more productive and welcoming. Nesthetix Designs understood our brand identity perfectly and translated it into the design. Wonderful experience from start to finish.',
            'time_ago' => '8 months ago',
            'avatar' => 'LN',
        ],
        [
            'name' => 'Suresh Reddy',
            'location' => 'Hyderabad, Telangana',
            'rating' => 5,
            'review' => 'Best interior designers in the city! They gave our villa a luxurious yet comfortable feel. The materials used are of excellent quality and the finishing is flawless. The team was responsive and professional throughout the project.',
            'time_ago' => '1 year ago',
            'avatar' => 'SR',
        ],
        [
            'name' => 'Meera Iyer',
            'location' => 'Bangalore, Karnataka',
            'rating' => 5,
            'review' => 'Nesthetix Designs made our dream home a reality. Their design concepts were innovative and practical. The living room and dining area look absolutely stunning. We couldn\'t be happier with the results. Highly recommended!',
            'time_ago' => '6 months ago',
            'avatar' => 'MI',
        ],
        [
            'name' => 'Vikram Pillai',
            'location' => 'Trivandrum, Kerala',
            'rating' => 5,
            'review' => 'Excellent service and beautiful designs! They transformed our traditional home into a modern masterpiece while preserving its essence. The team was courteous, creative, and always available to address our concerns. Great value for money.',
            'time_ago' => '1 year ago',
            'avatar' => 'VP',
        ],
        [
            'name' => 'Anita Rao',
            'location' => 'Bangalore, Karnataka',
            'rating' => 5,
            'review' => 'We hired Nesthetix Designs for our restaurant interior and they delivered beyond expectations. The ambiance is perfect and has attracted more customers. Their commercial interior expertise is top-notch. Thank you for the wonderful work!',
            'time_ago' => '9 months ago',
            'avatar' => 'AR',
        ],
        [
            'name' => 'Karthik Shenoy',
            'location' => 'Mangalore, Karnataka',
            'rating' => 5,
            'review' => 'Professional, creative, and reliable! Nesthetix Designs helped us design our new apartment from scratch. Every corner of our home is thoughtfully designed and beautifully executed. The project management was seamless. Highly satisfied!',
            'time_ago' => '7 months ago',
            'avatar' => 'KS',
        ],
        [
            'name' => 'Divya Nambiar',
            'location' => 'Cochin, Kerala',
            'rating' => 5,
            'review' => 'Amazing experience with Nesthetix Designs! They understood our vision and brought it to life beautifully. The modular kitchen is our favorite part - so functional and stylish. The team was patient, professional, and delivered exceptional results.',
            'time_ago' => '1 year ago',
            'avatar' => 'DN',
        ],
        [
            'name' => 'Gopal Subramanian',
            'location' => 'Chennai, Tamil Nadu',
            'rating' => 5,
            'review' => 'Outstanding interior design services! They designed our entire house with such sophistication and attention to detail. The use of colors, textures, and lighting is perfect. The team\'s expertise is evident in every room. Highly recommended!',
            'time_ago' => '5 months ago',
            'avatar' => 'GS',
        ],
        [
            'name' => 'Sarala Venkatesh',
            'location' => 'Bangalore, Karnataka',
            'rating' => 5,
            'review' => 'We are thrilled with our new home interior! Nesthetix Designs created a perfect blend of modern and traditional elements. The quality of work is excellent and they maintained cleanliness throughout the project. Wonderful team to work with!',
            'time_ago' => '10 months ago',
            'avatar' => 'SV',
        ],
        [
            'name' => 'Mohan Das',
            'location' => 'Thrissur, Kerala',
            'rating' => 5,
            'review' => 'Best interior design company we\'ve worked with! They transformed our old house into a beautiful modern home. The designs are elegant, practical, and within our budget. The team was professional and completed everything on time. Excellent service!',
            'time_ago' => '1 year ago',
            'avatar' => 'MD',
        ],
    ],
    'readMoreText' => 'Read more',
])

{{-- ============================================
    TESTIMONIALS COMPONENT
    Premium Interior Design - Client Testimonials from Google
    Usage: <x-testimonials />
    ============================================ --}}

<section 
    class="relative py-12 px-6 lg:px-16 overflow-hidden bg-white"
    aria-labelledby="testimonials-section"
    data-animate="fade-up"
>
    {{-- Decorative Accent Line --}}
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10"></div>

    <div class="relative max-w-7xl mx-auto z-20">
        {{-- Header Section --}}
        <div class="text-center max-w-4xl mx-auto mb-12" data-animate="fade-up">
            {{-- Subheading Badge --}}
            <p 
                class="text-theme-muted tracking-[0.3em] uppercase text-xs mb-3 font-medium"
                style="font-family: 'Satoshi', sans-serif;"
                data-animate="fade-up"
                data-delay="0.1"
            >
                {{ $subheading }}
            </p>

            {{-- Main Heading --}}
            <h2
                id="testimonials-section"
                class="font-light text-2xl md:text-4xl lg:text-5xl text-theme-primary leading-tight mb-4"
                style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                data-animate="fade-up"
                data-delay="0.2"
            >
                {{ $heading }}
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
                {{ $description }}
            </p>
        </div>

        {{-- Testimonials Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 testimonials-grid" data-animate="stagger" data-animate-custom="true" data-stagger="0.1">
            @foreach($testimonials as $index => $testimonial)
                <article 
                    class="testimonial-card group relative bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-500 p-6 flex flex-col h-full"
                    data-animate="fade-up"
                    data-delay="{{ $index * 0.1 }}"
                >
                    {{-- Client Header --}}
                    <div class="flex items-start gap-4 mb-4">
                        {{-- Avatar --}}
                        <div class="flex-shrink-0">
                            <div 
                                class="w-12 h-12 rounded-full flex items-center justify-center text-white font-semibold text-sm"
                                style="background-color: var(--color-primary); font-family: 'Satoshi', sans-serif;"
                            >
                                {{ $testimonial['avatar'] }}
                            </div>
                        </div>

                        {{-- Client Info --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 
                                    class="font-semibold text-theme-primary text-sm truncate"
                                    style="font-family: 'Satoshi', sans-serif;"
                                >
                                    {{ $testimonial['name'] }}
                                </h3>
                                {{-- Google Icon --}}
                                <svg 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    class="w-4 h-4 text-gray-400 flex-shrink-0" 
                                    viewBox="0 0 24 24" 
                                    fill="currentColor"
                                >
                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                                </svg>
                            </div>
                            <p 
                                class="text-xs text-gray-500 mb-2"
                                style="font-family: 'Satoshi', sans-serif;"
                            >
                                {{ $testimonial['location'] }}
                            </p>
                            <p 
                                class="text-xs text-gray-400"
                                style="font-family: 'Satoshi', sans-serif;"
                            >
                                {{ $testimonial['time_ago'] }}
                            </p>
                        </div>
                    </div>

                    {{-- Rating --}}
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < $testimonial['rating']; $i++)
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                class="w-4 h-4 text-yellow-400" 
                                viewBox="0 0 20 20" 
                                fill="currentColor"
                            >
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>

                    {{-- Review Text --}}
                    <div class="flex-1 mb-4">
                        <p 
                            class="text-sm text-gray-700 leading-relaxed line-clamp-4"
                            style="font-family: 'Satoshi', sans-serif;"
                        >
                            {{ $testimonial['review'] }}
                        </p>
                    </div>

                    {{-- Read More Link --}}
                    <div class="mt-auto">
                        <button 
                            type="button"
                            class="text-xs text-gray-400 hover:text-theme-primary transition-colors duration-300 read-more-btn"
                            style="font-family: 'Satoshi', sans-serif;"
                            onclick="this.previousElementSibling.querySelector('p').classList.toggle('line-clamp-4')"
                        >
                            {{ $readMoreText }}
                        </button>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- Stagger Animation Script --}}
<script>
(function() {
    'use strict';
    
    let staggerAnimationCreated = false;
    
    function initTestimonialsAnimations() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined' || staggerAnimationCreated) {
            if (!staggerAnimationCreated) {
                setTimeout(initTestimonialsAnimations, 100);
            }
            return;
        }

        const testimonialsGrid = document.querySelector('.testimonials-grid');
        if (!testimonialsGrid) return;

        const testimonialCards = testimonialsGrid.querySelectorAll('.testimonial-card');
        
        if (testimonialCards.length === 0) return;

        // Set initial state for all cards
        gsap.set(testimonialCards, {
            opacity: 0,
            y: 40
        });

        // Create stagger animation from parent container
        const staggerValue = parseFloat(testimonialsGrid.dataset.stagger) || 0.1;

        gsap.to(testimonialCards, {
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: staggerValue,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: testimonialsGrid,
                start: 'top 85%',
                toggleActions: 'play none none none',
                once: true,
                onEnter: () => {
                    gsap.to(testimonialCards, {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        stagger: staggerValue,
                        ease: 'power3.out',
                        overwrite: true
                    });
                }
            }
        });

        staggerAnimationCreated = true;

        // Refresh ScrollTrigger after animation is set up
        setTimeout(() => {
            if (typeof ScrollTrigger !== 'undefined') {
                ScrollTrigger.refresh();
            }
        }, 100);
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTestimonialsAnimations);
    } else {
        initTestimonialsAnimations();
    }

    // Refresh ScrollTrigger on window load and resize
    window.addEventListener('load', () => {
        setTimeout(() => {
            if (typeof ScrollTrigger !== 'undefined') {
                ScrollTrigger.refresh();
            }
        }, 300);
    });

    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (typeof ScrollTrigger !== 'undefined') {
                ScrollTrigger.refresh();
            }
        }, 250);
    });
})();
</script>

<style>
.testimonial-card {
    will-change: transform, opacity;
}

/* Line clamp utility for text truncation */
.line-clamp-4 {
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.read-more-btn {
    cursor: pointer;
}

.read-more-btn:hover {
    text-decoration: underline;
}
</style>
