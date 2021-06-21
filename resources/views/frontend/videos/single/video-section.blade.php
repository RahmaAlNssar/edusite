<div class="courses_container">
    <div class="row courses_row">
        <div class="my-4">
            <h3 class="mt-3">{{ $video->title }}</h3>
        </div>
        <video class="w-100 mb-3" controls>
            <source src="{{ $video->video_path }}">
        </video>
        <div class="comment_item d-flex justify-content-start pt-0 w-100">
            <div class="comment_image">
                <div> <img src="{{ $video->course->user->image_url }}"></div>
            </div>
            <div class="comment_content align-self-center">
                <div class="comment_title_container d-flex justify-content-between">
                    <div class="comment_author d-flex align-items-center">
                        <a href="#">{{ $video->course->user->name }}</a> <br>
                    </div>
                    <div class="float-right"><i class="mt-1">Views: {{ $visitors }}</i></div>
                </div>
            </div>
        </div>

        <div class="mt-2 w-100">
            <span>
                Tags :
                @foreach ($video->tags as $tag)
                <span class="dark-gray" style="background: #f1f1f1;padding: 3px;color: #14bdee;">{{ $tag->name }}</span>
                @if(!$loop->last)|@endif
                @endforeach
            </span>
            <span class="float-right">{{ $video->created_at->diffForHumans() }}</span>
            <hr>
        </div>
        <p class="mt-2">{!! $video->desc !!}</p>
    </div>
</div>
