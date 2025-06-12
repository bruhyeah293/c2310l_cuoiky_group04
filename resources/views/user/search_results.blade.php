@extends('master')

@section('content')
    <h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>

    @if($products->isEmpty())
        <p>Không tìm thấy sản phẩm nào.</p>
    @else
        <ul>
            @foreach($products as $product)
                <li>{{ $product->name }} - {{ $product->price }}$</li>
            @endforeach
        </ul>
    @endif
@endsection
