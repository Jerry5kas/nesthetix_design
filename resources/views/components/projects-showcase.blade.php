@props([
    'heading' => 'A Tour of Nesthetix Designs',
    'subheading' => 'Our Portfolio',
    'description' => 'Welcome to the virtual showcase of Nesthetix Designs\' projects! Explore our portfolio of modern, captivating interiors, thoughtfully designed for clients. Experience the beauty and functionality of our completed projects.',
    'projects' => [
        [
            'title' => '2 BHK, Luxury Apartment',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
            'description' => 'Contemporary design with clean lines and elegant furnishings, creating a luxurious living space.',
            'link' => '/projects/luxury-apartment',
        ],
        [
            'title' => 'Independent House, Bangalore',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg',
            'description' => 'Modern workspace design with smart layouts and premium finishes for optimal productivity.',
            'link' => '/projects/independent-house',
        ],
        [
            'title' => 'Villa, Premium Residence',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-6758775_694fb6266e8f29.85505953_j20NcjqS2.jpg',
            'description' => 'Elegant villa interior with traditional elements seamlessly blended with modern aesthetics.',
            'link' => '/projects/premium-villa',
        ],
        [
            'title' => 'Modern Office Space',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg',
            'description' => 'Serene bedroom design with luxurious touches, maximizing comfort and visual appeal.',
            'link' => '/projects/office-space',
        ],
        [
            'title' => 'Luxury Penthouse',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg',
            'description' => 'Sophisticated dining space with premium materials and refined design elements.',
            'link' => '/projects/penthouse',
        ],
        [
            'title' => 'Contemporary Living Room',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
            'description' => 'Spacious living area designed for comfort and style, featuring modern furniture and lighting.',
            'link' => '/projects/living-room',
        ],
        [
            'title' => 'Premium Kitchen Design',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg',
            'description' => 'State-of-the-art modular kitchen with premium finishes and smart storage solutions.',
            'link' => '/projects/kitchen',
        ],
    ],
])

@php
    $totalItems = count($projects);
    $angles = [4, -8, -7, 11, 13, -17, 20]; // Rotation angles for each card
@endphp

{{-- ============================================
    PROJECTS SHOWCASE COMPONENT - Pure CSS Card Stack
    Premium Interior Design - Interactive Card Stack
    Usage: <x-projects-showcase />
    ============================================ --}}

<section 
    class="flex flex-col items-center justify-center text-center projects-showcase-section relative pb-0"
    aria-labelledby="projects-showcase"
