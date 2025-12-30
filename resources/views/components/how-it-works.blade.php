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
    class="how-it-works-section relative py-10 sm:py-12 overflow-hidden bg-white"
    aria-labelledby="how-it-works-heading"
    data-animate="fade-up"
>
    {{-- Decorative Accent Line --}}
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10"></div>
    
    <div class="relative max-w-6xl mx-auto z-20 px-6 lg:px-16">
        {{-- Header Section --}}
        <div class="text-center max-w-3xl mx-auto mb-8" data-animate="fade-up">
            {{-- Subheading Badge --}}
            <p 
                class="text-theme-muted tracking-[0.3em] uppercase text-xs mb-2 font-medium"
                style="font-family: 'Satoshi', sans-serif;"
                data-animate="fade-up"
                data-delay="0.1"
            >
                {{ $subheading }}
            </p>

            {{-- Main Heading --}}
            <h2
                id="how-it-works-heading"
                class="font-light text-2xl md:text-3xl lg:text-4xl text-theme-primary leading-tight mb-3"
                style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                data-animate="fade-up"
                data-delay="0.2"
            >
                {{ $heading }}
            </h2>

            {{-- Primary Divider --}}
            <div 
                class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto mb-5"
                data-animate="fade-up"
                data-delay="0.3"
            ></div>

            {{-- Description --}}
            <p 
                class="max-w-3xl mx-auto text-gray-700 text-sm md:text-base leading-relaxed mb-6"
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
    background: #ffffff;
}

/* Steps Container */
.how-it-works-container {
    position: relative;
    padding: 1.5rem 0;
}

.steps-progress-wrapper {
    position: relative;
    width: 100%;
}

/* Progress Line */
.progress-line {
    position: absolute;
    top: 2rem;
    left: 0;
    right: 0;
    height: 2px;
    background: #e5e7eb;
    border-radius: 1px;
    z-index: 1;
}

