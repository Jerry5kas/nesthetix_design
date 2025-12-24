<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Asset extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'type',
        'file_path_url',
        'file_id',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get file type constants
     */
    public const TYPE_IMAGE = 'image';
    public const TYPE_ICON = 'icon';
    public const TYPE_VIDEO = 'video';
    public const TYPE_DOCUMENT = 'document';
    public const TYPE_PDF = 'pdf';
    public const TYPE_SVG = 'svg';
    public const TYPE_FILE = 'file';

    /**
     * Scope a query to only include active assets.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to filter by type.
     */
    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * Get all available types
     */
    public static function getTypes(): array
    {
        return [
            self::TYPE_IMAGE => 'Image',
            self::TYPE_ICON => 'Icon',
            self::TYPE_VIDEO => 'Video',
            self::TYPE_DOCUMENT => 'Document',
            self::TYPE_PDF => 'PDF',
            self::TYPE_SVG => 'SVG',
            self::TYPE_FILE => 'File',
        ];
    }

    /**
     * Get optimized image URL
     *
     * @param int|null $width
     * @param int|null $height
     * @param string|null $format
     * @param int|null $quality
     * @return string
     */
    public function getOptimizedUrl(?int $width = null, ?int $height = null, ?string $format = null, ?int $quality = null): string
    {
        if (!in_array($this->type, [self::TYPE_IMAGE, self::TYPE_ICON])) {
            return $this->file_path_url;
        }

        $imageKitService = app(\App\Services\ImageKitService::class);
        
        return $imageKitService->getOptimizedImageUrl(
            $this->file_path_url,
            $width,
            $height,
            $format,
            $quality
        );
    }

    /**
     * Get responsive image srcset
     *
     * @param array $breakpoints
     * @param string|null $format
     * @param int|null $quality
     * @return string
     */
    public function getSrcSet(array $breakpoints = [], ?string $format = null, ?int $quality = null): string
    {
        if (!in_array($this->type, [self::TYPE_IMAGE, self::TYPE_ICON])) {
            return '';
        }

        $imageKitService = app(\App\Services\ImageKitService::class);
        
        return $imageKitService->getSrcSet(
            $this->file_path_url,
            $breakpoints,
            $format,
            $quality
        );
    }

    /**
     * Get thumbnail URL
     *
     * @param int $size
     * @param string $mode
     * @return string
     */
    public function getThumbnailUrl(int $size = 300, string $mode = 'maintain_ratio'): string
    {
        if (!in_array($this->type, [self::TYPE_IMAGE, self::TYPE_ICON])) {
            return $this->file_path_url;
        }

        $imageKitService = app(\App\Services\ImageKitService::class);
        
        return $imageKitService->getThumbnailUrl($this->file_path_url, $size, $mode);
    }

    /**
     * Get optimized video URL
     *
     * @param int|null $width
     * @param int|null $height
     * @param string|null $quality
     * @param string|null $format
     * @return string
     */
    public function getOptimizedVideoUrl(?int $width = null, ?int $height = null, ?string $quality = null, ?string $format = null): string
    {
        if ($this->type !== self::TYPE_VIDEO) {
            return $this->file_path_url;
        }

        $imageKitService = app(\App\Services\ImageKitService::class);
        
        return $imageKitService->getOptimizedVideoUrl(
            $this->file_path_url,
            $width,
            $height,
            $quality,
            $format
        );
    }
}
