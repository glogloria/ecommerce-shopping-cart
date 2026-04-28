@extends('layouts.customer')

@section('content')

    <h1> Order confirmation </h1>
    <p> Thank you for your purchase, {{ auth()->user()->name }}. </p>

@endsection