.progress-line-fill {
    height: 100%;
    width: 0%;
    background: linear-gradient(to right, var(--color-primary, #7A0C68), #C9A86C);
    border-radius: 1px;
    transition: width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    will-change: width;
}

/* Steps Container */
.steps-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
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
    opacity: 1;
    transform: translateY(0);
    transition: opacity 0.3s ease, transform 0.3s ease;
    cursor: pointer;
}

.step-item:hover .step-content {
    transform: translateY(-2px);
}

.step-content {
    transition: transform 0.2s ease;
}

/* Step Circle */
.step-circle {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: #ffffff;
    border: 3px solid #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    margin-bottom: 1rem;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    z-index: 3;
    cursor: pointer;
    will-change: transform, border-color, background;
}

.step-item:hover .step-circle {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
}

.step-item.active .step-circle {
    border-color: var(--color-primary, #7A0C68);
    background: var(--color-primary, #7A0C68);
    transform: scale(1.1);
    box-shadow: 0 4px 16px rgba(122, 12, 104, 0.3);
}

.step-item.completed .step-circle {
    border-color: #C9A86C;
    background: #C9A86C;
    transform: scale(1.05);
}

/* Step Number */
.step-number {
    position: absolute;
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--color-primary, #7A0C68);
    font-family: 'Satoshi', sans-serif;
    transition: opacity 0.25s ease, transform 0.25s ease;
    will-change: opacity, transform;
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
    width: 28px;
    height: 28px;
    opacity: 0;
    transform: scale(0.4) rotate(-90deg);
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    color: #ffffff;
    will-change: opacity, transform;
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
    font-size: clamp(1.1rem, 1.8vw, 1.35rem);
    font-weight: 300;
    color: var(--color-primary, #1a1a1a);
    margin-bottom: 0.5rem;
    letter-spacing: -0.02em;
    transition: color 0.2s ease;
}

.step-item.active .step-title {
    color: var(--color-primary, #7A0C68);
}

.step-item.completed .step-title {
    color: #C9A86C;
}

.step-description {
    font-family: 'Satoshi', sans-serif;
    font-size: 0.875rem;
    line-height: 1.5;
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
        top: 2rem;
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
        margin-bottom: 1rem;
    }
}

/* Tablet: 2 Columns */
@media (min-width: 768px) and (max-width: 1023px) {
    .steps-container {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .progress-line {
        display: none;
    }
}

/* Mobile: Single Column */
@media (max-width: 767px) {
    .steps-container {
        grid-template-columns: 1fr;
        gap: 2rem;
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
.step-item {
    opacity: 1;
    transform: translateY(0);
}

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
(function() {
    'use strict';
    
    const stepItems = document.querySelectorAll('.step-item');
    const progressFill = document.querySelector('.progress-line-fill');
    const section = document.querySelector('.how-it-works-section');
    
    if (!section || stepItems.length === 0) return;
    
    let currentActiveStep = -1;
    let hasAnimated = false;
    let isAnimating = false;
    let isAutoLoading = false;
    let isHovering = false;
    let hoverTargetStep = null;
    let ticking = false;
    let sectionBounds = null;
    let animationTimeouts = [];
    let progressAnimationFrame = null;
    let currentProgressPercent = 0;
    let progressCancelFn = null;
    const STEP_INTERVAL = 2500; // 2.5 seconds between steps
    
    // Initialize all steps to default state
    stepItems.forEach(item => {
        item.classList.remove('active', 'completed');
    });
    if (progressFill) {
        progressFill.style.width = '0%';
        currentProgressPercent = 0;
    }
    
    // Get current progress from DOM
    function getCurrentProgress() {
        if (!progressFill) return 0;
        const width = progressFill.style.width || '0%';
        return parseFloat(width) || 0;
    }
    
    // Get current step from progress
    function getCurrentStepFromProgress() {
        const segmentSize = 100 / stepItems.length;
        const progress = getCurrentProgress();
        const step = Math.floor(progress / segmentSize);
        return Math.min(step, stepItems.length - 1);
    }
    
    // Clear all animations and timeouts
    function clearAnimations() {
        animationTimeouts.forEach(timeout => clearTimeout(timeout));
        animationTimeouts = [];
        if (progressCancelFn) {
            progressCancelFn();
            progressCancelFn = null;
        }
        if (progressAnimationFrame) {
            cancelAnimationFrame(progressAnimationFrame);
            progressAnimationFrame = null;
        }
        isAnimating = false;
    }
    
    // Pause auto-loading
    function pauseAutoLoading() {
        isAutoLoading = false;
        clearAnimations();
    }
    
    // Resume auto-loading from current position
    function resumeAutoLoading() {
        if (isHovering || !hasAnimated) return;
        
        const currentProgress = getCurrentProgress();
        const segmentSize = 100 / stepItems.length;
        let currentStep = getCurrentStepFromProgress();
        
        // If progress is complete, don't resume
        if (currentProgress >= 100) {
            isAutoLoading = false;
            return;
        }
        
        // If we're at the last step and it's complete, don't resume
        if (currentStep >= stepItems.length - 1) {
            const lastStepStart = (stepItems.length - 1) * segmentSize;
            if (currentProgress >= lastStepStart + segmentSize) {
                isAutoLoading = false;
                return;
            }
        }
        
        // If we're in the middle of a segment, continue from next step
        const currentSegmentStart = currentStep * segmentSize;
        const currentSegmentEnd = (currentStep + 1) * segmentSize;
        
        // If we're more than halfway through current segment, start from next step
        if (currentProgress > (currentSegmentStart + currentSegmentEnd) / 2 && currentStep < stepItems.length - 1) {
            currentStep = currentStep + 1;
        }
        
        // Continue from calculated step
        isAutoLoading = true;
        continueAutoLoading(currentStep);
    }
    
    // Reset all steps to default state
    function resetSteps() {
        stepItems.forEach(item => {
            item.classList.remove('active', 'completed');
        });
        if (progressFill) {
            progressFill.style.width = '0%';
        }
        currentActiveStep = -1;
        currentProgressPercent = 0;
    }
    
    // Cache section bounds for performance
    function updateSectionBounds() {
        const rect = section.getBoundingClientRect();
        const scrollY = window.scrollY || window.pageYOffset;
        sectionBounds = {
            top: rect.top + scrollY,
            height: rect.height,
            windowHeight: window.innerHeight
        };
    }
    
    // Animate progress bar segment by segment (cancellable)
    function animateProgressBar(fromPercent, toPercent, duration, callback) {
        if (!progressFill) {
            if (callback) callback();
            return null;
        }
        
        // Cancel any existing animation
        if (progressCancelFn) {
            progressCancelFn();
        }
        
        const startTime = Date.now();
        const startPercent = fromPercent;
        const difference = toPercent - fromPercent;
        let cancelled = false;
        
        function updateProgress() {
            if (cancelled) return;
            
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const currentPercent = startPercent + (difference * progress);
            progressFill.style.width = currentPercent + '%';
            currentProgressPercent = currentPercent;
            
            if (progress < 1) {
                progressAnimationFrame = requestAnimationFrame(updateProgress);
            } else {
                progressAnimationFrame = null;
                if (callback) callback();
            }
        }
        
        // Return cancel function
        const cancel = () => {
            cancelled = true;
            if (progressAnimationFrame) {
                cancelAnimationFrame(progressAnimationFrame);
                progressAnimationFrame = null;
            }
        };
        
        updateProgress();
        return cancel;
    }
    
    // Continue auto-loading from a specific step
    function continueAutoLoading(startIndex) {
        if (!isAutoLoading || isHovering) return;
        
        isAnimating = true;
        
        function animateStepSegment(index) {
            // Check if we should stop (hover started or auto-loading paused)
            if (!isAutoLoading || isHovering || index >= stepItems.length) {
                isAnimating = false;
                return;
            }
            
            // Mark previous steps as completed
            stepItems.forEach((item, i) => {
                if (i < index) {
                    item.classList.remove('active');
                    item.classList.add('completed');
                } else if (i === index) {
                    item.classList.remove('completed');
                    item.classList.add('active');
                } else {
                    item.classList.remove('active', 'completed');
                }
            });
            
            // Calculate progress bar segments
            const segmentSize = 100 / stepItems.length;
            const fromPercent = index * segmentSize;
            const toPercent = (index + 1) * segmentSize;
            
            // Animate progress bar for this step segment
            progressCancelFn = animateProgressBar(fromPercent, toPercent, STEP_INTERVAL, () => {
                currentActiveStep = index;
                progressCancelFn = null;
                
                // Continue to next step after progress completes
                if (isAutoLoading && !isHovering && index < stepItems.length - 1) {
                    const timeout = setTimeout(() => {
                        animateStepSegment(index + 1);
                    }, 100);
                    animationTimeouts.push(timeout);
                } else {
                    isAnimating = false;
                    isAutoLoading = false;
                }
            });
        }
        
        // Start animation from specified step
        animateStepSegment(startIndex);
    }
    
    // Animate to hovered step (pauses auto-loading)
    function animateToHoveredStep(targetIndex) {
        pauseAutoLoading();
        isHovering = true;
        hoverTargetStep = targetIndex;
        isAnimating = true;
        
        // Get actual current position from DOM
        const currentProgress = getCurrentProgress();
        const segmentSize = 100 / stepItems.length;
        const actualCurrentStep = getCurrentStepFromProgress();
        
        // Determine starting step based on actual progress
        let startIndex = actualCurrentStep;
        
        // If we're in the middle of a segment, use current progress
        const currentSegmentStart = actualCurrentStep * segmentSize;
        const currentSegmentEnd = (actualCurrentStep + 1) * segmentSize;
        
        // If target is before current, jump to it
        if (targetIndex < actualCurrentStep) {
            stepItems.forEach((item, i) => {
                item.classList.remove('active', 'completed');
                if (i < targetIndex) {
                    item.classList.add('completed');
                } else if (i === targetIndex) {
                    item.classList.add('active');
                }
            });
            if (progressFill) {
                const progressPercent = ((targetIndex + 1) / stepItems.length) * 100;
                progressFill.style.width = progressPercent + '%';
                currentProgressPercent = progressPercent;
            }
            currentActiveStep = targetIndex;
            isAnimating = false;
            return;
        }
        
        // If target equals current and segment is complete, we're done
        if (targetIndex === actualCurrentStep) {
            const currentSegmentStart = actualCurrentStep * segmentSize;
            const currentSegmentEnd = (actualCurrentStep + 1) * segmentSize;
            
            // If segment is already complete, just ensure state is correct
            if (currentProgress >= currentSegmentEnd) {
                stepItems.forEach((item, i) => {
                    item.classList.remove('active', 'completed');
                    if (i < targetIndex) {
                        item.classList.add('completed');
                    } else if (i === targetIndex) {
                        item.classList.add('active');
                    }
                });
                isAnimating = false;
                return;
            }
            // Otherwise, continue to complete the segment
        }
        
        // Continue from actual current step to target (but don't exceed target)
        function animateStepSegment(index) {
            // Stop if we've reached or exceeded target, or hover ended
            if (!isHovering || index > targetIndex || index >= stepItems.length) {
                isAnimating = false;
                return;
            }
            
            // Mark previous steps as completed
            stepItems.forEach((item, i) => {
                if (i < index) {
                    item.classList.remove('active');
                    item.classList.add('completed');
                } else if (i === index) {
                    item.classList.remove('completed');
                    item.classList.add('active');
                } else {
                    item.classList.remove('active', 'completed');
                }
            });
            
            // Calculate progress bar segments
            const fromPercent = index * segmentSize;
            const toPercent = (index + 1) * segmentSize;
            
            // Use actual current progress if starting mid-segment
            const actualFromPercent = (index === startIndex && currentProgress > fromPercent) 
                ? currentProgress 
                : fromPercent;
            
            // Animate progress bar for this step segment
            progressCancelFn = animateProgressBar(actualFromPercent, toPercent, STEP_INTERVAL, () => {
                currentActiveStep = index;
                progressCancelFn = null;
                
                // Continue to next step after progress completes (but don't exceed target)
                if (isHovering && index < targetIndex) {
                    const timeout = setTimeout(() => {
                        animateStepSegment(index + 1);
                    }, 100);
                    animationTimeouts.push(timeout);
                } else {
                    // Reached target, stop
                    isAnimating = false;
                }
            });
        }
        
        // Start animation from actual current position
        animateStepSegment(startIndex);
    }
    
    // Sequential step animation (for initial load)
    function animateStepInitial(index) {
        if (index >= stepItems.length) {
            isAnimating = false;
            isAutoLoading = false;
            return;
        }
        
        isAutoLoading = true;
        
        // Mark previous steps as completed
        stepItems.forEach((item, i) => {
            if (i < index) {
                item.classList.remove('active');
                item.classList.add('completed');
            } else if (i === index) {
                item.classList.remove('completed');
                item.classList.add('active');
            } else {
                item.classList.remove('active', 'completed');
            }
        });
        
        // Calculate progress bar segments
        const segmentSize = 100 / stepItems.length;
        const fromPercent = index * segmentSize;
        const toPercent = (index + 1) * segmentSize;
        
        // Animate progress bar for this step segment
        progressCancelFn = animateProgressBar(fromPercent, toPercent, STEP_INTERVAL, () => {
            currentActiveStep = index;
            progressCancelFn = null;
            
            // Continue to next step after progress completes
            if (isAutoLoading && !isHovering && index < stepItems.length - 1) {
                const timeout = setTimeout(() => {
                    animateStepInitial(index + 1);
                }, 100);
                animationTimeouts.push(timeout);
            } else {
                isAnimating = false;
                isAutoLoading = false;
            }
        });
    }
    
    // Optimized scroll handler (only after initial animation)
    function updateProgressOnScroll() {
        if (ticking || isAnimating || !hasAnimated) return;
        
        ticking = true;
        requestAnimationFrame(() => {
            if (!sectionBounds) updateSectionBounds();
            
            const scrollY = window.scrollY || window.pageYOffset;
            const windowHeight = sectionBounds.windowHeight;
            const sectionTop = sectionBounds.top;
            const sectionHeight = sectionBounds.height;
            
            // Calculate scroll progress
            const scrollStart = sectionTop - windowHeight * 0.6;
            const scrollEnd = sectionTop + sectionHeight - windowHeight * 0.4;
            const scrollRange = scrollEnd - scrollStart;
            
            if (scrollY >= scrollStart && scrollY <= scrollEnd && scrollRange > 0) {
                const progress = Math.min(Math.max((scrollY - scrollStart) / scrollRange, 0), 1);
                const stepIndex = Math.min(Math.floor(progress * stepItems.length), stepItems.length - 1);
                
                // Only update if step changed
                if (stepIndex !== currentActiveStep && stepIndex >= 0) {
                    currentActiveStep = stepIndex;
                    
                    // Batch DOM updates
                    stepItems.forEach((item, i) => {
                        item.classList.remove('active', 'completed');
                        if (i < stepIndex) {
                            item.classList.add('completed');
                        } else if (i === stepIndex) {
                            item.classList.add('active');
                        }
                    });
                    
                    // Update progress line
                    if (progressFill) {
                        const progressPercent = ((stepIndex + 1) / stepItems.length) * 100;
                        progressFill.style.width = progressPercent + '%';
                    }
                }
            }
            
            ticking = false;
        });
    }
    
    // Optimized event listeners
    let resizeTimeout;
    function handleResize() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            sectionBounds = null;
            if (hasAnimated) updateProgressOnScroll();
        }, 150);
    }
    
    // Use passive listeners for better performance
    window.addEventListener('scroll', updateProgressOnScroll, { passive: true });
    window.addEventListener('resize', handleResize, { passive: true });
    
    // Add hover event listeners to each step
    stepItems.forEach((stepItem, index) => {
        stepItem.addEventListener('mouseenter', () => {
            animateToHoveredStep(index);
        });
        
        stepItem.addEventListener('mouseleave', () => {
            isHovering = false;
            hoverTargetStep = null;
            // Resume auto-loading from current position
            resumeAutoLoading();
        });
    });
    
    // Intersection Observer for initial animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !hasAnimated) {
                hasAnimated = true;
                isAnimating = true;
                
                // Start sequential animation
                setTimeout(() => {
                    animateStepInitial(0);
                }, 300);
                
                observer.unobserve(entry.target);
            } else if (entry.isIntersecting && hasAnimated) {
                // Update on scroll after animation
                updateProgressOnScroll();
            }
        });
    }, { threshold: 0.2, rootMargin: '100px' });
    
    observer.observe(section);
    
    // Initial bounds calculation
    updateSectionBounds();
})();
</script>

