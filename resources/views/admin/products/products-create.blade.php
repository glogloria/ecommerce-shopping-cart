@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="block font-semibold">SKU</label>
        <input type="text" name="sku" class="w-full p-2 border rounded">
    </div>

    <div c>
        <label class="block font-semibold">Name</label>
        <input type="text" name="name" class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block font-semibold">Description</label>
        <textarea name="description" class="w-full p-2 border rounded"></textarea>
    </div>

    <div class="price-quantity">
        <div>
            <label class="block font-semibold">Price</label>
            <input type="number" name="price" step="0.01" class=" p-2 border rounded">
        </div>

        <div> 
            <label class="block font-semibold">Quantity</label>
            <input type="number" name="quantity" class=" p-2 border rounded">
        </div>
       
    </div>

    <div>
        <label class="block font-semibold">Image</label>
        <input type="file" name="image" accept="../assets/*">
    </div>

    <button class="w-full px-4 py-2 bg-black text-white rounded">
        Add Product
    </button>

    <button id="closeModal"
        class="w-full mt-3 bg-gray-300 py-2 rounded hover:bg-gray-400">
        Cancel
    </button>
</form>
@endsection