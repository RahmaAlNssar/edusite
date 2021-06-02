{{-- START CATEGORY NAME --}}
<div class="form-group">
    <label>Category Name:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="la la-list"></i> </span>
        </div>
        <input type="text" class="form-control" name="name" value="{{ $row->name ?? old('name') }}"
            placeholder="Category Name">
    </div>
    <span class="red error" id="name-error"></span>
</div>
{{-- START CATEGORY NAME --}}

{{-- START CATEGORY ORDER --}}
<div class="form-group">
    <label>Category order:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fas fa-sort-numeric-up-alt"></i> </span>
        </div>
        <input type="number" class="form-control" name="order" value="{{ $row->order ?? old('order') }}"
            placeholder="Category Order" value="1" min="1">
    </div>
    <span class="red error" id="order-error"></span>
</div>
{{-- START CATEGORY ORDER --}}

{{-- START CATEGORY IS ACTIVE --}}
<div class="form-group">
    <label>Category Status:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fas fa-lightbulb"></i> </span>
        </div>
        <select class="form-control" name="is_active">
            <option value="0"
                {{ isset($row) ? ($row->is_active == 0 ? 'selected' : '') : (old('is_active') == 0 ? 'selected' : '') }}>
                Un Active
            </option>
            <option value="1"
                {{ isset($row) ? ($row->is_active == 1 ? 'selected' : '') : (old('is_active') == 1 ? 'selected' : '') }}>
                Active
            </option>
        </select>
    </div>
    <span class="red error" id="is_active-error"></span>
</div>
{{-- END CATEGORY IS ACTIVE --}}
