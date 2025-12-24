# ImageKit Storage Optimization Guide

## Overview

The ImageKit storage system is fully optimized for fast, lightweight file storage and retrieval with automatic compression, format conversion, and responsive image support.

## Features

### ✅ Automatic Image Optimization
- **Format Conversion**: Automatically converts images to WebP/AVIF based on browser support
- **Compression**: Intelligent quality optimization (default: 80%)
- **Progressive JPEG**: Better perceived performance
- **Size Optimization**: Automatic dimension resizing

### ✅ Video Optimization
- Automatic format optimization (MP4/WebM)
- Quality presets (low, medium, high, auto)
- Dimension resizing

### ✅ Responsive Images
- Automatic srcset generation
- Multiple breakpoint support
- Lazy loading enabled by default

### ✅ Lightweight & Fast
- CDN-powered delivery
- Browser caching
- On-the-fly transformations
- No storage overhead for variants

## Usage

### Basic Image Upload

```php
use App\Services\ImageKitService;
use Illuminate\Http\Request;

public function store(Request $request, ImageKitService $imageKit)
{
    $file = $request->file('file');
    
    // Upload with automatic optimization
    $result = $imageKit->upload($file);
    
    // Returns optimized URL automatically
    $url = $result['url'];
}
```

### Getting Optimized URLs

#### Using Asset Model

```php
$asset = Asset::find(1);

// Get optimized URL with specific dimensions
$optimizedUrl = $asset->getOptimizedUrl(width: 800, height: 600);

// Get thumbnail
$thumbnail = $asset->getThumbnailUrl(size: 300);

// Get responsive srcset
$srcset = $asset->getSrcSet();
```

#### Using Helper Functions

```php
// Optimized image URL
$url = asset_url($asset, width: 800, height: 600, format: 'webp', quality: 85);

// Responsive srcset
$srcset = asset_srcset($asset, breakpoints: [320, 640, 1024, 1920]);

// Thumbnail
$thumbnail = asset_thumbnail($asset, size: 300);
```

#### Using Blade Component

```blade
{{-- Basic optimized image --}}
<x-optimized-image :asset="$asset" width="800" height="600" alt="Description" />

{{-- Responsive image with srcset --}}
<x-optimized-image 
    :asset="$asset" 
    :responsive="true"
    :breakpoints="[320, 640, 1024, 1920]"
    alt="Description"
    class="w-full h-auto"
/>

{{-- Lazy loaded with custom quality --}}
<x-optimized-image 
    :asset="$asset" 
    :lazy="true"
    :quality="90"
    format="webp"
    alt="Description"
/>
```

### Direct Service Usage

```php
use App\Services\ImageKitService;

$imageKit = app(ImageKitService::class);

// Optimized image URL
$url = $imageKit->getOptimizedImageUrl(
    url: 'https://ik.imagekit.io/your_id/image.jpg',
    width: 800,
    height: 600,
    format: 'auto', // auto, webp, avif, jpg, png
    quality: 80
);

// Responsive srcset
$srcset = $imageKit->getSrcSet(
    url: 'https://ik.imagekit.io/your_id/image.jpg',
    breakpoints: [320, 640, 1024, 1920],
    format: 'auto',
    quality: 80
);

// Video optimization
$videoUrl = $imageKit->getOptimizedVideoUrl(
    url: 'https://ik.imagekit.io/your_id/video.mp4',
    width: 1280,
    height: 720,
    quality: 'medium',
    format: 'auto'
);
```

## Configuration

### Environment Variables (.env)

```env
# ImageKit Credentials
IMAGEKIT_PUBLIC_KEY=your_public_key
IMAGEKIT_PRIVATE_KEY=your_private_key
IMAGEKIT_URL_ENDPOINT=https://ik.imagekit.io/your_id

# Optimization Settings
IMAGEKIT_IMAGE_QUALITY=80              # 1-100, lower = smaller file
IMAGEKIT_IMAGE_FORMAT=auto             # auto, webp, avif, jpg, png
IMAGEKIT_IMAGE_COMPRESSION=progressive # progressive, lossy, lossless

IMAGEKIT_VIDEO_QUALITY=medium          # low, medium, high, auto
IMAGEKIT_VIDEO_FORMAT=auto             # auto, mp4, webm

IMAGEKIT_AUTO_OPTIMIZE=true            # Enable automatic optimization on upload
IMAGEKIT_LAZY_LOADING=true             # Enable lazy loading by default
IMAGEKIT_FOLDER=assets                 # Default upload folder
IMAGEKIT_UNIQUE_FILENAME=true          # Use unique filenames
```

