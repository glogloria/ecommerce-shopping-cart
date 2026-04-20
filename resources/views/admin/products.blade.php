@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Products</h1>

<a href="{{ route('admin.products.create') }}"
   class="px-4 py-2 bg-blue-600 text-white rounded mb-4 inline-block">
    Add Product
</a>

<table class="w-full bg-white shadow rounded">
    <thead>
        <tr class="border-b">
            <th class="p-3 text-left">Name</th>
            <th class="p-3 text-left">Image</th>
            <th class="p-3 text-left">Description</th>
            <th class="p-3 text-left">Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr class="border-b">
            <td class="p-3">{{ $product->name }}</td>
            <td class="p-3">{{ $product->image }}</td>
            <td class="p-3">{{ $product->description }}</td>
            <td class="p-3">${{ $product->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection