<div class="shopping_cart">
    <a class="dropdown-toggle nav-link" id="dropdown-flag" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <span class="selected-language">
            {{ LaravelLocalization::getCurrentLocale() }}
        </span>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdown-flag">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode =>
        $properties)
        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
            href="{{ App::getLocale() !== $localeCode ? LaravelLocalization::getLocalizedURL($localeCode, null, [], true) : 'javascript:void(0)' }}">
            <i class="flag-icon flag-icon-{{ $properties['flag'] }}"></i>
            {{ $properties['native'] }}
        </a>
        @endforeach
    </div>
</div>

@auth
<div class="shopping_cart">
    <a class="dropdown-toggle nav-link" id="dropdown-flag" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <span class="selected-language">
            {{ auth()->user()->name }}
        </span>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdown-flag">
        <a class="dropdown-item" href="{{ route('backend.dashboard') }}"> Dashboard </a>

        <a href="javascript:void(0);" class="dropdown-item" style="color: red"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
    </div>
</div>
@endauth


@auth
<div class="shopping_cart">
    <li class="dropdown dropdown-notification nav-item dropdown-notifications" style="list-style: none">

        <a class="nav-link nav-link-label" href="javascript:void(0)" data-toggle="dropdown">
            <i class="fa fa-bell"> </i>
            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow notif-count"
                id="notification_count" data-count="2">2</span>
        </a>
        <ul class="dropdown-menu" style="width: 300px; right: 215px !important; list-style: none">
            <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0 text-center p-0">
                    <span class="grey darken-2 text-center">Notifications</span>
                </h6>
                <hr class="mt-2 mb-0">
            </li>

            <div style="overflow-y: scroll;max-height: 285px;" id="notification_list">
                <li class="scrollable-container ps-container ps-active-y media-list w-100" style="background: #f1f1f1">
                    <a href="">
                        <div class="media p-2">
                            <div class="media-body">
                                <h6 class="media-heading mb-1" style="overflow: hidden;max-height: 40px;">Post Title,
                                    Post Title</h6>
                                <div class="d-flex">
                                    <img src="http://127.0.0.1:8000/uploads/courses/aaeb0cf1937e999026b676dea38cfb17.png"
                                        width="50px" height="50px" style="border-radius: 50%; margin-top:5px;">
                                    <p class="notification-text font-small-3 text-muted pl-3 pt-1 w-100">
                                        <span class="text-muted">Mahmoud commented on your post. <span
                                                class="text-muted float-right">06:00 pm</span></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr class="mb-0 mt-0">
                </li>

                <li class="scrollable-container ps-container ps-active-y media-list w-100" style="background: #f1f1f1">
                    <a href="">
                        <div class="media p-2">
                            <div class="media-body">
                                <h6 class="media-heading mb-1" style="overflow: hidden;max-height: 40px;">Course Title,
                                    Course Title</h6>
                                <div class="d-flex">
                                    <img src="http://127.0.0.1:8000/uploads/courses/aaeb0cf1937e999026b676dea38cfb17.png"
                                        width="50px" height="50px" style="border-radius: 50%; margin-top:5px;">
                                    <p class="notification-text font-small-3 text-muted pl-3 pt-1 w-100">
                                        <span class="text-muted">Mahmoud commented on your Course. <span
                                                class="text-muted float-right">06:00 pm</span></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr class="mb-0 mt-0">
                </li>

                <li class="scrollable-container ps-container ps-active-y media-list w-100" style="background: #f1f1f1">
                    <a href="">
                        <div class="media p-2">
                            <div class="media-body">
                                <h6 class="media-heading mb-1" style="overflow: hidden;max-height: 40px;">Video Title,
                                    Video Title</h6>
                                <div class="d-flex">
                                    <img src="http://127.0.0.1:8000/uploads/courses/aaeb0cf1937e999026b676dea38cfb17.png"
                                        width="50px" height="50px" style="border-radius: 50%; margin-top:5px;">
                                    <p class="notification-text font-small-3 text-muted pl-3 pt-1 w-100">
                                        <span class="text-muted">Mahmoud commented on your Video. <span
                                                class="text-muted float-right">06:00 pm</span></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr class="mb-0 mt-0">
                </li>
            </div>

            <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0 mt-2 text-center p-0">
                    <span class="grey darken-2 text-center">ALL NOTIFICATIONS</span>
                </h6>
            </li>
        </ul>
    </li>
</div>
@endauth
