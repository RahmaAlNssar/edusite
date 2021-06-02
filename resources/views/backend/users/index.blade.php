@extends('layouts.backend')

@section('content')
<div class="content-body">
    <section class="row">
        <div class="col-12">
            <div class="card">

                {{-- START INCLUDE TABLE HEADER --}}
                <div class="card-head">
                    <div class="card-header">
                        <h4 class="card-title">{{ ucfirst(getModel()) }} : <span id="recourds-count"> {{ $count }}
                            </span> </h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    </div>
                </div>
                {{-- START INCLUDE TABLE HEADER --}}

                <div class="card-content">
                    <div class="card-body table-responsive">
                        <div class="table-responsive">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
{{ $dataTable->scripts() }}
@endsection
