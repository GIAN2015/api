@extends('layouts.app')

@section('content')
    <h1>Tag: {{ $tag->name }}</h1>

    <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back to Tags</a>
    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
