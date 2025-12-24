<?php

namespace App\Services;

use ImageKit\ImageKit;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Exception;

class ImageKitService
{
    private ImageKit $imageKit;

    public function __construct()
    {
        $this->imageKit = new ImageKit(
            config('imagekit.public_key'),
            config('imagekit.private_key'),
            config('imagekit.url_endpoint')
        );
    }

    /**
     * Upload a file to ImageKit with automatic optimization
     *
     * @param UploadedFile $file
     * @param string|null $folder
     * @param string|null $fileName
     * @param array $options
     * @param bool $optimize Automatically optimize the file
     * @return array
     * @throws Exception
     */
    public function upload(
        UploadedFile $file,
        ?string $folder = null,
        ?string $fileName = null,
        array $options = [],
        bool $optimize = true
    ): array {
        try {
            $folder = $folder ?? config('imagekit.default_folder');
            $fileName = $fileName ?? $this->generateUniqueFileName($file);
            $mimeType = $file->getMimeType();
            $fileType = self::getFileTypeFromMime($mimeType);

            // Read file contents and encode to base64
            $fileContent = file_get_contents($file->getRealPath());
            $base64File = base64_encode($fileContent);

            // Note: We don't apply transformations during upload
            // Transformations are applied on-the-fly when generating URLs
            // This gives us more flexibility and stores the original file

            // Prepare upload options
            $uploadOptions = array_merge([
                'file' => $base64File,
                'fileName' => $fileName,
                'folder' => $folder,
                'useUniqueFileName' => config('imagekit.use_unique_filename', true),
            ], $options);
            
            // Remove transformation if it exists (we don't want it during upload)
            unset($uploadOptions['transformation']);

            // Upload to ImageKit
            $uploadResult = $this->imageKit->upload($uploadOptions);

            // Handle response structure - ImageKit returns either error or result
            if (isset($uploadResult->error) && $uploadResult->error) {
                $errorMessage = is_object($uploadResult->error) 
                    ? ($uploadResult->error->message ?? 'Unknown error')
                    : $uploadResult->error;
                throw new Exception('ImageKit upload error: ' . $errorMessage);
            }

            // Extract result data (response might be wrapped in 'result' property)
            $result = isset($uploadResult->result) ? $uploadResult->result : $uploadResult;

            return [
                'success' => true,
                'url' => $result->url ?? null,
                'fileId' => $result->fileId ?? null,
                'name' => $result->name ?? $fileName,
                'size' => $result->size ?? $file->getSize(),
                'fileType' => $result->fileType ?? $file->getMimeType(),
                'width' => $result->width ?? null,
                'height' => $result->height ?? null,
            ];
        } catch (Exception $e) {
            Log::error('ImageKit upload failed: ' . $e->getMessage(), [
                'file' => $file->getClientOriginalName(),
                'error' => $e->getMessage(),
            ]);

            throw new Exception('Failed to upload file to ImageKit: ' . $e->getMessage());
        }
    }

    /**
     * Delete a file from ImageKit
     *
     * @param string $fileId
     * @return bool
     * @throws Exception
     */
    public function delete(string $fileId): bool
    {
        try {
            $deleteResult = $this->imageKit->deleteFile($fileId);

            if (isset($deleteResult->error)) {
                throw new Exception('ImageKit delete error: ' . $deleteResult->error->message);
            }

            return true;
        } catch (Exception $e) {
            Log::error('ImageKit delete failed: ' . $e->getMessage(), [
                'fileId' => $fileId,
                'error' => $e->getMessage(),
            ]);

            throw new Exception('Failed to delete file from ImageKit: ' . $e->getMessage());
        }
    }

    /**
     * Get file details from ImageKit
     *
     * @param string $fileId
     * @return array|null
     * @throws Exception
     */
    public function getFileDetails(string $fileId): ?array
    {
        try {
            $fileDetails = $this->imageKit->getFileDetails($fileId);

            if (isset($fileDetails->error)) {
                throw new Exception('ImageKit get file details error: ' . $fileDetails->error->message);
            }

            return [
                'fileId' => $fileDetails->fileId ?? null,
                'name' => $fileDetails->name ?? null,
                'url' => $fileDetails->url ?? null,
                'size' => $fileDetails->size ?? null,
                'fileType' => $fileDetails->fileType ?? null,
                'width' => $fileDetails->width ?? null,
                'height' => $fileDetails->height ?? null,
                'folderPath' => $fileDetails->folderPath ?? null,
            ];
        } catch (Exception $e) {
            Log::error('ImageKit get file details failed: ' . $e->getMessage(), [
                'fileId' => $fileId,
                'error' => $e->getMessage(),
            ]);

            return null;
        }
    }

