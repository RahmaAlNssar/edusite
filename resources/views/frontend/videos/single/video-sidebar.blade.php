<div class="sidebar" style="padding-top: 45px">
    <div class="sidebar_section">
        <div class="sidebar_section_title">Course List</div>
        <div class="sidebar_latest" style="overflow-y: scroll;max-height: 500px;">
            @foreach ($list as $index => $item)
            <div class="latest d-flex flex-row align-items-start justify-content-start w-100"
                {{ $video->id == $item->id ? 'style = background:#f1f1f1' : '' }}>
                <span style="padding-right: 5px;line-height: 87px;color: #000;">{{ ++$index }}</span>
                <div class="row">
                    <div class="col-5">
                        <video class="w-100 h-100">
                            <source src="{{ $item->video_path }}">
                        </video>
                    </div>
                    <div class="col-7 px-0">
                        <div class="latest_title" style="height: 75px;overflow: hidden;">
                            <a href="{{ route('course.video', ['video' => $item->id, 'title' => $item->slug]) }}"
                                data-toggle="tooltip" title="{{ $item->title }}">{{ $item->title }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
