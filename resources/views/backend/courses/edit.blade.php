@extends('layouts.backend')

@section('content')
<div class="content-body">
    
            <div class="card">
           
                @include('backend.includes.forms.form-update')
               
            </div>
     
</div>
@endsection
@section('script')
    <link rel="stylesheet" href="{{path('vendors/css/editors/summernote.css')}}">
    <script type="text/javascript" src="{{path('vendors/js/editors/summernote/summernote.js')}}"></script>
    <script>
        $(document).ready(function() { $('.summernote').summernote();})
    </script>
@endsection