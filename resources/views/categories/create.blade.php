<!-- resources/views/categories/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <!-- Nombre de la categoría -->
        <div>
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <button type="submit">Save Category</button>
    </form>
@endsection
