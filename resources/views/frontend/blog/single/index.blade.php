@extends('layouts.frontend')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/styles/blog_single.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/styles/blog_single_responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/styles/courses.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/styles/courses_responsive.css') }}">
@endsection

@section('page_title', ' | Post')

@section('home')
@include('frontend.includes.breadcrumbs', [
'breadcrumb_link' => '<li><a href='.route("blog").'>Blog</a></li>
<li>Single Post</li>'
])
@endsection
@section('content')
<div class="blog">
    <div class="container">
        <div class="row">

            <!-- Blog Content -->
            <div class="col-lg-8">
                <div class="blog_content">
                    <div class="blog_title">{{ $post->title }}</div>
                    <div class="blog_meta">
                        <ul>
                            <li>Post on <a href="#">{{ $post->created_at->diffForHumans() }}</a></li>
                            <li>By <a href="#">{{ $post->user->name }}</a></li>
                            <li>
                                Category <a href="{{ route('blog', ['category' => $post->category->slug]) }}">
                                    {{ $post->category->name }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    @if($post->image)
                    <div class="blog_image"><img src="{{ $post->image_url }}" alt="{{ $post->title }}" width="100%">
                    </div>
                    @endif

                    <div class="pt-4">{!! $post->desc !!}</div>
                </div>
                <div
                    class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                    <div class="blog_tags">
                        <span>Tags: </span>
                        <ul>
                            @foreach ($post->tags as $tag)
                            <li><a href="{{ route('blog', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>, </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog_social ml-lg-auto">
                        <span>Share: </span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Comments -->
                <div class="comments_container">
                    <div class="comments_title"><span>30</span> Comments</div>
                    <ul class="comments_list">
                        <li>
                            <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                <div class="comment_image">
                                    <div><img src="images/comment_1.jpg" alt=""></div>
                                </div>
                                <div class="comment_content">
                                    <div
                                        class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_author"><a href="#">Jennifer Aniston</a></div>
                                        <div class="comment_rating">
                                            <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                        </div>
                                        <div class="comment_time ml-auto">October 19,2018</div>
                                    </div>
                                    <div class="comment_text">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have alteration in some form, by injected humour.</p>
                                    </div>
                                    <div
                                        class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up"
                                                    aria-hidden="true"></i><span>108</span></a></div>
                                        <div class="comment_extra comment_reply"><a href="#"><i
                                                    class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i><span>Reply</span></a></div>
                                    </div>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                        <div class="comment_image">
                                            <div><img src="images/comment_2.jpg" alt=""></div>
                                        </div>
                                        <div class="comment_content">
                                            <div
                                                class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                <div class="comment_author"><a href="#">John Smith</a></div>
                                                <div class="comment_rating">
                                                    <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i>
                                                    </div>
                                                </div>
                                                <div class="comment_time ml-auto">October 19,2018</div>
                                            </div>
                                            <div class="comment_text">
                                                <p>There are many variations of passages of Lorem Ipsum available, but
                                                    the majority have alteration in some form, by injected humour.</p>
                                            </div>
                                            <div
                                                class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                <div class="comment_extra comment_likes"><a href="#"><i
                                                            class="fa fa-thumbs-up"
                                                            aria-hidden="true"></i><span>108</span></a></div>
                                                <div class="comment_extra comment_reply"><a href="#"><i
                                                            class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i><span>Reply</span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                <div class="comment_image">
                                    <div><img src="images/comment_3.jpg" alt=""></div>
                                </div>
                                <div class="comment_content">
                                    <div
                                        class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_author"><a href="#">Jane Austen</a></div>
                                        <div class="comment_rating">
                                            <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                        </div>
                                        <div class="comment_time ml-auto">October 19,2018</div>
                                    </div>
                                    <div class="comment_text">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have alteration in some form, by injected humour.</p>
                                    </div>
                                    <div
                                        class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up"
                                                    aria-hidden="true"></i><span>108</span></a></div>
                                        <div class="comment_extra comment_reply"><a href="#"><i
                                                    class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i><span>Reply</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="add_comment_container">
                        <div class="add_comment_title">Write a comment</div>
                        <div class="add_comment_text">Your email address will not be published. Required fields are
                            marked *</div>
                        <form action="#" class="comment_form">
                            <div>
                                <div class="form_title">Review*</div>
                                <textarea class="comment_input comment_textarea" required="required"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 input_col">
                                    <div class="form_title">Name*</div>
                                    <input type="text" class="comment_input" required="required">
                                </div>
                                <div class="col-md-6 input_col">
                                    <div class="form_title">Email*</div>
                                    <input type="text" class="comment_input" required="required">
                                </div>
                            </div>
                            <div class="comment_notify">
                                <input type="checkbox" id="checkbox_notify" name="regular_checkbox"
                                    class="regular_checkbox checkbox_account" checked>
                                <label for="checkbox_notify"><i class="fa fa-check" aria-hidden="true"></i></label>
                                <span>Notify me of new posts by email</span>
                            </div>
                            <div>
                                <button type="submit" class="comment_button trans_200">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                {{-- START COURSES SIDEBAR SECTION --}}
                @include('frontend.blog.blog-sidebar')
                {{-- END COURSES SIDEBAR SECTION --}}
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
