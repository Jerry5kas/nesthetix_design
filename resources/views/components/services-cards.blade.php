@props([
    'heading' => 'Our Services',
    'subheading' => 'What We Offer',
    'description' => 'At Nesthetix Designs, we provide comprehensive interior design solutions that transform spaces into beautiful, functional environments. Our services span from initial concept to final execution.',
])

{{-- ============================================
    SERVICES CARDS COMPONENT
    Premium Interior Design Services - Hover Expanding Cards
    Usage: <x-services-cards />
    ============================================ --}}

<section 
    class="relative py-12 overflow-hidden bg-white w-full" 
    id="services-section"
    aria-labelledby="services-heading"
    data-animate="fade-up"
>
    {{-- Decorative Accent Line --}}
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10"></div>
    
    <div class="relative w-full z-20">
        {{-- Header Section --}}
        <div class="text-center max-w-4xl mx-auto mb-12 px-6 lg:px-16" data-animate="fade-up">
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
                id="services-heading"
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

        {{-- Services Cards Container --}}
        <div x-data="servicesCards()" class="services-container">
            <template x-for="(service, index) in services" :key="index">
                <div 
                    class="service-card group"
                    @mouseenter="setActiveService(index)"
                    @mouseleave="clearActiveService()"
                >
                    <img 
                        :src="service.image" 
                        :alt="service.title"
                        class="service-card__image"
                        loading="lazy"
                    />
                    <div class="service-card__head">
                        <span x-text="service.title"></span>
                    </div>
                    {{-- Detailed Content on Hover --}}
                    <div class="service-card__content">
                        <h3 
                            class="service-card__title"
                            style="font-family: 'Canela Text Trial', serif;"
                            x-text="service.title"
                        ></h3>
                        <p 
                            class="service-card__description"
                            style="font-family: 'Satoshi', sans-serif;"
                            x-text="service.shortDescription"
                        ></p>
                        <div class="service-card__features">
                            <template x-for="feature in service.keyFeatures" :key="feature">
                                <div class="service-card__feature">
                                    <svg class="w-4 h-4 text-[var(--color-primary)]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    <span x-text="feature" style="font-family: 'Satoshi', sans-serif;"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

<script>
function servicesCards() {
    return {
        activeService: null,
        
        services: [
            {
                title: 'Luxury Interiors',
                shortDescription: 'Premium, high-end interiors crafted with bespoke design, exquisite materials, and exceptional detailing.',
                image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg',
                keyFeatures: [
                    'Bespoke, design-led approach',
                    'Premium and imported materials',
                    'Exceptional craftsmanship',
                    'High attention to detailing',
                    'Seamless design-to-execution delivery'
                ]
            },
            {
                title: 'Residential Interiors',
                shortDescription: 'Thoughtfully designed homes that reflect your lifestyle, culture, and everyday needs.',
                image: 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
                keyFeatures: [
                    'Lifestyle-focused design approach',
                    'Custom layouts for Indian homes',
                    'High-quality materials and finishes',
                    'End-to-end turnkey delivery',
                    'Transparent timelines and execution'
                ]
            },
            {
                title: 'Commercial Interiors',
                shortDescription: 'Well-designed commercial environments that support productivity, efficiency, and brand identity.',
                image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ranamatloob567-34823909_694baf216652f9.25031009_PrRZQjkTvi.jpg',
                keyFeatures: [
                    'Business-focused design approach',
                    'Strong technical and MEP coordination',
                    'Brand-aligned interiors',
                    'Scalable solutions for growing teams',
                    'Reliable timelines and execution'
                ]
            },
            {
                title: 'Modular Kitchens',
                shortDescription: 'Modern, functional kitchens designed with precision, efficiency, and refined aesthetics.',
                image: 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg',
                keyFeatures: [
                    'Designed for Indian cooking needs',
                    'Smart storage and ergonomic layouts',
                    'Durable materials and premium fittings',
                    'Clean installation and finishing',
                    'End-to-end service under one roof'
                ]
            },
            {
                title: 'Design-Only Services',
                shortDescription: 'Professional interior design planning that transforms ideas into clear, executable design solutions.',
                image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg',
                keyFeatures: [
                    'Clear and execution-ready documentation',
                    'Design solutions aligned with Indian usage patterns',
                    'Professional visualization and detailing',
                    'Flexible support for third-party execution'
                ]
            },
            {
                title: 'Execution-Only Services',
                shortDescription: 'Expert interior execution and project management for designs developed by you or a third party.',
                image: 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
                keyFeatures: [
                    'Accurate implementation of approved designs',
                    'Skilled workforce and site discipline',
                    'Strong vendor coordination',
                    'Quality-driven execution approach',
                    'Reliable timelines and supervision'
                ]
            },
            {
                title: 'Budget-Based Interiors',
                shortDescription: 'Thoughtful interior solutions designed to deliver maximum value within a defined budget.',
                image: 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg',
                keyFeatures: [
                    'Cost-conscious planning',
                    'Functional and practical design solutions',
                    'Reliable materials and workmanship',
                    'Clear scope and transparent execution',
                    'Balanced design and affordability'
                ]
            }
        ],

        setActiveService(index) {
            this.activeService = index;
        },

        clearActiveService() {
            this.activeService = null;
        }
    }
}
</script>

