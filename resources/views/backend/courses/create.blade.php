@extends('layouts.backend')

<<<<<<< HEAD
@section('style')
<link rel="stylesheet" href="{{path('vendors/css/editors/summernote.css')}}">
@endsection
@section('content')
<div class="content-body">
    
            <div class="card">
           
                @include('backend.includes.forms.form-create')
               
            </div>
     
</div>
@endsection
@section('script')
    
    <script type="text/javascript" src="{{path('vendors/js/editors/summernote/summernote.js')}}"></script>
    <script>
        $(document).ready(function() { $('.summernote').summernote();});
    </script>
@endsection
=======
@section('content')
<div class="card">
    @include('backend.includes.forms.form-create')
</div>
@endsection
>>>>>>> 88e5c997e592c8dba26a4e849ceca9c509b8cbc2