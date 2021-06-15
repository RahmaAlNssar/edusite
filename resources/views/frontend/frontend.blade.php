@extends('layouts.frontend')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/frontend/styles/main_styles.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/styles/responsive.css') }}">
@endsection

@section('content')

{{-- Slider --}}
@include('frontend.includes.slider')

<!-- Features -->
<div class="features">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Welcome To Unicat E-Learning</h2>
                    <div class="section_subtitle">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu.
                            Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row features_row">

            <!-- Features Item -->
            <div class="col-lg-3 feature_col">
                <div class="feature text-center trans_400">
                    <div class="feature_icon"><img src="{{ asset('assets/frontend/images/icon_1.png') }}" alt=""></div>
                    <h3 class="feature_title">The Experts</h3>
                    <div class="feature_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    </div>
                </div>
            </div>

            <!-- Features Item -->
            <div class="col-lg-3 feature_col">
                <div class="feature text-center trans_400">
                    <div class="feature_icon"><img src="{{ asset('assets/frontend/images/icon_2.png') }}" alt=""></div>
                    <h3 class="feature_title">Book & Library</h3>
                    <div class="feature_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    </div>
                </div>
            </div>

            <!-- Features Item -->
            <div class="col-lg-3 feature_col">
                <div class="feature text-center trans_400">
                    <div class="feature_icon"><img src="{{ asset('assets/frontend/images/icon_3.png') }}" alt=""></div>
                    <h3 class="feature_title">Best Courses</h3>
                    <div class="feature_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    </div>
                </div>
            </div>

            <!-- Features Item -->
            <div class="col-lg-3 feature_col">
                <div class="feature text-center trans_400">
                    <div class="feature_icon"><img src="{{ asset('assets/frontend/images/icon_4.png') }}" alt=""></div>
                    <h3 class="feature_title">Award & Reward</h3>
                    <div class="feature_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Popular Courses -->

@include('frontend.home.courses')

<!-- Counter -->

<div class="counter">
    <div class="counter_background"
        style="background-image:url({{ asset('assets/frontend/images/counter_background.jpg') }})"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="counter_content">
                    <h2 class="counter_title">Register Now</h2>
                    <div class="counter_text">
                        <p>Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry’s standard dumy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book.</p>
                    </div>

                    <!-- Milestones -->

                    <div class="milestones d-flex flex-md-row flex-column align-items-center justify-content-between">

                        <!-- Milestone -->
                        <div class="milestone">
                            <div class="milestone_counter" data-end-value="15">0</div>
                            <div class="milestone_text">years</div>
                        </div>

                        <!-- Milestone -->
                        <div class="milestone">
                            <div class="milestone_counter" data-end-value="120" data-sign-after="k">0</div>
                            <div class="milestone_text">years</div>
                        </div>

                        <!-- Milestone -->
                        <div class="milestone">
                            <div class="milestone_counter" data-end-value="670" data-sign-after="+">0</div>
                            <div class="milestone_text">years</div>
                        </div>

                        <!-- Milestone -->
                        <div class="milestone">
                            <div class="milestone_counter" data-end-value="320">0</div>
                            <div class="milestone_text">years</div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="counter_form">
            <div class="row fill_height">
                <div class="col fill_height">
                    <form class="counter_form_content d-flex flex-column align-items-center justify-content-center"
                        action="#">
                        <div class="counter_form_title">courses now</div>
                        <input type="text" class="counter_input" placeholder="Your Name:" required="required">
                        <input type="tel" class="counter_input" placeholder="Phone:" required="required">
                        <select name="counter_select" id="counter_select" class="counter_input counter_options">
                            <option>Choose Subject</option>
                            <option>Subject</option>
                            <option>Subject</option>
                            <option>Subject</option>
                        </select>
                        <textarea class="counter_input counter_text_input" placeholder="Message:"
                            required="required"></textarea>
                        <button type="submit" class="counter_form_button">submit now</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Events -->

