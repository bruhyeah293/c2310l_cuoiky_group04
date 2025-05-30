@extends('user.master')
@section('content')
    <!-- Slider -->
    @include('user.blocks.slider')
    <!-- Banner -->

    @include('user.blocks.banner')

    <!-- New Arrivals -->

    @include('user.blocks.new_arrival')

    <!-- Deal of the week -->

    {{-- @include('user.blocks.deal_ofthe_week') --}}

    <!-- Best Sellers -->

    @include('user.blocks.best_seller')

    <!-- Benefit -->

    @include('user.blocks.benefit')

    <!-- Blogs -->

    @include('user.blocks.blogs')

    <!-- Newsletter -->

    @include('user.blocks.newsletter')

    <!-- Footer -->

    @include('user.blocks.footer')
@endsection
