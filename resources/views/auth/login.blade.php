<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="auth-form-group">
            <label for="email">{{ __('Email') }}</label>
            {{-- FIX: The 'form-control' class is required for styling --}}
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="auth-form-group">
            <label for="password">{{ __('Password') }}</label>
            {{-- FIX: The 'form-control' class is required for styling --}}
            <input id="password" class="form-control"
                   type="password"
                   name="password"
                   required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="d-block mt-4 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
        </div>

        <div class="d-flex align-items-center justify-content-between mt-4">
            @if (Route::has('password.request'))
                <a class="forgot-password-link" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            
            {{-- FIX: Use a standard button with the 'btn' and 'btn-primary' classes --}}
            <button type="submit" class="btn btn-primary">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>

