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
    ],
    'readMoreText' => 'Read more',
])

{{-- ============================================
    TESTIMONIALS COMPONENT
    Premium Interior Design - Client Testimonials from Google
    Usage: <x-testimonials />
    ============================================ --}}

<section 
    class="relative py-12 px-6 lg:px-16 overflow-hidden"
    style="background: linear-gradient(180deg, #fafafa 0%, #ffffff 100%);"
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

        {{-- Testimonials Slider --}}
        <div class="testimonials-slider-container" x-data="testimonialsSlider()">
            <div class="testimonials-slider-wrapper">
                <div 
                    class="testimonials-slider-track" 
                    :style="{ transform: `translateX(-${currentIndex * 100}%)` }"
                >
                    @foreach($testimonials as $index => $testimonial)
                        <figure class="testimonial-figure">
                            <blockquote>
                                {{ $testimonial['review'] }}
                                <div class="arrow"></div>
                            </blockquote>
                            <img 
                                src="https://ui-avatars.com/api?name={{ urlencode($testimonial['name']) }}&size=90&background=9e0c49&color=fff&font-size=0.4&bold=true" 
                                alt="{{ $testimonial['name'] }}" 
                            />
                            <div class="author">
                                <h5>
                                    {{ $testimonial['name'] }}
                                    <span>{{ $testimonial['location'] }}</span>
                                </h5>
                            </div>
                        </figure>
                    @endforeach
                </div>
            </div>
            
            {{-- Dots Indicator --}}
            <div class="testimonials-slider-dots">
                @php
                    $totalSlides = ceil(count($testimonials) / 3);
                @endphp
                @for($i = 0; $i < $totalSlides; $i++)
                    <button 
                        class="slider-dot {{ $i === 0 ? 'active' : '' }}"
                        @click="goToSlide({{ $i }})"
                        :class="{ 'active': currentIndex === {{ $i }} }"
                        aria-label="Go to slide {{ $i + 1 }}"
                    ></button>
                @endfor
            </div>
        </div>
    </div>
</section>

<script>
function testimonialsSlider() {
    return {
        currentIndex: 0,
        totalSlides: Math.ceil({{ count($testimonials) }} / 3),
        autoplayInterval: null,
        
        init() {
            // Auto-play slider (optional)
            // this.startAutoplay();
        },
        
        nextSlide() {
            this.currentIndex = (this.currentIndex + 1) % this.totalSlides;
        },
        
        prevSlide() {
            this.currentIndex = (this.currentIndex - 1 + this.totalSlides) % this.totalSlides;
        },
        
        goToSlide(index) {
            this.currentIndex = index;
        },
        
        startAutoplay() {
            this.autoplayInterval = setInterval(() => {
                this.nextSlide();
            }, 5000);
        },
        
        stopAutoplay() {
            if (this.autoplayInterval) {
                clearInterval(this.autoplayInterval);
            }
        }
    }
}
</script>

<style>
/* Testimonials Slider Container */
.testimonials-slider-container {
    position: relative;
    width: 100%;
    padding: 2rem 0;
    margin: 0;
}

/* Slider Wrapper */
.testimonials-slider-wrapper {
    width: 100%;
    overflow: hidden;
    position: relative;
}

/* Slider Track */
.testimonials-slider-track {
    display: flex;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
    width: 100%;
}

/* Testimonial Figure */
.testimonial-figure {
    font-family: 'Satoshi', sans-serif;
    position: relative;
    overflow: visible;
    flex: 0 0 calc(100% / 3);
    min-width: 0;
    padding: 0 1rem;
    color: #333;
    text-align: left;
    box-sizing: border-box;
}

.testimonial-figure * {
    box-sizing: border-box;
    transition: all 0.35s cubic-bezier(0.25, 0.5, 0.5, 0.9);
}

