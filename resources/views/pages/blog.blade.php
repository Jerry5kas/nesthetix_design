<x-layouts.app 
    title="Blog | {{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}"
    description="Explore our latest interior design insights, trends, and tips. Discover expert advice on luxury interiors, residential design, commercial spaces, and more."
    canonical="{{ url('/blog') }}">
    
    {{-- Hero Section --}}
    <section class="relative py-12 px-6 lg:px-16 overflow-hidden hero-banner-section" data-animate="fade-up">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img 
                src="https://ik.imagekit.io/AthaConstruction/assets/pexels-ansar-muhammad-380085065-23916862_694fb6c25a2ec1.73279304_WM5zT6f4f.jpg" 
                alt="Interior Design Blog"
                class="w-full h-full object-cover"
                loading="eager"
            />
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="text-center max-w-4xl mx-auto">
                {{-- Subheading Badge --}}
                <p 
                    class="text-[#D4AF37] tracking-[0.3em] uppercase text-xs mb-3 font-medium"
                    style="font-family: 'Satoshi', sans-serif;"
                    data-animate="fade-up"
                    data-delay="0.1"
                >
                    Latest Insights
                </p>

                {{-- Main Heading --}}
                <h1
                    class="font-light text-4xl md:text-5xl lg:text-6xl text-white leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    data-animate="fade-up"
                    data-delay="0.2"
                >
                    Our Blog
                </h1>

                {{-- Primary Divider --}}
                <div 
                    class="w-20 h-px bg-gradient-to-r from-[#D4AF37] to-transparent mx-auto mb-6"
                    data-animate="fade-up"
                    data-delay="0.3"
                ></div>

                {{-- Description --}}
                <p 
                    class="max-w-4xl mx-auto text-white text-base md:text-lg leading-relaxed mb-8"
                    style="font-family: 'Satoshi', sans-serif;"
                    data-animate="fade-up"
                    data-delay="0.4"
                >
                    Discover the latest trends, expert tips, and inspiring ideas for transforming your space into a masterpiece of modern elegance.
                </p>
            </div>
        </div>
    </section>

    {{-- Featured Blogs Section --}}
    @if($featuredBlogs->count() > 0)
    <section class="relative py-12 px-6 lg:px-16 overflow-hidden bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h2 
                    class="font-light text-2xl md:text-3xl text-theme-primary leading-tight mb-2"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    data-animate="fade-up"
                >
                    Featured Articles
                </h2>
                <div class="w-16 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                @foreach($featuredBlogs as $index => $blog)
                    <article 
                        class="featured-blog-card group bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                        data-animate="fade-up"
                        data-delay="{{ 0.1 * ($index + 1) }}"
                    >
                        {{-- Blog Image --}}
                        <a href="{{ route('blog.detail', $blog) }}" class="block relative overflow-hidden bg-gray-200 aspect-[4/3]">
                            <img 
                                src="{{ $blog->getImageUrl() }}" 
                                alt="{{ $blog->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                loading="lazy"
                            />
                            {{-- Overlay on Hover --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>

                        {{-- Blog Content --}}
                        <div class="p-6">
                            {{-- Date --}}
                            <p class="text-xs text-gray-500 mb-2" style="font-family: 'Satoshi', sans-serif;">
                                {{ $blog->created_at->format('M d, Y') }}
                            </p>

                            {{-- Title --}}
                            <h3 class="font-light text-xl text-theme-primary leading-tight mb-3 group-hover:text-[var(--color-primary)] transition-colors" style="font-family: 'Canela Text Trial', serif;">
                                <a href="{{ route('blog.detail', $blog) }}" class="line-clamp-2">
                                    {{ $blog->title }}
                                </a>
                            </h3>

                            {{-- Excerpt --}}
                            @if($blog->excerpt)
                                <p class="text-sm text-gray-600 leading-relaxed mb-4 line-clamp-3" style="font-family: 'Satoshi', sans-serif;">
                                    {{ $blog->excerpt }}
                                </p>
                            @endif

                            {{-- Read More Link --}}
                            <a href="{{ route('blog.detail', $blog) }}" class="inline-flex items-center gap-2 text-sm font-medium text-[var(--color-primary)] hover:text-[var(--color-secondary)] transition-colors group/link" style="font-family: 'Satoshi', sans-serif;">
                                <span>Read More</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- All Blogs Grid Section --}}
    <section class="relative py-12 px-6 lg:px-16 overflow-hidden bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h2 
                    class="font-light text-2xl md:text-3xl text-theme-primary leading-tight mb-2"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    data-animate="fade-up"
                >
                    All Articles
                </h2>
                <div class="w-16 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent"></div>
            </div>

            @if($blogs->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach($blogs as $index => $blog)
                        <article 
                            class="blog-card group bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                            data-animate="fade-up"
                            data-delay="{{ 0.05 * ($index % 6) }}"
                        >
                            {{-- Blog Image --}}
                            <a href="{{ route('blog.detail', $blog) }}" class="block relative overflow-hidden bg-gray-200 aspect-[4/3]">
                                <img 
                                    src="{{ $blog->getImageUrl() }}" 
                                    alt="{{ $blog->title }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    loading="lazy"
                                />
                                {{-- Overlay on Hover --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </a>

                            {{-- Blog Content --}}
                            <div class="p-5 sm:p-6">
                                {{-- Date --}}
                                <p class="text-xs text-gray-500 mb-2" style="font-family: 'Satoshi', sans-serif;">
                                    {{ $blog->created_at->format('M d, Y') }}
                                </p>

                                {{-- Title --}}
                                <h3 class="font-light text-lg sm:text-xl text-theme-primary leading-tight mb-3 group-hover:text-[var(--color-primary)] transition-colors" style="font-family: 'Canela Text Trial', serif;">
                                    <a href="{{ route('blog.detail', $blog) }}" class="line-clamp-2">
                                        {{ $blog->title }}
                                    </a>
                                </h3>

                                {{-- Excerpt --}}
                                @if($blog->excerpt)
                                    <p class="text-sm text-gray-600 leading-relaxed mb-4 line-clamp-3" style="font-family: 'Satoshi', sans-serif;">
                                        {{ $blog->excerpt }}
                                    </p>
                                @endif

                                {{-- Read More Link --}}
                                <a href="{{ route('blog.detail', $blog) }}" class="inline-flex items-center gap-2 text-sm font-medium text-[var(--color-primary)] hover:text-[var(--color-secondary)] transition-colors group/link" style="font-family: 'Satoshi', sans-serif;">
                                    <span>Read More</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($blogs->hasPages())
                    <div class="mt-12 flex justify-center">
                        <div class="pagination-wrapper">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                @endif
            @else
                <div class="text-center py-16">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2" style="font-family: 'Canela Text Trial', serif;">No blogs found</h3>
                    <p class="text-sm text-gray-600" style="font-family: 'Satoshi', sans-serif;">Check back soon for new articles.</p>
                </div>
            @endif
        </div>
    </section>

</x-layouts.app>

{{-- Blog Page Styles --}}
<style>
    .featured-blog-card,
    .blog-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .featured-blog-card:hover,
    .blog-card:hover {
        transform: translateY(-4px);
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Pagination Styles */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pagination-wrapper .pagination {
        display: flex;
        gap: 0.5rem;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination-wrapper .pagination li {
        display: inline-block;
    }

    .pagination-wrapper .pagination a,
    .pagination-wrapper .pagination span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 2.5rem;
        height: 2.5rem;
        padding: 0 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        font-family: 'Satoshi', sans-serif;
    }

    .pagination-wrapper .pagination a {
        color: var(--color-primary);
        background-color: white;
        border: 1px solid #e5e7eb;
    }

    .pagination-wrapper .pagination a:hover {
        background-color: var(--color-primary);
        color: white;
        border-color: var(--color-primary);
    }

    .pagination-wrapper .pagination .active span {
        background-color: var(--color-primary);
        color: white;
        border-color: var(--color-primary);
    }

    .pagination-wrapper .pagination .disabled span {
        color: #9ca3af;
        background-color: #f3f4f6;
        border-color: #e5e7eb;
        cursor: not-allowed;
    }

    /* Hero Banner Section Styles */
    .hero-banner-section {
        min-height: 40vh;
        display: flex;
        align-items: center;
    }

    .hero-banner-section .absolute img {
        filter: brightness(0.85);
    }

    @media (max-width: 768px) {
        .hero-banner-section {
            min-height: 35vh;
            padding-top: 3rem;
            padding-bottom: 3rem;
        }
    }
</style>

