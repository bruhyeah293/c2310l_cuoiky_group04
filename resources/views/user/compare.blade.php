@extends('user.master')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center">So sánh sản phẩm</h2>

    @if(count($products) > 0)
        <div class="row justify-content-center">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 p-3 text-center shadow-sm">
                        <div style="height: 200px; overflow: hidden;">
                            <img src="{{ asset('images/' . ($product->image ?? 'noimg.png')) }}"
                                 alt="{{ $product->name }}"
                                 class="img-fluid"
                                 style="object-fit: contain; max-height: 100%; width: auto;">
                        </div>

                        <div class="card-body d-flex flex-column text-start">
                            <h5 class="card-title text-center mt-3">{{ $product->name }}</h5>
                            <p class="card-text mb-1"><strong>Danh mục:</strong> {{ $product->category_name ?? 'Không có' }}</p>
                            <p class="card-text mb-1"><strong>Giá:</strong> {{ number_format($product->price) }} VNĐ</p>
                            <p class="card-text mb-1"><strong>Số lượng:</strong> {{ $product->quantity }}</p>
                            <p class="card-text mb-1"><strong>Giới thiệu:</strong> {{ $product->intro }}</p>
                            <p class="card-text mb-3"><strong>Nội dung:</strong> {{ \Illuminate\Support\Str::limit($product->content, 100) }}</p>

                            <div class="d-flex justify-content-between mt-auto pt-3">
                                <a href="{{ route('user.single', $product->id) }}" class="btn btn-outline-primary btn-sm">
                                    Xem chi tiết
                                </a>

                                <form method="POST" action="{{ route('user.remove_compare', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Chưa có sản phẩm nào trong danh sách so sánh.</p>
        @if(count($products) < 3)
            <div class="text-center mt-4">
                <a href="{{ route('user.categories') }}" class="btn btn-success">
                    ➕ Thêm sản phẩm vào so sánh
                </a>
            </div>
        @endif
    @endif
</div>
@endsection
