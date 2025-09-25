<footer class="py-4 text-center">
    <div class="container small">
        <ul class="footer-links">
            <li><a href="#">Impressum</a></li>
            <li><a href="#">Datenschutzerklärung</a></li>
            <li><a href="#">AGB</a></li>
            @guest
                <li><a href="{{ route('login') }}">Admin Login</a></li>
            @else
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</footer>

