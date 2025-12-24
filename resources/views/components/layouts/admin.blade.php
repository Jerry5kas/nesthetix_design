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
    
    <!-- Admin Panel Styles -->
    <style>
        :root {
            --admin-bg: #ffffff;
            --admin-sidebar-bg: #1f2937;
            --admin-text: #111827;
            --admin-text-muted: #6b7280;
            --admin-border: #e5e7eb;
            --admin-primary: {{ $theme['colors']['primary'] ?? '#32012F' }};
            --admin-accent: {{ $theme['colors']['accent'] ?? '#C9A86C' }};
            --admin-hover: #f9fafb;
        }
        
        /* Sidebar Navigation Styles */
        .nav-item {
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.625rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.9375rem;
            font-weight: 500;
            transition: all 0.2s ease;
            color: #d1d5db;
        }
        
        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
        }
        
        .nav-item.active {
            background: linear-gradient(135deg, rgba(50, 1, 47, 0.15) 0%, rgba(201, 168, 108, 0.1) 100%);
            color: #ffffff;
            border-left: 3px solid var(--admin-accent);
        }
        
        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--admin-accent);
            border-radius: 0 2px 2px 0;
        }
        
        .nav-item svg {
            width: 1.25rem;
            height: 1.25rem;
            flex-shrink: 0;
        }
        
        .nav-item.active svg {
            color: var(--admin-accent);
        }
        
        .nav-item:hover svg {
            color: var(--admin-accent);
        }
        
        /* Sidebar Header - Match Navbar Height on Desktop */
        @media (min-width: 1024px) {
            .sidebar-header {
                height: 4rem; /* 64px - same as navbar */
                display: flex;
                align-items: center;
            }
        }
        
        /* Mobile Responsive */
        @media (max-width: 1023px) {
            .sidebar-overlay {
                backdrop-filter: blur(4px);
            }
        }
    </style>
</head>
<body class="font-body bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar - Gray-800 -->
        <aside class="w-64 fixed inset-y-0 left-0 z-50 bg-gray-800 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out border-r border-gray-700" id="sidebar">
            <div class="h-full flex flex-col">
                <!-- Logo & Site Name -->
                <div class="sidebar-header p-4 sm:p-5 lg:p-6 border-b border-gray-700">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 sm:gap-3 w-full">
                        @if(!empty($theme['branding']['logo_secondary_url']))
                            <img src="{{ $theme['branding']['logo_secondary_url'] }}" 
                                 alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                                 class="h-6 sm:h-7 lg:h-8 w-auto object-contain flex-shrink-0" />
                            <span class="text-white font-fancy font-semibold text-xs sm:text-sm lg:text-sm truncate">{{ $theme['settings']['site_name'] ?? 'Nesthetix' }}</span>
                        @elseif(!empty($theme['branding']['logo_primary_url']))
                            <img src="{{ $theme['branding']['logo_primary_url'] }}" 
                                 alt="{{ $theme['settings']['site_name'] ?? 'Logo' }}" 
                                 class="h-6 sm:h-7 lg:h-8 w-auto object-contain brightness-0 invert flex-shrink-0" />
                            <span class="text-white font-fancy font-semibold text-xs sm:text-sm lg:text-sm truncate">{{ $theme['settings']['site_name'] ?? 'Nesthetix' }}</span>
                        @else
                            <div class="w-6 h-6 sm:w-7 sm:h-7 lg:w-8 lg:h-8 rounded-lg flex items-center justify-center bg-white/10 flex-shrink-0">
                                <span class="text-white font-fancy font-semibold text-xs sm:text-sm">{{ substr($theme['settings']['site_name'] ?? 'N', 0, 1) }}</span>
                            </div>
                            <span class="text-white font-fancy font-semibold text-xs sm:text-sm lg:text-sm truncate">{{ $theme['settings']['site_name'] ?? 'Nesthetix' }}</span>
                        @endif
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 p-3 sm:p-4 overflow-y-auto">
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.theme') }}" class="nav-item {{ request()->routeIs('admin.theme*') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                                <span>Theme Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users') }}" class="nav-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.assets.index') }}" class="nav-item {{ request()->routeIs('admin.assets*') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Assets</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Sidebar Footer -->
                <div class="p-3 sm:p-4 border-t border-gray-700">
                    <div class="flex items-center gap-2 sm:gap-3">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-gray-700 flex items-center justify-center flex-shrink-0">
                            <span class="text-xs sm:text-sm font-medium text-white">
                                {{ auth()->user() ? strtoupper(substr(auth()->user()->name, 0, 2)) : 'AD' }}
                            </span>
                        </div>
                        <div class="flex-1 min-w-0 hidden sm:block">
                            <p class="text-sm font-medium text-white truncate">
                                {{ auth()->user()?->name ?? 'Admin User' }}
                            </p>
                            <p class="text-xs text-gray-400 truncate">
                                {{ auth()->user()?->email ?? 'admin@example.com' }}
                            </p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="p-2 rounded-lg hover:bg-gray-700 transition-colors text-gray-400 hover:text-white flex-shrink-0" title="Logout">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content - White Background -->
        <div class="flex-1 lg:ml-64 bg-white w-full">
            <!-- Top Bar -->
            <header class="sticky top-0 z-40 h-14 sm:h-16 flex items-center px-3 sm:px-4 lg:px-6 border-b border-gray-200 bg-white">
                <!-- Mobile Menu Button -->
                <button type="button" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 active:bg-gray-200 transition-colors text-gray-600 -ml-1" onclick="toggleSidebar()" aria-label="Toggle menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div class="flex-1 flex items-center justify-between min-w-0">
                    <h1 class="text-base sm:text-lg font-semibold text-gray-900 ml-2 sm:ml-4 lg:ml-0 truncate">
                        {{ $header ?? 'Dashboard' }}
                    </h1>

                    <div class="flex items-center gap-2 sm:gap-4 ml-2">
                        <!-- Notifications -->
                        <button type="button" class="p-2 rounded-lg hover:bg-gray-100 active:bg-gray-200 transition-colors relative text-gray-600" aria-label="Notifications">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-3 sm:p-4 lg:p-6 bg-gray-50 min-h-[calc(100vh-3.5rem)] sm:min-h-[calc(100vh-4rem)]">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const body = document.body;
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
            
            // Prevent body scroll when sidebar is open on mobile
            if (!sidebar.classList.contains('-translate-x-full')) {
                body.style.overflow = 'hidden';
            } else {
                body.style.overflow = '';
            }
        }
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const menuButton = event.target.closest('[onclick="toggleSidebar()"]');
            
            if (window.innerWidth < 1024 && !sidebar.contains(event.target) && !menuButton && !overlay.classList.contains('hidden')) {
                toggleSidebar();
            }
        });
        
        // Close sidebar on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                if (!overlay.classList.contains('hidden')) {
                    toggleSidebar();
                }
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    </script>
</body>
</html>