### Responsive Breakpoints

Default breakpoints are defined in `config/imagekit.php`:
- 320px (Mobile small)
- 640px (Mobile large)
- 768px (Tablet)
- 1024px (Desktop small)
- 1280px (Desktop medium)
- 1920px (Desktop large)
- 2560px (Desktop 4K)

You can customize these in the config file.

## Performance Benefits

### 1. **Automatic Format Conversion**
- Images automatically served as WebP/AVIF to modern browsers
- Falls back to original format for older browsers
- **Result**: 25-35% smaller file sizes

### 2. **Intelligent Compression**
- Quality-based compression (default 80%)
- Maintains visual quality while reducing file size
- **Result**: 30-50% size reduction

### 3. **Progressive JPEG**
- Better perceived performance
- Images appear to load faster
- **Result**: Improved user experience

### 4. **Responsive Images**
- Right-sized images for each device
- Prevents over-downloading on mobile
- **Result**: Faster page loads, less bandwidth

### 5. **CDN Delivery**
- Images served from edge locations
- Global content delivery
- **Result**: Fast load times worldwide

### 6. **On-the-Fly Transformations**
- No storage overhead for variants
- Transformations applied at request time
- **Result**: Unlimited variants, zero storage cost

## Best Practices

### 1. Always Use Optimization

```php
// ✅ Good - Uses optimization
$url = $asset->getOptimizedUrl(width: 800);

// ❌ Bad - Uses original (potentially large) file
$url = $asset->file_path_url;
```

### 2. Use Responsive Images

```blade
{{-- ✅ Good - Responsive with srcset --}}
<x-optimized-image :asset="$asset" :responsive="true" />

{{-- ❌ Bad - Fixed size for all devices --}}
<img src="{{ $asset->file_path_url }}" />
```

### 3. Enable Lazy Loading

```blade
{{-- ✅ Good - Lazy loaded --}}
<x-optimized-image :asset="$asset" :lazy="true" />

{{-- ❌ Bad - Loads immediately --}}
<x-optimized-image :asset="$asset" :lazy="false" />
```

### 4. Set Appropriate Quality

```php
// High quality for hero images
$heroUrl = $asset->getOptimizedUrl(quality: 90);

// Medium quality for thumbnails
$thumbUrl = $asset->getOptimizedUrl(quality: 70);

// Low quality for placeholders
$placeholderUrl = $asset->getOptimizedUrl(quality: 50);
```

### 5. Use Format Auto-Detection

```php
// ✅ Good - Browser picks best format
$url = $asset->getOptimizedUrl(format: 'auto');

// ❌ Less flexible - Forces specific format
$url = $asset->getOptimizedUrl(format: 'webp');
```

## Example Use Cases

### Hero Image with Responsive Srcset

```blade
<x-optimized-image 
    :asset="$heroAsset"
    :responsive="true"
    :breakpoints="[640, 1024, 1920, 2560]"
    alt="Hero Image"
    class="w-full h-auto object-cover"
    :quality="90"
/>
```

### Gallery Thumbnails

```blade
@foreach($assets as $asset)
    <a href="{{ $asset->getOptimizedUrl(width: 1920) }}">
        <img 
            src="{{ $asset->getThumbnailUrl(size: 300) }}" 
            alt="{{ $asset->title }}"
            loading="lazy"
            class="w-full h-auto"
        />
    </a>
@endforeach
```

### Video Player

```php
$videoUrl = $asset->getOptimizedVideoUrl(
    width: 1280,
    height: 720,
    quality: 'high'
);
```

```html
<video controls width="1280" height="720">
    <source src="{{ $videoUrl }}" type="video/mp4">
</video>
```

## Monitoring & Analytics

ImageKit provides built-in analytics for:
- Bandwidth usage
- Request counts
- Cache hit rates
- Transformation performance

Access these in your ImageKit dashboard.

## Summary

The ImageKit storage system provides:
- ✅ **Automatic optimization** on upload and retrieval
- ✅ **Format conversion** (WebP/AVIF)
- ✅ **Responsive images** with srcset
- ✅ **Video optimization**
- ✅ **CDN delivery** for global performance
- ✅ **On-the-fly transformations** (no storage overhead)
- ✅ **Lightweight & fast** retrieval
- ✅ **Easy-to-use** API and Blade components

All optimizations are applied automatically, making it simple to deliver optimized, fast-loading images and videos to your users.

