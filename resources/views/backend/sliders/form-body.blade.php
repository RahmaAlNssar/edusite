<div data-repeater-item>
    <div class="row">
        <div class="col-md-8">
            {{-- START SLICE ID --}}
            <input type="hidden" name="id" value="{{ $image->id ?? '' }}">
            {{-- END SLICE ID --}}

            {{-- START SLICE Title --}}
            <div class="form-group">
                <label>Slice Title:</label>
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="la la-header"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control badge-text-maxlength" maxlength="60" name="title"
                        value="{{ $image->title ?? old('title') }}" placeholder="Slice Tite">
                </div>
                <span class="red error" id="title-error"></span>
            </div>
            {{-- END SLICE Title --}}

            {{-- START SLICE DESCRIPTION --}}
            <div class="form-group">
                <label>Slice Short Description:</label>
                <div class="input-group">
                    <div class="input-group-prepend"> <span class="input-group-text"> <i class="la la-italic"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control badge-text-maxlength" maxlength="120" name="desc"
                        value="{{ $image->desc ?? old('desc') }}" placeholder="Slice Short Description">
                </div>
                <span class="red error" id="desc-error"></span>
            </div>
            {{-- END SLICE DESCRIPTION --}}

            {{-- START DELETE SLIDER --}}
            <span class="btn btn-danger d-block w-100" data-repeater-delete="">
                <i class="fas fa-times"></i>
            </span>
            {{-- END DELETE SLIDER --}}
        </div>

        <div class="col-md-4">
            {{-- START SLICE IMAGE --}}
            @include('backend.includes.forms.input-file', ['image' => $image->image_url ?? null])
            {{-- START SLICE IMAGE --}}
        </div>
    </div>
    <hr>
</div>
