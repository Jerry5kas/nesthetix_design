<x-layouts.admin title="Dashboard" header="Dashboard">
    <div class="space-y-4 sm:space-y-6">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg border border-gray-200 p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-1 sm:mb-2">
                        Welcome back, {{ auth()->user()?->name ?? 'Admin' }}!
                    </h2>
                    <p class="text-sm sm:text-base text-gray-600">
                        Here's what's happening with your {{ $theme['settings']['site_name'] ?? 'site' }} today.
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <span class="text-xs sm:text-sm text-gray-500">
                        {{ now()->format('l, F j, Y') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
            <!-- Users Stat -->
            <div class="bg-white rounded-lg border border-gray-200 p-4 sm:p-6">
                <div class="flex items-start justify-between mb-3 sm:mb-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg bg-gray-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded">Active</span>
                </div>
                <div>
                    <p class="text-2xl sm:text-3xl font-semibold text-gray-900">{{ $stats['users'] ?? 0 }}</p>
                    <p class="text-xs sm:text-sm text-gray-600 mt-1">Total Users</p>
                </div>
            </div>

            <!-- Theme Settings Stat -->
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded">Custom</span>
                </div>
                <div>
                    <p class="text-3xl font-semibold text-gray-900">{{ $stats['theme_settings'] ?? 0 }}</p>
                    <p class="text-sm text-gray-600 mt-1">Theme Settings</p>
                </div>
            </div>

            <!-- Colors Stat -->
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
                        </svg>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium text-purple-700 bg-purple-100 rounded">Dynamic</span>
                </div>
                <div>
                    <p class="text-3xl font-semibold text-gray-900">12</p>
                    <p class="text-sm text-gray-600 mt-1">Color Variables</p>
                </div>
            </div>

            <!-- Fonts Stat -->
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <span class="px-2 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded">Google</span>
                </div>
                <div>
                    <p class="text-3xl font-semibold text-gray-900">3</p>
                    <p class="text-sm text-gray-600 mt-1">Font Families</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Theme Preview -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-lg border border-gray-200 p-4 sm:p-6">
                <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Quick Actions
                </h3>
                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    <a href="{{ route('admin.theme') }}" class="group p-4 rounded-lg border border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-all">
                        <div class="flex flex-col items-center text-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center group-hover:bg-gray-200 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900">Edit Theme</span>
                        </div>
                    </a>
                    <a href="{{ route('admin.users') }}" class="group p-4 rounded-lg border border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-all">
                        <div class="flex flex-col items-center text-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center group-hover:bg-gray-200 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900">Manage Users</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Current Theme Preview -->
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
                    </svg>
                    Current Theme Colors
                </h3>
                <div class="grid grid-cols-4 gap-3 mb-4">
                    <div class="text-center">
                        <div class="w-full aspect-square rounded-lg mb-2 border border-gray-200" style="background-color: {{ $theme['colors']['primary'] }}"></div>
                        <span class="text-xs text-gray-600">Primary</span>
                    </div>
                    <div class="text-center">
                        <div class="w-full aspect-square rounded-lg mb-2 border border-gray-200" style="background-color: {{ $theme['colors']['secondary'] }}"></div>
                        <span class="text-xs text-gray-600">Secondary</span>
                    </div>
                    <div class="text-center">
                        <div class="w-full aspect-square rounded-lg mb-2 border border-gray-200" style="background-color: {{ $theme['colors']['accent'] }}"></div>
                        <span class="text-xs text-gray-600">Accent</span>
                    </div>
                    <div class="text-center">
                        <div class="w-full aspect-square rounded-lg mb-2 border border-gray-200" style="background-color: {{ $theme['colors']['background_light'] }}"></div>
                        <span class="text-xs text-gray-600">Light BG</span>
                    </div>
                </div>
                <div class="p-4 rounded-lg bg-gray-50 border border-gray-200">
                    <p class="text-xl font-semibold text-gray-900 mb-1">{{ $theme['fonts']['fancy'] }}</p>
                    <p class="text-sm text-gray-600">Body: {{ $theme['fonts']['primary'] }}</p>
                    <p class="text-sm text-gray-600">Heading: {{ $theme['fonts']['secondary'] }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
