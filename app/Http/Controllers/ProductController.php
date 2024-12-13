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
        // Cargar productos con su relación de categoría
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }
    public function category()
{
    return $this->belongsTo(Category::class);
}

public function tags()
{
    return $this->belongsToMany(Tag::class);
}


    public function create()
    {
     $categories = Category::all();  // Obtener todas las categorías
     $tags = Tag::all();  // Obtener todas las etiquetas
     return view('products.create', compact('categories', 'tags')); 
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'tags' => 'array',
        'tags.*' => 'exists:tags,id',
    ]);

    // Crear el producto
    $product = Product::create([
        'name' => $validated['name'],
        'category_id' => $validated['category_id'],
    ]);

    // Asociar las etiquetas al producto
    if (isset($validated['tags'])) {
        $product->tags()->attach($validated['tags']);
    }

    return redirect()->route('products.index')->with('success', 'Product created successfully!');
}

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }


    
}