<div class="events">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Upcoming events</h2>
                    <div class="section_subtitle">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu.
                            Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row events_row">

            <!-- Event -->
            <div class="col-lg-4 event_col">
                <div class="event event_left">
                    <div class="event_image"><img src="{{ asset('assets/frontend/images/event_1.jpg') }}" alt=""></div>
                    <div class="event_body d-flex flex-row align-items-start justify-content-start">
                        <div class="event_date">
                            <div class="d-flex flex-column align-items-center justify-content-center trans_200">
                                <div class="event_day trans_200">21</div>
                                <div class="event_month trans_200">Aug</div>
                            </div>
                        </div>
                        <div class="event_content">
                            <div class="event_title"><a href="#">Which Country Handles Student Debt?</a></div>
                            <div class="event_info_container">
                                <div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>15.00 -
                                        19.30</span></div>
                                <div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>25 New
                                        York City</span></div>
                                <div class="event_text">
                                    <p>Policy analysts generally agree on a need for reform, but not on which
                                        path...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event -->
            <div class="col-lg-4 event_col">
                <div class="event event_mid">
                    <div class="event_image"><img src="{{ asset('assets/frontend/images/event_2.jpg') }}" alt=""></div>
                    <div class="event_body d-flex flex-row align-items-start justify-content-start">
                        <div class="event_date">
                            <div class="d-flex flex-column align-items-center justify-content-center trans_200">
                                <div class="event_day trans_200">27</div>
                                <div class="event_month trans_200">Aug</div>
                            </div>
                        </div>
                        <div class="event_content">
                            <div class="event_title"><a href="#">Repaying your student loans (Winter
                                    2017-2018)</a></div>
                            <div class="event_info_container">
                                <div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>09.00 -
                                        17.30</span></div>
                                <div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>25
                                        Brooklyn City</span></div>
                                <div class="event_text">
                                    <p>This Consumer Action News issue covers topics now being debated before...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event -->
            <div class="col-lg-4 event_col">
                <div class="event event_right">
                    <div class="event_image"><img src="{{ asset('assets/frontend/images/event_3.jpg') }}" alt=""></div>
                    <div class="event_body d-flex flex-row align-items-start justify-content-start">
                        <div class="event_date">
                            <div class="d-flex flex-column align-items-center justify-content-center trans_200">
                                <div class="event_day trans_200">01</div>
                                <div class="event_month trans_200">Sep</div>
                            </div>
                        </div>
                        <div class="event_content">
                            <div class="event_title"><a href="#">Alternative data and financial inclusion</a>
                            </div>
                            <div class="event_info_container">
                                <div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>13.00 -
                                        18.30</span></div>
                                <div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>25 New
                                        York City</span></div>
                                <div class="event_text">
                                    <p>Policy analysts generally agree on a need for reform, but not on which
                                        path...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Team -->

<div class="team">
    <div class="team_background parallax-window" data-parallax="scroll"
        data-image-src="{{ asset('assets/frontend/images/team_background.jpg') }}" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">The Best Tutors in Town</h2>
                    <div class="section_subtitle">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu.
                            Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row team_row">

            <!-- Team Item -->
            <div class="col-lg-3 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_image"><img src="{{ asset('assets/frontend/images/team_1.jpg') }}" alt="">
                    </div>
                    <div class="team_body">
                        <div class="team_title"><a href="#">Jacke Masito</a></div>
                        <div class="team_subtitle">Marketing & Management</div>
                        <div class="social_list">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Item -->
            <div class="col-lg-3 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_image"><img src="{{ asset('assets/frontend/images/team_2.jpg') }}" alt="">
                    </div>
                    <div class="team_body">
                        <div class="team_title"><a href="#">William James</a></div>
                        <div class="team_subtitle">Designer & Website</div>
                        <div class="social_list">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Item -->
            <div class="col-lg-3 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_image"><img src="{{ asset('assets/frontend/images/team_3.jpg') }}" alt="">
                    </div>
                    <div class="team_body">
                        <div class="team_title"><a href="#">John Tyler</a></div>
                        <div class="team_subtitle">Quantum mechanics</div>
                        <div class="social_list">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Item -->
            <div class="col-lg-3 col-md-6 team_col">
                <div class="team_item">
                    <div class="team_image"><img src="{{ asset('assets/frontend/images/team_4.jpg') }}" alt="">
                    </div>
                    <div class="team_body">
                        <div class="team_title"><a href="#">Veronica Vahn</a></div>
                        <div class="team_subtitle">Math & Physics</div>
                        <div class="social_list">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Latest News -->

