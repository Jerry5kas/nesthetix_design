<x-layouts.auth title="Login">
    <div class="animate-fade-in">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-theme-primary font-secondary mb-2">Welcome Back</h2>
            <p class="text-theme-muted">Sign in to access your dashboard</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Email Address
                    </span>
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    class="form-input @error('email') border-theme-danger @enderror" 
                    placeholder="you@example.com"
                    required 
                    autofocus
                    autocomplete="username"
                />
                @error('email')
                    <p class="mt-2 text-sm text-theme-danger flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Password
                    </span>
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-input @error('password') border-theme-danger @enderror" 
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                />
                @error('password')
                    <p class="mt-2 text-sm text-theme-danger flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer group">
                    <input 
                        type="checkbox" 
                        name="remember" 
                        class="w-4 h-4 rounded border-2 border-theme-primary/30 text-theme-accent focus:ring-theme-accent"
                    />
                    <span class="text-sm text-theme-muted group-hover:text-theme-primary transition-colors">Remember me</span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                Sign In
            </button>
        </form>

        <!-- Register Link -->
        <div class="mt-8 text-center">
            <p class="text-sm text-theme-muted">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-medium text-theme-accent hover:underline">
                    Create one now
                </a>
            </p>
        </div>
    </div>
</x-layouts.auth>

