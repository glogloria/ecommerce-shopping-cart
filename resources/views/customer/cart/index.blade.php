@extends('layouts.customer')

@section('content')

    @include('customer.cart.partials.table', ['items' => $items])

    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <button class="btn btn-warning btm-sm">Checkout</button>
    </form>
@endsection