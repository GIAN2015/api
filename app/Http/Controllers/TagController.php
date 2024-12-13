<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // Obtener todas las etiquetas
    public function index()
    {
        $tags = Tag::all();
        return response()->json($tags, 200); // Devolver etiquetas en formato JSON
    }

    // Crear una nueva etiqueta
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validar nombre
        ]);

        $tag = Tag::create($request->all());
        return response()->json(['message' => 'Tag created successfully!', 'tag' => $tag], 201);
    }

    // Mostrar una etiqueta específica
    public function show(Tag $tag)
    {
        return response()->json($tag, 200); // Devolver etiqueta en formato JSON
    }

    // Actualizar una etiqueta
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validar nombre
        ]);

        $tag->update($request->all());
        return response()->json(['message' => 'Tag updated successfully!', 'tag' => $tag], 200);
    }

    // Eliminar una etiqueta
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(['message' => 'Tag deleted successfully!'], 200);
    }
}
