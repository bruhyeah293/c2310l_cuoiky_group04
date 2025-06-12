@extends('user.master')

@section('title', 'Write a Review')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Write a Review</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('review.submit') }}">
        @csrf

        <input type="hidden" name="product_id" value="{{ $product_id }}">

        <div class="form-group">
            <label for="content">Your Review</label>
            <textarea class="form-control" name="content" rows="5" required placeholder="Write your review..."></textarea>
        </div>

        <div class="d-flex justify-content-center mt-4 gap-2">
            <button type="submit" class="btn btn-primary mr-2">Submit Review</button>
            <a href="{{ route('index') }}" class="btn btn-secondary ml-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
