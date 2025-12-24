@props([
    'services' => [
        [
            'title' => 'Living Room',
            'description' => 'Thoughtfully designed living spaces that balance comfort, style, and functionality.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg',
        ],
        [
            'title' => 'Dining',
            'description' => 'Elegant dining areas that create the perfect atmosphere for gatherings and meals.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg',
        ],
        [
            'title' => 'Bedroom',
            'description' => 'Luxurious bedrooms designed for rest, relaxation, and personal sanctuary.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/bedroom_694bac7011b425.52773059_ZTWkk4wAX.jpg',
        ],
        [
            'title' => 'Office',
            'description' => 'Productive workspaces that inspire creativity and enhance professional performance.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/pexels-ranamatloob567-34823909_694baf216652f9.25031009_PrRZQjkTvi.jpg',
        ],
        [
            'title' => 'Kitchen',
            'description' => 'Modern kitchens that combine functionality with beautiful, timeless design.',
            'image' => 'https://ik.imagekit.io/AthaConstruction/assets/bedroom_694bac7011b425.52773059_ZTWkk4wAX.jpg',
        ],
    ],
    'heading' => 'Customized Interiors Crafted by Professionals',
    'subheading' => 'Experience Excellence in Design',
    'description' => 'At Nesthetix Designs, we specialize in delivering tailor-made interior design solutions that balance aesthetics, functionality, and comfort. From elegant residences to sophisticated commercial spaces, every design is thoughtfully planned to reflect your lifestyle and brand identity.',
    'ctaText' => 'Explore Our Gallery',
    'ctaLink' => '/gallery',
])

{{-- ============================================
    INTERIOR SERVICES COMPONENT
    Premium Interior Design Services - Modular Grid
    Usage: <x-interior-services />
    ============================================ --}}

<section 
    class="relative py-12 px-6 lg:px-16 overflow-hidden" 
    style="background-color: #F9FAFB;" {{-- Tailwind gray-50 equivalent --}}
    aria-labelledby="interior-services" 
    data-animate="fade-up"
>
    {{-- Decorative Accent Lines --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-primary)]/30 to-transparent z-10"></div>
    
    <div class="relative max-w-7xl mx-auto z-20">
        {{-- Header Section --}}
        <div class="text-center max-w-4xl mx-auto mb-10" data-animate="fade-up">
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
                id="interior-services"
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

        {{-- Services Cards Grid --}}
        @php
            $totalServices = count($services);
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 mb-10" data-animate="stagger" data-stagger="0.1">
            @foreach($services as $index => $service)
                @php
                    // If the last row has exactly 2 items in a 3-column grid,
                    // make the final card span 2 columns so the row fills the width.
                    $isLast = $loop->last;
                    $shouldSpan = $isLast && $totalServices % 3 === 2;
                    $spanClass = $shouldSpan ? 'lg:col-span-2' : '';
                @endphp
                <article 
                    class="group relative rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-500 {{ $spanClass }}"
                    data-animate="fade-up"
                    data-delay="{{ $index * 0.1 }}"
                >
                    {{-- Background Image --}}
                    <div 
                        class="relative w-full h-56 sm:h-64 lg:h-72"
                    >
                        <div 
                            class="absolute inset-0 bg-cover bg-center transition-transform duration-700 ease-out group-hover:scale-105"
                            style="background-image: url('{{ $service['image'] ?? '' }}');"
                        ></div>
                        {{-- Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/45 to-black/15 group-hover:from-black/70 group-hover:via-black/35 group-hover:to-black/5 transition-colors duration-500"></div>

                        {{-- Content --}}
                        <div class="relative z-10 flex h-full flex-col justify-end p-5 sm:p-6">
                            <h3 class="font-fancy text-white text-xl sm:text-2xl mb-2 tracking-wide" style="font-family: 'Canela Text Trial', serif; text-shadow: 0 2px 15px rgba(0,0,0,0.7);">
                                {{ $service['title'] }}
                            </h3>
                            <p class="text-white/85 text-xs sm:text-sm leading-relaxed max-w-md" style="font-family: 'Satoshi', sans-serif;">
                                {{ $service['description'] ?? '' }}
                            </p>

                            {{-- Bottom Indicator --}}
                            <div class="mt-4 flex items-center justify-between text-[11px] sm:text-xs text-white/80" style="font-family: 'Satoshi', sans-serif;">
                                <span class="inline-flex items-center gap-2">
                                    <span class="w-6 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent"></span>
                                    <span>Interior {{ $service['title'] }}</span>
                                </span>
                                <span class="inline-flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span>View</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- CTA Section --}}
        <div class="text-center" data-animate="fade-up" data-delay="0.6">
            <a
                href="{{ $ctaLink }}"
                class="inline-flex items-center gap-2 px-8 py-3 bg-[var(--color-primary)] text-white rounded-full text-sm tracking-wide hover:bg-[var(--color-secondary)] transition-all duration-300 group shadow-md hover:shadow-lg"
                aria-label="{{ $ctaText }}"
                style="font-family: 'Satoshi', sans-serif;"
            >
                <span>{{ $ctaText }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>

    {{-- Bottom Accent Line --}}
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10"></div>
</section>

