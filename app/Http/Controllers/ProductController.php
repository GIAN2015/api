<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with(['category', 'tags'])->get();
        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        return "HOAL";
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $product = Product::create([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
        ]);

        if (isset($validated['tags'])) {
            $product->tags()->attach($validated['tags']);
        }

        return response()->json(['message' => 'Product created successfully!', 'product' => $product], 201);
    }

    public function show(Product $product)
    {
        $product->load(['category', 'tags']); // Cargar relaciones
        return response()->json($product, 200);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $product->update([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
        ]);

        if (isset($validated['tags'])) {
            $product->tags()->sync($validated['tags']); // Actualizar etiquetas
        }

        return response()->json(['message' => 'Product updated successfully!', 'product' => $product], 200);
    }

    public function destroy(Product $product)
    {
        $product->tags()->detach(); // Desasociar etiquetas
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully!'], 200);
    }
}
