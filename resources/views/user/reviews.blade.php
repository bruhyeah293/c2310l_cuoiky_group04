@extends('user.master')

@section('title', 'All Reviews')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Customer Reviews</h2>

    @if($reviews->isEmpty())
        <p class="text-center">No reviews available.</p>
    @else
        <div class="row">
            @foreach($reviews as $review)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('user/' . $review->product_id . '.jpg') }}" class="card-img-top" alt="{{ $review->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $review->name }}</h5>
                            <p class="card-text">{{ $review->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
