<!DOCTYPE html>
<html lang="en">
<head>
    <title>Categories</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('user/assets/styles/bootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/styles/categories_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/styles/categories_responsive.css') }}">

    <style>
        .favorite::before {
            display: none !important;
        }
        /* CSS cho hộp so sánh */
        .compare-box {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #fff;
            border-top: 2px solid #ccc;
            padding: 8px 10px; /* Giảm padding để hộp so sánh gọn hơn */
            z-index: 9999;
        }

        .compare-box .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0; /* Loại bỏ padding không cần thiết */
        }

        .compare-box .d-flex {
            gap: 5px; /* Giảm khoảng cách giữa các sản phẩm */
        }

        .compare-box .product-item {
            width: 90px; /* Giảm chiều rộng để layout gọn gàng */
            text-align: center;
            margin: 0; /* Loại bỏ margin */
            height: 120px; /* Cố định chiều cao */
        }

        .compare-box img {
            width: 70px; /* Cố định kích thước hình ảnh */
            height: 70px; /* Cố định chiều cao */
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 5px; /* Thêm khoảng cách dưới hình ảnh */
        }

        .compare-box .product-name {
            font-size: 12px;
            margin-top: 5px; /* Tăng khoảng cách trên để tên không bị dính vào ảnh */
            text-overflow: unset; /* Bỏ việc cắt tên */
            white-space: normal; /* Cho phép tên sản phẩm xuống dòng nếu quá dài */
            overflow: unset; /* Bỏ chế độ ẩn tràn */
        }

        .compare-box .btn-primary {
            font-size: 12px; /* Điều chỉnh kích thước nút */
            padding: 5px 10px; /* Điều chỉnh padding của nút */
        }

    </style>
</head>
<body>
<div class="super_container">
    @include('user.blocks.header')

    <div class="fs_menu_overlay"></div>

    <div class="container product_section_container">
        <div class="row">
            <div class="col product_section clearfix">

                <!-- Breadcrumbs -->
                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Categories</a></li>
                    </ul>
                </div>

                <!-- Sidebar -->
                <div class="sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Product Category</h5>
                        </div>
                        <ul class="sidebar_categories">
                            <li><a href="{{ route('user.categories') }}">All</a></li>
                            <li><a href="{{ route('user.data_category', 3) }}">Home</a></li>
                            <li><a href="{{ route('user.data_category', 5) }}">Industry</a></li>
                            <li><a href="{{ route('user.data_category', 9) }}">Smart ACS</a></li>
                        </ul>
                    </div>

                    <!-- Price Range Filtering -->
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Filter by Price</h5>
                        </div>
                        <p>
                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                        </p>
                        <div id="slider-range"></div>
                        <div class="filter_button"><span>filter</span></div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="main_content">

                    <!-- Products -->
                    <div class="products_iso">
                        <div class="row">
                            <div class="col">

                                <!-- Product Sorting -->
                                <div class="product_sorting_container product_sorting_container_top">
                                    <ul class="product_sorting">
                                        <li>
                                            <span class="type_sorting_text">Default Sorting</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_type">
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Product Grid -->
                                <div class="product-grid">
                                    @php
                                        $guard = session('guard', 'web');
                                        $user = Auth::guard($guard)->user();

                                        $favorites = [];
                                        if ($user) {
                                            $column = $guard === 'web' ? 'user_id' : 'member_id';
                                            $favorites = DB::table('favorites')
                                                ->where($column, $user->id)
                                                ->pluck('product_id')
                                                ->toArray();
                                        }
                                    @endphp

                                    @foreach ($products as $product)
                                        <div class="product-item men">
                                            <div class="product discount product_filter">
                                                <div class="product_image">
                                                    @php
                                                        $img = $product->image == NULL ? 'noimg.png' : $product->image;
                                                        $image_url = asset('images/' . $img);
                                                    @endphp
                                                    <img src="{{$image_url}}" alt="" width="200" height="200">
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    @if (Auth::guard($guard)->check())
                                                        @php
                                                            $isFavorited = in_array($product->id, $favorites);
                                                        @endphp
                                                        <form action="{{ route('user.add_favorite', $product->id) }}" method="POST" class="me-2">
                                                            @csrf
                                                            <button type="submit" class="btn btn-link p-0 m-0" title="Yêu thích">
                                                                <i class="fa {{ $isFavorited ? 'fa-heart' : 'fa-heart-o' }}" style="color: {{ $isFavorited ? 'red' : 'grey' }}"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <a href="{{ route('login') }}" onclick="return confirm('Bạn cần đăng nhập để yêu thích sản phẩm!');" class="me-2">
                                                            <i class="fa fa-heart-o" style="color: grey;" title="Yêu thích"></i>
                                                        </a>
                                                    @endif

                                                    <form action="{{ route('user.add_compare', $product->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-primary" title="So sánh">
                                                            <i class="fa fa-exchange"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                                <div class="product_info">
                                                    <h6 class="product_name">
                                                        <a href="{{ route('user.single', $product->id) }}">{{$product->name}}</a>
                                                    </h6>
                                                    <div class="product_price">${{$product->price}}</div>
                                                </div>
                                            </div>

                                            <div class="red_button add_to_cart_button">
                                                @if (Auth::guard($guard)->check())
                                                    <form action="{{ route('user.addToCart', ['id' => $product->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Add to Cart</button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('login') }}" onclick="return confirm('Bạn cần đăng nhập để thêm vào giỏ hàng!');">add to cart</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Compare Box -->
    @if(session('compare') && count(session('compare')) > 0)
        @php
            $compareIds = session('compare', []);
            $compareIds = is_array($compareIds) ? array_values($compareIds) : [];
            $compareCount = count($compareIds);

            $compareProducts = $compareCount > 0
                ? \Illuminate\Support\Facades\DB::table('products')
                    ->join('category', 'products.category_id', '=', 'category.id')
                    ->select('products.*', 'category.name as category_name')
                    ->whereIn('products.id', $compareIds)
                    ->get()
                : collect();
        @endphp

        @if($compareCount > 0)
            <div class="compare-box">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="d-flex gap-3">
                        @foreach($compareProducts as $cp)
                            <div class="product-item">
                                <img src="{{ asset('images/' . ($cp->image ?? 'noimg.png')) }}" alt="{{ $cp->name }}" width="70" height="70" style="object-fit: cover; border-radius: 5px;">
                                <div class="product-name">{{ $cp->name }}</div>
                                <form method="POST" action="{{ route('user.remove_compare', $cp->id) }}" style="position: absolute; top: -8px; right: -8px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; background: transparent; font-size: 14px;" onclick="event.stopPropagation();">
                                        ❌
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('user.compare') }}" class="btn btn-primary btn-sm">So sánh ({{ $compareCount }})</a>
                </div>
            </div>
        @endif
    @endif

    @include('user.blocks.benefit')
    @include('user.blocks.newsletter')
    @include('user.blocks.footer')
</div>

<script src="{{ asset('user/assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('user/assets/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('user/assets/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('user/assets/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('user/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('user/assets/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('user/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('user/assets/js/categories_custom.js') }}"></script>
</body>
</html>
