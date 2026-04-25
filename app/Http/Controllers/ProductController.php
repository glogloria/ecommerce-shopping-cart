<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // $path = $request->file('image') ->store('products', 'public');
    /**
     * Display all product
     */
    public function index() {
        $products = DB::select("SELECT * FROM products");
        return response()->json($products);
    }


    public function publicIndex() {
        $products = Product::orderBy('id', 'desc')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show form to create new product
     */
    public function create()
    {
        return view('admin.products-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|string|max:255|unique:products,sku',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'quantity' => 'required|numeric|min:1'
        ]);

        // Handle image upload
        $imagePath = null;
        if($request->hasFile(('image'))) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Prepared statement
        DB::insert(
            "INSERT INTO products (sku, name, description, price, image, quantity)
            VALUES (?, ?, ?, ?, ?, ?)",
            [
                $validated['sku'],
                $validated['name'],
                $validated['description'] ?? null,
                $validated['price'],
                $imagePath,
                $validated['quantity']
            ]
        );
        return response()->json(['success' => true]);
    }

    /**
     * Display products
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'quantity' => 'required|numeric'
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->back()->with('success', 'Product updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Producted deleted.');
    }
}
