@extends('layouts.backend')

@section('content')
<div class="card">
    {{-- START INCLUDE TABLE HEADER --}}
    @include('backend.includes.cards.table-header')
    {{-- START INCLUDE TABLE HEADER --}}

    <div class="card-content collapse show">
        <div class="card-body table-responsive" id="load-data"></div>
    </div>
</div>
@endsection
