<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} - {{ $theme['settings']['site_name'] ?? 'Nesthetix' }}</title>
    
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
<body class="admin-body font-body">
    <div class="admin-wrapper min-h-screen flex">
        <!-- Sidebar - Dark Primary Background -->
        <aside class="admin-sidebar w-64 fixed inset-y-0 left-0 z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out" id="sidebar">
            <div class="sidebar-inner h-full flex flex-col">
                <!-- Logo -->
                <div class="sidebar-header p-6 border-b border-white/10">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                        @if(!empty($theme['branding']['logo_secondary_url']))
                            {{-- Use Secondary Logo (white/light version for dark backgrounds) --}}
                            <img src="{{ $theme['branding']['logo_secondary_url'] }}" 
                                 alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                                 class="h-10 w-auto object-contain" />
                        @elseif(!empty($theme['branding']['logo_primary_url']))
                            {{-- Fallback to Primary Logo --}}
                            <img src="{{ $theme['branding']['logo_primary_url'] }}" 
                                 alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                                 class="h-10 w-auto object-contain" />
                        @else
                            {{-- Default: Icon + Text --}}
                            <div class="logo-icon w-10 h-10 rounded-xl flex items-center justify-center bg-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <span class="font-fancy text-3xl text-white">{{ $theme['settings']['site_name'] ?? 'Nesthetix' }}</span>
                        @endif
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="sidebar-nav flex-1 p-4 overflow-y-auto">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.theme') }}" class="nav-link {{ request()->routeIs('admin.theme*') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                                <span>Theme Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span>Users</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Sidebar Footer -->
                <div class="sidebar-footer p-4 border-t border-white/10">
                    <div class="flex items-center gap-3">
                        <div class="avatar w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                            <span class="text-sm font-medium text-white">
                                {{ auth()->user() ? strtoupper(substr(auth()->user()->name, 0, 2)) : 'AD' }}
                            </span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-white truncate">
                                {{ auth()->user()?->name ?? 'Admin User' }}
                            </p>
                            <p class="text-xs text-white/60 truncate">
                                {{ auth()->user()?->email ?? 'admin@example.com' }}
                            </p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="p-2 rounded-lg hover:bg-white/10 transition-colors" title="Logout">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white/60 hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content - Light Background -->
        <div class="admin-main flex-1 lg:ml-64">
            <!-- Top Bar - White -->
            <header class="admin-header sticky top-0 z-40 h-16 flex items-center px-4 lg:px-6 border-b">
                <!-- Mobile Menu Button -->
                <button type="button" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors" onclick="toggleSidebar()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-theme-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div class="flex-1 flex items-center justify-between">
                    <h1 class="text-lg font-semibold text-theme-primary ml-4 lg:ml-0">
                        {{ $header ?? 'Dashboard' }}
                    </h1>

                    <div class="flex items-center gap-4">
                        <!-- Notifications -->
                        <button type="button" class="p-2 rounded-lg hover:bg-gray-100 transition-colors relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-theme-muted icon-hover" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-theme-accent rounded-full"></span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="admin-content p-4 lg:p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div class="sidebar-overlay fixed inset-0 bg-black/50 z-40 lg:hidden hidden" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
</body>
</html>
