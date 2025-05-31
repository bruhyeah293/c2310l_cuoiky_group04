<!DOCTYPE html>
<head>
    @include('admin.blocks.head')
</head>
{{-- @if (Session::has('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('success') }}</strong>
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('error') }}</strong>
    </div>
@endif --}}
<body>
    <section id="container">
        <!--header start-->
            <header class="header fixed-top clearfix">
                @include('admin.blocks.header')
            </header>
        <!--header end-->
        <!--sidebar start-->
            @include('admin.blocks.sidebar')
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
                <section class="wrapper">
                    <div class="table-agile-info">
                        @yield('content')
                    </div>
                </section>
        </section>
        <!--main content end-->
    </section>
    @include('admin.blocks.foot')
</body>
</html>
