{{-- ============================================
    LATEST BLOGS SECTION COMPONENT
    Clean, minimalistic blog cards with image and title only
    SEO-optimized internal links
    Usage: <x-latest-blogs />
    ============================================ --}}

@php
    $blogs = \App\Models\Blog::published()->latest()->take(4)->get();
@endphp

@if($blogs->count() > 0)
<section class="latest-blogs-section relative py-16 lg:py-20 px-6 lg:px-16 bg-white">
    <div class="max-w-7xl mx-auto">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <p 
                class="text-theme-muted tracking-[0.3em] uppercase text-xs mb-3 font-medium"
                style="font-family: 'Satoshi', sans-serif;"
            >
                Latest Articles
            </p>
            <h2 
                class="font-light text-3xl md:text-4xl lg:text-5xl text-theme-primary leading-tight mb-4"
                style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
            >
                Our Latest Blogs
            </h2>
            <div class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mx-auto"></div>
        </div>

        {{-- Blogs Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            @foreach($blogs as $index => $blog)
                <article 
                    class="blog-card group"
                    itemscope 
                    itemtype="https://schema.org/BlogPosting"
                >
                    {{-- Blog Image Link --}}
                    <a 
                        href="{{ route('blog.detail', $blog) }}" 
                        class="block relative overflow-hidden bg-gray-100 aspect-[4/3] mb-3 rounded-lg"
                        itemprop="url"
                        aria-label="Read article: {{ $blog->title }}"
                    >
                        <img 
                            src="{{ $blog->getImageUrl() }}" 
                            alt="{{ $blog->title }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            loading="lazy"
                            itemprop="image"
                        />
                    </a>

                    {{-- Blog Title Link --}}
                    <h3 class="font-light text-base md:text-lg text-gray-900 leading-tight" style="font-family: 'Canela Text Trial', serif;">
                        <a 
                            href="{{ route('blog.detail', $blog) }}" 
                            class="line-clamp-2 text-gray-900 hover:text-[var(--color-primary)] transition-colors duration-300"
                            itemprop="headline"
                            title="{{ $blog->title }}"
                        >
                            {{ $blog->title }}
                        </a>
                    </h3>
                    
                    {{-- Hidden SEO Metadata --}}
                    <span style="display: none;" itemprop="datePublished">{{ $blog->created_at->toIso8601String() }}</span>
                    <span style="display: none;" itemprop="dateModified">{{ $blog->updated_at->toIso8601String() }}</span>
                    <span style="display: none;" itemprop="author">{{ $theme['settings']['site_name'] ?? 'Nesthetix Designs' }}</span>
                </article>
            @endforeach
        </div>

        {{-- View All Link --}}
        @if(\App\Models\Blog::published()->count() > 4)
            <div class="text-center mt-12">
                <a 
                    href="{{ route('blog') }}" 
                    class="inline-flex items-center gap-2 px-8 py-3 border border-[var(--color-primary)] text-[var(--color-primary)] rounded-lg hover:bg-[var(--color-primary)] hover:text-white transition-all duration-300 font-medium"
                    style="font-family: 'Satoshi', sans-serif;"
                    aria-label="View all blog articles"
                >
                    <span>View All Blogs</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
</section>
@endif

{{-- Component Styles --}}
<style>
    .latest-blogs-section {
        position: relative;
    }
    
    .blog-card {
        transition: transform 0.3s ease;
    }
    
    .blog-card:hover {
        transform: translateY(-2px);
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        min-height: 3rem;
    }
    
    .blog-card a {
        text-decoration: none;
        display: block;
    }
    
    .blog-card a:hover {
        text-decoration: none;
    }
    
    .blog-card h3 a {
        color: #111827;
    }
    
    .blog-card h3 a:hover {
        color: var(--color-primary);
    }
</style>
