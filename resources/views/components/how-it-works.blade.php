@props([
    'heading' => 'How It Works',
    'subheading' => 'Our Process',
    'description' => 'From initial consultation to final delivery, we guide you through every step of your interior design journey with transparency and expertise.',
    'steps' => [
        [
            'title' => 'Consultation & Planning',
            'description' => 'We begin with a detailed consultation to understand your vision, lifestyle, and requirements.',
        ],
        [
            'title' => 'Design & Visualization',
            'description' => 'Our team creates detailed design concepts with 3D visualizations and material selections.',
        ],
        [
            'title' => 'Execution & Installation',
            'description' => 'We coordinate all aspects of execution, from procurement to installation, ensuring quality at every step.',
        ],
        [
            'title' => 'Final Delivery',
            'description' => 'We complete the project with final touches, quality checks, and handover of your transformed space.',
        ],
    ],
])

{{-- ============================================
    HOW IT WORKS COMPONENT - Step Progress Bar
    Premium Interior Design - Process Showcase
    Usage: <x-how-it-works />
    ============================================ --}}

<section 
    class="how-it-works-section relative py-16 overflow-hidden bg-white"
    aria-labelledby="how-it-works-heading"
    data-animate="fade-up"
>
    {{-- Decorative Accent Line --}}
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10"></div>
    
    <div class="relative max-w-7xl mx-auto z-20 px-6 lg:px-16">
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
                id="how-it-works-heading"
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

        {{-- Steps Progress Bar --}}
        <div class="how-it-works-container" data-animate="fade-up" data-delay="0.5">
            <div class="steps-progress-wrapper">
                {{-- Progress Line --}}
                <div class="progress-line">
                    <div class="progress-line-fill"></div>
                </div>

                {{-- Steps --}}
                <div class="steps-container">
                    @foreach($steps as $index => $step)
                        <div class="step-item" data-step="{{ $index + 1 }}">
                            {{-- Step Circle --}}
                            <div class="step-circle">
                                <div class="step-number">{{ $index + 1 }}</div>
                                <div class="step-icon">
                                    @if($index === 0)
                                        {{-- Consultation Icon --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                            <polyline points="10 9 9 9 8 9"></polyline>
                                        </svg>
                                    @elseif($index === 1)
                                        {{-- Design Icon --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                                            <path d="M2 2l20 20"></path>
                                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                                        </svg>
                                    @elseif($index === 2)
                                        {{-- Execution Icon --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                        </svg>
                                    @elseif($index === 3)
                                        {{-- Delivery Icon --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    @endif
                                </div>
                            </div>

                            {{-- Step Content --}}
                            <div class="step-content">
                                <h3 class="step-title">{{ $step['title'] }}</h3>
                                <p class="step-description">{{ $step['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* How It Works Section */
.how-it-works-section {
    background: linear-gradient(to bottom, #ffffff, #fafafa);
}

/* Steps Container */
.how-it-works-container {
    position: relative;
    padding: 2rem 0;
}

.steps-progress-wrapper {
    position: relative;
    width: 100%;
}

/* Progress Line */
.progress-line {
    position: absolute;
    top: 2.5rem;
    left: 0;
    right: 0;
    height: 4px;
    background: #e5e7eb;
    border-radius: 2px;
    z-index: 1;
}

.progress-line-fill {
    height: 100%;
    width: 0%;
    background: linear-gradient(to right, var(--color-primary, #9e0c49), #d4af37);
    border-radius: 2px;
    transition: width 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 0 10px rgba(158, 12, 73, 0.3);
}

/* Steps Container */
.steps-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    position: relative;
    z-index: 2;
}

/* Step Item */
.step-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    position: relative;
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1), transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.step-item.animate {
    opacity: 1;
    transform: translateY(0);
}

.step-item:hover .step-content {
    transform: translateY(-4px);
}

.step-content {
    transition: transform 0.3s ease;
}

/* Step Circle */
.step-circle {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #ffffff;
    border: 4px solid #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    margin-bottom: 1.5rem;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    z-index: 3;
    cursor: pointer;
}

.step-item:hover .step-circle {
    transform: scale(1.05);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
}

.step-item.active .step-circle {
    border-color: var(--color-primary, #9e0c49);
    background: var(--color-primary, #9e0c49);
    transform: scale(1.15);
    box-shadow: 0 8px 24px rgba(158, 12, 73, 0.5);
}

.step-item.completed .step-circle {
    border-color: #d4af37;
    background: #d4af37;
    transform: scale(1.05);
}

/* Step Number */
.step-number {
    position: absolute;
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--color-primary, #9e0c49);
    font-family: 'Satoshi', sans-serif;
    transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1), transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.step-item.active .step-number {
    color: #ffffff;
    opacity: 0;
    transform: scale(0.8);
}

.step-item.completed .step-number {
    color: #ffffff;
    opacity: 0;
    transform: scale(0.8);
}

/* Step Icon */
.step-icon {
    position: absolute;
    width: 32px;
    height: 32px;
    opacity: 0;
    transform: scale(0.3) rotate(-180deg);
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    color: #ffffff;
}

.step-icon svg {
    width: 100%;
    height: 100%;
    stroke: currentColor;
}

.step-item.active .step-icon,
.step-item.completed .step-icon {
    opacity: 1;
    transform: scale(1) rotate(0deg);
}

/* Step Content */
.step-content {
    max-width: 280px;
    transition: transform 0.3s ease;
}

.step-title {
    font-family: 'Canela Text Trial', serif;
    font-size: clamp(1.25rem, 2vw, 1.5rem);
    font-weight: 300;
    color: var(--color-primary, #1a1a1a);
    margin-bottom: 0.75rem;
    letter-spacing: -0.02em;
    transition: color 0.3s ease;
}

.step-item.active .step-title {
    color: var(--color-primary, #9e0c49);
}

.step-item.completed .step-title {
    color: #d4af37;
}

.step-description {
    font-family: 'Satoshi', sans-serif;
    font-size: 0.9rem;
    line-height: 1.6;
    color: #666;
    margin: 0;
}

/* Desktop: Horizontal Layout */
@media (min-width: 1024px) {
    .steps-container {
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
    }

    .progress-line {
        top: 2.5rem;
    }

    .step-item {
        align-items: flex-start;
        text-align: left;
    }

    .step-content {
        max-width: 100%;
        padding-left: 0;
    }

    .step-circle {
        margin-bottom: 1.5rem;
    }
}

/* Tablet: 2 Columns */
@media (min-width: 768px) and (max-width: 1023px) {
    .steps-container {
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }

    .progress-line {
        display: none;
    }
}

/* Mobile: Single Column */
@media (max-width: 767px) {
    .steps-container {
        grid-template-columns: 1fr;
        gap: 2.5rem;
    }

    .progress-line {
        display: none;
    }

    .step-item {
        align-items: center;
        text-align: center;
    }

    .step-content {
        max-width: 100%;
    }
}

/* Animation on Scroll */
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

.step-item.animate {
    animation: fadeInUp 0.6s ease forwards;
}

.step-item:nth-child(1) { animation-delay: 0.1s; }
.step-item:nth-child(2) { animation-delay: 0.2s; }
.step-item:nth-child(3) { animation-delay: 0.3s; }
.step-item:nth-child(4) { animation-delay: 0.4s; }

/* Reduced Motion */
@media (prefers-reduced-motion: reduce) {
    .step-item,
    .step-circle,
    .progress-line-fill {
        transition: none !important;
        animation: none !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stepItems = document.querySelectorAll('.step-item');
    const progressFill = document.querySelector('.progress-line-fill');
    const section = document.querySelector('.how-it-works-section');
    
    if (!section || stepItems.length === 0) return;
    
    let hasAnimated = false;
    let currentActiveStep = -1;
    
    // Smooth animation function
    function animateStep(index) {
        if (index >= stepItems.length) return;
        
        const step = stepItems[index];
        step.classList.add('animate');
        
        // Update active/completed states
        stepItems.forEach((item, i) => {
            item.classList.remove('active', 'completed');
            if (i < index) {
                item.classList.add('completed');
            } else if (i === index) {
                item.classList.add('active');
            }
        });
        
        // Update progress line smoothly
        if (progressFill) {
            const progress = ((index + 1) / stepItems.length) * 100;
            progressFill.style.width = progress + '%';
        }
        
        // Continue to next step
        if (index < stepItems.length - 1) {
            setTimeout(() => {
                animateStep(index + 1);
            }, 400);
        }
    }
    
    // Intersection Observer for initial animation
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting && !hasAnimated) {
                hasAnimated = true;
                // Start animation sequence
                setTimeout(() => {
                    animateStep(0);
                }, 300);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    observer.observe(section);

    // Scroll-based progress update (smooth and seamless)
    let rafId = null;
    let lastScrollY = window.scrollY;
    
    function updateProgressOnScroll() {
        if (rafId) return;
        
        rafId = requestAnimationFrame(() => {
            const scrollY = window.scrollY;
            const windowHeight = window.innerHeight;
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            
            // Calculate scroll progress through the section
            const scrollStart = sectionTop - windowHeight * 0.5;
            const scrollEnd = sectionTop + sectionHeight - windowHeight * 0.5;
            const scrollRange = scrollEnd - scrollStart;
            
            if (scrollY >= scrollStart && scrollY <= scrollEnd) {
                const progress = (scrollY - scrollStart) / scrollRange;
                const stepProgress = Math.min(Math.max(progress, 0), 1);
                const currentStepIndex = Math.floor(stepProgress * stepItems.length);
                
                // Only update if step changed
                if (currentStepIndex !== currentActiveStep && currentStepIndex >= 0 && currentStepIndex < stepItems.length) {
                    currentActiveStep = currentStepIndex;
                    
                    // Update states smoothly
                    stepItems.forEach((item, i) => {
                        item.classList.remove('active', 'completed');
                        if (i < currentStepIndex) {
                            item.classList.add('completed');
                        } else if (i === currentStepIndex) {
                            item.classList.add('active');
                        }
                    });
                    
                    // Update progress line
                    if (progressFill) {
                        const progressPercent = ((currentStepIndex + 1) / stepItems.length) * 100;
                        progressFill.style.width = progressPercent + '%';
                    }
                }
            }
            
            rafId = null;
        });
    }
    
    // Throttled scroll listener
    let scrollTimeout;
    window.addEventListener('scroll', () => {
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }
        scrollTimeout = setTimeout(updateProgressOnScroll, 16);
    }, { passive: true });
    
    // Initial check
    updateProgressOnScroll();
});
</script>

