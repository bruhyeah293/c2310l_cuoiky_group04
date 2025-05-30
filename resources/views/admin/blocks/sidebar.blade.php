<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                {{-- <li>
                    <a class="" href="{{ route('admin.dashboard') }}">
                        <i class="glyphicon glyphicon-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li> --}}
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>Members</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.member.index') }}">Show Member</a></li>
                        <li><a href="{{ route('admin.member.create') }}">Create Member</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="glyphicon glyphicon-th-list"></i>
                        <span>Product </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.product.index') }}">Show Product</a></li>
                        <li><a href="{{ route('admin.product.create') }}">Create Product</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="glyphicon glyphicon-list-alt"></i>
                        <span>Category </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('admin.category.index') }}">Show Category</a></li>
                        <li><a href="{{ route('admin.category.create') }}">Create Category</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.cart') }}">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <span>Cart</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="glyphicon glyphicon-log-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>