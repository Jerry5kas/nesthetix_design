<x-layouts.admin title="Users" header="Users">
    <div class="space-y-6">
        <!-- Header Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 animate-fade-in">
            <div>
                <p class="text-theme-muted">Manage your registered users</p>
            </div>
        </div>

        <!-- Users Table -->
        <div class="card animate-fade-in stagger-1">
            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Joined</th>
                            <th>Status</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-theme-accent/20 flex items-center justify-center">
                                            <span class="text-sm font-medium text-theme-accent">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-theme-text">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-theme-muted">{{ $user->email }}</span>
                                </td>
                                <td>
                                    <span class="text-theme-muted">{{ $user->created_at->format('M d, Y') }}</span>
                                </td>
                                <td>
                                    @if ($user->email_verified_at)
                                        <span class="badge badge-success">Verified</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button" class="p-2 rounded-lg hover:bg-theme-secondary transition-colors" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-theme-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-8">
                                    <div class="flex flex-col items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-theme-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        <p class="text-theme-muted">No users found</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($users->hasPages())
                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.admin>

