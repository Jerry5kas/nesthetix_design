{{-- ============================================
    HERO SECTION - Animated Panel Hero with Integrated Navbar
    Premium Interior Design Hero with Interactive Panels
    Usage: <x-hero />
    ============================================ --}}

<section class="hero-section">
    {{-- Hero Navbar - Transparent and positioned within hero --}}
    <nav class="hero-navbar" id="heroNavbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-24">
                {{-- Left: Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0">
                    <img src="{{ asset('images/logo/wine.png') }}" 
                         alt="{{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}" 
                         class="h-16 lg:h-24 w-auto object-contain hero-logo-img" />
                </a>

                {{-- Right: Desktop Navigation & Mobile Menu Toggle --}}
                <div class="flex items-center gap-8">
                    {{-- Desktop Navigation --}}
                    <div class="hidden lg:flex items-center gap-10">
                        <a href="{{ route('home') }}" class="hero-nav-link font-semibold tracking-[0.08em] uppercase {{ request()->routeIs('home') ? 'active' : '' }}">
                            Home
                        </a>
                        <a href="{{ route('services') }}" class="hero-nav-link font-semibold tracking-[0.08em] uppercase {{ request()->routeIs('services') ? 'active' : '' }}">
                            Services
                        </a>
                        <a href="{{ route('portfolio') }}" class="hero-nav-link font-semibold tracking-[0.08em] uppercase {{ request()->routeIs('portfolio') ? 'active' : '' }}">
                            Portfolio
                        </a>
                        <a href="{{ route('about') }}" class="hero-nav-link font-semibold tracking-[0.08em] uppercase {{ request()->routeIs('about') ? 'active' : '' }}">
                            About
                        </a>
                        <a href="{{ route('contact') }}" class="hero-nav-link font-semibold tracking-[0.08em] uppercase {{ request()->routeIs('contact') ? 'active' : '' }}">
                            Contact
                        </a>
                    </div>

                    {{-- Mobile Menu Toggle --}}
                    <button type="button" class="lg:hidden p-2 rounded-lg transition-all hover:bg-white/20 hero-navbar-toggle-btn" id="heroMobileMenuToggle" aria-label="Toggle menu">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 menu-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 close-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div class="hero-mobile-menu lg:hidden hidden" id="heroMobileMenu">
            <div class="px-4 py-6 space-y-1 border-t border-white/10 bg-black/80">
                <a href="{{ route('home') }}" class="hero-mobile-nav-link font-semibold tracking-[0.06em] uppercase {{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>
                <a href="{{ route('services') }}" class="hero-mobile-nav-link font-semibold tracking-[0.06em] uppercase {{ request()->routeIs('services') ? 'active' : '' }}">
                    Services
                </a>
                <a href="{{ route('portfolio') }}" class="hero-mobile-nav-link font-semibold tracking-[0.06em] uppercase {{ request()->routeIs('portfolio') ? 'active' : '' }}">
                    Portfolio
                </a>
                <a href="{{ route('about') }}" class="hero-mobile-nav-link font-semibold tracking-[0.06em] uppercase {{ request()->routeIs('about') ? 'active' : '' }}">
                    About
                </a>
                <a href="{{ route('contact') }}" class="hero-mobile-nav-link font-semibold tracking-[0.06em] uppercase {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Contact
                </a>
            </div>
        </div>
    </nav>

    <article>
        <ul class="panels">
            <li class="panel">
                <a href="/portfolio">
                    <span>
                        Living Room
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="800" height="800" viewBox="0 -21.38 122.88 122.88" style="width: 3rem; height: 3rem;">
                            <style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd}</style>
                            <g>
                                <path class="fill st0" d="M92.6 48.09c.58 4.96-4.52 9.24-8.99 7.88-.62 1.09-1.11 2.46-1.48 4.12-.85 3.86-.6 2.68-.23 6.41.5 4.98-.04 8.37-3.24 9.82v1.91H13.88v-1.91c-2.49-.89-3.57-3.33-3.19-7.36.83-7.57.31-9.94-1.59-12.79-3.34.12-5.75-.68-7.26-2.36-3.07-3.41-2.14-8.42 1.7-10.83.79-.5 1.72-.87 2.8-1.1 2.14-.45 3.67-.46 5.68.47 4.21 1.95 7.3 6.88 9.28 12.87l21.6.58c1.48.2 2.42.85 3.04 1.75.59-.87 1.43-1.53 2.72-1.83 6.72-.29 11.54.6 16.45.6h5.72c1.17.01 1.78-.52 1.98-1.46 1.39-4.26 3.83-7.65 6.82-10.59 1.98-1.94 2.34-2.66 5.2-2.57 3.31.11 6.93 2.4 7.77 6.39zM97.53 0h19.6l5.75 22.68H91.82L97.53 0zm11.71 26.1v50.24h7.59a1.9 1.9 0 1 1 0 3.8H97.87a1.9 1.9 0 1 1 0-3.8h7.59V26.1h3.78zM12.91 40.58h.01c2.17-4.85 5.58-6.07 10.22-4.44l4.98 17.1h-5.38l-1.58-3.23-1.74-3.56c-.82-1.4-1.76-2.58-2.84-3.55-1.1-.98-2.32-1.75-3.67-2.32zm12.32-4.33c.06-.03.12-.08.15-.16 1.83-4.23 6.89-5.42 11.03-3.61 0-.01.01-.02.01-.02l1.13 21.79h-7.16l-5.16-18zm13.4-4.22c1.34-5.57 14.04-4.43 15.2-.59.17-.01-1.31 20.56-1.42 22.85h-1.89c-1.3 0-1.52-.02-2.76.37l-1.83.57-1.61-.6c-1.07-.4-1.2-.34-2.34-.34H39.6l-.92-22.25-.05-.01zm16.86.93c.04 0 .09-.01.13-.03 4.6-2.45 10.99-.67 11.61 2.53l-.31.12-5.04 18.67h-7.45l1.06-21.29zm13.27 3.97c.07.01.14-.01.21-.07 3.57-2.8 8.81-1.62 11.21 4.23h-.05c-4.73 4.02-8.11 8.38-9.34 13.26h-6.85l4.82-17.42z"/>
                            </g>
                        </svg>
                    </span>
                </a>
                <img src="https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg" alt="Luxury Living Room Interior Design" loading="eager" />
            </li>
            <li class="panel">
                <a href="/portfolio">
                    <span>
                        Kitchen
                        <svg xmlns="http://www.w3.org/2000/svg" width="800" height="800" viewBox="0 0 50 50" style="width: 3rem; height: 3rem;">
                            <path class="fill" d="M10 2c-.55 0-1 .45-1 1v3.49l-6.58 4.7c-.26.18-.42.49-.42.81v4c0 .55.45 1 1 1h22c.55 0 1-.45 1-1v-4c0-.32-.16-.63-.42-.81L19 6.49V3c0-.55-.45-1-1-1h-8zM6.988 22c-.549 0-.998.45-.998 1v1H1.998C1.449 24 1 24.45 1 25v22c0 .55.449 1 .998 1h23.81c.63 0 1.137-.51 1.137-1.14V25.081A1.08 1.08 0 0 0 25.865 24h-3.91v-.865c0-.627-.507-1.135-1.133-1.135H6.988zm23.098 2a1.098 1.098 0 0 0-.81.336c-.246.264-.271.574-.276.664v7h20v-7c0-.55-.449-1-.998-1H30.086zM5.99 28h15.967c.549 0 .998.45.998 1v14c0 .55-.449 1-.998 1H5.99c-.549 0-.998-.45-.998-1V29c0-.55.45-1 .998-1zm26.944 0h11.974c.55 0 .998.45.998 1s-.449 1-.998 1H32.934c-.55 0-.998-.45-.998-1s.449-1 .998-1zM6.988 30v12H20.96V30H6.989zM29 34v13c.002.083.019.403.268.674.308.334.725.328.789.326h17.945c.549 0 .998-.45.998-1V34H29zm3.934 3c.549 0 .998.45.998 1v5c0 .55-.45 1-.998 1-.55 0-.998-.45-.998-1v-5c0-.55.449-1 .998-1z"/>
                        </svg>
                    </span>
                </a>
                <img src="https://ik.imagekit.io/AthaConstruction/assets/dining-room_694bad4ae18538.89672987_N_PzMlACP.jpg" alt="Modern Modular Kitchen Design" loading="lazy" />
            </li>
            <li class="panel">
                <a href="/portfolio">
                    <span>
                        Bedroom
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 512 512" style="width: 3rem; height: 3rem;">
                            <g>
                                <g>
                                    <path class="fill" d="M20.724 388.876v26.819c0 10.099 8.187 18.286 18.286 18.286s18.286-8.187 18.286-18.286v-26.819H20.724z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path class="fill" d="M454.705 388.876v26.819c0 10.099 8.187 18.286 18.286 18.286 10.099 0 18.286-8.187 18.286-18.286v-26.819h-36.572z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path class="fill" d="M0 243.81h512v131.657H0z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path class="fill" d="M420.854 78.019H91.146c-15.169 0-27.755 11.214-27.755 26.381v49.231l23.963-.032c-.26-1.219-.397-2.3-.397-3.657 0-10.941 8.87-19.505 19.81-19.505h298.47c10.941 0 19.81 8.564 19.81 19.505 0 1.357-.138 2.438-.397 3.657h23.962v-49.2c-.002-15.166-12.589-26.38-27.758-26.38z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path class="fill" d="M456.609 183.985H55.214L32.713 216.99h446.574z"/>
                                </g>
                            </g>
                        </svg>
                    </span>
                </a>
                <img src="https://ik.imagekit.io/AthaConstruction/assets/pexels-heyho-7535051_694fc1910371b6.19892859_OG657SCTl.jpg" alt="Luxurious Bedroom Interior Design" loading="lazy" />
            </li>
            <li class="panel">
                <a href="/portfolio">
                    <span>
                        Office
                        <svg xmlns="http://www.w3.org/2000/svg" width="800" height="800" viewBox="0 0 50 50" style="width: 3rem; height: 3rem;">
                            <path class="fill" d="M19.96 4c-2.34 0-4.16 2.13-3.94 4.59l1.39 15.51c0 .01 0 .03.01.04.35-.09.71-.14 1.08-.14h13c.37 0 .73.05 1.08.14.01-.01.01-.03.01-.04l1.39-15.51C34.2 6.13 32.38 4 30.04 4H19.96zM10 18c-.55 0-1.05.22-1.41.59-.37.36-.59.86-.59 1.41 0 1.1.9 2 2 2h2c.55 0 1.05-.22 1.41-.59.37-.36.59-.86.59-1.41 0-.36-.1-.71-.27-1-.35-.6-.99-1-1.73-1h-2zm28 0c-.55 0-1.05.22-1.41.59-.13.12-.23.26-.32.41-.17.29-.27.64-.27 1 0 1.1.9 2 2 2h2c.55 0 1.05-.22 1.41-.59.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2h-2zm-25.87 5.99c-.04.01-.09.01-.13.01h-1.91a5.99 5.99 0 0 0 3.92 4.66c-.01-.05-.01-.11-.01-.16 0-.66.14-1.28.4-1.84a3.977 3.977 0 0 1-2.27-2.67zm25.74 0c-.3 1.2-1.15 2.18-2.27 2.67.26.56.4 1.18.4 1.84 0 .05 0 .11-.01.16A5.99 5.99 0 0 0 39.91 24H38c-.04 0-.09 0-.13-.01zM18.5 26a2.5 2.5 0 1 0 0 5h13a2.5 2.5 0 1 0 0-5h-13zm5.5 7v3h-1v4h-1c-1.65 0-3.324.637-4.652 1.678C16.019 42.718 15 44.228 15 46a1 1 0 1 0 2 0c0-.99.6-1.979 1.582-2.748C19.564 42.482 20.89 42 22 42h2v4a1 1 0 1 0 2 0v-4h2c1.11 0 2.436.483 3.418 1.252C32.4 44.021 33 45.011 33 46a1 1 0 1 0 2 0c0-1.772-1.02-3.282-2.348-4.322C31.324 40.638 29.651 40 28 40h-1v-4h-1v-3h-2z"/>
                        </svg>
                    </span>
                </a>
                <img src="https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg" alt="Modern Office Interior Design" loading="lazy" />
            </li>
        </ul>
        {{-- NESTHETIX Title - Positioned below navbar --}}
        <h1 class="hero-title">
            <span class="gradient-text letter">N</span>
            <span class="gradient-text letter">E</span>
            <span class="gradient-text letter">S</span>
            <span class="gradient-text letter">T</span>
            <span class="gradient-text letter">H</span>
            <span class="gradient-text letter">E</span>
            <span class="gradient-text letter">T</span>
            <span class="gradient-text letter">I</span>
            <span class="gradient-text letter">X</span>
        </h1>
    </article>
</section>

<style>
:root {
    --hero-primary: var(--color-primary);
    --hero-secondary: var(--color-secondary);
    --hero-accent: var(--color-accent);
    --hero-text: #ffffff;
    --hero-bg: #000;
    --hero-gray: rgba(167, 167, 167, 0.3);
    --hero-duration: 0.5s;
    --hero-short-duration: 350ms;
    --hero-gap: 0.4rem;
    --hero-padding: 1.2rem;
    --hero-z-20: 20;
    --hero-z-30: 30;
    --hero-z-40: 40;
}

.hero-section {
    position: relative;
    display: flex;
    flex-flow: column wrap;
    height: 100vh;
    min-height: 100vh;
    overflow: hidden;
    background-color: var(--hero-bg);
}

/* Hero Navbar Styles */
.hero-navbar {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: var(--hero-z-40);
    background-color: transparent;
    transition: opacity 0.3s ease, pointer-events 0.3s ease;
}

.hero-logo-img {
    filter: brightness(0) invert(1);
    transition: filter 0.3s ease;
}

.hero-nav-link {
    position: relative;
    font-family: 'Canela Text Trial', Georgia, 'Times New Roman', serif;
    font-size: 0.9rem; /* Match .nav-link-light */
    color: white;
    padding: 0.5rem 0;
    text-decoration: none;
    transition: color 0.2s ease;
}

.hero-nav-link:hover {
    color: #FFD700; /* Gold color on hover */
}

.hero-nav-link.active {
    color: #FFD700; /* Gold color for active state */
}

.hero-nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #FFD700; /* Gold underline */
    transition: width 0.3s ease;
}

