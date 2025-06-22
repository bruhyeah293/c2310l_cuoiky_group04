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
    <style>
.compare-box {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #fff;
    border-top: 2px solid #ccc;
    padding: 8px 10px;
    z-index: 9999;
}

.compare-box .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0;
}

.compare-box .d-flex {
    gap: 5px;
}

.compare-box .product-item {
    width: 90px;
    text-align: center;
    margin: 0;
    height: 120px;
    position: relative;
}

.compare-box img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 5px;
    margin-bottom: 5px;
}

.compare-box .product-name {
    font-size: 12px;
    margin-top: 5px;
    white-space: normal;
    overflow: unset;
}
</style>


    @if(session('compare') && count(session('compare')) > 0)
        @php
            $compareIds = session('compare', []);
            $compareIds = is_array($compareIds) ? array_values($compareIds) : [];
            $compareCount = count($compareIds);

            $compareProducts = $compareCount > 0
                ? \Illuminate\Support\Facades\DB::table('products')
                    ->join('category', 'products.category_id', '=', 'category.id')
                    ->select('products.*', 'category.name as category_name')
                    ->whereIn('products.id', $compareIds)
                    ->get()
                : collect();
                // dd(session('compare'));
        @endphp

        @if($compareCount > 0)
            <div class="compare-box">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="d-flex gap-3">
                        @foreach($compareProducts as $cp)
                            <div class="product-item" style="position: relative;">
                                <img src="{{ asset('images/' . ($cp->image ?? 'noimg.png')) }}" alt="{{ $cp->name }}">
                                <div class="product-name">{{ $cp->name }}</div>
                                <form method="POST" action="{{ route('user.remove_compare', $cp->id) }}" style="position: absolute; top: -8px; right: -8px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; background: transparent; font-size: 14px;" onclick="event.stopPropagation();">
                                        ❌
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('user.compare') }}" class="btn btn-primary btn-sm">So sánh ({{ $compareCount }})</a>
                </div>
            </div>
        @endif
    @endif

@endsection
