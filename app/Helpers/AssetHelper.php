<?php

if (!function_exists('asset_url')) {
    /**
     * Get optimized asset URL
     *
     * @param int|string|\App\Models\Asset $asset Asset ID, file_path_url, or Asset model
     * @param int|null $width
     * @param int|null $height
     * @param string|null $format
     * @param int|null $quality
     * @return string
     */
    function asset_url($asset, ?int $width = null, ?int $height = null, ?string $format = null, ?int $quality = null): string
    {
        if ($asset instanceof \App\Models\Asset) {
            return $asset->getOptimizedUrl($width, $height, $format, $quality);
        }

        if (is_numeric($asset)) {
            $asset = \App\Models\Asset::find($asset);
            if ($asset) {
                return $asset->getOptimizedUrl($width, $height, $format, $quality);
            }
        }

        // If it's already a URL string, return it
        if (is_string($asset)) {
            if (filter_var($asset, FILTER_VALIDATE_URL)) {
                $imageKitService = app(\App\Services\ImageKitService::class);
                return $imageKitService->getOptimizedImageUrl($asset, $width, $height, $format, $quality);
            }
        }

        return $asset;
    }
}

if (!function_exists('asset_srcset')) {
    /**
     * Get responsive image srcset for an asset
     *
     * @param int|string|\App\Models\Asset $asset
     * @param array $breakpoints
     * @param string|null $format
     * @param int|null $quality
     * @return string
     */
    function asset_srcset($asset, array $breakpoints = [], ?string $format = null, ?int $quality = null): string
    {
        if ($asset instanceof \App\Models\Asset) {
            return $asset->getSrcSet($breakpoints, $format, $quality);
        }

        if (is_numeric($asset)) {
            $asset = \App\Models\Asset::find($asset);
            if ($asset) {
                return $asset->getSrcSet($breakpoints, $format, $quality);
            }
        }

        if (is_string($asset) && filter_var($asset, FILTER_VALIDATE_URL)) {
            $imageKitService = app(\App\Services\ImageKitService::class);
            return $imageKitService->getSrcSet($asset, $breakpoints, $format, $quality);
        }

        return '';
    }
}

if (!function_exists('asset_thumbnail')) {
    /**
     * Get thumbnail URL for an asset
     *
     * @param int|string|\App\Models\Asset $asset
     * @param int $size
     * @param string $mode
     * @return string
     */
    function asset_thumbnail($asset, int $size = 300, string $mode = 'maintain_ratio'): string
    {
        if ($asset instanceof \App\Models\Asset) {
            return $asset->getThumbnailUrl($size, $mode);
        }

        if (is_numeric($asset)) {
            $asset = \App\Models\Asset::find($asset);
            if ($asset) {
                return $asset->getThumbnailUrl($size, $mode);
            }
        }

        if (is_string($asset) && filter_var($asset, FILTER_VALIDATE_URL)) {
            $imageKitService = app(\App\Services\ImageKitService::class);
            return $imageKitService->getThumbnailUrl($asset, $size, $mode);
        }

        return is_string($asset) ? $asset : '';
    }
}

