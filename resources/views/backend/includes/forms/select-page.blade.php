<div class="form-group">
    <label>Page name:</label>
    <select class="select2 form-control" name="page_id">
        <option> Selecr Page </option>
        @forelse ($pages as $page)
        <option value="{{ $page->id }}"
            {{ isset($row) ? ($row->page_id == $page->id ? 'selected' : '') : (old('page_id') == $page->id ? 'selected' : '') }}>
            {{ $page->name }}
        </option>
        @empty
        <option>no categories found</option>
        @endforelse
    </select>
    <span class="red error" id="page_id-error"></span>
</div>
