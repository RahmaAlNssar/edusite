<div class="course">
    <div class="course_image"><img src="{{ $course->image_url }}" alt="{{ $course->title }}" width=360px height=229px>
    </div>
    <div class="course_body">
        <h3 class="course_title" style="max-height: 28px; overflow: hidden">
            <a href="{{ route('course', ['id' => $course->id, 'title' => $course->slug]) }}" data-toggle="tooltip"
                title="{{ $course->title }}">
                {{ $course->title }}
            </a>
        </h3>
        <div class="course_teacher" style="max-height: 22px;overflow: hidden;">
            <a href="{{ route('courses', ['id' => $course->user_id, 'teacher' => $course->user->name]) }}"
                style="color: #14bdee; font-weight: bold">
                {{ $course->user->name }}
            </a>
        </div>
        <div class="course_text" style="max-height: 54px; overflow: hidden">
            <p>{!! $course->desc !!}</p>
        </div>
    </div>
    <div class="course_footer">
        <div class="course_footer_content d-flex flex-row align-items-center justify-content-between">
            <div class="course_info">
                <i class="fa fa-star" aria-hidden="true"></i>
                <span>{{ round($course->ratings()->avg('star'), 1) }} Ratings</span>
            </div>
            <div class="course_price ml-auto">
                @if ($course->discount)
                <span>${{ $course->price }}</span>{{ $course->total() }}
                @else
                {{ $course->price ? '$' . $course->price : 'FREE' }}
                @endif
            </div>
        </div>
        <a href="{{ route('course.videos', ['id' => $course->id, 'course' => $course->slug]) }}"
            class="btn btn-outline-info d-block w-100"> Show Videos </a>
    </div>
</div>
