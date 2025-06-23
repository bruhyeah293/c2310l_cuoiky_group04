@extends('user.master')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center">Compare Products</h2>

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
                            <p class="card-text mb-1"><strong>Category:</strong> {{ $product->category_name ?? 'N/A' }}</p>
                            <p class="card-text mb-1"><strong>Price:</strong> {{ number_format($product->price) }} VND</p>
                            <p class="card-text mb-1"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                            <p class="card-text mb-1"><strong>Introduction:</strong> {{ $product->intro }}</p>
                            <p class="card-text mb-3"><strong>Content:</strong> {{ \Illuminate\Support\Str::limit($product->content, 100) }}</p>

                            <div class="d-flex justify-content-between mt-auto pt-3">
                                <a href="{{ route('user.single', $product->id) }}" class="btn btn-outline-primary btn-sm">
                                    View Details
                                </a>

                                <form method="POST" action="{{ route('user.remove_compare', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Nếu sản phẩm < 3 thì hiển thị nút thêm --}}
        @if(count($products) < 3)
            <div class="text-center mt-4">
                <a href="{{ route('user.categories') }}" class="btn btn-success">
                    ➕ Add more products to compare
                </a>
            </div>
        @endif
    @else
        <p class="text-center">There are no products in your comparison list.</p>
        <div class="text-center mt-4">
            <a href="{{ route('user.categories') }}" class="btn btn-success">
                ➕ Add products to compare
            </a>
        </div>
    @endif
</div>
@endsection
