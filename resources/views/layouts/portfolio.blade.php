<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Cristine Bulan | Growth-Focused Web Developer & SEO Specialist')</title>
        
        <meta name="description" content="I build high-performance websites engineered for search visibility and user conversion. 
        Blending technical SEO with clean code to deliver measurable business growth." />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body class="d-flex flex-column min-vh-100">
        
        @include('layouts.portfolio-navigation')
        
        <main class="flex-grow-1">
         
            @yield('content')
        </main>

        @include('layouts.portfolio-footer')

    </body>
</html>

