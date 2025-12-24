<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ImageKit Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for ImageKit file storage and CDN service.
    |
    */

    'public_key' => env('IMAGEKIT_PUBLIC_KEY'),
    'private_key' => env('IMAGEKIT_PRIVATE_KEY'),
    'url_endpoint' => env('IMAGEKIT_URL_ENDPOINT'),

    /*
    |--------------------------------------------------------------------------
    | Default Upload Options
    |--------------------------------------------------------------------------
    |
    | Default options for file uploads to ImageKit.
    |
    */

    'default_folder' => env('IMAGEKIT_FOLDER', 'assets'),
    'use_unique_filename' => env('IMAGEKIT_UNIQUE_FILENAME', true),
    'transformation_position' => 'path', // 'path' or 'query'

    /*
    |--------------------------------------------------------------------------
    | Optimization Settings
    |--------------------------------------------------------------------------
    |
    | Default optimization settings for images and videos.
    |
    */

    // Image optimization defaults
    'image_quality' => env('IMAGEKIT_IMAGE_QUALITY', 80), // 1-100, lower = smaller file
    'image_format' => env('IMAGEKIT_IMAGE_FORMAT', 'auto'), // auto, webp, avif, jpg, png
    'image_compression' => env('IMAGEKIT_IMAGE_COMPRESSION', 'progressive'), // progressive, lossy, lossless

    // Video optimization defaults
    'video_quality' => env('IMAGEKIT_VIDEO_QUALITY', 'medium'), // low, medium, high, auto
    'video_format' => env('IMAGEKIT_VIDEO_FORMAT', 'auto'), // auto, mp4, webm

    // Responsive image breakpoints (widths in pixels)
    'responsive_breakpoints' => [
        320,   // Mobile small
        640,   // Mobile large
        768,   // Tablet
        1024,  // Desktop small
        1280,  // Desktop medium
        1920,  // Desktop large
        2560,  // Desktop 4K
    ],

    // Enable automatic optimization on upload
    'auto_optimize' => env('IMAGEKIT_AUTO_OPTIMIZE', true),

    // Enable lazy loading by default
    'lazy_loading' => env('IMAGEKIT_LAZY_LOADING', true),
];

