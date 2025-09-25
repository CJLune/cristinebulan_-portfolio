<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Include both app.css (for variables) and the new auth.css --}}
        @vite(['resources/css/app.css', 'resources/css/auth.css', 'resources/js/app.js'])

    </head>
    <body style="background-color: var(--bg);">

        <div class="auth-container">
            <div class="auth-card">
                <div class="auth-header">
                    <h1 class="auth-title">Admin Portal</h1>
                </div>

                {{-- The dynamic login/register form content is injected here --}}
                {{ $slot }}
            </div>
        </div>

    </body>
</html>
