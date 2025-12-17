<?php

namespace App\Services;

use App\Models\ThemeSetting;

class ThemeService
{
    /**
     * Get all theme CSS variables as inline style
     */
    public function getCssVariables(): string
    {
        $settings = ThemeSetting::getAllAsArray();
        
        $cssVars = [];
        
        // Color variables
        $colorMappings = [
            'primary_color' => '--color-primary',
            'secondary_color' => '--color-secondary',
            'accent_color' => '--color-accent',
            'background_color' => '--color-background',
            'background_light' => '--color-background-light',
            'text_color' => '--color-text',
            'text_muted' => '--color-text-muted',
            'border_color' => '--color-border',
            'success_color' => '--color-success',
            'warning_color' => '--color-warning',
            'danger_color' => '--color-danger',
            'info_color' => '--color-info',
        ];

        foreach ($colorMappings as $key => $cssVar) {
            if (isset($settings[$key])) {
                $cssVars[] = "{$cssVar}: {$settings[$key]}";
            }
        }

        // Font variables
        $fontMappings = [
            'font_primary' => '--font-primary',
            'font_secondary' => '--font-secondary',
            'font_fancy' => '--font-fancy',
        ];

        foreach ($fontMappings as $key => $cssVar) {
            if (isset($settings[$key])) {
                $cssVars[] = "{$cssVar}: '{$settings[$key]}', sans-serif";
            }
        }

        // Size variables
        $sizeMappings = [
            'font_size_base' => '--font-size-base',
            'border_radius' => '--border-radius',
        ];

        foreach ($sizeMappings as $key => $cssVar) {
            if (isset($settings[$key])) {
                $cssVars[] = "{$cssVar}: {$settings[$key]}";
            }
        }

        return implode('; ', $cssVars);
    }

    /**
     * Get theme data for views
     */
    public function getThemeData(): array
    {
        $settings = ThemeSetting::getAllAsArray();
        
        return [
            'branding' => [
                'logo_primary' => $settings['logo_primary'] ?? '',
                'logo_secondary' => $settings['logo_secondary'] ?? '',
                'logo_primary_url' => !empty($settings['logo_primary']) ? asset('storage/' . $settings['logo_primary']) : '',
                'logo_secondary_url' => !empty($settings['logo_secondary']) ? asset('storage/' . $settings['logo_secondary']) : '',
            ],
            'colors' => [
                'primary' => $settings['primary_color'] ?? '#32012F',
                'secondary' => $settings['secondary_color'] ?? '#4A1942',
                'accent' => $settings['accent_color'] ?? '#FF6B35',
                'background' => $settings['background_color'] ?? '#32012F',
                'background_light' => $settings['background_light'] ?? '#FFF2E1',
                'text' => $settings['text_color'] ?? '#FFF2E1',
                'text_muted' => $settings['text_muted'] ?? '#C4A77D',
                'border' => $settings['border_color'] ?? '#4A1942',
                'success' => $settings['success_color'] ?? '#10B981',
                'warning' => $settings['warning_color'] ?? '#F59E0B',
                'danger' => $settings['danger_color'] ?? '#EF4444',
                'info' => $settings['info_color'] ?? '#3B82F6',
            ],
            'fonts' => [
                'primary' => $settings['font_primary'] ?? 'Montserrat',
                'secondary' => $settings['font_secondary'] ?? 'Poppins',
                'fancy' => $settings['font_fancy'] ?? 'Tangerine',
            ],
            'settings' => [
                'font_size_base' => $settings['font_size_base'] ?? '16px',
                'border_radius' => $settings['border_radius'] ?? '0.5rem',
                'site_name' => $settings['site_name'] ?? 'Nesthetix',
                'site_tagline' => $settings['site_tagline'] ?? 'Design Studio',
            ],
        ];
    }

    /**
     * Get Google Fonts URL
     */
    public function getGoogleFontsUrl(): string
    {
        $settings = ThemeSetting::getAllAsArray();
        
        $fontPrimary = $settings['font_primary'] ?? 'Montserrat';
        $fontSecondary = $settings['font_secondary'] ?? 'Poppins';
        $fontFancy = $settings['font_fancy'] ?? 'Tangerine';

        // Build font params - different fonts have different available weights
        $fontParams = [];
        
        // Primary font (body) - full weight range
        $fontParams[] = 'family=' . str_replace(' ', '+', $fontPrimary) . ':wght@300;400;500;600;700';
        
        // Secondary font (headings) - full weight range
        if ($fontSecondary !== $fontPrimary) {
            $fontParams[] = 'family=' . str_replace(' ', '+', $fontSecondary) . ':wght@300;400;500;600;700';
        }
        
        // Fancy font (decorative) - Tangerine only has 400 and 700
        if ($fontFancy !== $fontPrimary && $fontFancy !== $fontSecondary) {
            if (strtolower($fontFancy) === 'tangerine') {
                $fontParams[] = 'family=' . str_replace(' ', '+', $fontFancy) . ':wght@400;700';
            } else {
                $fontParams[] = 'family=' . str_replace(' ', '+', $fontFancy) . ':wght@400;700';
            }
        }

        return 'https://fonts.googleapis.com/css2?' . implode('&', $fontParams) . '&display=swap';
    }
}

