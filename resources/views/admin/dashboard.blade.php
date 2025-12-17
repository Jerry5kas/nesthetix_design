<x-layouts.admin title="Dashboard" header="Dashboard">
    <div class="space-y-6">
        <!-- Welcome Section -->
        <div class="card animate-fade-in">
            <div class="card-body">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h2 class="font-fancy text-4xl text-theme-accent mb-2">
                            Welcome back, {{ auth()->user()?->name ?? 'Admin' }}!
                        </h2>
                        <p class="text-theme-muted">
                            Here's what's happening with your {{ $theme['settings']['site_name'] ?? 'site' }} today.
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <span class="text-sm text-theme-muted">
                            {{ now()->format('l, F j, Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Users Stat -->
            <div class="stat-card animate-fade-in stagger-1">
                <div class="flex items-start justify-between">
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <span class="badge badge-success">Active</span>
                </div>
                <div class="mt-4">
                    <p class="stat-value">{{ $stats['users'] ?? 0 }}</p>
                    <p class="stat-label">Total Users</p>
                </div>
            </div>

            <!-- Theme Settings Stat -->
            <div class="stat-card animate-fade-in stagger-2">
                <div class="flex items-start justify-between">
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <span class="badge badge-accent">Custom</span>
                </div>
                <div class="mt-4">
                    <p class="stat-value">{{ $stats['theme_settings'] ?? 0 }}</p>
                    <p class="stat-label">Theme Settings</p>
                </div>
            </div>

            <!-- Colors Stat -->
            <div class="stat-card animate-fade-in stagger-3">
                <div class="flex items-start justify-between">
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
                        </svg>
                    </div>
                    <span class="badge badge-info">Dynamic</span>
                </div>
                <div class="mt-4">
                    <p class="stat-value">12</p>
                    <p class="stat-label">Color Variables</p>
                </div>
            </div>

            <!-- Fonts Stat -->
            <div class="stat-card animate-fade-in stagger-4">
                <div class="flex items-start justify-between">
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <span class="badge badge-warning">Google</span>
                </div>
                <div class="mt-4">
                    <p class="stat-value">3</p>
                    <p class="stat-label">Font Families</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Quick Actions -->
            <div class="card animate-fade-in stagger-5">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-theme-primary flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-theme-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Quick Actions
                    </h3>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('admin.theme') }}" class="group p-4 rounded-xl border-2 border-transparent hover:border-theme-accent bg-gray-50 hover:bg-white transition-all duration-300">
                            <div class="flex flex-col items-center text-center gap-3">
                                <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center group-hover:scale-110 transition-transform border border-gray-100 group-hover:border-theme-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-theme-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-theme-primary">Edit Theme</span>
                            </div>
                        </a>
                        <a href="{{ route('admin.users') }}" class="group p-4 rounded-xl border-2 border-transparent hover:border-theme-accent bg-gray-50 hover:bg-white transition-all duration-300">
                            <div class="flex flex-col items-center text-center gap-3">
                                <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center group-hover:scale-110 transition-transform border border-gray-100 group-hover:border-theme-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-theme-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-theme-primary">Manage Users</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Current Theme Preview -->
            <div class="card animate-fade-in stagger-5">
                <div class="card-header">
                    <h3 class="text-lg font-semibold text-theme-primary flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-theme-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
                        </svg>
                        Current Theme Colors
                    </h3>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="text-center">
                            <div class="w-full aspect-square rounded-lg mb-2 border-2 border-transparent hover:border-theme-accent transition-colors" style="background-color: {{ $theme['colors']['primary'] }}"></div>
                            <span class="text-xs text-theme-muted">Primary</span>
                        </div>
                        <div class="text-center">
                            <div class="w-full aspect-square rounded-lg mb-2 border-2 border-transparent hover:border-theme-accent transition-colors" style="background-color: {{ $theme['colors']['secondary'] }}"></div>
                            <span class="text-xs text-theme-muted">Secondary</span>
                        </div>
                        <div class="text-center">
                            <div class="w-full aspect-square rounded-lg mb-2 border-2 border-transparent hover:border-theme-accent transition-colors" style="background-color: {{ $theme['colors']['accent'] }}"></div>
                            <span class="text-xs text-theme-muted">Accent</span>
                        </div>
                        <div class="text-center">
                            <div class="w-full aspect-square rounded-lg mb-2 border-2 hover:border-theme-accent transition-colors" style="background-color: {{ $theme['colors']['background_light'] }}; border-color: #E8D5C4;"></div>
                            <span class="text-xs text-theme-muted">Light BG</span>
                        </div>
                    </div>
                    <div class="mt-4 p-4 rounded-lg bg-gray-50 border border-gray-100">
                        <p class="font-fancy text-2xl text-theme-accent mb-1">{{ $theme['fonts']['fancy'] }}</p>
                        <p class="font-primary text-sm text-theme-primary">Body: {{ $theme['fonts']['primary'] }}</p>
                        <p class="font-secondary text-sm text-theme-muted">Heading: {{ $theme['fonts']['secondary'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
