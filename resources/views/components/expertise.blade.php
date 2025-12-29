@props([
    'heading' => 'Our Expertise',
    'subheading' => 'Areas of Excellence',
    'description' => 'We specialize in transforming spaces through our deep expertise in various aspects of interior design. Our knowledge spans multiple domains, each mastered through years of experience and dedication.',
    'expertise' => [
        [
            'title' => 'Residential Interiors',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
            'description' => 'Specialized knowledge in creating personalized living environments that reflect individual lifestyles and cultural preferences.',
            'link' => '/expertise/residential',
            'grid_area' => '1 / 1 / 2 / 3',
        ],
        [
            'title' => 'Commercial Environments',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg',
            'description' => 'Expert understanding of workplace dynamics, brand identity integration, and functional commercial space design.',
            'link' => '/expertise/commercial',
            'grid_area' => '1 / 5 / 3 / 6',
        ],
        [
            'title' => 'Luxury Design',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg',
            'description' => 'Mastery in high-end design principles, premium material selection, and sophisticated aesthetic execution.',
            'link' => '/expertise/luxury',
            'grid_area' => '1 / 3 / 2 / 5',
        ],
        [
            'title' => 'Spatial Optimization',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg',
            'description' => 'Advanced expertise in maximizing space efficiency, flow patterns, and intelligent layout configurations.',
            'link' => '/expertise/spatial-planning',
            'grid_area' => '3 / 4 / 4 / 6',
        ],
        [
            'title' => 'Bespoke Furniture',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg',
            'description' => 'Deep knowledge in custom furniture design, material properties, and ergonomic considerations.',
            'link' => '/expertise/furniture',
            'grid_area' => '3 / 2 / 4 / 4',
        ],
        [
            'title' => 'Color Psychology',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
            'description' => 'Expert understanding of color theory, mood creation, and harmonious palette development for interior spaces.',
            'link' => '/expertise/color',
            'grid_area' => '2 / 1 / 4 / 2',
        ],
        [
            'title' => 'Lighting Architecture',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg',
            'description' => 'Specialized knowledge in ambient lighting design, technical illumination, and creating atmospheric environments.',
            'link' => '/expertise/lighting',
            'grid_area' => '2 / 2 / 3 / 3',
        ],
        [
            'title' => 'Space Transformation',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg',
            'description' => 'Expertise in revitalizing existing structures, adaptive reuse, and modernizing traditional spaces.',
            'link' => '/expertise/transformation',
            'grid_area' => '2 / 3 / 3 / 4',
        ],
        [
            'title' => 'Aesthetic Curation',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg',
            'description' => 'Mastery in art direction, decorative styling, and creating cohesive visual narratives through curated elements.',
            'link' => '/expertise/styling',
            'grid_area' => '2 / 4 / 3 / 5',
        ],
    ],
])

{{-- ============================================
    EXPERTISE COMPONENT - Masonry Grid Layout
    Premium Interior Design - Expertise Showcase
    Usage: <x-expertise />
    ============================================ --}}

<section 
    class="expertise-section w-full"
    aria-labelledby="expertise-heading"
>
    {{-- Heading Section --}}
    <div class="expertise-heading">
        @if($subheading)
            <p 
                class="text-theme-muted tracking-[0.3em] uppercase text-xs mb-3 font-medium"
                style="font-family: 'Satoshi', sans-serif;"
            >
                {{ $subheading }}
            </p>
        @endif
        @if($heading)
            <h2 
                class="font-light text-2xl md:text-4xl lg:text-5xl text-theme-primary leading-tight mb-4"
                style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                id="expertise-heading"
            >
                {{ $heading }}
            </h2>
        @endif
        {{-- Primary Divider --}}
        <div 
            class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto mb-6"
        ></div>
        @if($description)
            <p 
                class="max-w-4xl mx-auto text-gray-700 text-sm md:text-base leading-relaxed mb-8"
                style="font-family: 'Satoshi', sans-serif;"
            >
                {{ $description }}
            </p>
        @endif
    </div>

    {{-- Masonry Grid --}}
    <div class="expertise-grid">
        @foreach($expertise as $index => $item)
            <div class="expertise-item" style="grid-area: {{ $item['grid_area'] ?? 'auto' }};">
                <div 
                    class="expertise-image" 
                    style="background-image: url('{{ $item['image'] }}')"
                >&nbsp;</div>
                
                <div class="expertise-info">
                    <h3>{{ $item['title'] }}</h3>
                    <p class="expertise-excerpt">{{ $item['description'] }}</p>
                    <a href="{{ $item['link'] ?? '#' }}" class="expertise-btn">
                        <span>Learn More</span>
                        <i class="expertise-icon">→</i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<style>
/* Expertise Section */
.expertise-section {
    padding: 4rem 0 0 0;
    margin: 0;
    background: #fff;
    position: relative;
    height: fit-content;
}

/* Heading Section */
.expertise-heading {
    max-width: 1200px;
    margin: 0 auto 3rem;
    padding: 0 2rem 0 2rem;
    text-align: center;
}

