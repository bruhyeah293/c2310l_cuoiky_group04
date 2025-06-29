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

<style>
    .favorite::before {
        display: none !important;
    }
</style>

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>New Arrivals</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                    @php
                        $guard = session('guard', 'web');
                    @endphp
                    @foreach ($products as $product)
                    <div class="product-item man">
                        <div class="product discount product_filter">
                            <div class="product_image">
                                @php
                                    $img = $product->image == NULL ? 'noimg.png' : $product->image;
                                    $image_url = asset('images/' . $img);
                                @endphp
                                <img src="{{ $image_url }}" alt="" width="200" height="200">
                            </div>
                            @php
                                $isLoggedIn = Auth::guard($guard)->check();
                            @endphp

                            <div class="d-flex justify-content-between align-items-center mt-2">
                                {{-- Favorite button --}}
                                @if ($isLoggedIn)
                                    @php
                                        $isFavorited = in_array($product->id, $favorites);
                                    @endphp
                                    <form action="{{ route('user.add_favorite', $product->id) }}" method="POST" class="me-2">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 m-0" title="Favorite">
                                            <i class="fa {{ $isFavorited ? 'fa-heart' : 'fa-heart-o' }}" style="color: {{ $isFavorited ? 'red' : 'grey' }}"></i>
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" onclick="return confirm('You need to log in to add to favorites!');" class="me-2">
                                        <i class="fa fa-heart-o" style="color: grey;" title="Favorite"></i>
                                    </a>
                                @endif

                                {{-- Compare button --}}
                                <form action="{{ route('user.add_compare', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-primary" title="Compare">
                                        <i class="fa fa-exchange"></i>
                                    </button>
                                </form>
                            </div>

                            <div class="product_info">
                                <h6 class="product_name">
                                    <a href="{{ route('user.single', $product->id) }}">{{ $product->name }}</a>
                                </h6>
                                <div class="product_price">${{ $product->price }}<span></span></div>
                            </div>
                        </div>
                        <div class="red_button add_to_cart_button">
                            @if (Auth::guard($guard)->check())
                                <form action="{{ route('user.addToCart', ['id' => $product->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Add to Cart</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" onclick="return confirm('You need to log in to add to cart!');">Add to Cart</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