.hero-nav-link:hover::after,
.hero-nav-link.active::after {
    width: 100%;
}

.hero-navbar-toggle-btn {
    color: white;
}

.hero-navbar-toggle-btn:hover {
    color: #FFD700; /* Gold color on hover */
    background-color: rgba(255, 215, 0, 0.1); /* Subtle gold background */
}

.hero-mobile-menu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
}

.hero-mobile-menu:not(.hidden) {
    max-height: 100vh;
}

.hero-mobile-nav-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.875rem 1rem;
    font-size: 0.95rem; /* Match .mobile-nav-link-light */
    font-family: 'Canela Text Trial', Georgia, 'Times New Roman', serif;
    color: white;
    text-decoration: none;
    border-radius: var(--border-radius, 0.5rem);
    transition: all 0.2s ease;
}

.hero-mobile-nav-link:hover {
    color: #FFD700; /* Gold color on hover */
    background-color: rgba(255, 215, 0, 0.1); /* Subtle gold background */
}

.hero-mobile-nav-link.active {
    color: #FFD700; /* Gold color for active */
    background-color: rgba(255, 215, 0, 0.2); /* Gold background for active */
}

article {
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 100vh;
    position: relative;
    width: 100%;
    height: 100vh;
    padding-top: 4rem; /* Match mobile navbar height (h-16) */
}

