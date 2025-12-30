@php
    $blogImage = $blog->getImageUrl();
    $blogUrl = route('blog.detail', $blog);
    $siteName = $theme['settings']['site_name'] ?? 'Nesthetix Designs';
    $siteUrl = url('/');
@endphp

<x-layouts.app 
    title="{{ $blog->title }} | {{ $siteName }}"
    description="{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 160) }}"
    canonical="{{ $blogUrl }}"
    ogImage="{{ $blogImage }}"
    ogType="article">
    
    {{-- Breadcrumb --}}
    <section class="relative py-4 px-6 lg:px-16 bg-white border-b border-gray-100">
        <div class="max-w-4xl mx-auto">
            <nav class="flex items-center gap-2 text-sm" style="font-family: 'Satoshi', sans-serif;" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-[var(--color-primary)] transition-colors">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('blog') }}" class="text-gray-500 hover:text-[var(--color-primary)] transition-colors">Blog</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-700 line-clamp-1">{{ $blog->title }}</span>
            </nav>
        </div>
    </section>

    {{-- Blog Header --}}
    <article class="blog-detail-page">
        <div class="max-w-4xl mx-auto px-6 lg:px-16 py-12">
            {{-- Blog Meta --}}
            <div class="mb-6" data-animate="fade-up">
                <div class="flex items-center gap-4 text-sm text-gray-500 mb-4" style="font-family: 'Satoshi', sans-serif;">
                    <time datetime="{{ $blog->created_at->toIso8601String() }}" class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $blog->created_at->format('F d, Y') }}
                    </time>
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        {{ $siteName }}
                    </span>
                </div>

                {{-- Blog Title --}}
                <h1 
                    class="font-light text-3xl md:text-4xl lg:text-5xl text-theme-primary leading-tight mb-4"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    data-animate="fade-up"
                    data-delay="0.1"
                >
                    {{ $blog->title }}
                </h1>

                {{-- Divider --}}
                <div 
                    class="w-20 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent mb-6"
                    data-animate="fade-up"
                    data-delay="0.2"
                ></div>

                {{-- Excerpt --}}
                @if($blog->excerpt)
                    <p 
                        class="text-lg text-gray-700 leading-relaxed mb-8"
                        style="font-family: 'Satoshi', sans-serif;"
                        data-animate="fade-up"
                        data-delay="0.3"
                    >
                        {{ $blog->excerpt }}
                    </p>
                @endif
            </div>

            {{-- Featured Image --}}
            <div class="mb-10" data-animate="fade-up" data-delay="0.4">
                <img 
                    src="{{ $blogImage }}" 
                    alt="{{ $blog->title }}"
                    class="w-full h-auto rounded-lg shadow-lg object-cover"
                    loading="eager"
                />
            </div>

            {{-- Blog Content --}}
            <div 
                class="blog-content prose prose-lg max-w-none"
                data-animate="fade-up"
                data-delay="0.5"
            >
                {!! $blog->content !!}
            </div>

            {{-- Share Section --}}
            <div class="mt-12 pt-8 border-t border-gray-200" data-animate="fade-up" data-delay="0.6">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 mb-3" style="font-family: 'Satoshi', sans-serif;">Share this article</h3>
                        <div class="flex items-center gap-3">
                            <a 
                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($blogUrl) }}" 
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 hover:bg-[var(--color-primary)] hover:text-white transition-all duration-300 text-gray-600"
                                aria-label="Share on Facebook"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a 
                                href="https://twitter.com/intent/tweet?url={{ urlencode($blogUrl) }}&text={{ urlencode($blog->title) }}" 
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 hover:bg-[var(--color-primary)] hover:text-white transition-all duration-300 text-gray-600"
                                aria-label="Share on Twitter"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                            </a>
                            <a 
                                href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($blogUrl) }}" 
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 hover:bg-[var(--color-primary)] hover:text-white transition-all duration-300 text-gray-600"
                                aria-label="Share on LinkedIn"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <button 
                                onclick="navigator.share({title: '{{ $blog->title }}', url: '{{ $blogUrl }}'})"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 hover:bg-[var(--color-primary)] hover:text-white transition-all duration-300 text-gray-600"
                                aria-label="Share"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <a 
                        href="{{ route('blog') }}" 
                        class="inline-flex items-center gap-2 text-sm font-medium text-[var(--color-primary)] hover:text-[var(--color-secondary)] transition-colors"
                        style="font-family: 'Satoshi', sans-serif;"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Back to Blog
                    </a>
                </div>
            </div>
        </div>
    </article>

    {{-- Related Blogs Section --}}
    @if($relatedBlogs->count() > 0)
    <section class="relative py-12 px-6 lg:px-16 overflow-hidden bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h2 
                    class="font-light text-2xl md:text-3xl text-theme-primary leading-tight mb-2"
                    style="font-family: 'Canela Text Trial', serif; letter-spacing: -0.02em;"
                    data-animate="fade-up"
                >
                    Related Articles
                </h2>
                <div class="w-16 h-px bg-gradient-to-r from-[var(--color-primary)] to-transparent"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach($relatedBlogs as $index => $relatedBlog)
                    <article 
                        class="blog-card group bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100"
                        data-animate="fade-up"
                        data-delay="{{ 0.1 * ($index + 1) }}"
                    >
                        {{-- Blog Image --}}
                        <a href="{{ route('blog.detail', $relatedBlog) }}" class="block relative overflow-hidden bg-gray-200 aspect-[4/3]">
                            <img 
                                src="{{ $relatedBlog->getImageUrl() }}" 
                                alt="{{ $relatedBlog->title }}"
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
                                {{ $relatedBlog->created_at->format('M d, Y') }}
                            </p>

                            {{-- Title --}}
                            <h3 class="font-light text-lg sm:text-xl text-theme-primary leading-tight mb-3 group-hover:text-[var(--color-primary)] transition-colors" style="font-family: 'Canela Text Trial', serif;">
                                <a href="{{ route('blog.detail', $relatedBlog) }}" class="line-clamp-2">
                                    {{ $relatedBlog->title }}
                                </a>
                            </h3>

                            {{-- Excerpt --}}
                            @if($relatedBlog->excerpt)
                                <p class="text-sm text-gray-600 leading-relaxed mb-4 line-clamp-3" style="font-family: 'Satoshi', sans-serif;">
                                    {{ $relatedBlog->excerpt }}
                                </p>
                            @endif

                            {{-- Read More Link --}}
                            <a href="{{ route('blog.detail', $relatedBlog) }}" class="inline-flex items-center gap-2 text-sm font-medium text-[var(--color-primary)] hover:text-[var(--color-secondary)] transition-colors group/link" style="font-family: 'Satoshi', sans-serif;">
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

