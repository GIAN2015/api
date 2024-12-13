<!-- resources/views/categories/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre de la categoría -->
        <div>
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <button type="submit">Update Category</button>
    </form>
@endsection