<div class="news">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Latest News</h2>
                    <div class="section_subtitle">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu.
                            Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row news_row">
            <div class="col-lg-7 news_col">

                <!-- News Post Large -->
                <div class="news_post_large_container">
                    <div class="news_post_large">
                        <div class="news_post_image"><img src="{{ asset('assets/frontend/images/news_1.jpg') }}" alt="">
                        </div>
                        <div class="news_post_large_title"><a href="blog_single.html">Here’s What You Need to
                                Know About Online Testing for the ACT and SAT</a></div>
                        <div class="news_post_meta">
                            <ul>
                                <li><a href="#">admin</a></li>
                                <li><a href="#">november 11, 2017</a></li>
                            </ul>
                        </div>
                        <div class="news_post_text">
                            <p>Policy analysts generally agree on a need for reform, but not on which path
                                policymakers should take. Can America learn anything from other nations...</p>
                        </div>
                        <div class="news_post_link"><a href="blog_single.html">read more</a></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 news_col">
                <div class="news_posts_small">

                    <!-- News Posts Small -->
                    <div class="news_post_small">
                        <div class="news_post_small_title"><a href="blog_single.html">Home-based business
                                insurance issue (Spring 2017 - 2018)</a></div>
                        <div class="news_post_meta">
                            <ul>
                                <li><a href="#">admin</a></li>
                                <li><a href="#">november 11, 2017</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- News Posts Small -->
                    <div class="news_post_small">
                        <div class="news_post_small_title"><a href="blog_single.html">2018 Fall Issue: Credit
                                Card Comparison Site Survey (Summer 2018)</a></div>
                        <div class="news_post_meta">
                            <ul>
                                <li><a href="#">admin</a></li>
                                <li><a href="#">november 11, 2017</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- News Posts Small -->
                    <div class="news_post_small">
                        <div class="news_post_small_title"><a href="blog_single.html">Cuentas de cheques
                                gratuitas una encuesta de Consumer Action</a></div>
                        <div class="news_post_meta">
                            <ul>
                                <li><a href="#">admin</a></li>
                                <li><a href="#">november 11, 2017</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- News Posts Small -->
                    <div class="news_post_small">
                        <div class="news_post_small_title"><a href="blog_single.html">Troubled borrowers have
                                fewer repayment or forgiveness options</a></div>
                        <div class="news_post_meta">
                            <ul>
                                <li><a href="#">admin</a></li>
                                <li><a href="#">november 11, 2017</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
    <div class="newsletter_background parallax-window" data-parallax="scroll"
        data-image-src="{{ asset('assets/frontend/images/newsletter.jpg') }}" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div
                    class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

                    <!-- Newsletter Content -->
                    <div class="newsletter_content text-lg-left text-center">
                        <div class="newsletter_title">sign up for news and offers</div>
                        <div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we
                            offer</div>
                    </div>

                    <!-- Newsletter Form -->
                    <div class="newsletter_form_container ml-lg-auto">
                        <form action="#" id="newsletter_form"
                            class="newsletter_form d-flex flex-row align-items-center justify-content-center">
                            <input type="email" class="newsletter_input" placeholder="Your Email" required="required">
                            <button type="submit" class="newsletter_button">subscribe</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