    /**
     * Generate a unique file name
     *
     * @param UploadedFile $file
     * @return string
     */
    private function generateUniqueFileName(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension();
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $sanitizedName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $originalName);
        $uniqueId = uniqid('', true);
        
        return $sanitizedName . '_' . $uniqueId . '.' . $extension;
    }

    /**
     * Get file type based on mime type
     *
     * @param string $mimeType
     * @return string
     */
    public static function getFileTypeFromMime(string $mimeType): string
    {
        if (str_starts_with($mimeType, 'image/')) {
            if ($mimeType === 'image/svg+xml') {
                return 'svg';
            }
            return 'image';
        }

        if (str_starts_with($mimeType, 'video/')) {
            return 'video';
        }

        if ($mimeType === 'application/pdf') {
            return 'pdf';
        }

        if (in_array($mimeType, [
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'text/plain',
        ])) {
            return 'document';
        }

        return 'file';
    }

    /**
     * Check if file type is an icon (small image files)
     *
     * @param UploadedFile $file
     * @return bool
     */
    public static function isIcon(UploadedFile $file): bool
    {
        $mimeType = $file->getMimeType();
        $size = $file->getSize();

        // Icons are typically small image files (< 500KB)
        return str_starts_with($mimeType, 'image/') && $size < 512000;
    }

    /**
     * Get optimized URL for an image with transformations
     *
     * @param string $url Original ImageKit URL
     * @param array $transformations ImageKit transformations
     * @return string Optimized URL
     */
    public function getOptimizedUrl(string $url, array $transformations = []): string
    {
        if (empty($transformations)) {
            return $url;
        }

        // Build transformation string using ImageKit's URL format
        $transformationString = $this->buildTransformationString($transformations);
        
        if (empty($transformationString)) {
            return $url;
        }

        // ImageKit URL structure: https://ik.imagekit.io/your_id/tr:w-300,h-200,q-80/image.jpg
        $urlParts = parse_url($url);
        $path = trim($urlParts['path'] ?? '', '/');
        
        // Check if transformation already exists in path
        if (str_contains($path, '/tr:')) {
            // Extract the base path and merge transformations
            $pathParts = explode('/tr:', $path, 2);
            $basePath = $pathParts[0];
            $existingTransform = isset($pathParts[1]) ? explode('/', $pathParts[1])[0] : '';
            
            if ($existingTransform) {
                $transformationString = $existingTransform . ',' . $transformationString;
            }
            
            $filename = substr(strstr($path, '/tr:'), strlen('/tr:' . $existingTransform) + 1);
            
            return ($urlParts['scheme'] ?? 'https') . '://' . ($urlParts['host'] ?? '') 
                . '/' . $basePath . '/tr:' . $transformationString . '/' . $filename;
        }

        // Insert transformation before filename
        $pathParts = explode('/', $path);
        $filename = array_pop($pathParts);
        $pathPrefix = implode('/', $pathParts);
        
        $baseUrl = ($urlParts['scheme'] ?? 'https') . '://' . ($urlParts['host'] ?? '');
        
        if ($pathPrefix) {
            return $baseUrl . '/' . $pathPrefix . '/tr:' . $transformationString . '/' . $filename;
        }
        
        return $baseUrl . '/tr:' . $transformationString . '/' . $filename;
    }

    /**
     * Get optimized image URL with automatic format conversion and compression
     *
     * @param string $url Original ImageKit URL
     * @param int|null $width Optional width
     * @param int|null $height Optional height
     * @param string|null $format Optional format (auto, webp, avif, jpg, png)
     * @param int|null $quality Optional quality (1-100)
     * @return string Optimized URL
     */
    public function getOptimizedImageUrl(
        string $url,
        ?int $width = null,
        ?int $height = null,
        ?string $format = null,
        ?int $quality = null
    ): string {
        $transformations = [];

        // Add dimensions
        if ($width !== null) {
            $transformations['w'] = $width;
        }
        if ($height !== null) {
            $transformations['h'] = $height;
        }

        // Add format (auto-detect best format for browser)
        $format = $format ?? config('imagekit.image_format', 'auto');
        if ($format === 'auto') {
            // Let ImageKit auto-select best format (WebP/AVIF based on browser)
            // ImageKit uses 'f-auto' for automatic format selection
            $transformations['f-auto'] = 'true';
        } else {
            $transformations['f'] = $format;
        }

        // Add quality
        $quality = $quality ?? config('imagekit.image_quality', 80);
        $transformations['q'] = $quality;

        // Progressive JPEG for better perceived performance
        if ($format === 'auto' || $format === 'jpg' || $format === 'jpeg') {
            $transformations['pr'] = 'true'; // Progressive
        }

        return $this->getOptimizedUrl($url, $transformations);
    }

    /**
     * Get responsive image URLs for srcset
     *
     * @param string $url Original ImageKit URL
     * @param array $breakpoints Array of widths
     * @param string|null $format Optional format
     * @param int|null $quality Optional quality
     * @return array Array of URLs with widths ['320' => 'url', '640' => 'url', ...]
     */
    public function getResponsiveImageUrls(
        string $url,
        array $breakpoints = [],
        ?string $format = null,
        ?int $quality = null
    ): array {
        $breakpoints = $breakpoints ?: config('imagekit.responsive_breakpoints', [320, 640, 768, 1024, 1280, 1920]);
        $responsiveUrls = [];

        foreach ($breakpoints as $width) {
            $responsiveUrls[$width] = $this->getOptimizedImageUrl($url, $width, null, $format, $quality);
        }

        return $responsiveUrls;
    }

    /**
     * Get optimized video URL
     *
     * @param string $url Original ImageKit URL
     * @param int|null $width Optional width
     * @param int|null $height Optional height
     * @param string|null $quality Optional quality (low, medium, high, auto)
     * @param string|null $format Optional format (auto, mp4, webm)
     * @return string Optimized URL
     */
    public function getOptimizedVideoUrl(
        string $url,
        ?int $width = null,
        ?int $height = null,
        ?string $quality = null,
        ?string $format = null
    ): string {
        $transformations = [];

        if ($width !== null) {
            $transformations['w'] = $width;
        }
        if ($height !== null) {
            $transformations['h'] = $height;
        }

        $quality = $quality ?? config('imagekit.video_quality', 'medium');
        $format = $format ?? config('imagekit.video_format', 'auto');

        if ($format !== 'auto') {
            $transformations['f'] = $format;
        }
        
        // Video quality settings
        $transformations['q'] = $quality;

        return $this->getOptimizedUrl($url, $transformations);
    }

    /**
     * Get optimization options for upload based on file type
     *
     * @param string $fileType
     * @param string $mimeType
     * @return array
     */
    private function getOptimizationOptions(string $fileType, string $mimeType): array
    {
        $options = [];

        if ($fileType === 'image' || $fileType === 'icon') {
            // Image optimization
            $options['transformation'] = [
                'quality' => config('imagekit.image_quality', 80),
                'format' => config('imagekit.image_format', 'auto') === 'auto' ? null : config('imagekit.image_format'),
                'progressive' => config('imagekit.image_compression') === 'progressive',
            ];

            // Remove null values
            $options['transformation'] = array_filter($options['transformation'], fn($v) => $v !== null);
        } elseif ($fileType === 'video') {
            // Video optimization
            $options['transformation'] = [
                'quality' => config('imagekit.video_quality', 'medium'),
            ];
        }

        return $options;
    }

    /**
     * Build transformation string from array
     * ImageKit format: w-300,h-200,q-80,f-webp
     *
     * @param array $transformations
     * @return string
     */
    private function buildTransformationString(array $transformations): string
    {
        $parts = [];

        foreach ($transformations as $key => $value) {
            if ($value !== null && $value !== '' && $value !== false) {
                // Handle boolean values
                if ($value === true) {
                    $parts[] = $key;
                } else {
                    $parts[] = $key . '-' . $value;
                }
            }
        }

        return implode(',', $parts);
    }

    /**
     * Generate srcset attribute string for responsive images
     *
     * @param string $url Original ImageKit URL
     * @param array $breakpoints Array of widths
     * @param string|null $format Optional format
     * @param int|null $quality Optional quality
     * @return string srcset attribute value
     */
    public function getSrcSet(string $url, array $breakpoints = [], ?string $format = null, ?int $quality = null): string
    {
        $responsiveUrls = $this->getResponsiveImageUrls($url, $breakpoints, $format, $quality);
        $srcsetParts = [];

        foreach ($responsiveUrls as $width => $responsiveUrl) {
            $srcsetParts[] = $responsiveUrl . ' ' . $width . 'w';
        }

        return implode(', ', $srcsetParts);
    }

    /**
     * Get thumbnail URL with automatic sizing
     *
     * @param string $url Original ImageKit URL
     * @param int $size Thumbnail size (width and height)
     * @param string $mode Crop mode (maintain_ratio, force, at_least, at_max)
     * @return string Thumbnail URL
     */
    public function getThumbnailUrl(string $url, int $size = 300, string $mode = 'maintain_ratio'): string
    {
        $transformations = [
            'w' => $size,
            'h' => $size,
            'c' => $mode, // c = crop mode
            'q' => config('imagekit.image_quality', 80),
        ];

        // Add auto format
        if (config('imagekit.image_format', 'auto') === 'auto') {
            $transformations['f-auto'] = 'true';
        }

        return $this->getOptimizedUrl($url, $transformations);
    }
}

