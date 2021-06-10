<div class="row">
    <div class="col-md-7">
        {{-- START VIDEO Title --}}
        <div class="form-group">
            <label>Video Title:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="la la-list"></i> </span>
                </div>
                <input type="text" class="form-control badge-text-maxlength" maxlength="70" name="title"
                    value="{{ $row->title ?? old('title') }}" placeholder="Video Tite" autocomplete="off">
            </div>
            <span class="red error" id="title-error"></span>
        </div>
        {{-- START VIDEO Title --}}

        {{-- START VIDEO SRC --}}
        <div class="form-group">
            <label>Upload Video:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="la la-file-video-o"></i> </span>
                </div>
                <input type="file" class="form-control" name="video" accept="video/*" onchange="previewFile(this)">
            </div>
            <span class="red error" id="video-error"></span>
        </div>
        {{-- START VIDEO SRC --}}

        {{-- START VIDEO COURSE ID --}}
        @include('backend.includes.forms.select-course')
        {{-- START VIDEO COURSE ID --}}
    </div>

    {{-- START VIDEO PREVIEW --}}
    <div class="col-md-5">
        <video width="100%" height="250px" controls>
            <source src="{{ $row->video_path ?? '' }}" type="{{ $row->type ?? 'video/mp4' }}" id="show-file">
            Your browser does not support the video tag.
        </video>
    </div>
    {{-- END VIDEO PREVIEW --}}

    <div class="col-md-12">
        {{-- START VIDEO TAGS --}}
        @include('backend.includes.forms.select-tag')
        {{-- START VIDEO TAGS --}}
    </div>

    {{-- START VIDEO DESCRIPTION --}}
    <div class="col-md-12">
        <div class="form-group">
            <label>Video Description:</label>
            <textarea class="summernote" name="description"
                placeholder="Your Description">{{ $row->description ?? '' }}</textarea>
            <span class="red error" id="description-error"></span>
        </div>
    </div>
    {{-- START VIDEO DESCRIPTION --}}
</div>
