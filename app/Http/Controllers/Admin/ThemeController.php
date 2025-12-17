<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThemeSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ThemeController extends Controller
{
    /**
     * Display theme settings page.
     */
    public function index(): View
    {
        $settings = ThemeSetting::getAllGrouped();
        
        return view('admin.theme.index', compact('settings'));
    }

    /**
     * Update theme settings.
     */
    public function update(Request $request): RedirectResponse
    {
        // Handle file uploads first
        $this->handleLogoUploads($request);

        // Handle other settings
        $settings = $request->except(['_token', '_method', 'logo_primary', 'logo_secondary', 'remove_logo_primary', 'remove_logo_secondary']);

        foreach ($settings as $key => $value) {
            if ($value !== null) {
                ThemeSetting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
        }

        // Handle logo removals (only if explicitly requested with value='1')
        if ($request->input('remove_logo_primary') === '1') {
            $this->removeLogo('logo_primary');
        }
        if ($request->input('remove_logo_secondary') === '1') {
            $this->removeLogo('logo_secondary');
        }

        ThemeSetting::clearCache();

        return back()->with('success', 'Theme settings updated successfully!');
    }

    /**
     * Handle logo file uploads.
     */
    protected function handleLogoUploads(Request $request): void
    {
        $logos = ['logo_primary', 'logo_secondary'];

        foreach ($logos as $logoKey) {
            if ($request->hasFile($logoKey)) {
                $file = $request->file($logoKey);
                
                // Check if file is valid
                if (!$file->isValid()) {
                    continue;
                }

                // Validate file
                $request->validate([
                    $logoKey => 'file|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                ]);
                
                // Delete old logo if exists
                $oldLogo = ThemeSetting::get($logoKey);
                if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                    Storage::disk('public')->delete($oldLogo);
                }

                // Generate unique filename
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $filename = $logoKey . '_' . time() . '_' . uniqid() . '.' . $extension;
                
                // Store the file
                $path = $file->storeAs('logos', $filename, 'public');

                if ($path) {
                    ThemeSetting::updateOrCreate(
                        ['key' => $logoKey],
                        [
                            'value' => $path,
                            'type' => 'image',
                            'group' => 'branding',
                            'label' => $logoKey === 'logo_primary' ? 'Primary Logo' : 'Secondary Logo',
                        ]
                    );
                }
            }
        }
    }

    /**
     * Remove a logo.
     */
    protected function removeLogo(string $logoKey): void
    {
        $logo = ThemeSetting::get($logoKey);
        
        if ($logo && Storage::disk('public')->exists($logo)) {
            Storage::disk('public')->delete($logo);
        }

        ThemeSetting::where('key', $logoKey)->update(['value' => '']);
    }

    /**
     * Reset theme settings to defaults.
     */
    public function reset(): RedirectResponse
    {
        // Delete uploaded logos
        $logos = ['logo_primary', 'logo_secondary'];
        foreach ($logos as $logoKey) {
            $logo = ThemeSetting::get($logoKey);
            if ($logo && Storage::disk('public')->exists($logo)) {
                Storage::disk('public')->delete($logo);
            }
        }

        ThemeSetting::clearCache();
        
        // Re-seed defaults
        $this->seedDefaults();

        return back()->with('success', 'Theme settings reset to defaults!');
    }

    /**
     * Seed default theme settings.
     */
    protected function seedDefaults(): void
    {
        $defaults = [
            // Branding
            ['key' => 'logo_primary', 'value' => '', 'type' => 'image', 'group' => 'branding', 'label' => 'Primary Logo', 'description' => 'Main logo for light backgrounds'],
            ['key' => 'logo_secondary', 'value' => '', 'type' => 'image', 'group' => 'branding', 'label' => 'Secondary Logo', 'description' => 'Logo for dark backgrounds (white/light version)'],
            
            // Colors
            ['key' => 'primary_color', 'value' => '#32012F', 'type' => 'color', 'group' => 'colors', 'label' => 'Primary Color'],
            ['key' => 'secondary_color', 'value' => '#4A1942', 'type' => 'color', 'group' => 'colors', 'label' => 'Secondary Color'],
            ['key' => 'accent_color', 'value' => '#FF6B35', 'type' => 'color', 'group' => 'colors', 'label' => 'Accent Color'],
            ['key' => 'background_color', 'value' => '#32012F', 'type' => 'color', 'group' => 'colors', 'label' => 'Background (Dark)'],
            ['key' => 'background_light', 'value' => '#FFF2E1', 'type' => 'color', 'group' => 'colors', 'label' => 'Background (Light)'],
            ['key' => 'text_color', 'value' => '#FFF2E1', 'type' => 'color', 'group' => 'colors', 'label' => 'Text Color (Light)'],
            ['key' => 'text_muted', 'value' => '#6B5B6E', 'type' => 'color', 'group' => 'colors', 'label' => 'Text Muted'],
            ['key' => 'border_color', 'value' => '#E8D5C4', 'type' => 'color', 'group' => 'colors', 'label' => 'Border Color'],
            ['key' => 'success_color', 'value' => '#10B981', 'type' => 'color', 'group' => 'colors', 'label' => 'Success Color'],
            ['key' => 'warning_color', 'value' => '#F59E0B', 'type' => 'color', 'group' => 'colors', 'label' => 'Warning Color'],
            ['key' => 'danger_color', 'value' => '#EF4444', 'type' => 'color', 'group' => 'colors', 'label' => 'Danger Color'],
            ['key' => 'info_color', 'value' => '#3B82F6', 'type' => 'color', 'group' => 'colors', 'label' => 'Info Color'],
            
            // Fonts
            ['key' => 'font_primary', 'value' => 'Montserrat', 'type' => 'font', 'group' => 'fonts', 'label' => 'Primary Font (Body)'],
            ['key' => 'font_secondary', 'value' => 'Poppins', 'type' => 'font', 'group' => 'fonts', 'label' => 'Secondary Font (Headings)'],
            ['key' => 'font_fancy', 'value' => 'Tangerine', 'type' => 'font', 'group' => 'fonts', 'label' => 'Fancy Font (Decorative)'],
            
            // General
            ['key' => 'site_name', 'value' => 'Nesthetix', 'type' => 'text', 'group' => 'general', 'label' => 'Site Name'],
            ['key' => 'site_tagline', 'value' => 'Design Studio', 'type' => 'text', 'group' => 'general', 'label' => 'Site Tagline'],
            ['key' => 'font_size_base', 'value' => '16px', 'type' => 'text', 'group' => 'general', 'label' => 'Base Font Size'],
            ['key' => 'border_radius', 'value' => '0.5rem', 'type' => 'text', 'group' => 'general', 'label' => 'Border Radius'],
        ];

        foreach ($defaults as $setting) {
            ThemeSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
