@extends('layouts.app')

@section('content')
    <h1>Tags</h1>
    <a href="{{ route('tags.create') }}" class="btn btn-primary">Create New Tag</a>

    <ul>
        @foreach ($tags as $tag)
            <li>
                <a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a>
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
