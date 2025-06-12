<style>
    .navbar_user li a {
        color: black;
        text-decoration: none;
        padding: 2px 6px; /* cho hiệu ứng đẹp hơn */
        transition: box-shadow 0.3s ease;
        border-radius: 4px; /* bo góc nhẹ cho viền */
    }

    .navbar_user li a:hover {
        box-shadow: 0 0 5px 2px #007bff;
        color: black; /* chữ vẫn đen */
    }
</style>

<header class="header trans_300">
    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">
                            @if (Session::has('success'))
                            <div class="alert alert-success alert-block" style="text-align: center">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ Session::get('success') }}</strong>
                            </div>
                            @endif
                            @if (Session::has('error'))
                            <div class="alert alert-danger alert-block" style="text-align: center">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ Session::get('error') }}</strong>
                            </div>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="{{ route('index') }}"><span> AIRCONDITIONERS</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="{{ route('index') }}">home</a></li>
                            <li><a href="{{ route('user.categories') }}">categories</a></li>
                            {{-- <li><a href="#">shop</a></li> --}}
                            <li><a href="{{route('user.data_category', 3)}}">for home</a></li>
                            <li><a href="{{route('user.data_category', 5)}}">for industry </a></li>
                            <li><a href="{{ route('user.contact') }}">contact</a></li>
                            <li><a href="{{ route('user.reviews') }}">reviews</a></li>
                        </ul>
                        <ul class="navbar_user">
                            {{-- <li>
                                <form action="{{ route('search') }}" method="GET" style="display:inline;">
                                    <button type="submit" style="background:none; border:none; cursor:pointer; color:black;">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                    <input type="text" name="query" placeholder="Search..." style="border:none; outline:none;" />
                                </form>
                            </li> --}}
                            <li class="checkout" style="margin-right: 20px;">
                                <a href="{{ route('cart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items">{{$cart->count()}}</span>
                                </a>
                            </li>

                            @guest
                            <li style="margin-left: 20px;">
                                <a href="{{ url('/login') }}">Login</a>
                            </li>
                            @endguest

                            @auth
                            <li style="margin-left: 30px; white-space: nowrap;" class="dropdown">
                                <a href="#" class="dropdown-toggle d-inline-flex align-items-center" data-toggle="dropdown" style="white-space: nowrap;">
                                    <span style="margin-left: 10px;">{{ Auth::user()->email }}</span>
                                </a>
                                <ul class="dropdown-menu text-center">
                                    <li><a href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                            @endauth
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