>
    {{-- Decorative Accent Line --}}
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-20"></div>

    <div class="relative max-w-7xl mx-auto z-30 w-full">
        <div class="flex flex-col items-end justify-center pb-0 mb-0">
        {{-- Card Stack Container --}}
        <div class="projects-cards">
            {{-- Heading Section --}}
            <div class="projects-heading space-y-5">
                @if($subheading)
                <div>
                    <p 
                        class="text-theme-muted tracking-[0.3em] uppercase text-xs font-medium"
                        style="font-family: 'Satoshi', sans-serif;"
                    >
                        {{ $subheading }}
                    </p>
                    </div>
                @endif
                @if($heading)
                <div>
                    <h2 
                        class="font-light text-2xl md:text-4xl lg:text-5xl text-theme-primary leading-tight"
                        style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                        id="projects-showcase"
                    >
                        {{ $heading }}
                    </h2>
                    </div>
                @endif
                {{-- Primary Divider --}}
                <div>
                <div 
                    class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto"
                ></div>
                </div>
                            @if($description)
                    <div>
                    <p 
                        class="max-w-4xl mx-auto text-gray-700 text-sm md:text-base leading-relaxed"
                        style="font-family: 'Satoshi', sans-serif;"
                    >
                        {{ $description }}
                    </p>
                    </div>
                @endif
            </div>
            
            @foreach($projects as $index => $project)
                <input 
                    type="radio" 
                    id="radio-{{ $index + 1 }}" 
                    name="radio-card" 
                    {{ $index === 0 ? 'checked' : '' }}
                    class="projects-radio"
                >
                <article 
                    class="projects-card" 
                    style="--angle:{{ $angles[$index] ?? 0 }}deg"
                >
                    <img 
                        class="projects-card-img" 
                        src="{{ $project['image'] }}" 
                        alt="{{ $project['title'] }}"
                        loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                    >
                    <div class="projects-card-data">
                        <span class="projects-card-num">{{ $index + 1 }}/{{ $totalItems }}</span>
                        <h2 style="font-family: 'Canela Text Trial', serif;">{{ $project['title'] }}</h2>
                        <p style="font-family: 'Satoshi', sans-serif;">{{ $project['description'] ?? 'Premium interior design project crafted with attention to detail and exceptional quality.' }}</p>
                        <footer>
                            <label 
                                for="radio-{{ $index === 0 ? $totalItems : $index }}" 
                                aria-label="Previous"
                            >&#10094;</label>
                            <label 
                                for="radio-{{ $index === $totalItems - 1 ? 1 : $index + 2 }}" 
                                aria-label="Next"
                            >&#10095;</label>
                        </footer>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const labels = document.querySelectorAll('.projects-card-data footer label');
    let savedScrollY = null;
    
    // Save scroll position before any interaction
    function saveScrollPosition() {
        savedScrollY = window.scrollY || window.pageYOffset;
    }
    
    // Restore scroll position
    function restoreScrollPosition() {
        if (savedScrollY !== null) {
            window.scrollTo({
                top: savedScrollY,
                behavior: 'instant'
            });
        }
    }
    
    // Prevent scroll when clicking navigation labels
    labels.forEach(label => {
        // Save scroll on interaction start
        label.addEventListener('mousedown', saveScrollPosition, { passive: true });
        label.addEventListener('touchstart', saveScrollPosition, { passive: true });
        
        // Restore scroll after click - multiple attempts to catch delayed scrolls
        label.addEventListener('click', function(e) {
            // Restore immediately
            restoreScrollPosition();
            
            // Restore after microtask
            Promise.resolve().then(() => {
                restoreScrollPosition();
            });
            
            // Restore after short delay
            setTimeout(() => {
                restoreScrollPosition();
            }, 0);
            
            setTimeout(() => {
                restoreScrollPosition();
            }, 50);
            
            setTimeout(() => {
                restoreScrollPosition();
            }, 150);
            
            setTimeout(() => {
                restoreScrollPosition();
                savedScrollY = null;
            }, 300);
        });
    });
    
    // Also prevent scroll on radio button change events
    const radioButtons = document.querySelectorAll('.projects-radio');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            if (savedScrollY !== null) {
                restoreScrollPosition();
                
                setTimeout(() => {
                    restoreScrollPosition();
                }, 0);
                
                setTimeout(() => {
                    restoreScrollPosition();
                }, 100);
            }
        });
        
        // Prevent scroll when radio buttons receive focus
        radio.addEventListener('focus', function() {
            setTimeout(() => {
                if (document.activeElement === this) {
                    this.blur();
                }
            }, 0);
        });
    });
});
</script>

<style>
@property --angle {
    syntax: "<angle>";
    initial-value: 0deg;
    inherits: true;
}

/* General Reset */
.projects-showcase-section *,
.projects-showcase-section *::before,
.projects-showcase-section *::after {
    margin: 0;
    box-sizing: border-box;
}

.projects-showcase-section img {
    max-width: 100%;
    display: block;
}

/* Hide radio buttons */
.projects-radio {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
}

/* Heading Section */
.projects-heading {
    width: 100%;
    max-width: 900px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    margin-bottom: 1rem;
    padding-top: 1.5rem;
    padding-bottom: 0.5rem;
    pointer-events: auto;
    grid-row: 1;
    grid-column: 1;
    gap: 1.5rem;
}

/* Cards Container */
.projects-cards {
    --img-w: 320px;
    --duration: 300ms;
    --img-easing: cubic-bezier(0.34, 1.56, 0.64, 1);
    width: min(100% - 4rem, 1200px);
    margin-inline: auto;
    margin-top: 0;
    margin-bottom: 0;
    padding-bottom: 0;
    display: grid;
    grid-template-rows: auto;
    counter-reset: my-counter;
    min-height: auto;
    height: auto;
    position: relative;
    justify-items: center;
    align-items: start;
    gap: 0;
}

