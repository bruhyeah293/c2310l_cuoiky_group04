@extends('user.master')

@section('title', 'Sản phẩm đã thích')

@section('content')
<style>
    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover; /* Giữ tỷ lệ ảnh, cắt bớt nếu cần */
    }
    .card {
        height: 100%; /* Giữ thẻ card đều nhau nếu cần */
    }
</style>

<div class="container mt-5">
    <h2 class="mb-4">Sản phẩm đã thích</h2>
    @if($favorites->isEmpty())
        <p>Chưa có sản phẩm nào được thêm vào yêu thích.</p>
    @else
        <div class="row">
            @foreach($favorites as $product)
                <div class="col-md-4 mb-4 d-flex">
                    <div class="card w-100">
                        <img src="{{ asset('images/' . ($product->image ?? 'noimg.png')) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
