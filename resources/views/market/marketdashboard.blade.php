@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Market Dashboard</h2>

        @if (session('alert'))
            <div class="alert alert-warning">
                {{ session('alert') }}
            </div>
        @endif

        @if ($status === 'not_submitted')
            <div class="alert alert-info">
                <p>You haven't submitted your vendor profile yet.</p>
                <a href="{{ route('pay') }}?t={{ $token }}" class="btn btn-primary">Become a Vendor</a>
            </div>
        @endif

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Total Products</h5>
                        <h2>{{ $products->count() }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Total Orders</h5>
                        <h2>{{ $orders->count() }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Yearly Order Value</h5>
                        <h2>&#8358;{{ number_format($yearlyOrderValue) }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <h4>Inventory</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->productname }}</td>
                        <td>&#8358;{{ number_format($product->price) }}</td>
                        <td>{{ $product->qty }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <h4>Orders</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Customer</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->product }}</td>
                        <td>&#8358;{{ number_format($order->price) }}</td>
                        <td>{{ $order->qty }}</td>
                        <td>{{ $order->customername }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No orders found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
