{{-- Top Header Bar - Hidden for now --}}
<div class="top-header transition-all duration-300 font-bold hidden" id="topHeader" style="background-color: var(--color-secondary);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-12 sm:h-14 text-[11px] sm:text-xs md:text-sm" style="color: var(--color-text);">
            {{-- Left: Location --}}
            <div class="hidden sm:flex items-center gap-4">
                <a href="#" class="flex items-center gap-1.5 opacity-80 hover:opacity-100 transition-opacity" style="color: var(--color-text);">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg> -->
                    <span>Luxury Designed Around You.</span>
                </a>
            </div>

            {{-- Center: Welcome Message (hidden on mobile) --}}
            <div class="hidden lg:block px-2">
                <span class="opacity-80" style="color: var(--color-text);"> Welcome to <span class="font-medium opacity-100">{{ $theme['settings']['site_name'] ?? 'Nesthetix' }}</span></span>
            </div>

            {{-- Right: Contact Info & Social --}}
            <div class="flex items-center gap-3 sm:gap-4 ml-auto">
                {{-- Email - Icon on mobile, icon+text on desktop --}}
                <a href="mailto:hello@nesthetix.com" class="flex items-center gap-1.5 opacity-80 hover:opacity-100 transition-opacity" style="color: var(--color-text);" title="Email us">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="hidden sm:inline">hello@nesthetix.com</span>
                </a>
                {{-- Phone - Icon on mobile, icon+text on desktop --}}
                <a href="tel:+1234567890" class="flex items-center gap-1.5 opacity-80 hover:opacity-100 transition-opacity" style="color: var(--color-text);" title="Call us">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-3.5 sm:h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <span class="hidden sm:inline">+1 (234) 567-890</span>
                </a>
                
                {{-- Social Icons - Hidden on mobile --}}
                <div class="hidden md:flex items-center gap-2 pl-4 border-l" style="border-color: rgba(255,242,225,0.2);">
                    <a href="#" class="opacity-80 hover:opacity-100 transition-opacity" style="color: var(--color-text);" title="Facebook">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="opacity-80 hover:opacity-100 transition-opacity" style="color: var(--color-text);" title="Instagram">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="opacity-80 hover:opacity-100 transition-opacity" style="color: var(--color-text);" title="Twitter">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Main Navigation Bar - Transparent when over hero --}}
