@extends('admin.master')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Cart For Admin
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <!-- <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button> -->
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-3">
                <div class="input-group">
                    {{-- <input type="text" class="input-sm form-control" placeholder="Search" />
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Search</button>
                    </span> --}}
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <!-- <td>
                        <label class="i-checks m-b-none"><input type="checkbox" name="post[]" /><i></i></label>
                        </td> -->
                        <th>ID</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Order confirmation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($carts as $cart )
                            <tr>
                                <!-- <td>
                                <label class="i-checks m-b-none"><input type="checkbox" name="post[]" /><i></i></label>
                                </td> -->
                                <td>{{$loop->iteration}}</td>
                                <td>{{$cart->product_id}}</td>
                                <td>{{$cart->qty}}</td>
                                <td>{{$cart->email}}</td>
                                <td>{{$cart->name}}</td>
                                <td>{{$cart->address}}</td>
                                <td>{{$cart->phone}}</td>
                                <td>${{$cart->total}}</td>
                                <td>@if ($cart->status==0) Delivery in progress @elseif($cart->status==1) Delivered @else Cancel @endif</td>
                                <td>
                                <a href="{{route('admin.success', $cart->id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active" style="width:50px; height:30px"></i></a>
                                <a href="{{route('admin.cancel', $cart->id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"style="width:50px; height:30px"></i></a>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                 <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div> -->
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li>
                            <a href=""><i class="fa fa-chevron-left"></i></a>
                        </li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li>
                            <a href=""><i class="fa fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div> 
            </div>
        </footer>
    </div>
</div>

@endsection