<style>
.services-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin: 4vmin 0;
    padding: 0;
    overflow: hidden;
    transform: skew(-2deg);
    gap: 0.5rem;
}

.service-card {
    flex: 1;
    transition: all 1s cubic-bezier(0.4, 0, 0.2, 1);
    height: 75vmin;
    max-height: 600px;
    min-height: 400px;
    position: relative;
    overflow: hidden;
    border-radius: 0.5rem;
}

.service-card__image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 1s cubic-bezier(0.4, 0, 0.2, 1);
    filter: grayscale(100%);
    transform: scale(1.05);
}

.service-card:hover {
    flex-grow: 8;
    z-index: 10;
}

.service-card:hover .service-card__image {
    filter: grayscale(0%);
    transform: scale(1);
}

.service-card__head {
    color: var(--color-primary);
    background: rgba(255, 255, 255, 0.95);
    padding: 0.75rem 1rem;
    transform: rotate(-90deg);
    transform-origin: 0% 0%;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    min-width: 100%;
    text-align: center;
    position: absolute;
    bottom: 0;
    left: 0;
    font-size: 1.125rem;
    font-weight: 600;
    white-space: nowrap;
    z-index: 2;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    font-family: 'Canela Text Trial', serif;
}

.service-card:hover .service-card__head {
    text-align: center;
    top: calc(100% - 3em);
    color: white;
    background: rgba(50, 1, 47, 0.9);
    backdrop-filter: blur(10px);
    font-size: 1.75rem;
    transform: rotate(0deg) skew(2deg);
    padding: 1rem 1.5rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.service-card__content {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(50, 1, 47, 0.85) 0%, rgba(50, 1, 47, 0.95) 100%);
    padding: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 1;
}

.service-card:hover .service-card__content {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.service-card__title {
    color: white;
    font-size: 2rem;
    font-weight: 300;
    margin-bottom: 1rem;
    letter-spacing: -0.02em;
}

.service-card__description {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.service-card__features {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.service-card__feature {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: rgba(255, 255, 255, 0.95);
    font-size: 0.9375rem;
}

.service-card__feature svg {
    flex-shrink: 0;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .services-container {
        transform: skew(0deg);
        flex-direction: column;
        gap: 1rem;
        margin: 4vmin 0;
    }
    
    .service-card {
        height: auto;
        min-height: auto;
        width: 100%;
        flex: none;
        display: flex;
        flex-direction: column;
        background: #fff;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .service-card:hover {
        flex-grow: 1;
    }
    
    .service-card__image {
        width: 100%;
        height: 50vmin;
        max-height: 400px;
        min-height: 250px;
        flex-shrink: 0;
    }
    
    .service-card__head {
        transform: rotate(0deg);
        position: static;
        background: rgba(50, 1, 47, 0.9);
        color: white;
        padding: 1rem;
        font-size: 1.25rem;
        box-shadow: none;
        order: 2;
    }
    
    .service-card:hover .service-card__head {
        transform: rotate(0deg) skew(0deg);
        position: static;
        background: rgba(50, 1, 47, 0.95);
        font-size: 1.5rem;
    }
    
    .service-card__content {
        position: static;
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        background: #fff;
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        order: 3;
    }
    
    .service-card__title {
        font-size: 1.5rem;
        color: var(--color-primary, #32012f);
        margin-bottom: 0.75rem;
    }
    
    .service-card__description {
        color: #666;
        margin-bottom: 1rem;
    }
    
    .service-card__feature {
        color: #333;
    }
    
    .service-card__feature svg {
        color: var(--color-primary, #32012f);
    }
}

@media (max-width: 640px) {
    .services-container {
        margin: 2vmin 0;
        gap: 0.75rem;
    }
    
    .service-card {
        height: auto;
    }
    
    .service-card__image {
        height: 40vmin;
        max-height: 350px;
        min-height: 200px;
    }
    
    .service-card__head {
        font-size: 1rem;
        padding: 0.75rem;
    }
    
    .service-card:hover .service-card__head {
        font-size: 1.25rem;
    }
    
    .service-card__content {
        padding: 1rem;
    }
    
    .service-card__title {
        font-size: 1.25rem;
        margin-bottom: 0.75rem;
    }
    
    .service-card__description {
        font-size: 0.875rem;
        margin-bottom: 1rem;
    }
    
    .service-card__feature {
        font-size: 0.875rem;
    }
}

/* Smooth animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.service-card {
    animation: fadeInUp 0.6s ease-out backwards;
}

.service-card:nth-child(1) { animation-delay: 0.1s; }
.service-card:nth-child(2) { animation-delay: 0.2s; }
.service-card:nth-child(3) { animation-delay: 0.3s; }
.service-card:nth-child(4) { animation-delay: 0.4s; }
.service-card:nth-child(5) { animation-delay: 0.5s; }
.service-card:nth-child(6) { animation-delay: 0.6s; }
.service-card:nth-child(7) { animation-delay: 0.7s; }
</style>

