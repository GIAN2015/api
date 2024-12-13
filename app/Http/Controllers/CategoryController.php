<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Obtener todas las categorías
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200); // Devolver categorías en formato JSON
    }

    // Crear una nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validar nombre
        ]);
        // return  $request->all();
        $category = Category::create($request->all());
        return response()->json(['message' => 'Category created successfully!', 'category' => $category], 201);
    }

    // Mostrar una categoría específica
    public function show(Category $category)
    {
        return response()->json($category, 200); // Devolver categoría en formato JSON
    }

    // Actualizar una categoría
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validar nombre
        ]);

        $category->update($request->all());
        return response()->json(['message' => 'Category updated successfully!', 'category' => $category], 200);
    }

    // Eliminar una categoría
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully!'], 200);
    }
}
