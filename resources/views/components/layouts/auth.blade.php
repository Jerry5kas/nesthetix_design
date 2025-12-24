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
</head>
<body class="font-body min-h-screen bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Left Panel - Minimal Gray -->
        <div class="hidden lg:flex lg:w-1/2 bg-gray-800 relative overflow-hidden">
            <div class="absolute inset-0 flex flex-col justify-center items-center p-12">
                <!-- Logo & Branding -->
                <div class="text-center">
                    <div class="mb-8">
                        @if(!empty($theme['branding']['logo_secondary_url']))
                            <img src="{{ $theme['branding']['logo_secondary_url'] }}" 
                                 alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                                 class="h-16 w-auto mx-auto object-contain" />
                        @elseif(!empty($theme['branding']['logo_primary_url']))
                            <img src="{{ $theme['branding']['logo_primary_url'] }}" 
                                 alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                                 class="h-16 w-auto mx-auto object-contain brightness-0 invert" />
                        @else
                            <div class="w-16 h-16 mx-auto rounded-xl flex items-center justify-center bg-white/10 mb-4">
                                <span class="text-white font-semibold text-xl">{{ substr($theme['settings']['site_name'] ?? 'N', 0, 1) }}</span>
                            </div>
                        @endif
                    </div>
                    
                    @if(empty($theme['branding']['logo_secondary_url']) && empty($theme['branding']['logo_primary_url']))
                        <h1 class="text-5xl font-bold text-white mb-4">
                            {{ $theme['settings']['site_name'] ?? 'Nesthetix' }}
                        </h1>
                    @endif
                    
                    <p class="text-gray-300 text-lg max-w-md mx-auto">
                        {{ $theme['settings']['site_tagline'] ?? 'Design Studio' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Panel - White Form -->
        <div class="flex-1 flex items-center justify-center p-6 lg:p-12 bg-white">
            <div class="w-full max-w-md">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    @if(!empty($theme['branding']['logo_primary_url']))
                        <img src="{{ $theme['branding']['logo_primary_url'] }}" 
                             alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                             class="h-12 w-auto mx-auto object-contain mb-4" />
                    @elseif(!empty($theme['branding']['logo_secondary_url']))
                        <img src="{{ $theme['branding']['logo_secondary_url'] }}" 
                             alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                             class="h-12 w-auto mx-auto object-contain mb-4" />
                    @else
                        <div class="w-12 h-12 mx-auto rounded-lg flex items-center justify-center bg-gray-800 mb-4">
                            <span class="text-white font-semibold">{{ substr($theme['settings']['site_name'] ?? 'N', 0, 1) }}</span>
                        </div>
                        <h1 class="text-2xl font-bold text-gray-900">
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
