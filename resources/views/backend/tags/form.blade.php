{{-- START TAG NAME --}}
<div class="form-group">
    <label>Tag Name:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="la la-tag"></i> </span>
        </div>
        <input type="text" class="form-control" name="tag" value="{{ $row->name ?? old('name') }}"
            placeholder="Tage Name">
    </div>
    <span class="red error" id="name-error"></span>
</div>
{{-- START TAG NAME --}}

{{-- START TAG ICON --}}
<div class="form-group">
    <label>Tag Icon:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="la la-navicon"></i> </span>
        </div>
        <input type="text" class="form-control" name="icon" value="{{ $row->icon ?? old('icon') }}"
            placeholder="EX: fas fa-icons">
    </div>
    <span class="red error" id="icon-error"></span>
</div>
{{-- START TAG ICON --}}