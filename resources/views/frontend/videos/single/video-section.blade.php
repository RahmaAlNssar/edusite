<div class="courses_container">
    <div class="row courses_row">
        <video class="w-100 mt-5 mb-3" controls>
            <source src="{{ $video->video_path }}">
        </video>
        <div>
            <h3> {{ $video->title }} </h3>
        </div>
        <div class="comment_item d-flex justify-content-start pt-3 w-100">
            <div class="comment_image">
                <div> <img src="{{ $video->course->user->image_url }}" alt="{{ $video->course->user->name }}"></div>
            </div>
            <div class="comment_content align-self-center">
                <div class="comment_title_container d-flex justify-content-between">
                    <div class="comment_author d-flex align-items-center">
                        <a href="#">{{ $video->course->user->name }}</a> <br>
                    </div>
                    <div class="blog_social ml-lg-auto d-flex justify-content-between">
                        <ul>
                            <li> <span class="mr-5"> <i class="fa fa-eye"></i> {{ $video->visitors->count() }} </span>
                            </li>
                            <li>
                                @auth
                                <a href="{{ route('video.like', $video) }}" class="click-like" style="color:#a5a5a5">
                                    <i
                                        class=" {{ $video->likes()->whereUserId(auth()->id())->count() > 0 ? 'fas' : 'far' }} fa-thumbs-up"></i>
                                    <span class="like-count">{{ $video->likes->count() }}</span>
                                </a>
                                @else
                                <span> <i class="fa fa-thumbs-up"></i> <span
                                        class="like-count">{{ $video->likes->count() }}</span></span>
                                @endauth
                            </li>
                        </ul>
                    </div>
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
