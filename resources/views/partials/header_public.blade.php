<header class="top_panel">
    <div class="wrap">
        <div class="wrap_float">
            <div class="left">
                <div class="menu" id="menu">
                    <div class="scroll">
                        <ul id="menu-ul">
                            <li>
                                <a href="{{ url('/') }}"><span>Home</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/gyms') }}"><span>Spaces</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/trainers') }}"><span>Trainers</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/courses-list') }}"><span>Classes</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/prices') }}"><span>Prices</span></a>
                            </li>
                        </ul>
                        <div class="close" id="menu-close"></div>
                    </div>
                </div>
                <div class="overlay" id="overlay"></div>
            </div>
            <div class="right">
                <div class="tel"><a href="#">Gym Tracker</a></div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="btn">My Space</a>
                    @else
                        <a href="{{ route('login') }}" class="btn">Login</a>
                    @endauth
                @endif
            </div>
            <div class="menu_btn" id="menu_btn">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
