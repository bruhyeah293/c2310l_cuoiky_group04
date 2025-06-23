<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
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
    <style>
        em{
            color: red;
        }
    </style>
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
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Cart</a></li>
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

        <div class="">
            <div class="row">
                <div class="col">

                    <!-- Breadcrumbs -->


                        <div>
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i>Error notice</h5>
                                <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="post" action="{{route('user.uppayment')}}">
                                @csrf
                                <div class="">
                                    <table width="100%" style="text-align: center;">
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
                                                    <td>{{$item->qty}}</td>
                                                    <td>${{number_format($item->price * $item->qty,0,"",".") }}</td>
                                                    <td><a href="{{ route('user.deleteCart',['id' => $item -> rowId]) }}"><i class="fa fa-remove"></i></a></td>
                                                </tr>
                                            @endforeach
                                    </table>
                                </div>
                                <div class="card-body">
                                    <label for="name">Name</label><em>*</em>
                                    <input type="name" name="name" class="form-control" placeholder="Please enter your name" value="">

                                    <label for="national">National</label><em>*</em>
                                    <input type="national" name="national" class="form-control" placeholder="Please enter your national" value="VietNam">

                                    <label for="address">Address</label><em>*</em>
                                    <input type="address" name="address" class="form-control" placeholder="Please enter your address" value="">

                                    <label for="phone">Phone</label><em>*</em>
                                    <input type="phone" name="phone" class="form-control" placeholder="Please enter your phone" value="">

                                    <label for="email">Email</label><em>*</em>
                                    <input type="email" name="email" class="form-control" placeholder="Please enter your email" value="">
                                </div>
                                <div class="card-footer">
                                    <button onclick="return notification()" type="submit" class="btn btn-info">Confirm</button>
                                    <button type="reset" class="btn btn-info">Reset</button>
                                </div>
                            </form>
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
