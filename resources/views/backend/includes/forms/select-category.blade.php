<div class="form-group">
    <label>Category name:</label>
    <select class="select2 form-control" name="category_id">
        @forelse ($categories as $category)
        <option value="{{ $category->id }}"
            {{ isset($row) ? ($row->category_id == $category->id ? 'selected' : '') : (old('category_id') == $category->id ? 'selected' : '') }}>
            {{ $category->name }}
        </option>
        @empty
        <option>no categories found</option>
        @endforelse
    </select>
    <span class="red error" id="category_id-error"></span>
</div>