@media (min-width: 1024px) {
    article {
        padding-top: 6rem; /* Match desktop navbar height (lg:h-24) */
    }
}

article > * {
    grid-column: 1;
    grid-row: 1;
}

.panels {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(18.5rem, 1fr));
    z-index: var(--hero-z-20);
    height: 100%;
}

.panel {
    animation: scale-in-ver-center var(--hero-duration) cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
    opacity: 0;
    position: relative;
}

.panel a {
    font-size: 4.5rem;
    left: 0;
    margin: 0 auto;
    position: absolute;
    right: 0;
    top: 0;
    color: var(--hero-text);
    text-decoration: none;
    font-family: 'Canela Text Trial', serif;
    font-weight: 300;
    letter-spacing: -0.02em;
}

.panel img {
    filter: brightness(0.33);
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.panel span {
    align-items: center;
    display: flex;
    flex-flow: row wrap;
    height: fit-content;
    justify-content: space-evenly;
    opacity: 0;
    padding: var(--hero-padding) var(--hero-gap);
    position: relative;
    width: 100%;
    z-index: var(--hero-z-30);
}

.panel span::before {
    background-color: var(--hero-gray);
    bottom: 0;
    content: "";
    display: block;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    transform: scaleY(0);
    transform-origin: bottom left;
    transition: transform var(--hero-short-duration) ease-in-out, background-color var(--hero-short-duration) ease-in-out;
    z-index: -1;
}

.panel:nth-of-type(1) span {
    animation: slide-in-top var(--hero-duration) cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
}

.panel:nth-of-type(2) span {
    animation: slide-in-top var(--hero-duration) cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
}

.panel:nth-of-type(3) span {
    animation: slide-in-left var(--hero-duration) cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
}

.panel:nth-of-type(4) span {
    animation: slide-in-right var(--hero-duration) cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
}

.panel:hover {
    box-shadow: rgba(201, 168, 108, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
}

.panel:hover span {
    color: var(--hero-accent);
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.8), 0 0 20px rgba(0, 0, 0, 0.6);
}

.panel:hover span::before {
    transform: scaleX(1);
    transform-origin: bottom center;
    background-color: rgba(0, 0, 0, 0.5);
}

.panel:hover .fill {
    fill: var(--hero-accent);
    filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.8)) drop-shadow(0 0 20px rgba(0, 0, 0, 0.6));
}

