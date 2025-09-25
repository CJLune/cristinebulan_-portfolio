<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            Cristine Bulan
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger-icon"><span></span><span></span><span></span></div>
        </button>
        
        <div class="collapse navbar-collapse" id="mainNavbar">
            
            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.articles.*') || request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Content
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.articles.index') }}">Manage Articles</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.categories.index') }}">Manage Categories</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item disabled" href="#">Manage Projects (Soon)</a></li>
                        </ul>
                    </li>
                </ul>
            @endauth

            {{-- Public links on the right for guests --}}
            @guest
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('work') ? 'active' : '' }}" href="{{ route('work') }}">Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('articles*') ? 'active' : '' }}" href="{{ route('articles') }}">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            @endguest
        
            
            @auth
                <form action="{{ route('search') }}" method="GET" class="nav-search-form d-none d-lg-flex mx-auto" style="width: 100%; max-width: 350px;">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control" placeholder="Search..." aria-label="Search">
                        <button type="submit" class="btn btn-outline-secondary" aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/></svg>
                        </button>
                    </div>
                </form>
                
                <div class="d-flex align-items-center ms-lg-auto">
                    <a href="{{ route('admin.contacts.index') }}" class="btn nav-icon-btn me-3" title="View Messages" aria-label="View Messages">
                        <span class="position-relative d-inline-block">
                               <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/></svg>
                            @if(isset($unreadMessagesCount) && $unreadMessagesCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" aria-label="{{ $unreadMessagesCount }} unread messages">
                                    {{ $unreadMessagesCount }}
                                </span>
                            @endif
                        </span>
                    </a>
                    
                    <div class="dropdown me-3">
                        <button class="btn nav-icon-btn" type="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false" aria-label="View notifications">
                            <span class="position-relative d-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/></svg>
                                @if(isset($unreadNotifications) && $unreadNotifications->count() > 0)
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" aria-label="{{ $unreadNotifications->count() }} unread notifications">
                                            {{ $unreadNotifications->count() }}
                                        </span>
                                @endif
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end styled-dropdown" aria-labelledby="notificationDropdown">
                            <h6 class="dropdown-header">Notifications</h6>
                            @forelse($unreadNotifications as $notification)
                                @php
                                    $data = (array) $notification->data;
                                    $message = $data['subject'] ?? 'Notification details unavailable.'; 
                                    $link = $data['read_url'] ?? route('admin.contacts.index'); 
                                @endphp

                                <a class="dropdown-item notification-item" href="{{ $link }}" data-id="{{ $notification->id }}">
                                    {{ $message }}
                                </a>
                            @empty
                                <a class="dropdown-item" href="#">No new notifications.</a>
                            @endforelse
                            @if(isset($unreadNotifications) && $unreadNotifications->count() > 0)
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('notifications.readAll') }}" method="POST" class="text-center">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn-link w-100">Mark all as read</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    
                    <div class="dropdown">
                        <button class="btn d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-avatar me-2">{{ substr(Auth::user()->name, 0, 1) }}</div>
                            <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end styled-dropdown" aria-labelledby="userDropdown">
                            <h6 class="dropdown-header">{{ Auth::user()->name }}</h6>
                            <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Profile</a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="#" 
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>