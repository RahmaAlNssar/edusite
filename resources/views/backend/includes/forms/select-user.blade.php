<div class="form-group">
    <label>User name:</label>
    <select class="select2 form-control" name="user_id">
        <option> selecr user </option>
        @forelse ($users as $user)
        <option value="{{ $user->id }}"
            {{ isset($row) ? ($row->user_id == $user->id ? 'selected' : '') : (old('user_id') == $user->id ? 'selected' : '') }}>
            {{ $user->name }}
        </option>
        @empty
        <option>no users found</option>
        @endforelse
    </select>
    <span class="red error" id="user_id-error"></span>
</div>
