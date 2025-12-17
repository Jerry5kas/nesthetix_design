<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ThemeSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get a setting value by key
     */
    public static function get(string $key, $default = null): ?string
    {
        return Cache::remember("theme_setting_{$key}", 3600, function () use ($key, $default) {
            $setting = static::where('key', $key)->where('is_active', true)->first();
            return $setting?->value ?? $default;
        });
    }

    /**
     * Set a setting value by key
     */
    public static function set(string $key, string $value): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        Cache::forget("theme_setting_{$key}");
        Cache::forget('theme_settings_all');
    }

    /**
     * Get all settings grouped
     */
    public static function getAllGrouped(): array
    {
        return Cache::remember('theme_settings_all', 3600, function () {
            return static::where('is_active', true)
                ->get()
                ->groupBy('group')
                ->toArray();
        });
    }

    /**
     * Get all settings as key-value pairs
     */
    public static function getAllAsArray(): array
    {
        return Cache::remember('theme_settings_array', 3600, function () {
            return static::where('is_active', true)
                ->pluck('value', 'key')
                ->toArray();
        });
    }

    /**
     * Clear all theme caches
     */
    public static function clearCache(): void
    {
        Cache::forget('theme_settings_all');
        Cache::forget('theme_settings_array');
        
        static::all()->each(function ($setting) {
            Cache::forget("theme_setting_{$setting->key}");
        });
    }

    /**
     * Get settings by group
     */
    public static function getByGroup(string $group): array
    {
        return static::where('group', $group)
            ->where('is_active', true)
            ->pluck('value', 'key')
            ->toArray();
    }
}

