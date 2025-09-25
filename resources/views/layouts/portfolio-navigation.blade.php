{{-- PUBLIC NAVIGATION MENU --}}
<nav class="navbar navbar-expand-lg sticky-top" id="mainNav">
    <div class="container">
        
        <a class="navbar-brand" href="{{ route('home') }}">Cristine Bulan</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent" aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>

        <div class="collapse navbar-collapse" id="navContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('work') ? 'active' : '' }}" href="{{ route('work') }}">Work</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('articles') ? 'active' : '' }}" href="{{ route('articles') }}">Articles</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

