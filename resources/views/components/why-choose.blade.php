{{-- ============================================
WHY CHOOSE SECTION COMPONENT
Premium Interior Design - Why Choose Us Section
Usage: <x-why-choose />
============================================ --}}

<section class="relative py-8 sm:py-10 px-6 lg:px-16 overflow-hidden bg-white" data-animate="fade-up">
    {{-- Decorative Accent Line --}}
    <div
        class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[var(--color-secondary)]/30 to-transparent z-10">
    </div>

    {{-- Content Container --}}
    <div class="relative max-w-5xl mx-auto text-center z-20">
        {{-- Tagline --}}
        <p class="text-theme-muted tracking-[0.3em] uppercase text-xs mb-2 font-medium"
            style="font-family: 'Satoshi', sans-serif;" data-animate="fade-up" data-delay="0.1">
            Premium Interior Design
        </p>

        {{-- Heading --}}
        <h2 class="font-light text-2xl md:text-4xl lg:text-5xl text-theme-primary leading-tight mb-4"
            style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;" data-animate="fade-up"
            data-delay="0.2">
            WHY CHOOSE <br class="hidden md:block"> NESTHETIX DESIGNS?
        </h2>

        {{-- Primary Divider --}}
        <div class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto mb-5"
            data-animate="fade-up" data-delay="0.3"></div>

        {{-- Description --}}
        <p class="max-w-3xl mx-auto text-gray-700 text-sm md:text-base leading-relaxed mb-6"
            style="font-family: 'Satoshi', sans-serif;" data-animate="fade-up" data-delay="0.4">
            We transform spaces into timeless sanctuaries that reflect your unique vision. From initial concept to final
            execution,
            our team of expert designers and craftsmen delivers exceptional results on time and within budget.
            Experience the difference of thoughtful design — where every detail matters and luxury meets functionality.
        </p>

        {{-- Stats Card --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6" x-data="{
                count1: 0,
                count2: 0,
                count3: 0,
                count4: 0,
                target1: 10,
                target2: 20,
                target3: 98,
                target4: 5,
                duration: 2000,
                started: false,
                animationFrame: null,
                startCounting() {
                    if (this.started) return;
                    this.started = true;
                    const startTime = Date.now();
                    const self = this;
                    const animate = () => {
                        const elapsed = Date.now() - startTime;
                        const progress = Math.min(elapsed / self.duration, 1);
                        const easeOutQuart = 1 - Math.pow(1 - progress, 4);
                        self.count1 = self.target1 * easeOutQuart;
                        self.count2 = self.target2 * easeOutQuart;
                        self.count3 = self.target3 * easeOutQuart;
                        self.count4 = self.target4 * easeOutQuart;
                        if (progress < 1) {
                            self.animationFrame = requestAnimationFrame(animate);
                        } else {
                            self.count1 = self.target1;
                            self.count2 = self.target2;
                            self.count3 = self.target3;
                            self.count4 = self.target4;
                            self.animationFrame = null;
                        }
                    };
                    self.animationFrame = requestAnimationFrame(animate);
                },
                init() {
                    const self = this;
                    
                    // Aggressive approach: Start animation with multiple fallbacks
                    // This ensures it always runs regardless of page load speed
                    
                    const attemptStart = () => {
                        if (!self.started) {
                            self.startCounting();
                        }
                    };
                    
                    // Check if element is already visible (for fast page loads)
                    const checkAndStart = () => {
                        const rect = self.$el.getBoundingClientRect();
                        const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
                        if (isVisible && !self.started) {
                            setTimeout(attemptStart, 300);
                        }
                    };
                    
                    // Method 1: Check immediately if already visible
                    this.$nextTick(() => {
                        checkAndStart();
                        setTimeout(attemptStart, 500);
                    });
                    
                    // Method 2: Start on DOM ready (handles fast page loads)
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', () => {
                            checkAndStart();
                            setTimeout(attemptStart, 600);
                        });
                    } else {
                        checkAndStart();
                        setTimeout(attemptStart, 600);
                    }
                    
                    // Method 3: Start on full page load (handles slow loads with images)
                    if (document.readyState === 'complete') {
                        setTimeout(attemptStart, 700);
                    } else {
                        window.addEventListener('load', () => {
                            setTimeout(attemptStart, 700);
                        });
                    }
                    
                    // Method 4: Ultimate fallback - always start after 1.5 seconds
                    setTimeout(attemptStart, 1500);
                    
                    // Method 5: Intersection observer (x-intersect) will also trigger
                    // This handles cases where user scrolls to the section
                }
            }" x-intersect.threshold.0="startCounting()" data-animate="fade-up" data-delay="0.5">
            {{-- Stat 1 --}}
            <div class="text-center">
                <p class="text-theme-secondary font-light text-2xl md:text-3xl lg:text-4xl mb-1"
                    style="font-family: 'Canela Text Trial', serif; color: var(--color-primary);">
                    <span x-text="Math.floor(count1)">0</span>+
                </p>
                <p class="text-xs font-medium text-gray-600" style="font-family: 'Satoshi', sans-serif;">
                    Years Of Excellence
                </p>
            </div>

            {{-- Stat 2 --}}
            <div class="text-center">
                <p class="text-theme-secondary font-light text-2xl md:text-3xl lg:text-4xl mb-1"
                    style="font-family: 'Canela Text Trial', serif; color: var(--color-primary);">
                    <span x-text="Math.floor(count2)">0</span>+
                </p>
                <p class="text-xs font-medium text-gray-600" style="font-family: 'Satoshi', sans-serif;">
                    Completed Projects
                </p>
            </div>

            {{-- Stat 3 --}}
            <div class="text-center">
                <p class="text-theme-secondary font-light text-2xl md:text-3xl lg:text-4xl mb-1"
                    style="font-family: 'Canela Text Trial', serif; color: var(--color-primary);">
                    <span x-text="Math.floor(count3)">0</span>%
                </p>
                <p class="text-xs font-medium text-gray-600" style="font-family: 'Satoshi', sans-serif;">
                    Client Satisfaction
                </p>
            </div>

            {{-- Stat 4 --}}
            <div class="text-center">
                <p class="text-theme-secondary font-light text-2xl md:text-3xl lg:text-4xl mb-1"
                    style="font-family: 'Canela Text Trial', serif; color: var(--color-primary);">
                    <span x-text="Math.floor(count4)">0</span>+
                </p>
                <p class="text-xs font-medium text-gray-600" style="font-family: 'Satoshi', sans-serif;">
                    Design Awards
                </p>
            </div>
        </div>
    </div>
</section>