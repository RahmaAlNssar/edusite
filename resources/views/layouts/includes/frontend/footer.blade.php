<footer class="footer">
    <div class="footer_background"
        style="background-image:url({{ asset('assets/frontend/images/footer_background.png') }})"></div>
    <div class="container">
        <div class="row footer_row">
            <div class="col">
                <div class="footer_content">
                    <div class="row">

                        <div class="col-lg-3 footer_col">

                            <!-- Footer About -->
                            <div class="footer_section footer_about">
                                <div class="footer_logo_container">
                                    <a href="#">
                                        <div class="footer_logo_text">
                                            <img src="{{ asset('assets/frontend/images/logo-alt.png') }}" width="100px">
                                        </div>
                                    </a>
                                </div>
                                <div class="footer_about_text">
                                    <p>Lorem ipsum dolor sit ametium, consectetur adipiscing elit.</p>
                                </div>
                                <div class="footer_social">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-3 footer_col">

                            <!-- Footer Contact -->
                            <div class="footer_section footer_contact">
                                <div class="footer_title">Contact Us</div>
                                <div class="footer_contact_info">
                                    <ul>
                                        <li>Email: Info.deercreative@gmail.com</li>
                                        <li>Phone: +(88) 111 555 666</li>
                                        <li>40 Baria Sreet 133/2 New York City, United States</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-3 footer_col">

                            <!-- Footer links -->
                            <div class="footer_section footer_links">
                                <div class="footer_title">Contact Us</div>
                                <div class="footer_links_container">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="#">Features</a></li>
                                        <li><a href="courses.html">Courses</a></li>
                                        <li><a href="#">Events</a></li>
                                        <li><a href="#">Gallery</a></li>
                                        <li><a href="#">FAQs</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-3 footer_col clearfix">

                            <!-- Footer links -->
                            <div class="footer_section footer_mobile">
                                <div class="footer_title">Mobile</div>
                                <div class="footer_mobile_content">
                                    <div class="footer_image"><a href="#"><img
                                                src="{{ asset('assets/frontend/images/mobile_1.png') }}" alt=""></a>
                                    </div>
                                    <div class="footer_image"><a href="#"><img
                                                src="{{ asset('assets/frontend/images/mobile_2.png') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row copyright_row">
            <div class="col">
                <div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
                    <div class="cr_text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>.
                        Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="ml-lg-auto cr_links">
                        <ul class="cr_list">
                            <li><a href="#">Copyright notification</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<script src="{{ asset('assets/frontend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('assets/frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

{{-- ************** START SWEETALERT JS ************** --}}
@include('sweetalert::alert')
{{-- ************** END SWEETALERT JS ************** --}}


{{-- START PUSHER SCRIPT --}}
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;
    // var pusher = new Pusher('6447b47e7ae98410707d', {
    //     cluster: 'mt1',
    //     authEndPoint: '/broadcasting/auth',
    // });
    // var channel = pusher.subscribe('my-channel');
    // channel.bind('my-event', function(data) {

        // Load New Comment Html
        // let comment = `<li id="${data.comment_id}">
        //     <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
        //         <div class="comment_image">
        //             <div><img src="${data.image}" alt="${data.name}"></div>
        //         </div>
        //         <div class="comment_content">
        //             <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
        //                 <div class="comment_author"><a href="#">${data.name}</a></div>
        //                 <div class="comment_time ml-auto">${data.date}</div>
        //             </div>
        //             <div class="comment_text">
        //                 <p>${data.comment}</p>
        //             </div>
        //         </div>
        //     </div>
        // </li>`;
        // $('.comments_list').append(comment);

        // $('#notification_count').text(parseInt($('#notification_count').text()) + 1);

        // Load New Notification Html
        // var newNotificationHtml = `<li class="scrollable-container ps-container ps-active-y media-list w-100"
        //     style="background: #f1f1f1">
        //     <a href="${data.url}">
        //         <div class="media p-2">
        //             <div class="media-body">
        //                 <h6 class="media-heading mb-1" style="overflow: hidden;max-height: 40px;">${data.title}</h6>
        //                 <div class="d-flex">
        //                     <img src="${data.image}" width="50px" height="50px" style="border-radius: 50%; margin-top:5px;">
        //                     <p class="notification-text font-small-3 text-muted pl-3 pt-1 w-100">
        //                         <span class="text-muted">${data.message}<span
        //                                 class="text-muted float-right">${data.date}</span></span>
        //                     </p>
        //                 </div>
        //             </div>
        //         </div>
        //     </a>

        //     <hr class="mb-0 mt-0">
        // </li>`;
        // $('#notification_list').prepend(newNotificationHtml);
    // });

    // Add Comment
    $(document).on('submit', '.comment_form', function (e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: "POST",
            data: new FormData($(this)[0]),
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function (data, textStatus, jqXHR) {
                form.trigger("reset");

                let comment = `<li id="${data.comment_id}">
                    <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                        <div class="comment_image">
                            <div><img src="${data.image}" alt="${data.name}"></div>
                        </div>
                        <div class="comment_content">
                            <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                <div class="comment_author"><a href="#">${data.name}</a></div>
                                <div class="comment_time ml-auto">${data.date}</div>
                            </div>
                            <div class="comment_text">
                                <p>${data.comment}</p>
                            </div>
                        </div>
                    </div>
                </li>`;
                $('.comments_list').append(comment);
            },
        });
    });

    // Add Like
    $(document).on('click', '.click-like', function (e) {
        e.preventDefault();
        let like    = $(this);
        let icon    = $(this).find('i');
        let counter = $(this).find('.like-count');
        $.ajax({
            url: like.attr('href'),
            type: "get",
            success: function (data, textStatus, jqXHR) {
                if(data.favorites_count >= 0)
                    $('#favorites_count').html(data.favorites_count);

                if (like.find('i').hasClass('fas')) {
                    icon.removeClass('fas').addClass('far');
                    counter.empty().html(data.count);
                }
                else {
                    icon.removeClass('far').addClass('fas');
                    counter.empty().html(data.count);
                }
            },
        });
    });

    // Load All Notifications When Click On Icon
    $('#noty_click').click(function () {
        $('#notification_list').empty().load("{{ route('show.notifications') }}");
        setTimeout(function () {
            $('#notification_count').text(0);
        }, 2000);
    });

    // Load All Favorite When Click On Icon
    $('#favorite_click').click(function () {
        $('#favorites_list').empty().load("{{ route('show.favorites') }}");
    });
</script>
{{-- END PUSHER SCRIPT --}}

<script>

</script>

@yield('script')
</body>

</html>
