@extends('admin.master')
@section('content')
<div class="market-updates">
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-2">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-eye fa-3x"> </i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Visitors</h4>
                <h3>1,234</h3>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-1">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-users fa-3x"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Admin</h4>
                <h3>{{ $members }}</h3>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-3">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-archive fa-3x"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Product</h4>
                <h3>{{ $products }}</h3>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-4">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Orders</h4>
                <h3>{{ $orders }}</h3>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
@endsection
