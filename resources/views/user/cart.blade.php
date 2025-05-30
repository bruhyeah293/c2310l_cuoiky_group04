<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cart</title>
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
        <div class="container contact_container">
            <div class="row">
                <div class="col">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="container contact_container">
            <div class="row">
                <div class="col">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Cart</a></li>
                    </ul>
                </div>

            </div>
        </div>
        

        <div class="row">
            <div class="col">

                <div class="">
                    <table border="1px" width="100%" style="text-align: center;" >
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($cart as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>${{number_format($item->price,0,"",".") }}</td>
                                {{-- <td>
                                    <span class="input-group-text btn btn-danger" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> -     </span>
                                    <input type="number" value="{{$item->qty}}" class="form-control text-center" min="1" max="50">
                                    <span class="input-group-text btn btn-success" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> +    </span>
                                </td> --}}
                                <td>{{$item->qty}}</td>
                                <td>${{number_format($item->price * $item->qty,0,"",".") }}</td>
                                <td><a href="{{ route('deleteCart',['id' => $item -> rowId]) }}"><i class="fa fa-remove"></i></a></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" style="text-align: center;" ><b>Total</b></td>
                            <td><b>${{\Cart::total()}}</b></td>
                        </tr>
                    </table>
                    <a href="{{ route('user.payment') }}"><button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">payment</button></a>
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
