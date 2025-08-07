@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="inspect-product-holder">
        <div class="back-from-inspect mb-3">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="inspect-slider">
            <div class="slider mb-3">
                <img src="{{ $product->pic1 }}" class="img-fluid" alt="Product image"/>
            </div>

            <div class="slide-info">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2>&#8358;{{ number_format($product->price) }}</h2>
                        <p>{{ $product->about }}</p>
                    </div>
                    <div>
                        <i class="bi bi-eye-fill"></i> {{ $newViews }} views
                    </div>
                </div>
            </div>

            <div class="slide-more-info row mt-3">
                <div class="col-md-6">
                    <strong>Quantity:</strong> {{ $product->sold }}/{{ $product->unit }}
                </div>
                <div class="col-md-6">
                    <strong>Location:</strong> {{ $product->location }}
                </div>
            </div>

            <form method="POST" action="{{ route('market.inspect.store') }}">
                @csrf
                <input type="hidden" name="pctid" value="{{ $product->productid }}">
                <input type="hidden" name="pdname" value="{{ $product->name }}">
                <input type="hidden" name="pdpic" value="{{ $product->pic1 }}">
                <input type="hidden" name="sellerid" value="{{ $product->userid }}">
                <input type="hidden" name="userid" value="{{ $user->Id }}">
                <input type="hidden" name="name" value="{{ $user->name }}">
                <input type="hidden" name="ppic" value="{{ $user->ppic }}">
                <input type="hidden" name="amount" value="{{ $product->price }}">
                <input type="hidden" name="address" value="{{ $user->location }}">

                <div class="slide-contact-buttons mt-4">
                    <button class="btn btn-primary me-2" type="submit" name="pay">
                        <i class="bi bi-wallet2"></i> PAY NOW
                    </button>
                    <button class="btn btn-outline-secondary" type="button" onclick="alert('Contact revealed')">
                        <i class="bi bi-telephone-fill"></i> Show contact
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
