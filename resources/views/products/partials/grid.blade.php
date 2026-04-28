<div class="row">
    @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if ($product->image)
                    <img src="/storage/{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                @endif

                <div class="card-body">
                    <div class="two-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h5 class="card-title sku">{{ $product->sku }}</h5>
                    </diV>
                    <div class="two-column">
                        <div> 
                            <p class="subject"> Price </p>
                            <p class="fw-bold">${{ number_format($product->price, 2) }}</p>
                        </div>
                        <div> 
                            <p class="subject"> Quantity </p>
                            <p class="fw-bold">{{ number_format($product->quantity) }}</p>
                        </div>
                    </div>
                    
                    <!-- Display description if not null -->
                    @if ($product->description)
                        <div class="card-text">
                            <p class="subject"> Description </p>
                            
                            <p> {{ $product->description }} </p>
                        </div>
                    @endif

                    @if (!$product->description)
                     <div class="card-text">
                            <p class="subject"> Description </p>
                            
                            <p> No description available </p>
                        </div>
                    @endif


                    @auth
                        @if(Auth::user()->role === 'customer')
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="1" min="1" max="{{ $product->quantity }}">
                            <button class="btn btn-primary btn-sm">Add to Cart</button>
                        </form>
                        @endif
                    @endauth

                    @auth
                        @if(Auth::user()->role === 'admin')
                            <div class="crud-container">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
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
