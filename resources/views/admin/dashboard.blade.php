<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <x-slot name="header">
            <div class="flex items-center justify-between">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>

                <!-- Nav Buttons -->
                <div class="flex items-center space-x-4">

                    <!-- Add Product  -->
                    <button id="OpenModal"
                            class="px-4 py-2 bg-black text-white rounded-md shadow hover:bg-indigo-700 transition">
                        Add New Product
                    </button>

                    <!-- Logout  -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="">
                            {{ __('Log Out') }}
                        </button>
                    </form>

                </div>

            </div>
        </x-slot>

        <!-- Add Product Modal -->
        <div id="productModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
            <div class="bg-white p-6 rounded shadow-lg w-[500px]">
                @include('admin.products.products-create')
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2> Products <h2>
                   {{-- <div class="p-6 text-gray-900" id="product-list">
                    
                    </div> --}}
                <div class="row">
                    @include('products.partials.grid')
                </div>
            </div>
        </div>
    </x-app-layout>

<script>
    window.routes = {
        loadProducts: "{{ route('admin.products') }}",
        saveProduct: "{{ route('admin.products.store') }}"
    };
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('productModal');
    const openModal = document.getElementById('OpenModal');
    const closeModal = document.getElementById('closeModal');
    const saveProduct = document.getElementById('saveProduct');
    const productList = document.getElementById('product-list');

    openModal.onclick = () => modal.classList.replace('hidden', 'flex');
    closeModal.onclick = () => modal.classList.replace('flex', 'hidden');

    function loadProducts() {
        fetch("{{ route('admin.products') }}")
            .then(res => res.json())
            .then(products => {
                productList.innerHTML = "";
                products.forEach(p => {
                    productList.innerHTML += `
                        <div class="p-4 border rounded-lg shadow-sm bg-white mb-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold">${p.name}</h3>
                                <span class="text-sm text-gray-500">${p.sku}</span>
                            </div>

                            <div class="mt-2 text-indigo-600 font-bold">$${p.price}</div>

                            ${p.image ? `
                                <img src="/storage/${p.image}" class="w-32 h-32 object-cover rounded mt-3 border" />
                            ` : `
                                <div class="w-32 h-32 bg-gray-200 rounded mt-3 flex items-center justify-center text-gray-500">
                                    No Image
                                </div>
                            `}

                            ${p.description ? `<p class="mt-3 text-gray-700">${p.description}</p>` : ""}
                        </div>
                    `;
                });
            });
    }

    saveProduct.onclick = () => {
        const formData = new FormData();
        formData.append('sku', document.getElementById('sku').value);
        formData.append('name', document.getElementById('name').value);
        formData.append('description', document.getElementById('description').value);
        formData.append('price', document.getElementById('price').value);
        formData.append('quantity', document.getElementById('quantity').value)

        const image = document.getElementById('image');
        if (image.files.length > 0) {
            formData.append('image', image.files[0]);
        }

        fetch("{{ route('admin.products.store') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(res => res.json())
        .then(() => {
            modal.classList.replace('flex', 'hidden');
            loadProducts();
        });
    };

    loadProducts();
});
</script>

</body>
</html>