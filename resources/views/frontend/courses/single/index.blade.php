@extends('layouts.frontend')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/styles/blog_single.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/styles/blog_single_responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/styles/course.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/styles/course_responsive.css') }}">
@endsection

@section('page_title', ' | Post')

@section('home')
@include('frontend.includes.breadcrumbs', [
'breadcrumb_link' => '<li><a href='.route("courses").'>Courses</a></li>
<li>Single Course</li>'
])
@endsection

@section('content')
<div class="course">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="course_title mb-2">{{ $course->title }}</div>
            </div>
            <!-- Course -->
            <div class="col-lg-8">
                <div class="course_container">
                    <div
                        class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mt-0">
                        <!-- Course Info Item -->
                        <div class="course_info_item">
                            <div class="course_info_title">Teacher:</div>
                            <div class="course_info_text">
                                <a
                                    href="{{ route('courses', ['id' => $course->user_id, 'teacher' => $course->user->name]) }}">
                                    {{ $course->user->name }}
                                </a>
                            </div>
                        </div>

                        <!-- Course Info Item -->
                        <div class="course_info_item">
                            <div class="course_info_title">Reviews:</div>
                            <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                        </div>

                        <!-- Course Info Item -->
                        <div class="course_info_item">
                            <div class="course_info_title">Categories:</div>
                            <div class="course_info_text">
                                <a href="{{ route('courses', ['category' => $course->category->slug]) }}">
                                    {{ $course->category->name }}
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- Course Image -->
                    <div class="course_image">
                        <img src="{{ $course->image_url }}" width="100%" alt="{{ $course->title }}">
                    </div>

                    <!-- Course Tabs -->
                    <div class="course_tabs_container">
                        <div class="tabs d-flex flex-row align-items-center justify-content-start">
                            <div class="tab active">description</div>
                            <div class="tab">curriculum</div>
                            <div class="tab">reviews</div>
                        </div>
                        <div class="tab_panels">

                            <!-- Description -->
                            <div class="tab_panel active">
                                <div class="tab_panel_title">{{ $course->title }}</div>
                                <div class="tab_panel_content">
                                    <div class="tab_panel_text">{!! $course->desc !!}</div>
                                </div>
                            </div>

                            <div class="tab_panel tab_panel_2">
                                <div class="tab_panel_content">
                                    <div class="tab_panel_title">{{ $course->title }}</div>
                                    <div class="tab_panel_content">
                                        <div class="tab_panel_text"> {{ $course->short_desc }} </div>
                                        <ul class="dropdowns">
                                            @foreach ($course->videos as $index => $video)
                                            <li>
                                                <div class="dropdown_item">
                                                    <div class="dropdown_item_title">
                                                        <a
                                                            href="{{ route('course.video', ['video' => $video->id, 'title' => $video->slug]) }}">
                                                            Lecture {{ ++$index }}: {{ $video->title }}
                                                        </a>
                                                    </div>
                                                    <div class="dropdown_item_text">{!! $video->desc !!}</div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews -->
                            <div class="tab_panel tab_panel_3">
                                <div class="tab_panel_title">Course Review</div>

                                <!-- Rating -->
                                <div class="review_rating_container">
                                    <div class="review_rating">
                                        <div class="review_rating_num">4.5</div>
                                        <div class="review_rating_stars">
                                            <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                        </div>
                                        <div class="review_rating_text">(28 Ratings)</div>
                                    </div>
                                    <div class="review_rating_bars">
                                        <ul>
                                            <li><span>5 Star</span>
                                                <div class="review_rating_bar">
                                                    <div style="width:90%;"></div>
                                                </div>
                                            </li>
                                            <li><span>4 Star</span>
                                                <div class="review_rating_bar">
                                                    <div style="width:75%;"></div>
                                                </div>
                                            </li>
                                            <li><span>3 Star</span>
                                                <div class="review_rating_bar">
                                                    <div style="width:32%;"></div>
                                                </div>
                                            </li>
                                            <li><span>2 Star</span>
                                                <div class="review_rating_bar">
                                                    <div style="width:10%;"></div>
                                                </div>
                                            </li>
                                            <li><span>1 Star</span>
                                                <div class="review_rating_bar">
                                                    <div style="width:3%;"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Comments -->
                                @include('frontend.includes.comments-section', ['comments' => $course->comments])

                                <div class="add_comment_container">
                                    <div class="add_comment_title">Write a comment</div>
                                    <div class="add_comment_text">
                                        @auth
                                        <form action="{{ route('course.comment', $course) }}" class="comment_form"
                                            method="POST">
                                            @csrf
                                            <div>
                                                <div class="form_title">Write your comment :</div>
                                                <textarea class="comment_input comment_textarea" required="required"
                                                    name="comment"></textarea>
                                            </div>
                                            <div>
                                                <button type="submit" class="comment_button trans_200">submit</button>
                                            </div>
                                        </form>
                                        @else
                                        You must be <a href="{{ route('login') }}">logged</a> in to post a comment.
                                        @endauth
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Sidebar -->
            <div class="col-lg-4">
                @include('frontend.courses.single.sidebar')
            </div>
        </div>
    </div>
</div>

{{-- START TEAM SECTION --}}
@include('frontend.includes.newsletter')
{{-- END TEAM SECTION --}}
@endsection

@section('script')
<script src="{{ asset('assets/frontend/plugins/colorbox/jquery.colorbox-min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/course.js') }}"></script>
@endsection
