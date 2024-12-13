<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="name">Product Name</label>
    <input type="text" name="name" id="name" required>

    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <label for="tags">Tags</label>
    <select name="tags[]" id="tags" multiple>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>

    <button type="submit">Save Product</button>
</form>
