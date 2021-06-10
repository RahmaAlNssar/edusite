@extends('layouts.backend')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ path('vendors/css/editors/summernote.css') }}">
@endsection

@section('back')
@include('backend.includes.cards.form-header')
@endsection

@section('content')
<div class="content-body">
    <div class="card">
        @if (isset($row))
        @include('backend.includes.forms.form-update')
        @else
        @include('backend.includes.forms.form-create')
        @endif
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ path('vendors/js/editors/summernote/summernote.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote();

        if ($('input[name=discount]').val() >= 1) {
            $('input[type=date]').closest('.col-md-4').slideDown(300);
            $('input[name=discount]').closest('.col-md-12').removeClass('col-md-12').addClass('col-md-4');
        } else {
            $('input[type=date]').closest('.col-md-4').slideUp(300);
            $('input[name=discount]').closest('.col-md-4').removeClass('col-md-4').addClass('col-md-12');
        }

        $('input[name=discount]').change(function () {
            if ($(this).val() >= 1) {
                $('input[type=date]').closest('.col-md-4').slideDown(300);
                $(this).closest('.col-md-12').removeClass('col-md-12').addClass('col-md-4');

            } else {
                $('input[type=date]').closest('.col-md-4').slideUp(300);
                $(this).closest('.col-md-4').removeClass('col-md-4').addClass('col-md-12');

            }
        });
});
</script>
@endsection
