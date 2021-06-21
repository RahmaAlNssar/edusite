<div class="courses_container">
    <div class="row courses_row">
        @forelse ($course->videos as $video)
        <div class="row px-0 py-2">
            <div class="col-3">
                <video class="w-100">
                    <source src="{{ $video->video_path }}">
                </video>
            </div>

            <div class="col-9">
                <div class="latest_title">
                    <a href="{{ route('course.video', ['video' => $video->id, 'title' => $video->slug]) }}">
                        {{ $video->title }}
                    </a>
                </div>
                <div class="my-1">
                    <span>
                        Tags :
                        @foreach ($video->tags as $tag)
                        <span class="dark-gray"
                            style="background: #f1f1f1;padding: 3px;color: #14bdee;">{{ $tag->name }}</span>|
                        @endforeach
                    </span>
                    <span class="float-right">{{ $video->created_at->diffForHumans() }}</span>
                </div>
                <p style="max-height: 50px; overflow:hidden">{!! $video->desc !!}</p>
            </div>
        </div>
        @empty
        <p class="text-center">no videos found</p>
        @endforelse

    </div>
</div>
