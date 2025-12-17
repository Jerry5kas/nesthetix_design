<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Login' }} - {{ $theme['settings']['site_name'] ?? 'Nesthetix' }}</title>
    
    <!-- Dynamic Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{ $googleFontsUrl }}" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Dynamic Theme Variables -->
    <style>
        :root {
            {{ $themeStyles }};
        }
    </style>
</head>
<body class="auth-body font-body min-h-screen">
    <div class="auth-wrapper min-h-screen flex">
        <!-- Left Panel - Decorative -->
        <div class="auth-panel hidden lg:flex lg:w-1/2 xl:w-2/5 relative overflow-hidden">
            <div class="auth-panel-inner absolute inset-0 flex flex-col justify-center items-center p-12">
                <!-- Decorative Background Pattern -->
                <div class="auth-pattern absolute inset-0 opacity-10">
                    <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <defs>
                            <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                <circle cx="1" cy="1" r="1" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" fill="url(#grid)" />
                    </svg>
                </div>
                
                <!-- Logo & Branding -->
                <div class="relative z-10 text-center">
                    <div class="logo-wrapper mb-8">
                        @if(!empty($theme['branding']['logo_secondary_url']))
                            {{-- Use Secondary Logo (white/light version for dark backgrounds) --}}
                            <img src="{{ $theme['branding']['logo_secondary_url'] }}" 
                                 alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                                 class="h-24 w-auto mx-auto object-contain" />
                        @elseif(!empty($theme['branding']['logo_primary_url']))
                            {{-- Fallback to Primary Logo with filter --}}
                            <img src="{{ $theme['branding']['logo_primary_url'] }}" 
                                 alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                                 class="h-24 w-auto mx-auto object-contain brightness-0 invert" />
                        @else
                            {{-- Default: Icon --}}
                            <div class="logo-icon w-20 h-20 mx-auto rounded-2xl flex items-center justify-center bg-theme-accent shadow-lg shadow-theme-accent/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    {{-- Only show text if no logo is uploaded --}}
                    @if(empty($theme['branding']['logo_secondary_url']) && empty($theme['branding']['logo_primary_url']))
                        <h1 class="font-fancy text-6xl xl:text-7xl text-theme-text mb-4">
                            {{ $theme['settings']['site_name'] ?? 'Nesthetix' }}
                        </h1>
                    @endif
                    
                    <p class="text-theme-text/80 text-lg max-w-md mx-auto mt-6">
                        {{ $theme['settings']['site_tagline'] ?? 'Design Studio' }}
                    </p>
                </div>

                <!-- Decorative Elements -->
                <div class="auth-decorations absolute inset-0 pointer-events-none">
                    <div class="absolute top-20 left-10 w-32 h-32 rounded-full bg-theme-accent/10 blur-3xl"></div>
                    <div class="absolute bottom-20 right-10 w-48 h-48 rounded-full bg-theme-secondary/20 blur-3xl"></div>
                    <div class="absolute top-1/2 left-1/4 w-24 h-24 rounded-full bg-theme-accent/5 blur-2xl"></div>
                </div>
            </div>
        </div>

        <!-- Right Panel - Form -->
        <div class="auth-form-panel flex-1 flex items-center justify-center p-6 lg:p-12">
            <div class="auth-form-wrapper w-full max-w-md">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    @if(!empty($theme['branding']['logo_primary_url']))
                        {{-- Use Primary Logo (for light backgrounds on mobile) --}}
                        <img src="{{ $theme['branding']['logo_primary_url'] }}" 
                             alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                             class="h-16 w-auto mx-auto object-contain mb-4" />
                    @elseif(!empty($theme['branding']['logo_secondary_url']))
                        {{-- Fallback to Secondary Logo --}}
                        <img src="{{ $theme['branding']['logo_secondary_url'] }}" 
                             alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                             class="h-16 w-auto mx-auto object-contain mb-4" />
                    @else
                        {{-- Default: Icon + Text --}}
                        <div class="logo-icon w-16 h-16 mx-auto rounded-xl flex items-center justify-center bg-theme-accent mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h1 class="font-fancy text-4xl text-theme-primary">
                            {{ $theme['settings']['site_name'] ?? 'Nesthetix' }}
                        </h1>
                    @endif
                </div>

                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
