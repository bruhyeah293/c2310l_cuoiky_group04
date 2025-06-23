<style>
    header.header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 999;
        background-color: white;
    }

    body {
        padding-top: 100px;
    }

    @media (max-width: 768px) {
        body {
            padding-top: 180px;
        }
    }

    .custom-login-btn {
        background-color: #dc3545;
        color: white !important;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        display: inline-block;
        line-height: 20px;
        text-align: center;
        min-width: 80px;
    }

    .custom-register-btn {
        background-color: #007bff;
        color: white !important;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        display: inline-block;
        line-height: 20px;
        text-align: center;
        min-width: 80px;
    }

    .navbar_menu {
        display: flex;
        justify-content: center;
        gap: 20px;
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .logo_container {
        padding-right: 20px;
    }

    .navbar_user {
        display: flex;
        align-items: center;
        gap: 10px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar_user li {
        display: flex;
        align-items: center;
    }
</style>

<header class="header trans_300">
    <!-- Top Navigation -->
    <div class="top_nav">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6">
                    <div class="top_nav_left">Free shipping on all U.S. orders over $50</div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-block text-center mb-0 py-1">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ Session::get('success') }}</strong>
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-block text-center mb-0 py-1">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ Session::get('error') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justif-between flex-wrap">
                        <div class="logo_container">
                            <a href="{{ route('index') }}"><span>AIRCONDITIONERS</span></a>
                        </div>
                        <nav class="navbar d-flex justify-between" style="flex-grow: 1; justify-content: flex-end;">
                            <ul class="navbar_menu">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{ route('user.categories') }}">Categories</a></li>
                                <li><a href="{{ route('user.data_category', 3) }}">For Home</a></li>
                                <li><a href="{{ route('user.data_category', 5) }}">For Industry</a></li>
                                <li><a href="{{ route('user.contact') }}">Contact</a></li>
                                <li><a href="{{ route('user.reviews') }}">Reviews</a></li>
                            </ul>
                        </nav>

                        <ul class="navbar_user d-flex align-items-center mb-0">
                            <li class="checkout" style="margin-right: 10px;">
                                <a href="{{ route('user.cart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items">{{ $cart->count() }}</span>
                                </a>
                            </li>

                            @php
                                $guard = session('guard', 'web');
                                $currentUser = Auth::guard($guard)->user();
                            @endphp

                            @if ($currentUser)
                                <li class="dropdown">
                                    <a href="#"
                                       class="dropdown-toggle d-inline-flex align-items-center"
                                       data-toggle="dropdown">
                                        <span style="margin-left: 10px;">{{ $currentUser->email }}</span>
                                    </a>

                                    <ul class="dropdown-menu text-left" style="min-width: 200px;">
                                        @if ($currentUser->level == 2)
                                            <li>
                                                <a href="{{ route('user.favorites') }}" class="dropdown-item">
                                                    <i class="fa fa-heart-o mr-2"></i> Liked Products
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.orders') }}" class="dropdown-item">
                                                    <i class="fa fa-shopping-bag mr-2"></i> Order History
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                        @endif

                                        @if ($currentUser->level == 1)
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                                    <i class="fa fa-cogs mr-2"></i> Admin Panel
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                        @endif

                                        <li>
                                            <a href="{{ route('logout') }}" class="dropdown-item">
                                                <i class="fa fa-sign-out mr-2"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}" class="custom-login-btn">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" class="custom-register-btn">Register</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
