<div class="form-group">
    <label>Select Tags:</label>
    <select data-placeholder="Select a tags..." class="select2-icons form-control" multiple="" tabindex="-1"
        aria-hidden="true" name="tags[]">
        @forelse ($tags as $tag)
        <option value="{{ $tag->id }}" data-icon=" {{ $tag->icon }}"
            {{ isset($row) ? (in_array($tag->id, $row['tags']) ? 'selected' : '') : (in_array($tag->id, old('tags')) ? 'selected' : '') }}>
            {{ $tag->name }}
        </option>
        @empty
        <option> no tags found </option>
        @endforelse
    </select>
    <span class="red error" id="tags-error"></span>
</div>
