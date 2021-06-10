<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow ">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation">

            {{-- START CATEGORIES LINKS --}}
            <li class="nav-item {{ active('categories') }}">
                <a href="{{ active('categories') ? 'javascript:void(0)' : route('backend.categories.index') }}">
                    <i class="la la-list"></i> <span class="menu-title">Categories</span>
                </a>
            </li>
            {{-- START CATEGORIES LINKS --}}

            {{-- START TAGS LINKS --}}
            <li class="nav-item {{ active('tags') }}">
                <a href="{{ active('tags') ? 'javascript:void(0)' : route('backend.tags.index') }}">
                    <i class="la la-tags"></i> <span class="menu-title">Tags</span>
                </a>
            </li>
            {{-- START TAGS LINKS --}}

            {{-- START COURSES LINKS --}}
            <li class="nav-item has-sub">
                <a href="javascript:void(0)">
                    <i class="la la-th-list"></i> <span class="menu-title">Courses</span>
                </a>
                <ul class="menu-content" style="">
                    <li class="is-shown {{ active('courses', 'index') }}">
                        <a href="{{ active('courses', 'index') ? 'javascript:void(0)' : route('backend.courses.index') }}"
                            class="menu-item">
                            <i class="la la-eye"></i> <span class="menu-title">Show All Courses</span>
                        </a>
                    </li>

                    <li class="is-shown {{ active('courses', 'create') }}">
                        <a href="{{ active('courses', 'create') ? 'javascript:void(0)' : route('backend.courses.create') }}"
                            class="menu-item">
                            <i class="la la-plus-square"></i> <span class="menu-title">Create New Course</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- END COURSES LINKS --}}

            {{-- START VIDEOS LINKS --}}
            <li class="nav-item has-sub">
                <a href="javascript:void(0)">
                    <i class="la la-file-video-o"></i> <span class="menu-title">Videos</span>
                </a>
                <ul class="menu-content" style="">
                    <li class="is-shown {{ active('videos', 'index') }}">
                        <a href="{{ active('videos', 'index') ? 'javascript:void(0)' : route('backend.videos.index') }}"
                            class="menu-item">
                            <i class="la la-eye"></i> <span class="menu-title">Show All Videos</span>
                        </a>
                    </li>

                    <li class="is-shown {{ active('videos', 'create') }}">
                        <a href="{{ active('videos', 'create') ? 'javascript:void(0)' : route('backend.videos.create') }}"
                            class="menu-item">
                            <i class="la la-plus-square"></i> <span class="menu-title">Create New Video</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- END VIDEOS LINKS --}}

            {{-- START USERS LINKS --}}
            <li class="nav-item has-sub">
                <a href="javascript:void(0)">
                    <i class="la la-users"></i> <span class="menu-title">Users</span>
                </a>
                <ul class="menu-content" style="">
                    <li class="is-shown {{ active('users', 'index') }}">
                        <a href="{{ active('users', 'index') ? 'javascript:void(0)' : route('backend.users.index') }}"
                            class="menu-item">
                            <i class="la la-eye"></i> <span class="menu-title">Show All Users</span>
                        </a>
                    </li>

                    <li class="is-shown {{ active('users', 'create') }}">
                        <a href="{{ active('users', 'create') ? 'javascript:void(0)' : route('backend.users.create') }}"
                            class="menu-item">
                            <i class="la la-plus-square"></i> <span class="menu-title">Create New User</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- END USERS LINKS --}}
        </ul>
    </div>
</div>
