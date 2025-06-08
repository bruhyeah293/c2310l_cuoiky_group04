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
						<li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men`s</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									@php
										$img= $product->image == NULL ? 'noimg.png' : $product->image;
										$image_url= asset('images/'.$img)
									@endphp
									<li><img src="{{ $image_url }}" alt="" data-image="{{ asset('user/assets/images/single_1.jpg') }}"></li>
									<li class="active"><img src="{{ $image_url }}" alt="" data-image="{{ asset('user/assets/images/single_2.jpg') }}"></li>
									<li><img src="{{ $image_url }}" alt="" data-image="{{ asset('user/assets/images/single_3.jpg') }}"></li>
									{{-- <li><img src="{{ asset('user/assets/images/single_3_thumb.jpg') }}" alt="" data-image="{{ asset('user/assets/images/single_3.jpg') }}"></li> --}}
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
									@php
										$img= $product->image == NULL ? 'noimg.png' : $product->image;
										$image_url= asset('images/'.$img)
									@endphp
								<div class="single_product_image_background" style="background-image:url({{ $image_url }})"></div>
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
					{{-- <div class="original_price">$629.99</div> --}}
					<div class="product_price">${{$product->price}}</div>
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity:</span>
						{{-- <div class="quantity_selector">
							<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							<span id="quantity_value">1</span>
							<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div> --}}
						<div class="red_button add_to_cart_button"><a href="{{route('addToCart',['id'=> $product->id])}}">add to cart</a></div>
						<div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Tabs -->

	<div class="tabs_section_container">

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabs_container">
						<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
							<li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">

					<!-- Tab Description -->

					<div id="tab_1" class="tab_container active">
						<div class="row">
							<div class="col-lg-5 desc_col">
								<div class="tab_title">
									<h4>Description</h4>
								</div>
								<div class="tab_text_block">
									<h2>Intro</h2>
									<p>{{$product->intro}}...</p>
								</div>
								<div class="tab_image">
									@php
										$img= $product->image == NULL ? 'noimg.png' : $product->image;
										$image_url= asset('images/'.$img)
									@endphp
									<img src="{{$image_url}}" alt="" width="200" height="auto">
								</div>
								<div class="tab_text_block">
									<h2>Content</h2>
									<p>{{$product->content}}...</p>
								</div>
							</div>
							<div class="col-lg-5 offset-lg-2 desc_col">
								<div class="tab_image">
									@php
										$img= $product->image == NULL ? 'noimg.png' : $product->image;
										$image_url= asset('images/'.$img)
									@endphp
									<img src="{{$image_url}}" alt="" width="200" height="auto">
								</div>
								<div class="tab_text_block">
									<h2>Information</h2>
                                    <p>Welcome Air Conditioners are designed to provide optimal comfort and efficiency in your home or office. With advanced technology and sleek designs, our air conditioners ensure a cool and refreshing environment even during the hottest days. Whether you need a window unit, split system, or portable air conditioner, we have the perfect solution for your cooling needs.</p>

								</div>
								<div class="tab_image desc_last">
									@php
										// $img= $product->image == NULL ? 'noimg.png' : $product->image;
										// $image_url= asset('images/'.$img)
									@endphp
									<img src="{{$image_url}}" alt="" width="200" height="auto">
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>

	<!-- Benefit -->

	@include('user.blocks.benefit')

	<!-- Newsletter -->

    @include('user.blocks.newsletter')

    <!-- Footer -->

    @include('user.blocks.footer')

</div>

</body>

</html>
