<div class="course">
    @if ($post->image)
    <div class="course_image"><img src="{{ $post->image_url }}" alt="{{ $post->title }}" width=360px height=229px></div>
    @endif
    <div class="course_body">
        <h3 class="course_title" style="max-height: 28px; overflow: hidden">
            <a href="{{ route('post', ['id' => $post->id, 'title' => $post->slug]) }}" data-toggle="tooltip"
                title="{{ $post->title }}">
                {{ $post->title }}
            </a>
        </h3>
        <div class="course_teacher d-flex justify-content-between pt-2 pb-3">
            <a href="{{ route('blog', ['id' => $post->user_id, 'teacher' => $post->user->name]) }}"
                style="font-weight: bold;color: #b5b8be;text-transform: uppercase;">
                {{ $post->user->name }}
            </a>
            <span style="font-weight: 400;color: #b5b8be;text-transform: uppercase;">
                {{ $post->created_at->diffForHumans() }}
            </span>
        </div>
        <div class="blog_post_text" style="height: 85px;overflow: hidden;">{!! $post->desc !!}</div>
    </div>
</div>