/* Avatar Image */
.testimonial-figure img {
    max-width: 100%;
    vertical-align: middle;
    height: 90px;
    width: 90px;
    border-radius: 50%;
    margin: 40px 0 0 10px;
    object-fit: cover;
    border: 3px solid var(--color-primary, #9e0c49);
    box-shadow: none;
}

/* Blockquote - Clean White Background */
.testimonial-figure blockquote {
    display: block;
    border-radius: 12px;
    position: relative;
    background: #ffffff;
    padding: 30px 50px 35px 50px;
    font-size: 0.95rem;
    font-weight: 400;
    margin: 0;
    line-height: 1.7;
    font-style: italic;
    font-family: 'Satoshi', sans-serif;
    color: #2c2c2c;
    box-shadow: none;
    border: none;
}

.testimonial-figure blockquote::before,
.testimonial-figure blockquote::after {
    font-family: 'Canela Text Trial', serif;
    content: "\201C";
    position: absolute;
    font-size: 70px;
    opacity: 0.3;
    font-style: normal;
    color: #d4af37;
    line-height: 1;
    font-weight: 300;
}

.testimonial-figure blockquote::before {
    top: 15px;
    left: 20px;
}

.testimonial-figure blockquote::after {
    content: "\201D";
    right: 20px;
    bottom: 5px;
    top: auto;
}

/* Arrow */
.testimonial-figure .arrow {
    top: 100%;
    width: 0;
    height: 0;
    border-left: 0 solid transparent;
    border-right: 25px solid transparent;
    border-top: 25px solid #ffffff;
    margin: 0;
    position: absolute;
    left: 20px;
}

/* Author Info - Updated Colors */
.testimonial-figure .author {
    position: absolute;
    bottom: 45px;
    padding: 0 10px 0 120px;
    margin: 0;
    text-transform: uppercase;
    color: #1a1a1a;
    transform: translateY(50%);
    z-index: 3;
}

.testimonial-figure .author h5 {
    opacity: 1;
    margin: 0;
    font-weight: 600;
    font-size: 0.85rem;
    font-family: 'Satoshi', sans-serif;
    letter-spacing: 0.05em;
    color: #1a1a1a;
}

.testimonial-figure .author h5 span {
    font-weight: 400;
    text-transform: none;
    padding-left: 8px;
    opacity: 0.7;
    font-size: 0.8rem;
    display: block;
    margin-top: 4px;
    text-transform: capitalize;
    letter-spacing: 0;
    color: #666;
}

/* Hover Effect - Primary Color */
.testimonial-figure:hover blockquote {
    background: var(--color-primary, #9e0c49);
    color: #ffffff;
    box-shadow: none;
    transform: translateY(-4px);
}

.testimonial-figure:hover .arrow {
    border-top-color: var(--color-primary, #9e0c49);
}

.testimonial-figure:hover blockquote::before,
.testimonial-figure:hover blockquote::after {
    color: rgba(255, 255, 255, 0.4);
}

.testimonial-figure:hover img {
    border-color: #ffffff;
    box-shadow: none;
    transform: scale(1.05);
}

.testimonial-figure:hover .author h5 {
    color: #ffffff;
}

.testimonial-figure:hover .author h5 span {
    color: rgba(255, 255, 255, 0.9);
}

/* Slider Dots */
.testimonials-slider-dots {
    display: flex;
    justify-content: center;
    gap: 0.75rem;
    margin-top: 1.5rem;
}

.slider-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #d4af37;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
}

.slider-dot:hover {
    background: rgba(212, 175, 55, 0.3);
    transform: scale(1.2);
}

.slider-dot.active {
    background: #d4af37;
    width: 32px;
    border-radius: 6px;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .testimonial-figure {
        flex: 0 0 calc(100% / 2);
        padding: 0 0.75rem;
    }
    
    .testimonials-slider-track {
        transition: transform 0.5s ease;
    }
}

@media (max-width: 640px) {
    .testimonial-figure {
        flex: 0 0 100%;
        padding: 0 0.5rem;
    }
    
    .testimonial-figure blockquote {
        padding: 20px 35px 25px 35px;
        font-size: 0.9rem;
    }
    
    .testimonial-figure img {
        height: 80px;
        width: 80px;
        margin: 30px 0 0 10px;
    }
    
    .testimonial-figure .author {
        padding: 0 10px 0 100px;
        bottom: 40px;
    }
}

/* Reduced Motion */
@media (prefers-reduced-motion: reduce) {
    .testimonials-slider-track,
    .testimonial-figure * {
        transition: none !important;
    }
}
</style>