</x-layouts.app>

{{-- Blog Detail Page Styles --}}
<style>
    .blog-detail-page {
        background: white;
    }

    .blog-content {
        color: #374151;
        line-height: 1.8;
    }

    .blog-content h1,
    .blog-content h2,
    .blog-content h3,
    .blog-content h4 {
        font-family: 'Canela Text Trial', serif;
        color: var(--color-primary);
        font-weight: 300;
        letter-spacing: -0.02em;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .blog-content h1 {
        font-size: 2.25rem;
    }

    .blog-content h2 {
        font-size: 1.875rem;
    }

    .blog-content h3 {
        font-size: 1.5rem;
    }

    .blog-content p {
        font-family: 'Satoshi', sans-serif;
        margin-bottom: 1.5rem;
        font-size: 1.125rem;
        line-height: 1.8;
    }

    .blog-content ul,
    .blog-content ol {
        font-family: 'Satoshi', sans-serif;
        margin-bottom: 1.5rem;
        padding-left: 1.5rem;
    }

    .blog-content li {
        margin-bottom: 0.75rem;
        font-size: 1.125rem;
        line-height: 1.8;
    }

    .blog-content a {
        color: var(--color-primary);
        text-decoration: underline;
        transition: color 0.3s ease;
    }

    .blog-content a:hover {
        color: var(--color-secondary);
    }

    .blog-content strong {
        font-weight: 600;
        color: var(--color-primary);
    }

    .blog-content img {
        border-radius: 0.5rem;
        margin: 2rem 0;
        max-width: 100%;
        height: auto;
    }

    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
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

    .blog-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .blog-card:hover {
        transform: translateY(-4px);
    }
</style>

{{-- Structured Data (JSON-LD) for SEO --}}
@php
    $structuredData = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $blog->title,
        'description' => $blog->excerpt ?? Str::limit(strip_tags($blog->content), 160),
        'image' => $blogImage,
        'datePublished' => $blog->created_at->toIso8601String(),
        'dateModified' => $blog->updated_at->toIso8601String(),
        'author' => [
            '@type' => 'Organization',
            'name' => $siteName,
            'url' => $siteUrl,
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => $siteName,
            'url' => $siteUrl,
            'logo' => [
                '@type' => 'ImageObject',
                'url' => $theme['branding']['logo_primary_url'] ?? $siteUrl . '/images/logo.png',
            ],
        ],
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => $blogUrl,
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

