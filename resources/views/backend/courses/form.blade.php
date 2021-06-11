{{-- START COURSE Title --}}
<div class="form-group">
    <label>Course Title:</label>
    <div class="input-group">
        <div class="input-group-prepend"> <span class="input-group-text"> <i class="la la-header"></i> </span>
        </div>
        <input type="text" class="form-control badge-text-maxlength" maxlength="50" name="title"
            value="{{ $row->title ?? old('title') }}" placeholder="Course Tite" autocomplete="off">
    </div>
    <span class="red error" id="title-error"></span>
</div>
{{-- END COURSE Title --}}

{{-- START COURSE Title --}}
<div class="form-group">
    <label>Short Description:</label>
    <div class="input-group">
        <div class="input-group-prepend"> <span class="input-group-text"> <i class="la la-italic"></i> </span>
        </div>
        <input type="text" class="form-control badge-text-maxlength" name="short_desc" maxlength="75"
            value="{{ $row->short_desc ?? old('short_desc') }}" placeholder="Short Description" autocomplete="off">
    </div>
    <span class="red error" id="short_desc-error"></span>
</div>
{{-- END COURSE Title --}}

<div class="row">
    <div class="col-md-8">
        <div class="row px-0">
            <div class="col-md-6">
                {{-- START COURSE CATEGORY --}}
                @include('backend.includes.forms.select-user')
                {{-- START COURSE CATEGORY --}}
            </div>

            <div class="col-md-6">
                {{-- START COURSE CATEGORY --}}
                @include('backend.includes.forms.select-category')
                {{-- START COURSE CATEGORY --}}
            </div>

            <div class="col-md-6">
                {{-- START COURSE PRICE --}}
                <div class="form-group">
                    <label>Course Price:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span>
                        </div>
                        <input type="number" class="form-control badge-text-maxlength" maxlength="4" name="price"
                            value="{{ $row->price ?? old('price') }}" placeholder="Course Price" min="1"
                            autocomplete="off">
                    </div>
                    <span class="red error" id="price-error"></span>
                </div>
                {{-- START COURSE PRICE --}}
            </div>

            <div class="col-md-6">
                {{-- START COURSE DISCOUNT END DATE --}}
                @include('backend.includes.forms.select-visibility')
                {{-- END COURSE DISCOUNT END DATE --}}
            </div>

            <div class="col-md-4 discount">
                {{-- START COURSE DISCOUNT --}}
                <div class="form-group">
                    <label>Course Discount:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-percent"></i> </span>
                        </div>
                        <<<<<<< HEAD <input type="number" class="form-control badge-text-maxlength" maxlength="2"
                            name="discount" min="1" max="100" placeholder="Enter Value in %" autocomplete="off"
                            value="{{ $row->discount ?? old('discount') }}">
                            =======
                            <input type="number" class="form-control" name="discount" min="1" max="99.99"
                                placeholder="Enter Value in %" value="{{ $row->discount ?? old('discount') }}">
                            >>>>>>> 9c73471aa9a36f6f90d019829b1131f406746063
                    </div>
                    <span class="red error" id="discount-error"></span>
                </div>
                {{-- START COURSE DISCOUNT --}}
            </div>

            <div class="col-md-4 removed">
                {{-- START COURSE DISCOUNT START DATE --}}
                <div class="form-group">
                    <label>Discount Start Date:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-calendar-alt"></i> </span>
                        </div>
                        <input type="date" class="form-control" name="start_date"
                            min="{{ $row->start_date ?? date('Y-m-d') }}"
                            value="{{ $row->start_date ?? old('start_date') }}">
                    </div>
                    <span class="red error" id="start_date-error"></span>
                </div>
                {{-- END COURSE DISCOUNT START DATE --}}
            </div>

            <div class="col-md-4 removed">
                {{-- START COURSE DISCOUNT END DATE --}}
                <div class="form-group">
                    <label>Discount End Date:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-calendar-alt"></i> </span>
                        </div>
                        <input type="date" class="form-control" name="end_date"
                            min="{{ $row->start_date ?? date('Y-m-d', time() + 86400) }}"
                            value="{{ $row->end_date ?? old('end_date') }}">
                    </div>
                    <span class="red error" id="end_date-error"></span>
                </div>
                {{-- END COURSE DISCOUNT END DATE --}}
            </div>

        </div>
    </div>

    <div class="col-md-4">
        {{-- START COURSE IMAGE --}}
        <div class="form-group">
            <label>Upload Image :</label>
            <div id="file-preview">
                <input type="file" name="image" class="form-control input-image" accept="image/*"
                    onchange="previewFile(this)">
                <div>
                    <img src="{{ $row->image_url ?? 'https://www.lifewire.com/thmb/2KYEaloqH6P4xz3c9Ot2GlPLuds=/1920x1080/smart/filters:no_upscale()/cloud-upload-a30f385a928e44e199a62210d578375a.jpg' }}"
                        class="img-border img-thumbnail" id="show-file">
                </div>
            </div>
            <span class="error red" id="image-error"></span>
        </div>
        {{-- START COURSE IMAGE --}}
    </div>
</div>

{{-- START COURSE DESCRIPTION --}}
<div class="form-group">
    <label>Course Descrption:</label>
    <textarea class="summernote" name="desc">{{ $row->desc ?? old('desc') }}</textarea>
    <span class="red error" id="desc-error"></span>
</div>
{{-- END COURSE DESCRIPTION --}}
