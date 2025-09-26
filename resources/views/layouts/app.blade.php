<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
        <meta charset="utf-t">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }} - Admin Dashboard</title>

        @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js', 'resources/js/admin.js'])
    </head>
    <body class="bg-light">
       
        @include('layouts.navigation')

        @if (isset($header))
            <header class="bg-white shadow-sm">
                <div class="container py-3">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="container py-4">
            @if (isset($slot))
      
                {{ $slot }}
            @else
        
                @yield('content')
            @endif
        </main>

    </body>
</html>