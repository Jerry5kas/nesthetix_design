{{-- ============================================
HERO VIDEO BANNER - Full Screen Video Hero
Premium Video Background Hero Section
Usage: <x-hero-video />
============================================ --}}

<section class="hero-video-section">
    {{-- Video Background --}}
    <div class="hero-video-wrapper">
        <video class="hero-video" autoplay loop muted playsinline preload="auto"
            poster="https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg">
            <source src="{{ asset('video/hero.mp4') }}" type="video/mp4">
            {{-- Fallback image if video fails to load --}}
            <img src="https://ik.imagekit.io/AthaConstruction/assets/living-room_694bad683c2ce6.44398210_iMtk3oHGA.jpg"
                alt="Nesthetix Designs Hero" class="hero-video-fallback" />
        </video>

        {{-- Gradient Overlay --}}
        <div class="hero-video-overlay"></div>
    </div>

    {{-- Hero Content --}}
    <div class="hero-video-content">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center items-center text-center">
            {{-- Subheading Badge --}}
            <p class="hero-video-badge" data-animate="fade-up" data-delay="0.1">
                Welcome to Nesthetix Designs
            </p>

            {{-- Main Heading --}}
            <h1 class="hero-video-title" data-animate="fade-up" data-delay="0.2">
                Interior Design Solutions Crafted for Modern Living
            </h1>

            {{-- Primary Divider --}}
            <div class="hero-video-divider" data-animate="fade-up" data-delay="0.3"></div>

            {{-- Description --}}
            <p class="hero-video-description" data-animate="fade-up" data-delay="0.4">
                We deliver thoughtfully designed residential and commercial interiors backed by transparent processes,
                skilled execution, and reliable timelines. From concept to completion, our team ensures every space is
                functional, refined, and built to last.
            </p>

            {{-- CTA Buttons --}}
            <div class="hero-video-cta" data-animate="fade-up" data-delay="0.5">
                <a href="{{ route('portfolio') }}" class="hero-video-btn hero-video-btn-primary">
                    View Our Work
                </a>
                <a href="{{ route('contact') }}" class="hero-video-btn hero-video-btn-secondary">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    /* Hero Video Section */
    .hero-video-section {
        position: relative;
        width: 100%;
        height: 100vh;
        min-height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Video Wrapper */
    .hero-video-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    /* Video Element */
    .hero-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    /* Fallback Image */
    .hero-video-fallback {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    /* Gradient Overlay */
    .hero-video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg,
                rgba(0, 0, 0, 0.4) 0%,
                rgba(0, 0, 0, 0.3) 50%,
                rgba(0, 0, 0, 0.5) 100%);
        z-index: 1;
    }

    /* Hero Content */
    .hero-video-content {
        position: relative;
        z-index: 10;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Badge */
    .hero-video-badge {
        font-family: 'Satoshi', sans-serif;
        font-size: clamp(0.75rem, 1.2vw, 0.875rem);
        font-weight: 600;
        color: #D4AF37;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        padding: 0.5rem 1.5rem;
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: 30px;
        background: rgba(212, 175, 55, 0.1);
        backdrop-filter: blur(10px);
        display: inline-block;
        opacity: 0;
        /* GSAP will handle these */
    }

    /* Title */
    .hero-video-title {
        font-family: 'Canela Text Trial', serif;
        font-size: clamp(2rem, 5vw, 4.5rem);
        font-weight: 300;
        color: #ffffff;
        line-height: 1.2;
        letter-spacing: -0.02em;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        opacity: 0;
        animation: fadeInUp 0.8s ease-out 0.2s forwards;
        max-width: 1000px;
    }

    /* Divider */
    .hero-video-divider {
        width: 80px;
        height: 2px;
        background: linear-gradient(to right, transparent, #D4AF37, transparent);
        margin: 0 auto 2rem;
        border-radius: 2px;
        opacity: 0;
        animation: fadeInUp 0.8s ease-out 0.4s forwards;
    }

    /* Description */
    .hero-video-description {
        font-family: 'Satoshi', sans-serif;
        font-size: clamp(0.875rem, 1.5vw, 1.125rem);
        font-weight: 300;
        color: rgba(255, 255, 255, 0.95);
        line-height: 1.7;
        max-width: 700px;
        margin: 0 auto 2.5rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        letter-spacing: 0.02em;
        opacity: 0;
        animation: fadeInUp 0.8s ease-out 0.6s forwards;
    }

    /* CTA Buttons */
    .hero-video-cta {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-content: center;
        align-items: center;
        opacity: 0;
        animation: fadeInUp 0.8s ease-out 0.8s forwards;
    }

    .hero-video-btn {
        font-family: 'Satoshi', sans-serif;
        font-size: clamp(0.875rem, 1.2vw, 1rem);
        font-weight: 600;
        padding: 0.875rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s ease;
        letter-spacing: 0.05em;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 160px;
    }

    .hero-video-btn-primary {
        background: var(--color-primary);
        color: #ffffff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .hero-video-btn-primary:hover {
        background: var(--color-primary);
        filter: brightness(1.2);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        color: #ffffff;
    }

    .hero-video-btn-secondary {
        background: transparent;
        color: #ffffff;
        border: 2px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
    }

    .hero-video-btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
        color: #ffffff;
    }

    /* Animations */
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

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .hero-video-section {
            height: 100vh;
            min-height: 100vh;
        }

        .hero-video-content {
            padding: 2rem 1rem;
        }

        .hero-video-title {
            margin-bottom: 1rem;
        }

        .hero-video-description {
            margin-bottom: 2rem;
            font-size: 0.875rem;
        }

        .hero-video-cta {
            flex-direction: column;
            width: 100%;
            gap: 0.75rem;
        }

        .hero-video-btn {
            width: 100%;
            max-width: 280px;
        }

        .hero-video-badge {
            font-size: 0.7rem;
            padding: 0.4rem 1.25rem;
            margin-bottom: 1rem;
        }
    }

    @media (max-width: 640px) {
        .hero-video-section {
            height: 100vh;
            min-height: 100vh;
        }

        .hero-video-content {
            padding: 1.5rem 1rem;
        }

        .hero-video-title {
            font-size: 1.75rem;
            margin-bottom: 0.875rem;
        }

        .hero-video-description {
            font-size: 0.8125rem;
            margin-bottom: 1.5rem;
        }

        .hero-video-divider {
            width: 60px;
            margin-bottom: 1.5rem;
        }
    }

    /* Tablet Responsive */
    @media (min-width: 769px) and (max-width: 1024px) {
        .hero-video-section {
            height: 100vh;
            min-height: 100vh;
        }

        .hero-video-title {
            font-size: clamp(2.5rem, 4vw, 3.5rem);
        }
    }

    /* Ensure video plays on all devices */
    @media (prefers-reduced-motion: reduce) {
        .hero-video {
            animation: none;
        }

        .hero-video-badge,
        .hero-video-title,
        .hero-video-divider,
        .hero-video-description,
        .hero-video-cta {
            opacity: 0;
        }

        /* Video loading state */
        .hero-video[poster] {
            background-color: #000;
        }

        /* Accessibility: Ensure content is visible even if video fails */
        .hero-video-content {
            min-height: 400px;
        }
</style>