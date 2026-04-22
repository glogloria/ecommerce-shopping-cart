<div class="row">
    @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if ($product->image)
                    <img src="/storage/{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                @endif

                <div class="card-body">
                    <div class="card-container">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h5 class="card-title">{{ $product->sku }}</h5>
                    </diV>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="fw-bold">${{ number_format($product->price, 2) }}</p>

                    @auth
                        @if(Auth::user()->role === 'admin')
                            <div class="crud-container">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning"
                                    >
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this product?'); ">
                                    @csrf 
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
</div>
