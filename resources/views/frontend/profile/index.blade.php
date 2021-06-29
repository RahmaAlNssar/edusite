@extends('frontend.profile.profile')

@section('content')
<div id="user-profile">
    <div class="row">
        <div class="col-12">
            <div class="card profile-with-cover">
                <div class="card-img-top img-fluid bg-cover height-300"
                    style="background: url('{{ $user->image_url }}') 50%;"></div>
                <div class="media profil-cover-details w-100 d-flex align-items-center">
                    <div class="media-left pl-2 pt-2">
                        <a href="#" class="profile-image">

                        </a>
                    </div>
                    <div class="media-body">
                        <nav class="navbar navbar-light navbar-profile align-self-end">
                            <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse"
                                aria-expanded="false" aria-label="Toggle navigation"></button>
                            <nav class="navbar navbar-expand-lg ml-auto">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="nav nav-tabs nav-underline">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="baseIcon-tab21" data-toggle="tab"
                                                aria-controls="tabIcon21" aria-expanded="true"
                                                href="{{ route('profile.courses') }}">
                                                <i class="la la-list"></i> Courses
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="baseIcon-tab22" data-toggle="tab"
                                                aria-controls="tabIcon21" aria-expanded="true"
                                                href="{{ route('profile.posts') }}">
                                                <i class="la la-paperclip"></i> Posts
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="baseIcon-tab23" data-toggle="tab"
                                                aria-controls="tabIcon21" aria-expanded="true"
                                                href="{{ route('profile.videos') }}">
                                                <i class="la la-play"></i> Videos
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content" id="load-data"></div>
</div>
@endsection

@section('script')
<script>
    $(function () {
        let param = '';
        if (window.location.href.split("?")[1])
            param = '?' + window.location.href.split("?")[1];

        function rows(url) {
            $('#load-data').addClass('load');
            $.ajax({
                url: url + param,
                type: "get",
                success: function(data, textStatus, jqXHR) {
                    $('#load-data').empty().append(data);
                },
                complete: function () { $('#load-data').removeClass('load'); }
            });
        } // AJAX CODE TO LOAD THE DATA TABLE

        rows($('a[aria-controls="tabIcon21"].active').attr('href'));
        $('a[aria-controls="tabIcon21"]').click(function (e) {
            e.preventDefault();
            rows($(this).attr('href'));
        });

    });
</script>
@endsection
