{{-- START FOOTER --}}
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a
                class="text-bold-800 grey darken-2"
                href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT
            </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i
                class="ft-heart pink"></i></span>
    </p>
</footer>
{{-- END FOOTER --}}

{{-- ************** START VENDOR JS ************** --}}
<script type="text/javascript" src="{{ path('vendors/js/vendors.min.js') }}"></script>
<script type="text/javascript" src="{{ path('vendors/js/forms/select/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ path('vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ path('vendors/js/forms/extended/maxlength/bootstrap-maxlength.js') }}"></script>
{{-- ************** END VENDOR JS ************** --}}

{{-- ************** START FONTAWESOME JS ************** --}}
<script type="text/javascript" src="{{ path('fonts/fontawesome/js/all.min.js') }}"></script>
{{-- ************** START FONTAWESOME JS ************** --}}

{{-- ************** START MODERN JS ************** --}}
<script type="text/javascript" src="{{ path('js/core/app.js') }}"></script>
<script type="text/javascript" src="{{ path('js/core/app-menu.js') }}"></script>
<script type="text/javascript" src="{{ path('js/scripts/customizer.js') }}"></script>
<script type="text/javascript" src="{{ path('js/scripts/forms/select/form-select2.js') }}"></script>
{{-- ************** END MODERN JS ************** --}}

{{-- ************** START SWEETALERT JS ************** --}}
@include('sweetalert::alert')
{{-- ************** END SWEETALERT JS ************** --}}

{{-- ************** START CUSTOM JS ************** --}}
<script type="text/javascript" src="{{ path('custom/js/preview-file.js') }}"></script>
<script type="text/javascript" src="{{ path('custom/js/script.js') }}"></script>
{{-- ************** END CUSTOM JS ************** --}}

<script type="text/javascript">
    $('.badge-text-maxlength').maxlength({
        alwaysShow: true,
        separator: ' of ',
        preText: 'You have ',
        postText: ' chars remaining.',
        validate: true,
        warningClass: "badge badge-success",
        limitReachedClass: "badge badge-danger",
    });
</script>


{{-- START PUSHER SCRIPT --}}
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
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
                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = true;
                var pusher = new Pusher('6447b47e7ae98410707d', {cluster: 'mt1'});
                var channel = pusher.subscribe('new-notification');
                channel.bind('App\\Events\\NewNotification', function(data) {
                    // Load New Notification Html
                    var newNotificationHtml = `<li class="scrollable-container ps-container ps-active-y media-list w-100"
                        style="background: #f1f1f1">
                        <a href="${data.url}">
                            <div class="media p-2">
                                <div class="media-body">
                                    <h6 class="media-heading mb-1" style="overflow: hidden;max-height: 40px;">${data.title}</h6>
                                    <div class="d-flex">
                                        <img src="${data.image}" width="50px" height="50px" style="border-radius: 50%; margin-top:5px;">
                                        <p class="notification-text font-small-3 text-muted pl-3 pt-1 w-100">
                                            <span class="text-muted">${data.message}<span
                                                    class="text-muted float-right">${data.date}</span></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <hr class="mb-0 mt-0">
                    </li>`;
                    $('#notification_list').prepend(newNotificationHtml);
                    $('#notification_count').attr('data-count', parseInt($('#notification_count').attr('data-count')) +
                    1).text($('#notification_count').attr('data-count'));

                    // Load New Comment Html
                    let comment = `<li id="comment_${data.id}">
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
                });
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
</script>
{{-- END PUSHER SCRIPT --}}
@yield('script')
@stack('script')

</body>

</html>