/* Masonry Grid Container */
.expertise-grid {
    width: 100%;
    margin: 0;
    padding: 0;
    display: grid;
    grid-template-columns: 1fr;
    gap: 0;
}

/* Grid Items */
.expertise-item {
    position: relative;
    overflow: hidden;
    background: #f5f5f5;
    box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.05);
    height: 400px;
}

/* Mobile: Full width, equal height */
@media screen and (max-width: 639px) {
    .expertise-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
    }
    
    .expertise-item {
        height: 400px;
        grid-area: auto !important;
    }
}

/* Tablet: 2 columns */
@media screen and (min-width: 640px) and (max-width: 1023px) {
    .expertise-grid {
        padding: 0;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: auto;
    }
    
    .expertise-item {
        height: 350px;
        grid-area: auto !important;
    }
}

/* Desktop: 5x4 grid system */
@media screen and (min-width: 1024px) {
    .expertise-grid {
        padding: 0;
        margin: 0 0 0 0;
        grid-template-columns: repeat(5, 1fr);
        grid-auto-rows: minmax(400px, auto);
        grid-column-gap: 0px;
        grid-row-gap: 0px;
        height: auto;
        min-height: 0;
        max-height: none;
    }
    
    .expertise-item {
        height: 100%;
        min-height: 400px;
    }
}

/* Image Background */
.expertise-image {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    transition: transform 0.8s ease;
}

.expertise-item:hover .expertise-image {
    transform: scale(1.05);
}

/* Info Overlay */
.expertise-info {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.4);
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 2rem;
    transition: all 0.8s ease;
    z-index: 2;
}

.expertise-info h3 {
    font-family: 'Canela Text Trial', serif;
    font-size: clamp(1.5rem, 3vw, 2rem);
    color: #fff;
    font-weight: 300;
    text-transform: none;
    margin: 0 0 1.5rem;
    position: relative;
    opacity: 1;
    transition: all 0.8s ease;
}

.expertise-info h3::after {
    content: '';
    width: 40px;
    border-top: 2px solid #fff;
    display: block;
    margin: 1.5rem auto 0;
    transition: all 0.8s ease;
}

.expertise-info .expertise-excerpt {
    width: 80%;
    max-width: 500px;
    margin: 0 auto 2rem;
    line-height: 1.7;
    color: #fff;
    font-family: 'Satoshi', sans-serif;
    font-size: clamp(0.9rem, 1.5vw, 1rem);
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease 0.2s;
}

.expertise-btn {
    color: #fff;
    text-decoration: none;
    margin: 0 auto;
    width: 45px;
    height: 45px;
    line-height: 45px;
    border-radius: 50%;
    border: 1px solid #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    transition: all 0.8s ease;
    opacity: 0;
    transform: translateY(20px);
    font-family: 'Satoshi', sans-serif;
    font-size: 0.85rem;
    font-weight: 500;
}

.expertise-btn .expertise-icon {
    display: block;
    transition: all 0.8s ease;
    font-style: normal;
    font-size: 1.2rem;
}

.expertise-btn span {
    opacity: 0;
    display: none;
    transition: opacity 0.8s ease;
    margin-right: 0.5rem;
    white-space: nowrap;
}

/* Hover States */
.expertise-item:hover .expertise-info {
    background: rgba(158, 12, 73, 0.85);
}

.expertise-item:hover .expertise-info h3 {
    margin-top: 0;
    opacity: 1;
}

.expertise-item:hover .expertise-info h3::after {
    width: 60px;
    border-top-color: rgba(255, 255, 255, 0.9);
}

.expertise-item:hover .expertise-info .expertise-excerpt {
    opacity: 1;
    transform: translateY(0);
}

.expertise-item:hover .expertise-btn {
    width: 140px;
    border-radius: 25px;
    opacity: 1;
    transform: translateY(0);
    background: rgba(255, 255, 255, 0.1);
}

.expertise-item:hover .expertise-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.9);
}

.expertise-item:hover .expertise-btn span {
    opacity: 1;
    display: inline;
}

.expertise-item:hover .expertise-btn .expertise-icon {
    opacity: 0;
    display: none;
}


/* Responsive adjustments */
@media (max-width: 640px) {
    .expertise-section {
        padding: 3rem 0 0 0;
    }
    
    .expertise-heading {
        margin-bottom: 2rem;
        padding: 0 1rem;
    }
    
    .expertise-info {
        padding: 1.5rem;
    }
    
    .expertise-info .expertise-excerpt {
        width: 90%;
        font-size: 0.9rem;
    }
}

/* Reduced Motion */
@media (prefers-reduced-motion: reduce) {
    .expertise-image,
    .expertise-info,
    .expertise-info h3,
    .expertise-info .expertise-excerpt,
    .expertise-btn {
        transition: none !important;
        animation: none !important;
    }
    
    .expertise-item:hover .expertise-image {
        transform: none;
    }
}
</style>

