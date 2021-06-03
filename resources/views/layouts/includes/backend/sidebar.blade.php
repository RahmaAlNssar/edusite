<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ active('categories') }}">
                <a href="{{ route('backend.categories.index') }}">
                    <i class="la la-list"></i>
                    <span class="menu-title" data-i18n="nav.users.main">Categories</span>
                </a>
            </li>

            <li class="nav-item {{ active('courses') }}">
                <a href="{{ route('backend.courses.index') }}">
                    <i class="la la-list"></i>
                    <span class="menu-title" data-i18n="nav.users.main">Courses</span>
                </a>
            </li>

            <li class="nav-item {{ active('users') }}">
                <a href="{{ route('backend.users.index') }}">
                    <i class="la la-users"></i>
                    <span class="menu-title" data-i18n="nav.users.main">Users</span>
                </a>
            </li>
        </ul>
    </div>
</div>
