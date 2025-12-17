<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? $theme['settings']['site_name'] ?? 'Nesthetix' }}</title>
    
    <!-- Dynamic Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{ $googleFontsUrl ?? 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Tangerine:wght@400;700&display=swap' }}" rel="stylesheet">
    
    <!-- GSAP Animation Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/TextPlugin.min.js"></script>
    <!-- Lenis Smooth Scroll -->
    <script src="https://cdn.jsdelivr.net/npm/lenis@1.1.18/dist/lenis.min.js"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Dynamic Theme Variables -->
    <style>
        :root {
            {{ $themeStyles ?? '' }};
        }
    </style>
</head>
<body class="font-body min-h-screen flex flex-col" style="background-color: var(--color-background-light); color: var(--color-primary);" data-lenis-prevent>
    
    {{-- Include Navbar Partial --}}
    @include('components.partials.navbar')

    <!-- Main Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    {{-- Include Footer Partial --}}
    @include('components.partials.footer')

    <!-- Animation Initialization Script -->
    <script>
        // Nesthetix Animation System
        (function() {
            'use strict';
            
            class NesthetixAnimations {
                constructor() {
                    this.lenis = null;
                    this.initialized = false;
                    this.reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                    
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', () => this.init());
                    } else {
                        this.init();
                    }
                }

                init() {
                    if (this.initialized || typeof gsap === 'undefined') return;
                    
                    if (typeof ScrollTrigger !== 'undefined') {
                        gsap.registerPlugin(ScrollTrigger);
                    }
                    if (typeof TextPlugin !== 'undefined') {
                        gsap.registerPlugin(TextPlugin);
                    }

                    this.initSmoothScroll();
                    this.initScrollAnimations();
                    this.initTextAnimations();
                    this.initParallax();
                    this.initMagneticButtons();
                    this.initRevealAnimations();
                    
                    this.initialized = true;
                    console.log('🎨 Nesthetix Animations initialized');
                }

                // Smooth Scrolling with Lenis
                initSmoothScroll() {
                    if (typeof Lenis === 'undefined' || this.reducedMotion) return;

                    this.lenis = new Lenis({
                        duration: 1.2,
                        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                        direction: 'vertical',
                        gestureDirection: 'vertical',
                        smooth: true,
                        smoothTouch: false,
                        touchMultiplier: 2,
                        wheelMultiplier: 1,
                    });

                    gsap.ticker.add((time) => this.lenis.raf(time * 1000));
                    gsap.ticker.lagSmoothing(0);
                    this.lenis.on('scroll', ScrollTrigger.update);

                    // Smooth anchor links
                    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                        anchor.addEventListener('click', (e) => {
                            e.preventDefault();
                            const target = document.querySelector(anchor.getAttribute('href'));
                            if (target) {
                                this.lenis.scrollTo(target, { offset: -100, duration: 1.5 });
                            }
                        });
                    });
                }

                // Scroll-Triggered Animations
                initScrollAnimations() {
                    const animations = {
                        'fade-up': { y: 60, opacity: 0 },
                        'fade-in': { opacity: 0 },
                        'slide-left': { x: -100, opacity: 0 },
                        'slide-right': { x: 100, opacity: 0 },
                        'scale-up': { scale: 0.8, opacity: 0 },
                        'rotate-in': { rotation: 10, y: 50, opacity: 0 },
                        'blur-in': { filter: 'blur(10px)', opacity: 0 }
                    };

                    Object.entries(animations).forEach(([name, props]) => {
                        gsap.utils.toArray(`[data-animate="${name}"]`).forEach(el => {
                            const delay = el.dataset.delay || 0;
                            const duration = el.dataset.duration || 1;
                            
                            gsap.from(el, {
                                scrollTrigger: {
                                    trigger: el,
                                    start: 'top 85%',
                                    toggleActions: 'play none none reverse'
                                },
                                ...props,
                                duration: parseFloat(duration),
                                delay: parseFloat(delay),
                                ease: 'power3.out'
                            });
                        });
                    });

                    // Stagger children
                    gsap.utils.toArray('[data-animate="stagger"]').forEach(container => {
                        gsap.from(container.children, {
                            scrollTrigger: {
                                trigger: container,
                                start: 'top 85%',
                                toggleActions: 'play none none reverse'
                            },
                            y: 40,
                            opacity: 0,
                            duration: 0.8,
                            stagger: container.dataset.stagger || 0.15,
                            ease: 'power3.out'
                        });
                    });
                }

                // Text Split & Reveal Animations
                initTextAnimations() {
                    // Split chars animation
                    gsap.utils.toArray('[data-text="split-chars"]').forEach(el => {
                        this.splitText(el, 'char');
                        gsap.from(el.querySelectorAll('.char'), {
                            scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'play none none reverse' },
                            y: 100, opacity: 0, rotateX: -90, duration: 0.8, stagger: 0.02, ease: 'power3.out'
                        });
                    });

                    // Split words animation
                    gsap.utils.toArray('[data-text="split-words"]').forEach(el => {
                        this.splitText(el, 'word');
                        gsap.from(el.querySelectorAll('.word'), {
                            scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'play none none reverse' },
                            y: 50, opacity: 0, duration: 0.8, stagger: 0.05, ease: 'power3.out'
                        });
                    });

                    // Split lines animation
                    gsap.utils.toArray('[data-text="split-lines"]').forEach(el => {
                        this.splitText(el, 'line');
                        gsap.from(el.querySelectorAll('.line'), {
                            scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'play none none reverse' },
                            y: 80, opacity: 0, duration: 1, stagger: 0.15, ease: 'power3.out'
                        });
                    });

                    // Narrative reveal (scrub effect)
                    gsap.utils.toArray('[data-text="narrative"]').forEach(el => {
                        this.splitText(el, 'word');
                        el.querySelectorAll('.word').forEach((word, i) => {
                            gsap.fromTo(word, 
                                { opacity: 0.2, filter: 'blur(4px)' },
                                {
                                    scrollTrigger: { trigger: el, start: 'top 80%', end: 'bottom 20%', scrub: 1 },
                                    opacity: 1, filter: 'blur(0px)', duration: 0.5, delay: i * 0.1
                                }
                            );
                        });
                    });

                    // Typewriter effect
                    gsap.utils.toArray('[data-text="typewriter"]').forEach(el => {
                        const text = el.textContent;
                        el.textContent = '';
                        gsap.to(el, {
                            scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'play none none reverse' },
                            duration: text.length * 0.05,
                            text: { value: text, delimiter: '' },
                            ease: 'none'
                        });
                    });
                }

                // Parallax Effects
                initParallax() {
                    gsap.utils.toArray('[data-parallax]').forEach(el => {
                        const speed = el.dataset.parallax || 0.5;
                        gsap.to(el, {
                            scrollTrigger: { trigger: el, start: 'top bottom', end: 'bottom top', scrub: true },
                            y: () => el.offsetHeight * speed,
                            ease: 'none'
                        });
                    });

                    gsap.utils.toArray('[data-parallax-bg]').forEach(el => {
                        const speed = el.dataset.parallaxBg || 0.3;
                        gsap.to(el, {
                            scrollTrigger: { trigger: el, start: 'top bottom', end: 'bottom top', scrub: true },
                            backgroundPositionY: `${speed * 100}%`,
                            ease: 'none'
                        });
                    });
                }

                // Magnetic Button Effect
                initMagneticButtons() {
                    document.querySelectorAll('[data-magnetic]').forEach(btn => {
                        btn.addEventListener('mousemove', (e) => {
                            const rect = btn.getBoundingClientRect();
                            const x = e.clientX - rect.left - rect.width / 2;
                            const y = e.clientY - rect.top - rect.height / 2;
                            gsap.to(btn, { x: x * 0.3, y: y * 0.3, duration: 0.3, ease: 'power2.out' });
                        });
                        btn.addEventListener('mouseleave', () => {
                            gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: 'elastic.out(1, 0.3)' });
                        });
                    });
                }

                // Reveal Animations
                initRevealAnimations() {
                    // Clip reveal
                    gsap.utils.toArray('[data-reveal="clip"]').forEach(el => {
                        gsap.fromTo(el, 
                            { clipPath: 'inset(100% 0% 0% 0%)' },
                            {
                                scrollTrigger: { trigger: el, start: 'top 80%', toggleActions: 'play none none reverse' },
                                clipPath: 'inset(0% 0% 0% 0%)', duration: 1.2, ease: 'power4.inOut'
                            }
                        );
                    });

                    // Counter animation
                    gsap.utils.toArray('[data-counter]').forEach(el => {
                        const target = parseInt(el.dataset.counter) || parseInt(el.textContent);
                        el.textContent = '0';
                        gsap.to(el, {
                            scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'play none none reverse' },
                            textContent: target, duration: 2, ease: 'power2.out', snap: { textContent: 1 }
                        });
                    });

                    // Image reveal
                    gsap.utils.toArray('[data-reveal="image"]').forEach(el => {
                        gsap.from(el, {
                            scrollTrigger: { trigger: el, start: 'top 80%', toggleActions: 'play none none reverse' },
                            clipPath: 'inset(0 100% 0 0)', scale: 1.2, duration: 1.2, ease: 'power4.inOut'
                        });
                    });
                }

                // Utility: Split text
                splitText(element, type) {
                    const text = element.textContent;
                    element.innerHTML = '';
                    element.setAttribute('aria-label', text);
                    
                    if (type === 'char') {
                        text.split('').forEach(char => {
                            const span = document.createElement('span');
                            span.className = 'char';
                            span.textContent = char === ' ' ? '\u00A0' : char;
                            span.style.display = 'inline-block';
                            element.appendChild(span);
                        });
                    } else if (type === 'word') {
                        text.split(' ').forEach((word, i, arr) => {
                            const span = document.createElement('span');
                            span.className = 'word';
                            span.textContent = word;
                            span.style.display = 'inline-block';
                            element.appendChild(span);
                            if (i < arr.length - 1) {
                                const space = document.createElement('span');
                                space.innerHTML = '&nbsp;';
                                space.style.display = 'inline-block';
                                element.appendChild(space);
                            }
                        });
                    } else if (type === 'line') {
                        text.split('\n').forEach(line => {
                            if (line.trim()) {
                                const div = document.createElement('div');
                                div.className = 'line';
                                div.style.overflow = 'hidden';
                                div.textContent = line.trim();
                                element.appendChild(div);
                            }
                        });
                    }
                }

                scrollTo(target, options = {}) {
                    if (this.lenis) {
                        this.lenis.scrollTo(target, options);
                    }
                }

                refresh() {
                    if (typeof ScrollTrigger !== 'undefined') ScrollTrigger.refresh();
                }
            }

            window.NesthetixAnimations = new NesthetixAnimations();
        })();
    </script>

    {{-- Global Consultation Form Lightbox --}}
    <x-consultation-form />
</body>
</html>
