<div class="sidebar">
    <!-- Categories -->
    <div class="sidebar_section">
        <div class="sidebar_section_title">Categories</div>
        <div class="sidebar_categories">
            <ul>
                <li><a href="#">Art & Design</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">IT & Software</a></li>
                <li><a href="#">Languages</a></li>
                <li><a href="#">Programming</a></li>
            </ul>
        </div>
    </div>

    {{-- START LATEST COURSES SECTION --}}
    @include('frontend.courses.latest-section')
    {{-- END LATEST COURSES SECTION --}}

    <!-- Gallery -->
    <div class="sidebar_section">
        <div class="sidebar_section_title">Instagram</div>
        <div class="sidebar_gallery">
            <ul class="gallery_items d-flex flex-row align-items-start justify-content-between flex-wrap">
                <li class="gallery_item">
                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                        +</div>
                    <a class="colorbox" href="{{ asset('assets/frontend/images/gallery_1_large.jpg') }}">
                        <img src="{{ asset('assets/frontend/images/gallery_1.jpg') }}" alt="">
                    </a>
                </li>
                <li class="gallery_item">
                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                        +</div>
                    <a class="colorbox" href="{{ asset('assets/frontend/images/gallery_2_large.jpg') }}">
                        <img src="{{ asset('assets/frontend/images/gallery_2.jpg') }}" alt="">
                    </a>
                </li>
                <li class="gallery_item">
                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                        +</div>
                    <a class="colorbox" href="{{ asset('assets/frontend/images/gallery_3_large.jpg') }}">
                        <img src="{{ asset('assets/frontend/images/gallery_3.jpg') }}" alt="">
                    </a>
                </li>
                <li class="gallery_item">
                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                        +</div>
                    <a class="colorbox" href="{{ asset('assets/frontend/images/gallery_4_large.jpg') }}">
                        <img src="{{ asset('assets/frontend/images/gallery_4.jpg') }}" alt="">
                    </a>
                </li>
                <li class="gallery_item">
                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                        +</div>
                    <a class="colorbox" href="{{ asset('assets/frontend/images/gallery_5_large.jpg') }}">
                        <img src="{{ asset('assets/frontend/images/gallery_5.jpg') }}" alt="">
                    </a>
                </li>
                <li class="gallery_item">
                    <div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">
                        +</div>
                    <a class="colorbox" href="{{ asset('assets/frontend/images/gallery_6_large.jpg') }}">
                        <img src="{{ asset('assets/frontend/images/gallery_6.jpg') }}" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>

    {{-- START TAGS SECTION --}}
    @include('frontend.courses.tags-section')
    {{-- END TAGS SECTION --}}


    <!-- Banner -->
    <div class="sidebar_section">
        <div class="sidebar_banner d-flex flex-column align-items-center justify-content-center text-center">
            <div class="sidebar_banner_background"
                style="background-image:url({{ asset('assets/frontend/images/banner_1.jpg') }})">
            </div>
            <div class="sidebar_banner_overlay"></div>
            <div class="sidebar_banner_content">
                <div class="banner_title">Free Book</div>
                <div class="banner_button"><a href="#">download now</a></div>
            </div>
        </div>
    </div>
</div>