<nav class="main-navbar sticky top-0 z-50 transition-all duration-300" id="mainNavbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-24">
            {{-- Left: Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0">
                <img src="{{ asset('images/logo/wine.png') }}" 
                     alt="{{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}" 
                     class="h-16 lg:h-24 w-auto object-contain" />
            </a>

            {{-- Right: Desktop Navigation & Mobile Menu Toggle --}}
            <div class="flex items-center gap-8">
                {{-- Desktop Navigation --}}
                <div class="hidden lg:flex items-center gap-10">
                    <a href="{{ route('home') }}" class="nav-link-light font-semibold tracking-[0.08em] uppercase {{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('services') }}" class="nav-link-light font-semibold tracking-[0.08em] uppercase {{ request()->routeIs('services') ? 'active' : '' }}">
                        Services
                    </a>
                    <a href="{{ route('portfolio') }}" class="nav-link-light font-semibold tracking-[0.08em] uppercase {{ request()->routeIs('portfolio') ? 'active' : '' }}">
                        Portfolio
                    </a>
                    <a href="{{ route('about') }}" class="nav-link-light font-semibold tracking-[0.08em] uppercase {{ request()->routeIs('about') ? 'active' : '' }}">
                        About
                    </a>
                    <a href="{{ route('blog') }}" class="nav-link-light font-semibold tracking-[0.08em] uppercase {{ request()->routeIs('blog') ? 'active' : '' }}">
                        Blog
                    </a>
                    <a href="{{ route('contact') }}" class="nav-link-light font-semibold tracking-[0.08em] uppercase {{ request()->routeIs('contact') ? 'active' : '' }}">
                        Contact
                    </a>
                </div>

                {{-- Mobile Menu Toggle --}}
                <button type="button" class="lg:hidden p-2 rounded-lg transition-all hover:bg-gray-100 navbar-toggle-btn" id="mobileMenuToggle" aria-label="Toggle menu" style="color: var(--color-primary);">
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
    <div class="mobile-menu lg:hidden hidden" id="mobileMenu">
        <div class="px-4 py-6 space-y-1 border-t border-gray-100 bg-white">
            <a href="{{ route('home') }}" class="mobile-nav-link-light font-semibold tracking-[0.06em] uppercase {{ request()->routeIs('home') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>
            <a href="{{ route('services') }}" class="mobile-nav-link-light font-semibold tracking-[0.06em] uppercase {{ request()->routeIs('services') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Services
            </a>
            <a href="{{ route('portfolio') }}" class="mobile-nav-link-light font-semibold tracking-[0.06em] uppercase {{ request()->routeIs('portfolio') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Portfolio
            </a>
            <a href="{{ route('about') }}" class="mobile-nav-link-light font-semibold tracking-[0.06em] uppercase {{ request()->routeIs('about') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                About
            </a>
            <a href="{{ route('blog') }}" class="mobile-nav-link-light font-semibold tracking-[0.06em] uppercase {{ request()->routeIs('blog') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                Blog
            </a>
            <a href="{{ route('contact') }}" class="mobile-nav-link-light font-semibold tracking-[0.06em] uppercase {{ request()->routeIs('contact') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Contact
            </a>
        </div>
    </div>
</nav>

{{-- Navbar JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const topHeader = document.getElementById('topHeader');
    const mainNavbar = document.getElementById('mainNavbar');
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = mobileMenuToggle.querySelector('.menu-icon');
    const closeIcon = mobileMenuToggle.querySelector('.close-icon');
    
    // Check if we're on the home page with hero section
    const heroSection = document.querySelector('.hero-section');
    const heroNavbar = document.getElementById('heroNavbar');
    const isHeroPage = heroSection !== null;
    
    let lastScrollY = window.scrollY;
    let isScrolled = false;

    // Scroll behavior
    function handleScroll() {
        const currentScrollY = window.scrollY;
        
        if (isHeroPage) {
            // On hero page, check if scrolled past hero
            const heroHeight = heroSection ? heroSection.offsetHeight : window.innerHeight;
            const scrollThreshold = 50; // Show main navbar after 50px scroll
            
            if (currentScrollY > scrollThreshold) {
                // Show main navbar and hide hero navbar
                if (!isScrolled) {
                    isScrolled = true;
                    mainNavbar.classList.remove('navbar-hidden');
                    mainNavbar.classList.remove('navbar-transparent');
                    mainNavbar.classList.add('navbar-scrolled');
                    if (heroNavbar) {
                        heroNavbar.style.opacity = '0';
                        heroNavbar.style.pointerEvents = 'none';
                        heroNavbar.style.transition = 'opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
                    }
                }
            } else {
                // Hide main navbar smoothly and show hero navbar
                if (isScrolled) {
                    isScrolled = false;
                    mainNavbar.classList.add('navbar-hidden');
                    mainNavbar.classList.add('navbar-transparent');
                    mainNavbar.classList.remove('navbar-scrolled');
                    if (heroNavbar) {
                        heroNavbar.style.opacity = '1';
                        heroNavbar.style.pointerEvents = 'auto';
                        heroNavbar.style.transition = 'opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
                    }
                }
            }
        } else {
            // On other pages, use standard behavior
            if (currentScrollY > 50) {
                if (!isScrolled) {
                    isScrolled = true;
                    mainNavbar.classList.add('navbar-scrolled');
                }
            } else {
                if (isScrolled) {
                    isScrolled = false;
                    mainNavbar.classList.remove('navbar-scrolled');
                }
            }
        }
        
        lastScrollY = currentScrollY;
    }
    
    // Initialize navbar state
    if (isHeroPage) {
        // Initially hide main navbar smoothly and show hero navbar
        mainNavbar.classList.add('navbar-hidden');
        mainNavbar.classList.add('navbar-transparent');
        if (heroNavbar) {
            heroNavbar.style.opacity = '1';
            heroNavbar.style.pointerEvents = 'auto';
        }
    } else {
        mainNavbar.classList.add('navbar-scrolled');
        mainNavbar.classList.remove('navbar-hidden');
    }

    // Mobile menu toggle
    function toggleMobileMenu() {
        const isOpen = !mobileMenu.classList.contains('hidden');
        
        if (isOpen) {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = '';
        } else {
            mobileMenu.classList.remove('hidden');
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    // Close mobile menu when clicking a link
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = '';
        });
    });

    // Event listeners
    window.addEventListener('scroll', handleScroll, { passive: true });
    mobileMenuToggle.addEventListener('click', toggleMobileMenu);

    // Initial check
    handleScroll();
});
</script>
