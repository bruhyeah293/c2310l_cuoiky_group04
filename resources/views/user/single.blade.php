<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('user/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/styles/single_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/styles/single_responsive.css') }}">
</head>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const minusBtn = document.querySelector('.minus');
    const plusBtn = document.querySelector('.plus');
    const quantityInput = document.getElementById('quantity_value');

    minusBtn.addEventListener('click', () => {
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
        }
    });

    plusBtn.addEventListener('click', () => {
        let quantity = parseInt(quantityInput.value);
        quantityInput.value = quantity + 1;
    });
});
</script>

<body>

<div class="super_container">

	<!-- Header -->

	@include('user.blocks.header')

	<!-- Hamburger Menu -->

	@include('user.blocks.banner')

	<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="{{ route('index') }}">Home</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-9 image_col order-lg-2 order-1">
                            <div class="single_product_image">
                                @php
                                    $img= $product->image == NULL ? 'noimg.png' : $product->image;
                                    $image_url= asset('images/'.$img)
                                @endphp
                                <div class="single_product_image_background"
                                    style="
                                        background-image:url({{ $image_url }});
                                        background-size: contain;
                                        background-repeat: no-repeat;
                                        background-position: center;
                                        width: 100%;
                                        height: 400px;
                                    ">
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2>{{$product->name}}</h2>
						<p>{{$product->content}}...</p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<span class="ti-truck"></span><span>free delivery</span>
					</div>
					<div class="product_price">${{$product->price}}</div>
					<form method="POST" action="{{ route('addToCart', ['id' => $product->id]) }}">
                        @csrf
                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            <span>Quantity:</span>
                            <div class="quantity_selector">
                                <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                <input type="text" name="quantity" id="quantity_value" value="1" readonly style="width: 40px; text-align: center; border: none;">
                                <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                            <button type="submit" class="red_button add_to_cart_button" style="border: none; background: none;">
                                <a style="cursor: pointer;">add to cart</a>
                            </button>
                        </div>
                    </form>
                </div>
			</div>
		</div>

	</div>

	<!-- Tabs -->

	{{-- <div class="tabs_section_container"> --}}
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabs_container">
						<h2 class = "tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">Description</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">

					<!-- Tab Description -->

					<div id="tab_1" class="tab_container active">
						<div class="row">
							<div class="col-lg-5 desc_col text-center">
								<div class="tab_text_block">
									<h2>Intro</h2>
									<p>{{$product->intro}}...</p>
								</div>
								<div class="tab_text_block">
									<h2>Content</h2>
									<p>{{$product->content}}...</p>
								</div>
							</div>
							<div class="col-lg-5 offset-lg-2 desc_col">
								<div class="tab_text_block text-center">
									<h2>Information</h2>
                                    <p>Welcome Air Conditioners are designed to provide optimal comfort and efficiency in your home or office. With advanced technology and sleek designs, our air conditioners ensure a cool and refreshing environment even during the hottest days. Whether you need a window unit, split system, or portable air conditioner, we have the perfect solution for your cooling needs.</p>

								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	{{-- </div> --}}

	<!-- Benefit -->

	@include('user.blocks.benefit')

	<!-- Newsletter -->

    @include('user.blocks.newsletter')

    <!-- Footer -->

    @include('user.blocks.footer')

</div>

</body>

</html>
