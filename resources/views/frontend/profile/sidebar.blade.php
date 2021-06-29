<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow p-3">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation">
            <li class="nav-item text-center">
                <img src="{{ $user->image_url }}" class="rounded-circle img-border height-100" alt="Card image">
            </li>

            <li class="nav-item mt-2">
                <h3 class="text-center">
                    {{ $user->name }}
                </h3>
                <h3 class="text-center text-uppercase text-bold-700">
                    {{ $user->is_admin ? 'Admin' : 'Teacher' }}
                </h3>
            </li>
        </ul>
    </div>
</div>
