@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="row">
        <div class="col-md-6">
            <img src="/storage/{{ $product->image }}" class="img-fluid rounded shadow">
        </div>

        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>

            <p class="text-muted">${{ number_format($product->price, 2) }}</p>

            <p>{{ $product->description }}</p>

            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button class="btn btn-primary mt-3">Add to Cart</button>
            </form>
        </div>
    </div>

</div>
@endsection