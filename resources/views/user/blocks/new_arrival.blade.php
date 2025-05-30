<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>New Arrivals</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            {{-- <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">women</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">accessories</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">men</li>
                    </ul>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                    @foreach ($products as $product)
                    <div class="product-item man">
                        <div class="product discount product_filter">
                            <div class="product_image">
                                @php
                                    $img= $product->image == NULL ? 'noimg.png' : $product->image;
                                    $image_url= asset('images/'.$img)
                                @endphp
                                <img src="{{$image_url}}" alt="" width="200" height="200">
                            </div>
                            <div class="favorite favorite_left"></div>
                            <!-- <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div> -->
                            <div class="product_info">
                                <h6 class="product_name"><a href="{{ route('user.single', $product->id)}}">{{$product->name}}</a></h6>
                                <div class="product_price">${{$product->price}}<span></span></div>
                            </div>
                        </div>
                        <div class="red_button add_to_cart_button"><a href="{{ route('addToCart',['id'=> $product->id]) }}">add to cart</a></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

