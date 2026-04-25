@extends('layouts.customer')

@section('content')

    @include('customer.cart.partials.table', ['items' => $items])

@endsection