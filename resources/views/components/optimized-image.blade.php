@props([
    'asset', // Asset model, ID, or URL string
    'width' => null,
    'height' => null,
    'format' => null,
    'quality' => null,
    'alt' => '',
    'class' => '',
    'lazy' => true,
    'responsive' => false,
    'breakpoints' => [],
])

@php
    // Get the URL based on asset type
    if ($asset instanceof \App\Models\Asset) {
        $imageUrl = $asset->getOptimizedUrl($width, $height, $format, $quality);
        $srcset = $responsive ? $asset->getSrcSet($breakpoints, $format, $quality) : '';
        $alt = $alt ?: $asset->title;
    } elseif (is_numeric($asset)) {
        $assetModel = \App\Models\Asset::find($asset);
        if ($assetModel) {
            $imageUrl = $assetModel->getOptimizedUrl($width, $height, $format, $quality);
            $srcset = $responsive ? $assetModel->getSrcSet($breakpoints, $format, $quality) : '';
            $alt = $alt ?: $assetModel->title;
        } else {
            $imageUrl = '';
            $srcset = '';
        }
    } else {
        // Assume it's a URL string
        $imageKitService = app(\App\Services\ImageKitService::class);
        $imageUrl = $imageKitService->getOptimizedImageUrl($asset, $width, $height, $format, $quality);
        $srcset = $responsive ? $imageKitService->getSrcSet($asset, $breakpoints, $format, $quality) : '';
    }
@endphp

@if($imageUrl)
    <img 
        src="{{ $imageUrl }}"
        @if($srcset) srcset="{{ $srcset }}" sizes="(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw" @endif
        alt="{{ $alt }}"
        class="{{ $class }}"
        @if($lazy) loading="lazy" @endif
        @if($width) width="{{ $width }}" @endif
        @if($height) height="{{ $height }}" @endif
        {{ $attributes }}
    />
@endif

