@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="block font-semibold">SKU</label>
        <input type="text" name="sku" class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block font-semibold">Name</label>
        <input type="text" name="name" class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block font-semibold">Description</label>
        <textarea name="description" class="w-full p-2 border rounded"></textarea>
    </div>

    <div>
        <label class="block font-semibold">Image</label>
        <input type="file" name="image" accept="../assets/*">
    </div>

    <div>
        <label class="block font-semibold">Price</label>
        <input type="number" name="price" step="0.01" class="w-full p-2 border rounded">
    </div>


    <button class="px-4 py-2 bg-green-600 text-white rounded">
        Save Product
    </button>
</form>
@endsection