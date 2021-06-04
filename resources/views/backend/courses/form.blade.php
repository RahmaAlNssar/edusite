<input type="hidden" name="user_id" value="1">
{{-- START COURSE Title --}}
<div class="form-group">
    <label>Course Title:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="la la-list"></i> </span>
        </div>
        <input type="text" class="form-control" name="title" value="{{ $row->title ?? old('title') }}"
            placeholder="Course Tite">
    </div>
    <span class="red error" id="title-error"></span>
</div>
{{-- START COURSE Title --}}



<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label>Course Price:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-sort-numeric-up-alt"></i> </span>
                </div>
                <input type="number" class="form-control" name="price" value="{{ $row->price ?? old('price') }}"
                    placeholder="Course Price" value="1" min="1">
            </div>
            <span class="red error" id="price-error"></span>
        </div>
    </div>
    <div class="col-4">

        <div class="form-group">
            <label>Course Discount:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-sort-numeric-up-alt"></i> </span>
                </div>
                <input type="number" class="form-control" name="discount"
                    value="{{ $row->discount ?? old('discount') }}" placeholder="Course Discount" value="1" min="1">
            </div>
            <span class="red error" id="discount-error"></span>
        </div>

    </div>
    <div class="col-4">

        <div class="form-group">
            <label>Category:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-lightbulb"></i> </span>
                </div>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ isset($row) ? ($row->category_id == $category->id ? 'selected' : '') : (old('category_id') == $category->id ? 'selected' : '') }}>
                            {{ $category->name }}</option>

                    @endforeach
                </select>
            </div>
            <span class="red error" id="category_id-error"></span>
        </div>

    </div>
</div>

{{-- START IMAGE INPUT --}}

<div class="form-group">

    <label for="image">Course Image</label>
</div>
<div class="input-group">

    <input type="file" class="form-control-file" id="image" name="image">
    
    <span class="red error" id="image-error"></span>
</div>

</div>
{{-- END IMAGE INPUT --}}

{{-- START COURSE TEXTAREA --}}
<div class="form-group" style="margin-right: 10px;">
    <label>Course Descrption:</label>
    {{-- <div class="input-group"> --}}
        <textarea class="form-control summernote" id="description" name="description" rows="2"
            placeholder="Course Descrption">{{ $row->description ?? old('description') }}</textarea>
        <span class="red error" id="description-error"></span>
    {{-- </div> --}}
</div>
