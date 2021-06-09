{{-- START COURSE Title --}}
<div class="form-group">
    <label>Post Title:</label>
    <div class="input-group">
        <div class="input-group-prepend"> <span class="input-group-text"> <i class="la la-list"></i> </span>
        </div>
        <input type="text" class="form-control" name="title" value="{{ $row->title ?? old('title') }}"
            placeholder="Post Tite">
    </div>
    <span class="red error" id="title-error"></span>
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


            <div class="col-md-4">
                {{-- START COURSE DISCOUNT END DATE --}}
                @include('backend.includes.forms.select-visibility')
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
    <label>Post Descrption:</label>
    <textarea class="summernote" name="descrption">{{ $row->descrption ?? old('descrption') }}</textarea>
    <span class="red error" id="description-error"></span>
</div>
{{-- END COURSE DESCRIPTION --}}
