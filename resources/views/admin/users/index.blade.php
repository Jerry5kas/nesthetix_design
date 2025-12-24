<x-layouts.admin title="Users" header="Users">
    <div class="space-y-4 sm:space-y-6">
        <!-- Header Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-4">
            <div>
                <p class="text-sm sm:text-base text-gray-600">Manage your registered users</p>
            </div>
        </div>

        <!-- Users Table - Desktop -->
        <div class="hidden md:block bg-white rounded-lg border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">User</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Joined</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">
                                            <span class="text-sm font-medium text-gray-700">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-600">{{ $user->email }}</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-600">{{ $user->created_at->format('M d, Y') }}</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    @if ($user->email_verified_at)
                                        <span class="px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded">Verified</span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded">Pending</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-right">
                                    <button type="button" class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-600" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        <p class="text-sm text-gray-600">No users found</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($users->hasPages())
                <div class="px-4 py-3 border-t border-gray-200 bg-gray-50">
                    {{ $users->links() }}
                </div>
            @endif
        </div>

        <!-- Users Cards - Mobile -->
        <div class="md:hidden space-y-3">
            @forelse ($users as $user)
                <div class="bg-white rounded-lg border border-gray-200 p-4">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center gap-3 flex-1 min-w-0">
                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center flex-shrink-0">
                                <span class="text-sm font-medium text-gray-700">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $user->name }}</p>
                                <p class="text-xs text-gray-600 truncate mt-0.5">{{ $user->email }}</p>
                            </div>
                        </div>
                        <button type="button" class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-600 flex-shrink-0" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Joined</p>
                            <p class="text-sm text-gray-900">{{ $user->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-500 mb-1">Status</p>
                            @if ($user->email_verified_at)
                                <span class="px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded">Verified</span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded">Pending</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg border border-gray-200 p-8 text-center">
                    <div class="flex flex-col items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <p class="text-sm text-gray-600">No users found</p>
                    </div>
                </div>
            @endforelse

            @if ($users->hasPages())
                <div class="pt-4">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.admin>

