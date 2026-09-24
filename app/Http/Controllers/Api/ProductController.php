<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
return response()->json(Product::latest()->paginate(10));
}

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:25',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
]);
            $product = Product::create($data);
            return response()->json($product, 201); // 201 = Created
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
$data = $request->validate([
'title' => 'sometimes|max:25',
'description' => 'sometimes|max:255',
'price' => 'sometimes|numeric',
'quantity' => 'sometimes|integer',
]);
$product->update($data);
return response()->json($product);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
{
$product->delete();
return response()->json(['message' => 'Product deleted'], 200);
}
}
