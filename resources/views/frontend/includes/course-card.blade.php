<div class="col-lg-4 course_col">
    <div class="course">
        <div class="course_image"><img src="{{ $course->image_url }}" alt="{{ $course->title }}" width=360px
                height=229px>
        </div>
        <div class="course_body">
            <h3 class="course_title" style="max-height: 28px; overflow: hidden">
                <a href="{{ route('course', [$course->id, $course->slug]) }}" data-toggle="tooltip"
                    title="{{ $course->title }}">
                    {{ $course->title }}
                </a>
            </h3>
            <div class="course_teacher">{{ $course->user->name }}</div>
            <div class="course_text" style="max-height: 50px; overflow: hidden">
                <p>{!! $course->description !!}</p>
            </div>
        </div>
        <div class="course_footer">
            <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                <div class="course_info">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <span>20 Student</span>
                </div>
                <div class="course_info">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <span>5 Ratings</span>
                </div>
                <div class="course_price ml-auto">
                    @if ($course->discount)
                    <span>${{ $course->price }}</span>{{ $course->total() }}
                    @else
                    {{ $course->price ? '$' . $course->price : 'FREE' }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>