.panel:hover img {
    filter: brightness(1);
}

.panel svg {
    width: 3rem;
    height: 3rem;
}

.panel:nth-of-type(1) {
    animation-delay: 0.35s;
}

.panel:nth-of-type(1) span {
    animation-delay: 0.85s;
}

.panel:nth-of-type(2) {
    animation-delay: 0.7s;
}

.panel:nth-of-type(2) span {
    animation-delay: 1.2s;
}

.panel:nth-of-type(3) {
    animation-delay: 1.05s;
}

.panel:nth-of-type(3) span {
    animation-delay: 1.55s;
}

.panel:nth-of-type(4) {
    animation-delay: 1.4s;
}

.panel:nth-of-type(4) span {
    animation-delay: 1.9s;
}

.gradient-text {
    -webkit-background-clip: text;
    -webkit-box-direction: clone;
    -webkit-text-fill-color: rgba(0, 0, 0, 0);
    background-image: linear-gradient(to bottom, var(--hero-accent), rgba(201, 168, 108, 0.6));
}

.fill {
    fill: var(--hero-text);
}

.hero-title {
    align-self: center;
    display: inline-flex;
    flex-flow: row;
    font-size: clamp(6rem, 10vw, 18rem);
    line-height: 0.8;
    margin: auto;
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    z-index: var(--hero-z-30);
    font-family: 'Canela Text Trial', serif;
    font-weight: 300;
    letter-spacing: -0.02em;
}