@media (min-width: 1024px) {
    .projects-cards {
        min-height: auto;
        height: auto;
    }
}

/* Card Styling - Left Image, Right Content */
.projects-card {
    --cards-grid-cols: auto;
    --cards-grid-rows: var(--img-w) auto;
    --cards-grid-gap: 2rem;
    --cards-footer-justify: center;
    
    grid-row: 2;
    grid-column: 1;
    display: grid;
    place-items: center;
    justify-items: center;
    grid-template-columns: var(--cards-grid-cols);
    grid-template-rows: var(--cards-grid-rows);
    gap: var(--cards-grid-gap);
    align-items: center;
    width: 100%;
    max-width: 1000px;
}

/* Desktop: Image Left, Content Right */
@media (min-width: 600px) {
    .projects-cards {
        --img-w: 550px;
        grid-template-rows: auto;
        height: auto;
    }
    
    .projects-heading {
        position: absolute;
        top: calc(var(--img-w) * 0.1);
        left: 50%;
        transform: translateX(-50%);
        max-width: 900px;
        margin-bottom: 0;
        padding: 2rem 1.5rem 1rem 1.5rem;
        z-index: 100;
        pointer-events: none;
        grid-row: 1;
        grid-column: 1;
        background: transparent;
        gap: 1.5rem;
    }
    
    .projects-card {
        --cards-grid-cols: var(--img-w) auto;
        --cards-grid-rows: auto;
        --cards-grid-gap: 5rem;
        --cards-footer-justify: start;
        grid-area: 1/1;
        place-items: center;
        justify-items: start;
        align-items: center;
        margin-top: 4rem;
    }
}

/* Card Image - Left Side */
.projects-card-img {
    width: 320px;
    height: 250px;
    aspect-ratio: auto;
    rotate: var(--angle, 0deg);
    border-radius: 10px;
    border: 3px solid #FFF;
    overflow: hidden;
    transform-origin: center;
    object-fit: cover;
    box-shadow: 0 0 5px 3px rgba(0, 0, 0, 0.05);
    grid-column: 1;
    grid-row: 1;
    align-self: center;
    justify-self: center;
}

@media (min-width: 600px) {
    .projects-card-img {
        width: 550px;
        height: 450px;
        grid-column: 1;
        grid-row: 1;
        align-self: center;
        justify-self: center;
    }
}

/* Card Data - Right Side */
.projects-card-data {
    display: grid;
    gap: 1rem;
    grid-column: 1;
    grid-row: 2;
    width: 100%;
    max-width: 500px;
    justify-items: center;
    text-align: center;
}

@media (min-width: 600px) {
    .projects-card-data {
        grid-column: 2;
        grid-row: 1;
        align-self: center;
        justify-self: start;
        text-align: left;
        max-width: 600px;
    }
}

/* Image Straightening Animations */
#radio-1:checked + .projects-card ~ .projects-card > .projects-card-img {
    animation: straighten-img-1 calc(var(--duration) * 2) forwards;
    animation-timing-function: var(--img-easing);
}

.projects-card:has(~#radio-2:checked) > .projects-card-img,
#radio-2:checked + .projects-card ~ .projects-card > .projects-card-img {
    animation: straighten-img-2 calc(var(--duration) * 2) forwards;
    animation-timing-function: var(--img-easing);
}

.projects-card:has(~#radio-3:checked) > .projects-card-img,
#radio-3:checked + .projects-card ~ .projects-card > .projects-card-img {
    animation: straighten-img-3 calc(var(--duration) * 2) forwards;
    animation-timing-function: var(--img-easing);
}

.projects-card:has(~#radio-4:checked) > .projects-card-img,
#radio-4:checked + .projects-card ~ .projects-card > .projects-card-img {
    animation: straighten-img-4 calc(var(--duration) * 2) forwards;
    animation-timing-function: var(--img-easing);
}

.projects-card:has(~#radio-5:checked) > .projects-card-img,
#radio-5:checked + .projects-card ~ .projects-card > .projects-card-img {
    animation: straighten-img-5 calc(var(--duration) * 2) forwards;
    animation-timing-function: var(--img-easing);
}

