{{-- START SLIDER NAME --}}
<div class="form-group">
    <label>Slider Name:</label>
    <div class="input-group">
        <div class="input-group-prepend"> <span class="input-group-text"> <i class="la la-bookmark"></i> </span>
        </div>
        <input type="text" class="form-control badge-text-maxlength" maxlength="20" name="name"
            value="{{ $row->name ?? old('name') }}" placeholder="Slider Name">
    </div>
    <span class="red error" id="name-error"></span>
</div>
{{-- END SLIDER NAME --}}

<div class="repeater-default">
    <div data-repeater-list="car">
        <div data-repeater-item>
            <div class="row">
                <div class="col-md-8">
                    {{-- START SLICE Title --}}
                    <div class="form-group">
                        <label>Slice Title:</label>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="la la-header"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control badge-text-maxlength" maxlength="60" name="title"
                                value="{{ $row->title ?? old('title') }}" placeholder="Slice Tite">
                        </div>
                        <span class="red error" id="title-error"></span>
                    </div>
                    {{-- END SLICE Title --}}

                    {{-- START SLICE DESCRIPTION --}}
                    <div class="form-group">
                        <label>Slice Short Description:</label>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="la la-italic"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control badge-text-maxlength" maxlength="120" name="desc"
                                value="{{ $row->desc ?? old('desc') }}" placeholder="Slice Short Description">
                        </div>
                        <span class="red error" id="desc-error"></span>
                    </div>
                    {{-- END SLICE DESCRIPTION --}}
                </div>

                <div class="col-md-4">
                    {{-- START SLICE IMAGE --}}
                    <div class="form-group">
                        <label>Slice Image :</label>
                        <div id="file-preview">
                            <input type="file" name="image" class="form-control input-image" accept="image/*"
                                onchange="previewFile(this)">
                            <div>
                                <img src="{{ $row->image_url ?? 'https://wowslider.net/local-sliders/demo-10/data1/images/road220058.jpg' }}"
                                    class="img-border img-thumbnail" id="show-file">
                            </div>
                        </div>
                        <span class="error red" id="image-error"></span>
                    </div>
                    {{-- START SLICE IMAGE --}}
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="form-group overflow-hidden">
        <div class="col-12">
            <button data-repeater-create class="btn btn-primary">
                <i class="ft-plus"></i> Add
            </button>
        </div>
    </div>
</div>
