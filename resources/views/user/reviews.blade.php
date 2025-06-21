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
                        @php
                            $img = $review->product_image ?? 'noimg.png';
                        @endphp
                        <img src="{{ asset('images/' . $img) }}"
                             class="card-img-top"
                             alt="{{ $review->product_name }}"
                             style="height: 200px; object-fit: cover;">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $review->product_name }}</h5>
                            <p class="card-text">{{ $review->content }}</p>
                            <div class="mt-auto">
                                <small class="text-muted">
                                    —
                                    @if (!empty($review->user_email))
                                        {{ $review->user_email }}
                                    @elseif (!empty($review->member_email))
                                        {{ $review->member_email }}
                                    @else
                                        Anonymous
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
