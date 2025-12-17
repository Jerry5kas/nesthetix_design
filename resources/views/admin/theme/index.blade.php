<x-layouts.admin title="Theme Settings" header="Theme Settings">
    <div class="space-y-6">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success animate-fade-in">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger animate-fade-in">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.theme.update') }}" class="space-y-6" id="themeForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Branding Section -->
            <div class="card animate-fade-in">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-theme-primary flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-theme-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Branding & Logos
                    </h3>
                    <p class="text-sm text-theme-muted mt-1">Upload your brand logos. Supported formats: JPEG, PNG, GIF, SVG, WebP (max 2MB).</p>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Primary Logo -->
                        <div class="form-group">
                            <label class="form-label">Primary Logo <span class="text-xs text-theme-muted">(For light backgrounds)</span></label>
                            <div class="logo-upload-wrapper">
                                <!-- Hidden file input - stays persistent -->
                                <input type="file" 
                                       name="logo_primary" 
                                       id="logo_primary_input" 
                                       accept="image/jpeg,image/png,image/gif,image/svg+xml,image/webp" 
                                       class="hidden" 
                                       onchange="handleLogoChange(this, 'logo_primary')" />
                                
                                <div class="logo-preview" id="logo_primary_preview">
                                    @if(!empty($theme['branding']['logo_primary']))
                                        <img src="{{ $theme['branding']['logo_primary_url'] }}" alt="Primary Logo" class="logo-image" id="logo_primary_img" />
                                        <div class="logo-info">
                                            <span class="text-xs text-theme-muted">Current: {{ basename($theme['branding']['logo_primary']) }}</span>
                                        </div>
                                    @else
                                        <div class="logo-placeholder">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-theme-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p class="text-sm text-theme-muted mt-2">No logo uploaded</p>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="logo-actions-bar">
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="document.getElementById('logo_primary_input').click()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                        {{ !empty($theme['branding']['logo_primary']) ? 'Change' : 'Upload' }}
                                    </button>
                                    @if(!empty($theme['branding']['logo_primary']))
                                        <button type="button" class="btn btn-danger btn-sm" onclick="markLogoForRemoval('logo_primary')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Remove
                                        </button>
                                    @endif
                                </div>
                                <input type="hidden" name="remove_logo_primary" id="remove_logo_primary" value="" />
                            </div>
                        </div>

                        <!-- Secondary Logo -->
                        <div class="form-group">
                            <label class="form-label">Secondary Logo <span class="text-xs text-theme-muted">(For dark backgrounds - white/light version)</span></label>
                            <div class="logo-upload-wrapper">
                                <!-- Hidden file input - stays persistent -->
                                <input type="file" 
                                       name="logo_secondary" 
                                       id="logo_secondary_input" 
                                       accept="image/jpeg,image/png,image/gif,image/svg+xml,image/webp" 
                                       class="hidden" 
                                       onchange="handleLogoChange(this, 'logo_secondary')" />
                                
                                <div class="logo-preview logo-preview-dark" id="logo_secondary_preview">
                                    @if(!empty($theme['branding']['logo_secondary']))
                                        <img src="{{ $theme['branding']['logo_secondary_url'] }}" alt="Secondary Logo" class="logo-image" id="logo_secondary_img" />
                                        <div class="logo-info">
                                            <span class="text-xs text-white opacity-70">Current: {{ basename($theme['branding']['logo_secondary']) }}</span>
                                        </div>
                                    @else
                                        <div class="logo-placeholder">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p class="text-sm text-white opacity-60 mt-2">No logo uploaded</p>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="logo-actions-bar">
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="document.getElementById('logo_secondary_input').click()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                        {{ !empty($theme['branding']['logo_secondary']) ? 'Change' : 'Upload' }}
                                    </button>
                                    @if(!empty($theme['branding']['logo_secondary']))
                                        <button type="button" class="btn btn-danger btn-sm" onclick="markLogoForRemoval('logo_secondary')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Remove
                                        </button>
                                    @endif
                                </div>
                                <input type="hidden" name="remove_logo_secondary" id="remove_logo_secondary" value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colors Section -->
            <div class="card animate-fade-in">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-theme-primary flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-theme-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                        Color Palette
                    </h3>
                    <p class="text-sm text-theme-muted mt-1">Customize your brand colors. Click the color box or type a hex value.</p>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Primary Color -->
                        <div class="form-group">
                            <label for="primary_color" class="form-label">Primary Color</label>
                            <div class="color-picker-wrapper">
                                <input type="color" id="primary_color_picker" value="{{ $theme['colors']['primary'] }}" class="color-picker" data-target="primary_color" />
                                <input type="text" name="primary_color" id="primary_color" value="{{ $theme['colors']['primary'] }}" class="color-value" placeholder="#32012F" />
                            </div>
                        </div>

                        <!-- Secondary Color -->
                        <div class="form-group">
                            <label for="secondary_color" class="form-label">Secondary Color</label>
                            <div class="color-picker-wrapper">
                                <input type="color" id="secondary_color_picker" value="{{ $theme['colors']['secondary'] }}" class="color-picker" data-target="secondary_color" />
                                <input type="text" name="secondary_color" id="secondary_color" value="{{ $theme['colors']['secondary'] }}" class="color-value" placeholder="#4A1942" />
                            </div>
                        </div>

                        <!-- Accent Color -->
                        <div class="form-group">
                            <label for="accent_color" class="form-label">Accent Color</label>
                            <div class="color-picker-wrapper">
                                <input type="color" id="accent_color_picker" value="{{ $theme['colors']['accent'] }}" class="color-picker" data-target="accent_color" />
                                <input type="text" name="accent_color" id="accent_color" value="{{ $theme['colors']['accent'] }}" class="color-value" placeholder="#FF6B35" />
                            </div>
                        </div>

                        <!-- Background Color -->
                        <div class="form-group">
                            <label for="background_color" class="form-label">Background (Dark)</label>
                            <div class="color-picker-wrapper">
                                <input type="color" id="background_color_picker" value="{{ $theme['colors']['background'] }}" class="color-picker" data-target="background_color" />
                                <input type="text" name="background_color" id="background_color" value="{{ $theme['colors']['background'] }}" class="color-value" placeholder="#32012F" />
                            </div>
                        </div>

                        <!-- Background Light -->
                        <div class="form-group">
                            <label for="background_light" class="form-label">Background (Light)</label>
                            <div class="color-picker-wrapper">
                                <input type="color" id="background_light_picker" value="{{ $theme['colors']['background_light'] }}" class="color-picker" data-target="background_light" />
                                <input type="text" name="background_light" id="background_light" value="{{ $theme['colors']['background_light'] }}" class="color-value" placeholder="#FFF2E1" />
                            </div>
                        </div>

                        <!-- Text Color -->
                        <div class="form-group">
                            <label for="text_color" class="form-label">Text Color</label>
                            <div class="color-picker-wrapper">
                                <input type="color" id="text_color_picker" value="{{ $theme['colors']['text'] }}" class="color-picker" data-target="text_color" />
                                <input type="text" name="text_color" id="text_color" value="{{ $theme['colors']['text'] }}" class="color-value" placeholder="#FFF2E1" />
                            </div>
                        </div>

                        <!-- Text Muted -->
                        <div class="form-group">
                            <label for="text_muted" class="form-label">Text Muted</label>
                            <div class="color-picker-wrapper">
                                <input type="color" id="text_muted_picker" value="{{ $theme['colors']['text_muted'] }}" class="color-picker" data-target="text_muted" />
                                <input type="text" name="text_muted" id="text_muted" value="{{ $theme['colors']['text_muted'] }}" class="color-value" placeholder="#6B5B6E" />
                            </div>
                        </div>

                        <!-- Border Color -->
                        <div class="form-group">
                            <label for="border_color" class="form-label">Border Color</label>
                            <div class="color-picker-wrapper">
                                <input type="color" id="border_color_picker" value="{{ $theme['colors']['border'] }}" class="color-picker" data-target="border_color" />
                                <input type="text" name="border_color" id="border_color" value="{{ $theme['colors']['border'] }}" class="color-value" placeholder="#E8D5C4" />
                            </div>
                        </div>
                    </div>

                    <!-- Status Colors -->
                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <h4 class="text-md font-medium text-theme-primary mb-4">Status Colors</h4>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                            <div class="form-group">
                                <label for="success_color" class="form-label">Success</label>
                                <div class="color-picker-wrapper">
                                    <input type="color" id="success_color_picker" value="{{ $theme['colors']['success'] }}" class="color-picker" data-target="success_color" />
                                    <input type="text" name="success_color" id="success_color" value="{{ $theme['colors']['success'] }}" class="color-value" placeholder="#10B981" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="warning_color" class="form-label">Warning</label>
                                <div class="color-picker-wrapper">
                                    <input type="color" id="warning_color_picker" value="{{ $theme['colors']['warning'] }}" class="color-picker" data-target="warning_color" />
                                    <input type="text" name="warning_color" id="warning_color" value="{{ $theme['colors']['warning'] }}" class="color-value" placeholder="#F59E0B" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="danger_color" class="form-label">Danger</label>
                                <div class="color-picker-wrapper">
                                    <input type="color" id="danger_color_picker" value="{{ $theme['colors']['danger'] }}" class="color-picker" data-target="danger_color" />
                                    <input type="text" name="danger_color" id="danger_color" value="{{ $theme['colors']['danger'] }}" class="color-value" placeholder="#EF4444" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="info_color" class="form-label">Info</label>
                                <div class="color-picker-wrapper">
                                    <input type="color" id="info_color_picker" value="{{ $theme['colors']['info'] }}" class="color-picker" data-target="info_color" />
                                    <input type="text" name="info_color" id="info_color" value="{{ $theme['colors']['info'] }}" class="color-value" placeholder="#3B82F6" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fonts Section -->
            <div class="card animate-fade-in stagger-1">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-theme-primary flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-theme-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        Typography
                    </h3>
                    <p class="text-sm text-theme-muted mt-1">Choose fonts from Google Fonts. Enter exact font names.</p>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="form-group">
                            <label class="form-label">Primary Font (Body)</label>
                            <input type="text" name="font_primary" value="{{ $theme['fonts']['primary'] }}" class="form-input" placeholder="Montserrat" />
                            <p class="text-xs text-theme-muted mt-2" style="font-family: {{ $theme['fonts']['primary'] }}">Preview: The quick brown fox jumps over the lazy dog</p>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Secondary Font (Headings)</label>
                            <input type="text" name="font_secondary" value="{{ $theme['fonts']['secondary'] }}" class="form-input" placeholder="Poppins" />
                            <p class="text-xs text-theme-muted mt-2" style="font-family: {{ $theme['fonts']['secondary'] }}">Preview: The quick brown fox jumps over the lazy dog</p>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Fancy Font (Decorative)</label>
                            <input type="text" name="font_fancy" value="{{ $theme['fonts']['fancy'] }}" class="form-input" placeholder="Tangerine" />
                            <p class="text-xl text-theme-accent mt-2" style="font-family: {{ $theme['fonts']['fancy'] }}">Preview: The quick brown fox jumps over the lazy dog</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- General Settings -->
            <div class="card animate-fade-in stagger-2">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-theme-primary flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-theme-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        General Settings
                    </h3>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label class="form-label">Site Name</label>
                            <input type="text" name="site_name" value="{{ $theme['settings']['site_name'] }}" class="form-input" placeholder="Nesthetix" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Site Tagline</label>
                            <input type="text" name="site_tagline" value="{{ $theme['settings']['site_tagline'] }}" class="form-input" placeholder="Design Studio" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Base Font Size</label>
                            <input type="text" name="font_size_base" value="{{ $theme['settings']['font_size_base'] }}" class="form-input" placeholder="16px" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Border Radius</label>
                            <input type="text" name="border_radius" value="{{ $theme['settings']['border_radius'] }}" class="form-input" placeholder="0.5rem" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-4 justify-between animate-fade-in stagger-3">
                <a href="{{ route('admin.theme.reset') }}" class="btn btn-secondary" onclick="return confirm('Are you sure you want to reset all theme settings to defaults?')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Reset to Defaults
                </a>
                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Save Changes
                </button>
            </div>
        </form>
    </div>

    <script>
        // Handle logo file change - shows preview without destroying the input
        function handleLogoChange(input, logoKey) {
            const previewContainer = document.getElementById(logoKey + '_preview');
            const isDark = previewContainer.classList.contains('logo-preview-dark');
            
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Update preview with new image
                    previewContainer.innerHTML = `
                        <img src="${e.target.result}" alt="Logo Preview" class="logo-image" id="${logoKey}_img" />
                        <div class="logo-info">
                            <span class="text-xs ${isDark ? 'text-white opacity-70' : 'text-theme-muted'}">
                                New: ${file.name} (${formatFileSize(file.size)})
                            </span>
                        </div>
                    `;
                    
                    // Clear remove flag
                    document.getElementById('remove_' + logoKey).value = '';
                    
                    // Show success indicator
                    showNotification('File selected: ' + file.name, 'success');
                };
                
                reader.onerror = function() {
                    showNotification('Error reading file', 'error');
                };
                
                reader.readAsDataURL(file);
            }
        }
        
        // Mark logo for removal
        function markLogoForRemoval(logoKey) {
            const previewContainer = document.getElementById(logoKey + '_preview');
            const isDark = previewContainer.classList.contains('logo-preview-dark');
            const fileInput = document.getElementById(logoKey + '_input');
            
            // Clear file input
            fileInput.value = '';
            
            // Set remove flag
            document.getElementById('remove_' + logoKey).value = '1';
            
            // Update preview to show removal pending
            previewContainer.innerHTML = `
                <div class="logo-placeholder">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 ${isDark ? 'text-white opacity-60' : 'text-theme-muted'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <p class="text-sm ${isDark ? 'text-white opacity-60' : 'text-theme-muted'} mt-2">Logo will be removed on save</p>
                    <button type="button" class="btn btn-secondary btn-sm mt-3" onclick="cancelLogoRemoval('${logoKey}')">
                        Cancel
                    </button>
                </div>
            `;
            
            showNotification('Logo marked for removal', 'warning');
        }
        
        // Cancel logo removal
        function cancelLogoRemoval(logoKey) {
            // Clear remove flag
            document.getElementById('remove_' + logoKey).value = '';
            
            // Reload page to restore original state
            location.reload();
        }
        
        // Format file size
        function formatFileSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
            return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
        }
        
        // Show notification
        function showNotification(message, type = 'info') {
            const colors = {
                success: 'bg-green-100 text-green-800 border-green-200',
                error: 'bg-red-100 text-red-800 border-red-200',
                warning: 'bg-yellow-100 text-yellow-800 border-yellow-200',
                info: 'bg-blue-100 text-blue-800 border-blue-200'
            };
            
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-4 py-3 rounded-lg border ${colors[type]} z-50 animate-fade-in`;
            notification.innerHTML = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Sync color picker to text input
            document.querySelectorAll('.color-picker').forEach(picker => {
                picker.addEventListener('input', (e) => {
                    const targetId = e.target.dataset.target;
                    const textInput = document.getElementById(targetId);
                    if (textInput) {
                        textInput.value = e.target.value.toUpperCase();
                    }
                });
            });

            // Sync text input to color picker
            document.querySelectorAll('.color-value').forEach(input => {
                input.addEventListener('input', (e) => {
                    let value = e.target.value.trim();
                    if (value && !value.startsWith('#')) {
                        value = '#' + value;
                    }
                    if (/^#[0-9A-Fa-f]{6}$/.test(value)) {
                        const picker = e.target.parentElement.querySelector('.color-picker');
                        if (picker) {
                            picker.value = value;
                        }
                    }
                });

                input.addEventListener('blur', (e) => {
                    let value = e.target.value.trim().toUpperCase();
                    if (value && !value.startsWith('#')) {
                        value = '#' + value;
                    }
                    if (/^#[0-9A-Fa-f]{6}$/.test(value)) {
                        e.target.value = value;
                    }
                });
            });

            // Form submission feedback
            document.getElementById('themeForm').addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="animate-spin w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Saving...
                `;
            });
        });
    </script>
</x-layouts.admin>