.projects-card:has(~#radio-6:checked) > .projects-card-img,
#radio-6:checked + .projects-card ~ .projects-card > .projects-card-img {
    animation: straighten-img-6 calc(var(--duration) * 2) forwards;
    animation-timing-function: var(--img-easing);
}

.projects-card:has(~#radio-7:checked) > .projects-card-img,
#radio-7:checked + .projects-card ~ .projects-card > .projects-card-img {
    animation: straighten-img-7 calc(var(--duration) * 2) forwards;
    animation-timing-function: var(--img-easing);
}

/* Keyframe Animations */
@keyframes straighten-img-1 { 50% { --angle: 0deg; } }
@keyframes straighten-img-2 { 50% { --angle: 0deg; } }
@keyframes straighten-img-3 { 50% { --angle: 0deg; } }
@keyframes straighten-img-4 { 50% { --angle: 0deg; } }
@keyframes straighten-img-5 { 50% { --angle: 0deg; } }
@keyframes straighten-img-6 { 50% { --angle: 0deg; } }
@keyframes straighten-img-7 { 50% { --angle: 0deg; } }

/* Stacking Order - Z-Index Management */
.projects-card {
    z-index: -1;
}

.projects-radio:checked + .projects-card {
    z-index: 10 !important;
}

/* Next card checked - place behind */
.projects-card:has(+ .projects-radio:checked) {
    z-index: 9;
}

/* Next card +1 checked - place behind */
.projects-card:has(+ .projects-radio + .projects-card + .projects-radio:checked) {
    z-index: 8;
}

/* Next card +2 checked - place behind */
.projects-card:has(+ .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio:checked) {
    z-index: 7;
}

/* Next card +3 checked - place behind */
.projects-card:has(+ .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio:checked) {
    z-index: 6;
}

/* Next card +4 checked - place behind */
.projects-card:has(+ .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio:checked) {
    z-index: 5;
}

/* Next card +5 checked - place behind */
.projects-card:has(+ .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio:checked) {
    z-index: 4;
}

/* Next card +6 checked - place behind */
.projects-card:has(+ .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio + .projects-card + .projects-radio:checked) {
    z-index: 3;
}

/* Card Data Content Styling */
.projects-card-data > .projects-card-num {
    opacity: var(--data-opacity, 0);
    font-size: 0.8rem;
    color: var(--color-text-muted);
    font-family: 'Satoshi', sans-serif;
    font-weight: 500;
    letter-spacing: 0.05em;
    text-transform: uppercase;
}

.projects-card-data > p {
    font-size: 0.9rem;
    color: var(--color-text-muted);
    line-height: 1.6;
    font-family: 'Satoshi', sans-serif;
    margin: 0;
}

.projects-card-data > h2 {
    font-size: clamp(1.5rem, 4vw, 2.5rem);
    font-weight: 300;
    letter-spacing: -0.02em;
    color: var(--color-primary);
    line-height: 1.2;
    margin: 0;
    font-family: 'Canela Text Trial', serif;
}

.projects-card-data > h2,
.projects-card-data > p {
    transition: var(--duration) ease-in-out;
    transition-delay: var(--data-delay, 0ms);
    opacity: var(--data-opacity, 0);
    translate: 0 var(--data-y, 20px);
}

.projects-card-data > footer {
    display: flex;
    justify-content: var(--cards-footer-justify);
    gap: 2rem;
    margin-top: 1rem;
}

.projects-card-data > footer label {
    margin-block-start: auto;
    cursor: pointer;
    pointer-events: var(--card-events, none);
    opacity: var(--data-opacity, 0);
    transition: background-color 300ms ease-in-out, color 300ms ease-in-out;
    color: var(--label-clr-txt, var(--color-primary));
    background-color: var(--label-clr-bg, rgba(0, 0, 0, 0.05));
    border-radius: 50%;
    width: 40px;
    height: 40px;
    aspect-ratio: 1/1;
    display: grid;
    place-content: center;
    font-size: 1.2rem;
    font-weight: 600;
    user-select: none;
}

.projects-radio:checked:focus-visible + .projects-card > .projects-card-data > footer label,
.projects-card-data > footer label:hover {
    --label-clr-txt: #FFF;
    --label-clr-bg: var(--color-primary);
}

