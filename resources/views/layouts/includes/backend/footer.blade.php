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
<script src="{{ path('vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ path('vendors/js/forms/icheck/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ path('vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ path('vendors/js/forms/select/select2.full.min.js') }}"></script>
{{-- ************** END VENDOR JS ************** --}}

{{-- ************** START FONTAWESOME JS ************** --}}
<script type="text/javascript" src="{{ path('fonts/fontawesome/js/all.min.js') }}"></script>
{{-- ************** START FONTAWESOME JS ************** --}}

{{-- ************** START MODERN JS ************** --}}
<script type="text/javascript" src="{{ path('js/core/app-menu.js') }}"></script>
<script type="text/javascript" src="{{ path('js/core/app.js') }}"></script>
<script type="text/javascript" src="{{ path('js/scripts/customizer.js') }}"></script>
<script type="text/javascript" src="{{ path('js/scripts/forms/checkbox-radio.js') }}"></script>
<script type="text/javascript" src="{{ path('js/scripts/modal/components-modal.js') }}"></script>
<script type="text/javascript" src="{{ path('js/scripts/forms/select/form-select2.js') }}"></script>
{{-- ************** END MODERN JS ************** --}}

{{-- ************** START SWEETALERT JS ************** --}}
@include('sweetalert::alert')
{{-- ************** END SWEETALERT JS ************** --}}

<<<<<<< HEAD

=======
{{-- ************** START CUSTOM JS ************** --}}
<script type="text/javascript" src="{{ path('custom/js/script.js') }}"></script>
<script type="text/javascript" src="{{ path('custom/js/upload-image.js') }}"></script>
{{-- ************** END CUSTOM JS ************** --}}
>>>>>>> 88e5c997e592c8dba26a4e849ceca9c509b8cbc2

@yield('script')
@stack('script')

</body>

</html>
