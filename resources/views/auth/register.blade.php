<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}" >
    <link href="{{ asset('admin/assets/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('admin/assets/css/style-responsive.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/assets/css/font.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/font-awesome.css') }}" rel="stylesheet">
    <script src="{{ asset('admin/assets/js/jquery2.0.3.min.js') }}"></script>
    <style>
        /* Thêm CSS cho lỗi validation để dễ nhìn hơn */
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }
        .invalid-feedback {
            color: #dc3545; /* Màu đỏ cho lỗi */
            font-size: 80%; /* Kích thước nhỏ hơn */
            margin-top: .25rem;
            display: block; /* Đảm bảo lỗi hiển thị trên dòng riêng */
        }
    </style>
</head>
<body>
<div class="log-w3">
    <div class="w3layouts-main">
        <h2>Sign Up</h2>

        {{-- Hiển thị thông báo lỗi chung từ Session (nếu có) --}}
        @if (Session::has('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>{{ Session::get('error') }}</strong>
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif

        <form action="{{ route('postregister') }}" method="post">
            @csrf
            <input type="text" class="ggg @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="email" class="ggg @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="password" class="ggg @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="password" class="ggg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password" required>
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="hidden" name="level" value="2">
            <div class="clearfix"></div>
            <input type="submit" value="Register" name="register">
        </form>

        <div class="text-center mt-3">
            <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
        </div>
    </div>
</div>

<script src="{{ asset('admin/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.scrollTo.js') }}"></script>
</body>
</html>
