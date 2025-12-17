/**
 * Nesthetix Design - GSAP Animation System
 * =========================================
 * Smooth scrolling, scroll-triggered animations, and text effects
 */

// Import GSAP and plugins (loaded via CDN in layout)
// gsap, ScrollTrigger, and Lenis will be available globally

class NesthetixAnimations {
    constructor() {
        this.lenis = null;
        this.initialized = false;
        this.reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        
        // Wait for DOM and libraries to load
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.init());
        } else {
            this.init();
        }
    }

    init() {
        if (this.initialized) return;
        
        // Check if GSAP is loaded
        if (typeof gsap === 'undefined') {
            console.warn('GSAP not loaded. Animations disabled.');
            return;
        }

        // Register ScrollTrigger plugin
        if (typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
        }

        // Initialize systems
        this.initSmoothScroll();
        this.initScrollAnimations();
        this.initTextAnimations();
        this.initParallax();
        this.initMagneticButtons();
        this.initRevealAnimations();
        
        this.initialized = true;
        console.log('🎨 Nesthetix Animations initialized');
    }

    /**
     * Smooth Scrolling with Lenis
     * Creates buttery smooth, momentum-based scrolling
     */
    initSmoothScroll() {
        if (typeof Lenis === 'undefined' || this.reducedMotion) {
            return;
        }

        this.lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // Exponential easing
            direction: 'vertical',
            gestureDirection: 'vertical',
            smooth: true,
            smoothTouch: false,
            touchMultiplier: 2,
            wheelMultiplier: 1,
            infinite: false,
        });

        // Connect Lenis to GSAP's ticker for smooth updates
        gsap.ticker.add((time) => {
            this.lenis.raf(time * 1000);
        });

        gsap.ticker.lagSmoothing(0);

        // Update ScrollTrigger on Lenis scroll
        this.lenis.on('scroll', ScrollTrigger.update);

        // Handle anchor links smoothly
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.querySelector(anchor.getAttribute('href'));
                if (target) {
                    this.lenis.scrollTo(target, {
                        offset: -100,
                        duration: 1.5
                    });
                }
            });
        });
    }

    /**
     * Scroll-Triggered Animations
     * Elements animate as they enter the viewport
     */
    initScrollAnimations() {
        // Fade Up Animation
        gsap.utils.toArray('[data-animate="fade-up"]').forEach(element => {
            gsap.from(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                y: 60,
                opacity: 0,
                duration: 1,
                ease: 'power3.out'
            });
        });

        // Fade In Animation
        gsap.utils.toArray('[data-animate="fade-in"]').forEach(element => {
            gsap.from(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                opacity: 0,
                duration: 1,
                ease: 'power2.out'
            });
        });

        // Slide In Left
        gsap.utils.toArray('[data-animate="slide-left"]').forEach(element => {
            gsap.from(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                x: -100,
                opacity: 0,
                duration: 1,
                ease: 'power3.out'
            });
        });

        // Slide In Right
        gsap.utils.toArray('[data-animate="slide-right"]').forEach(element => {
            gsap.from(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                x: 100,
                opacity: 0,
                duration: 1,
                ease: 'power3.out'
            });
        });

        // Scale Up Animation
        gsap.utils.toArray('[data-animate="scale-up"]').forEach(element => {
            gsap.from(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                scale: 0.8,
                opacity: 0,
                duration: 1,
                ease: 'power3.out'
            });
        });

        // Stagger Children Animation
        gsap.utils.toArray('[data-animate="stagger"]').forEach(container => {
            const children = container.children;
            gsap.from(children, {
                scrollTrigger: {
                    trigger: container,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                y: 40,
                opacity: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power3.out'
            });
        });

        // Rotate In Animation
        gsap.utils.toArray('[data-animate="rotate-in"]').forEach(element => {
            gsap.from(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                rotation: 10,
                y: 50,
                opacity: 0,
                duration: 1.2,
                ease: 'power3.out'
            });
        });
    }

    /**
     * Text Split & Reveal Animations
     * Creates beautiful text reveal effects
     */
    initTextAnimations() {
        // Split text into characters for animation
        gsap.utils.toArray('[data-text="split-chars"]').forEach(element => {
            this.splitTextToChars(element);
            const chars = element.querySelectorAll('.char');
            
            gsap.from(chars, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                y: 100,
                opacity: 0,
                rotateX: -90,
                duration: 0.8,
                stagger: 0.02,
                ease: 'power3.out'
            });
        });

        // Split text into words
        gsap.utils.toArray('[data-text="split-words"]').forEach(element => {
            this.splitTextToWords(element);
            const words = element.querySelectorAll('.word');
            
            gsap.from(words, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                y: 50,
                opacity: 0,
                duration: 0.8,
                stagger: 0.05,
                ease: 'power3.out'
            });
        });

        // Split text into lines
        gsap.utils.toArray('[data-text="split-lines"]').forEach(element => {
            this.splitTextToLines(element);
            const lines = element.querySelectorAll('.line');
            
            gsap.from(lines, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                y: 80,
                opacity: 0,
                duration: 1,
                stagger: 0.15,
                ease: 'power3.out'
            });
        });

        // Typewriter effect
        gsap.utils.toArray('[data-text="typewriter"]').forEach(element => {
            const text = element.textContent;
            element.textContent = '';
            element.style.visibility = 'visible';
            
            gsap.to(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                duration: text.length * 0.05,
                text: {
                    value: text,
                    delimiter: ''
                },
                ease: 'none'
            });
        });

        // Narrative reveal (word by word with highlight)
        gsap.utils.toArray('[data-text="narrative"]').forEach(element => {
            this.splitTextToWords(element);
            const words = element.querySelectorAll('.word');
            
            words.forEach((word, index) => {
                gsap.fromTo(word, 
                    { 
                        opacity: 0.2,
                        filter: 'blur(4px)'
                    },
                    {
                        scrollTrigger: {
                            trigger: element,
                            start: 'top 80%',
                            end: 'bottom 20%',
                            scrub: 1
                        },
                        opacity: 1,
                        filter: 'blur(0px)',
                        duration: 0.5,
                        delay: index * 0.1
                    }
                );
            });
        });

        // Highlight text animation
        gsap.utils.toArray('[data-text="highlight"]').forEach(element => {
            const highlight = document.createElement('span');
            highlight.className = 'text-highlight-bg';
            element.style.position = 'relative';
            element.insertBefore(highlight, element.firstChild);
            
            gsap.fromTo(highlight, 
                { scaleX: 0, transformOrigin: 'left center' },
                {
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 85%',
                        toggleActions: 'play none none reverse'
                    },
                    scaleX: 1,
                    duration: 0.8,
                    ease: 'power3.inOut'
                }
            );
        });
    }

    /**
     * Parallax Effects
     */
    initParallax() {
        // Simple parallax
        gsap.utils.toArray('[data-parallax]').forEach(element => {
            const speed = element.dataset.parallax || 0.5;
            
            gsap.to(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: true
                },
                y: () => element.offsetHeight * speed,
                ease: 'none'
            });
        });

        // Parallax background
        gsap.utils.toArray('[data-parallax-bg]').forEach(element => {
            const speed = element.dataset.parallaxBg || 0.3;
            
            gsap.to(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: true
                },
                backgroundPositionY: () => `${speed * 100}%`,
                ease: 'none'
            });
        });
    }

    /**
     * Magnetic Button Effect
     */
    initMagneticButtons() {
        document.querySelectorAll('[data-magnetic]').forEach(button => {
            button.addEventListener('mousemove', (e) => {
                const rect = button.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                
                gsap.to(button, {
                    x: x * 0.3,
                    y: y * 0.3,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });

            button.addEventListener('mouseleave', () => {
                gsap.to(button, {
                    x: 0,
                    y: 0,
                    duration: 0.5,
                    ease: 'elastic.out(1, 0.3)'
                });
            });
        });
    }

    /**
     * Reveal Animations for Sections
     */
    initRevealAnimations() {
        // Section reveal with clip-path
        gsap.utils.toArray('[data-reveal="clip"]').forEach(element => {
            gsap.fromTo(element, 
                { clipPath: 'inset(100% 0% 0% 0%)' },
                {
                    scrollTrigger: {
                        trigger: element,
                        start: 'top 80%',
                        toggleActions: 'play none none reverse'
                    },
                    clipPath: 'inset(0% 0% 0% 0%)',
                    duration: 1.2,
                    ease: 'power4.inOut'
                }
            );
        });

        // Image reveal
        gsap.utils.toArray('[data-reveal="image"]').forEach(element => {
            const wrapper = document.createElement('div');
            wrapper.className = 'image-reveal-wrapper';
            element.parentNode.insertBefore(wrapper, element);
            wrapper.appendChild(element);
            
            const overlay = document.createElement('div');
            overlay.className = 'image-reveal-overlay';
            wrapper.appendChild(overlay);
            
            gsap.fromTo(overlay, 
                { scaleX: 1, transformOrigin: 'left center' },
                {
                    scrollTrigger: {
                        trigger: wrapper,
                        start: 'top 80%',
                        toggleActions: 'play none none reverse'
                    },
                    scaleX: 0,
                    transformOrigin: 'right center',
                    duration: 1,
                    ease: 'power4.inOut'
                }
            );
            
            gsap.from(element, {
                scrollTrigger: {
                    trigger: wrapper,
                    start: 'top 80%',
                    toggleActions: 'play none none reverse'
                },
                scale: 1.3,
                duration: 1.5,
                ease: 'power3.out'
            });
        });

        // Counter animation
        gsap.utils.toArray('[data-counter]').forEach(element => {
            const target = parseInt(element.dataset.counter) || parseInt(element.textContent);
            element.textContent = '0';
            
            gsap.to(element, {
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                textContent: target,
                duration: 2,
                ease: 'power2.out',
                snap: { textContent: 1 },
                onUpdate: function() {
                    element.textContent = Math.round(this.targets()[0].textContent);
                }
            });
        });
    }

    /**
     * Utility: Split text into characters
     */
    splitTextToChars(element) {
        const text = element.textContent;
        element.innerHTML = '';
        element.setAttribute('aria-label', text);
        
        text.split('').forEach(char => {
            const span = document.createElement('span');
            span.className = 'char';
            span.textContent = char === ' ' ? '\u00A0' : char;
            span.style.display = 'inline-block';
            element.appendChild(span);
        });
    }

    /**
     * Utility: Split text into words
     */
    splitTextToWords(element) {
        const text = element.textContent;
        element.innerHTML = '';
        element.setAttribute('aria-label', text);
        
        text.split(' ').forEach((word, index, arr) => {
            const span = document.createElement('span');
            span.className = 'word';
            span.textContent = word;
            span.style.display = 'inline-block';
            element.appendChild(span);
            
            if (index < arr.length - 1) {
                const space = document.createElement('span');
                space.innerHTML = '&nbsp;';
                space.style.display = 'inline-block';
                element.appendChild(space);
            }
        });
    }

    /**
     * Utility: Split text into lines
     */
    splitTextToLines(element) {
        const text = element.innerHTML;
        const lines = text.split('<br>').length > 1 
            ? text.split('<br>') 
            : text.split('\n');
        
        element.innerHTML = '';
        element.setAttribute('aria-label', text.replace(/<br>/g, ' '));
        
        lines.forEach(line => {
            if (line.trim()) {
                const div = document.createElement('div');
                div.className = 'line';
                div.style.overflow = 'hidden';
                
                const inner = document.createElement('div');
                inner.className = 'line-inner';
                inner.textContent = line.trim();
                
                div.appendChild(inner);
                element.appendChild(div);
            }
        });
    }

    /**
     * Public method to scroll to element
     */
    scrollTo(target, options = {}) {
        if (this.lenis) {
            this.lenis.scrollTo(target, options);
        } else {
            const element = typeof target === 'string' 
                ? document.querySelector(target) 
                : target;
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }
    }

    /**
     * Refresh ScrollTrigger (call after dynamic content changes)
     */
    refresh() {
        if (typeof ScrollTrigger !== 'undefined') {
            ScrollTrigger.refresh();
        }
    }
}

// Initialize and export
window.NesthetixAnimations = new NesthetixAnimations();