@media (min-width: 1024px) {
    .hero-title {
        bottom: 3rem;
        font-size: clamp(7rem, 11vw, 20rem);
    }
}

.letter {
    animation: bounce-in-fwd var(--hero-duration) cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    color: var(--hero-accent);
    display: inline;
    opacity: 0;
}

/* Animation delays for NESTHETIX (9 letters) */
.letter:nth-child(1) {
    animation-delay: 2.25s;
}

.letter:nth-child(2) {
    animation-delay: 2.55s;
}

.letter:nth-child(3) {
    animation-delay: 2.85s;
}

.letter:nth-child(4) {
    animation-delay: 3.15s;
}

.letter:nth-child(5) {
    animation-delay: 3.45s;
}

.letter:nth-child(6) {
    animation-delay: 3.75s;
}

.letter:nth-child(7) {
    animation-delay: 4.05s;
}

.letter:nth-child(8) {
    animation-delay: 4.35s;
}

.letter:nth-child(9) {
    animation-delay: 4.65s;
}

@media only screen and (min-width: 760px) {
    .panel:nth-of-type(1) span {
        animation: slide-in-top var(--hero-duration) cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }

    .panel:nth-of-type(2) span {
        animation: slide-in-top var(--hero-duration) cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }

    .panel:nth-of-type(3) span {
        animation: slide-in-top var(--hero-duration) cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }

    .panel:nth-of-type(4) span {
        animation: slide-in-top var(--hero-duration) cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }
}

