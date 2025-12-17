<?php

namespace Database\Seeders;

use App\Models\ThemeSetting;
use Illuminate\Database\Seeder;

class ThemeSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Branding
            [
                'key' => 'logo_primary',
                'value' => '',
                'type' => 'image',
                'group' => 'branding',
                'label' => 'Primary Logo',
                'description' => 'Main logo for light backgrounds',
            ],
            [
                'key' => 'logo_secondary',
                'value' => '',
                'type' => 'image',
                'group' => 'branding',
                'label' => 'Secondary Logo',
                'description' => 'Logo for dark backgrounds (white/light version)',
            ],

            // Colors
            [
                'key' => 'primary_color',
                'value' => '#32012F',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Primary Color',
                'description' => 'Main brand color used for backgrounds and key elements',
            ],
            [
                'key' => 'secondary_color',
                'value' => '#4A1942',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Secondary Color',
                'description' => 'Secondary brand color for accents and hover states',
            ],
            [
                'key' => 'accent_color',
                'value' => '#E91E63',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Accent Color',
                'description' => 'Vibrant color for CTAs and highlights',
            ],
            [
                'key' => 'background_color',
                'value' => '#32012F',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Background (Dark)',
                'description' => 'Dark background color for admin areas',
            ],
            [
                'key' => 'background_light',
                'value' => '#FFFFFF',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Background (Light)',
                'description' => 'Light background color for auth pages',
            ],
            [
                'key' => 'text_color',
                'value' => '#FFF2E1',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Text Color',
                'description' => 'Primary text color on dark backgrounds',
            ],
            [
                'key' => 'text_muted',
                'value' => '#C4A77D',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Text Muted',
                'description' => 'Secondary text color for less emphasis',
            ],
            [
                'key' => 'border_color',
                'value' => '#4A1942',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Border Color',
                'description' => 'Color for borders and dividers',
            ],
            [
                'key' => 'success_color',
                'value' => '#10B981',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Success Color',
                'description' => 'Color for success states and positive actions',
            ],
            [
                'key' => 'warning_color',
                'value' => '#F59E0B',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Warning Color',
                'description' => 'Color for warnings and cautions',
            ],
            [
                'key' => 'danger_color',
                'value' => '#EF4444',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Danger Color',
                'description' => 'Color for errors and destructive actions',
            ],
            [
                'key' => 'info_color',
                'value' => '#3B82F6',
                'type' => 'color',
                'group' => 'colors',
                'label' => 'Info Color',
                'description' => 'Color for informational messages',
            ],

            // Fonts
            [
                'key' => 'font_primary',
                'value' => 'Montserrat',
                'type' => 'font',
                'group' => 'fonts',
                'label' => 'Primary Font (Body)',
                'description' => 'Main font used for body text',
            ],
            [
                'key' => 'font_secondary',
                'value' => 'Poppins',
                'type' => 'font',
                'group' => 'fonts',
                'label' => 'Secondary Font (Headings)',
                'description' => 'Font used for headings and titles',
            ],
            [
                'key' => 'font_fancy',
                'value' => 'Tangerine',
                'type' => 'font',
                'group' => 'fonts',
                'label' => 'Fancy Font (Decorative)',
                'description' => 'Decorative font for special text elements',
            ],

            // General Settings
            [
                'key' => 'site_name',
                'value' => 'Nesthetix',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Site Name',
                'description' => 'The name of your website',
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Design Studio',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Site Tagline',
                'description' => 'A short description or tagline for your site',
            ],
            [
                'key' => 'font_size_base',
                'value' => '16px',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Base Font Size',
                'description' => 'The base font size for the website',
            ],
            [
                'key' => 'border_radius',
                'value' => '0.5rem',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Border Radius',
                'description' => 'Default border radius for UI elements',
            ],
        ];

        foreach ($settings as $setting) {
            ThemeSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}

