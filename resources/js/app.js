import './bootstrap';
import './animations';

// Initialize Global UI interactions
document.addEventListener('DOMContentLoaded', () => {
    initPreloader();
    initCursorFollower();
    initScrollProgress();
});

/**
 * Luxury Preloader
 */
function initPreloader() {
    const preloader = document.getElementById('preloader');
    const fill = document.getElementById('preloader-bar-fill');

    if (!preloader) return;

    let progress = 0;
    let isLoaded = false;

    // Check if page already loaded
    if (document.readyState === 'complete') {
        isLoaded = true;
    } else {
        window.addEventListener('load', () => {
            isLoaded = true;
        });
    }

    const interval = setInterval(() => {
        // Faster increments based on load state
        const increment = isLoaded ? 15 : (Math.random() * 8 + 2);
        progress += increment;

        if (progress > 100) progress = 100;
        if (fill) fill.style.width = `${progress}%`;

        if (progress >= 100) {
            clearInterval(interval);

            // Reduced delay for a snappier feel
            setTimeout(() => {
                if (typeof gsap !== 'undefined') {
                    const tl = gsap.timeline({
                        onComplete: () => {
                            preloader.style.display = 'none';
                            if (window.NesthetixAnimations) window.NesthetixAnimations.refresh();
                        }
                    });

                    tl.to(preloader, {
                        opacity: 0,
                        duration: 0.6, // Faster fade
                        ease: 'expo.inOut'
                    });
                } else {
                    preloader.style.opacity = '0';
                    setTimeout(() => preloader.style.display = 'none', 600);
                }
            }, 200); // Shorter final pause
        }
    }, 40); // Faster interval for smoother animation
}

/**
 * Custom Cursor Follower
 */
function initCursorFollower() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || window.innerWidth < 1024) return;

    const follower = document.createElement('div');
    follower.className = 'cursor-follower';
    document.body.appendChild(follower);

    let posX = 0, posY = 0;
    let mouseX = 0, mouseY = 0;

    if (typeof gsap !== 'undefined') {
        gsap.to({}, 0.016, {
            repeat: -1,
            onUpdate: function () {
                posX += (mouseX - posX) / 9;
                posY += (mouseY - posY) / 9;

                gsap.set(follower, {
                    css: {
                        left: posX,
                        top: posY
                    }
                });
            }
        });

        document.addEventListener("mousemove", (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        // Add hover effects for interactive elements
        const targets = document.querySelectorAll('a, button, [data-magnetic], input, textarea');
        targets.forEach(target => {
            target.addEventListener('mouseenter', () => follower.classList.add('active'));
            target.addEventListener('mouseleave', () => follower.classList.remove('active'));
        });
    }
}

/**
 * Scroll Progress Bar
 */
function initScrollProgress() {
    const progress = document.createElement('div');
    progress.className = 'scroll-progress';
    document.body.appendChild(progress);

    window.addEventListener('scroll', () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        progress.style.transform = `scaleX(${scrolled / 100})`;
    });
}