/* Animations */
@keyframes scale-in-ver-center {
    0% {
        transform: scaleY(0);
        opacity: 1;
    }
    100% {
        transform: scaleY(1);
        opacity: 1;
    }
}

@keyframes slide-in-top {
    0% {
        transform: translateY(-100rem);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes slide-in-left {
    0% {
        transform: translateX(-1000px);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slide-in-right {
    0% {
        transform: translateX(1000px);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes bounce-in-fwd {
    0% {
        transform: scale(0);
        animation-timing-function: ease-in;
        opacity: 0;
    }
    38% {
        transform: scale(1);
        animation-timing-function: ease-out;
        opacity: 1;
    }
    55% {
        transform: scale(0.7);
        animation-timing-function: ease-in;
    }
    72% {
        transform: scale(1);
        animation-timing-function: ease-out;
    }
    81% {
        transform: scale(0.84);
        animation-timing-function: ease-in;
    }
    89% {
        transform: scale(1);
        animation-timing-function: ease-out;
    }
    95% {
        transform: scale(0.95);
        animation-timing-function: ease-in;
    }
    100% {
        opacity: 1;
        transform: scale(1);
        animation-timing-function: ease-out;
    }
}

@media (prefers-reduced-motion: reduce) {
    * {
        transition: none !important;
        animation: none !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const heroMobileMenuToggle = document.getElementById('heroMobileMenuToggle');
    const heroMobileMenu = document.getElementById('heroMobileMenu');
    const menuIcon = heroMobileMenuToggle.querySelector('.menu-icon');
    const closeIcon = heroMobileMenuToggle.querySelector('.close-icon');
    
    function toggleMobileMenu() {
        const isOpen = !heroMobileMenu.classList.contains('hidden');
        
        if (isOpen) {
            heroMobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = '';
        } else {
            heroMobileMenu.classList.remove('hidden');
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }
    
    heroMobileMenuToggle.addEventListener('click', toggleMobileMenu);
    
    heroMobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            heroMobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = '';
        });
    });
});
</script>
