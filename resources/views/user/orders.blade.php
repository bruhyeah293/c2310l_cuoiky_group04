@extends('user.master')

@section('title', 'Đơn hàng đã đặt')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Đơn hàng đã đặt</h2>
    @if($orders->isEmpty())
        <p>Bạn chưa có đơn hàng nào.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tên người nhận</th>
                    <th>Quốc gia</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->product_id }}</td>
                    <td>{{ $order->qty }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->national }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->status ?? 'Đang xử lý' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
