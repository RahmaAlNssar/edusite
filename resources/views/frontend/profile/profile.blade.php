{{-- START SIDEBAR SECTION --}}
@include('layouts.includes.backend.header')
{{-- END SIDEBAR SECTION --}}
<style>
    body {
        padding-top: 0px !important;
    }

    .main-menu.menu-fixed {
        top: 0rem;
        height: 100%;
    }
</style>

{{-- START SIDEBAR SECTION --}}
@include('frontend.profile.sidebar')
{{-- END SIDEBAR SECTION --}}

<div class="app-content content">
    <div class="content-wrapper pt-0">
        <div class="content-body">
            {{-- START CONTENT SECTION --}}
            @yield('content')
            {{-- END CONTENT SECTION --}}
        </div>
    </div>
</div>

{{-- START FOOTER SECTION --}}
<script type="text/javascript" src="{{ path('vendors/js/vendors.min.js') }}"></script>

@yield('script')
@stack('script')

</body>

</html>
{{-- END FOOTER SECTION --}}
