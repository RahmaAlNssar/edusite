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
