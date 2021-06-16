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