.projects-radio:checked + .projects-card {
    --data-opacity: 1;
    --data-y: 0;
    --data-delay: var(--duration);
    --card-events: auto;
    transition: z-index;
    transition-delay: 300ms;
}

.projects-radio:checked + .projects-card > .projects-card-img {
    animation: reveal-img calc(var(--duration) * 2) forwards;
}

@keyframes reveal-img {
    50% {
        translate: -150% 0;
        --angle: 0deg;
    }
}

/* Section Height Adjustments */
.projects-showcase-section {
    min-height: auto;
    height: auto;
    max-height: none;
    scroll-margin-top: 0;
    scroll-padding-top: 0;
    scroll-padding-bottom: 0;
    padding-bottom: 0;
    margin-bottom: 0;
    contain: layout style;
    background-image: url('https://ik.imagekit.io/AthaConstruction/assets/bg-interior_69538930975dd1.21410735_oZII3KUKK.jfif');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    position: relative;
}

.projects-showcase-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.85);
    z-index: 1;
}

.projects-showcase-section > div {
    padding-bottom: 0;
    margin-bottom: 0;
}

.projects-showcase-section > div > div {
    padding-bottom: 0;
    margin-bottom: 0;
}

/* Prevent scroll on radio button focus */
.projects-radio:focus {
    outline: none;
}

.projects-radio:focus-visible {
    outline: none;
}

/* Prevent scroll jumps on mobile */
@media (max-width: 600px) {
    .projects-showcase-section {
        scroll-behavior: auto;
        overflow-anchor: none;
        background-attachment: scroll;
    }
    
    .projects-cards {
        scroll-margin: 0;
        scroll-padding: 0;
    }
}

/* Responsive Adjustments */
@media (max-width: 600px) {
    .projects-showcase-section {
        height: auto;
        min-height: auto;
        background-attachment: scroll;
    }
    
    .projects-heading {
        position: relative;
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        padding: 1.5rem 1rem 0.5rem 1rem;
        pointer-events: auto;
        transform: none;
        left: auto;
        gap: 1.5rem;
    }
    
    .projects-cards {
        --img-w: 280px;
        width: min(100% - 2rem, 100%);
        min-height: auto;
        height: auto;
        grid-template-rows: auto;
        justify-items: center;
        align-items: start;
    }
    
    .projects-heading {
        grid-row: 1;
        grid-column: 1;
    }
    
    .projects-card {
        grid-row: 2;
        grid-column: 1;
        justify-items: center;
        align-items: center;
        --cards-grid-gap: 1rem;
    }
    
    .projects-card-img {
        width: 320px;
        height: 250px;
        margin: 0 auto;
    }
    
    .projects-card-data {
        text-align: center;
        max-width: 100%;
        justify-items: center;
    }
    
    .projects-card-data > h2 {
        font-size: 1.5rem;
    }
    
    .projects-card-data > p {
        font-size: 0.85rem;
    }
    
    .projects-card-data > footer {
        justify-content: center;
    }
    
    .projects-card-data > footer label {
        width: 36px;
        height: 36px;
        font-size: 1rem;
    }
}

/* Tablet adjustments */
@media (min-width: 600px) and (max-width: 1024px) {
    .projects-heading {
        position: absolute;
        width: 100%;
        top: calc(var(--img-w) * 0.08);
        left: 50%;
        transform: translateX(-50%);
        max-width: 850px;
        margin-bottom: 0;
        padding: 2rem 1.5rem 1rem 1.5rem;
        z-index: 100;
        pointer-events: none;
        background: transparent;
        gap: 1.5rem;
    }
    
    .projects-cards {
        width: min(100% - 3rem, 800px);
        grid-template-rows: auto;
        height: auto;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .projects-heading {
        grid-row: 1;
        grid-column: 1;
    }
    
    .projects-card {
        grid-area: 1/1;
        margin-top: 4rem;
        --cards-grid-gap: 3rem;
    }
}

/* Reduced Motion */
@media (prefers-reduced-motion: reduce) {
    .projects-card-img,
    .projects-card-data > h2,
    .projects-card-data > p,
    .projects-card-data > footer label {
        animation: none !important;
        transition: none !important;
    }
}
</style>
