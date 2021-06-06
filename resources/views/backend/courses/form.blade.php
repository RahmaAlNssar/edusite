<input type="hidden" name="user_id" value="{{ auth()->id() ?? 1 }}">
{{-- START COURSE Title --}}
<div class="form-group">
    <label>Course Title:</label>
    <div class="input-group">
        <div class="input-group-prepend"> <span class="input-group-text"> <i class="la la-list"></i> </span> </div>
        <input type="text" class="form-control" name="title" value="{{ $row->title ?? old('title') }}"
            placeholder="Course Tite">
    </div>
    <span class="red error" id="title-error"></span>
</div>
{{-- END COURSE Title --}}

<div class="row">
    <div class="col-md-6">
        {{-- START COURSE PRICE --}}
        <div class="form-group">
            <label>Course Price:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span>
                </div>
                <input type="number" class="form-control" name="price" value="{{ $row->price ?? old('price') }}"
                    placeholder="Course Price" min="1">
            </div>
            <span class="red error" id="price-error"></span>
        </div>
        {{-- START COURSE PRICE --}}
    </div>

    <div class="col-md-6">
        {{-- START COURSE DISCOUNT --}}
        <div class="form-group">
            <label>Course Discount:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-percent"></i> </span>
                </div>
                <input type="number" class="form-control" name="discount"
                    value="{{ $row->discount ?? old('discount') }}" placeholder="Course Discount" min="1">
            </div>
            <span class="red error" id="discount-error"></span>
        </div>
        {{-- START COURSE DISCOUNT --}}
    </div>

    <div class="col-md-6">
        {{-- START COURSE CATEGORY --}}
        @include('backend.includes.forms.select-category')
        {{-- START COURSE CATEGORY --}}
    </div>

    <div class="col-md-6">
        {{-- START COURSE IMAGE --}}
        <div class="form-group">
            <label>Course Image:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-image"></i> </span>
                </div>
                <input type="file" class="form-control" name="image">
            </div>
            <span class="red error" id="image-error"></span>
        </div>
        {{-- START COURSE IMAGE --}}
    </div>
</div>

{{-- START COURSE DESCRIPTION --}}
<div class="form-group">
    <label>Course Descrption:</label>
    <textarea class="summernote" name="description">{{ $row->description ?? old('description') }}</textarea>
    <span class="red error" id="description-error"></span>
</div>
{{-- END COURSE DESCRIPTION --}}
