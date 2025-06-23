@extends('user.master')

@section('title', 'Order History')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Order History</h2>
    @if($orders->isEmpty())
        <p>You have not placed any orders yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Recipient Name</th>
                    <th>Country</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Total</th>
                    <th>Status</th>
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
                    <td>
                        @if($order->status == 1)
                            <span class="text-success">Accepted</span>
                        @elseif($order->status == 0)
                            <span class="text-danger">Rejected</span>
                        @else
                            <span class="text-warning">Pending</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
