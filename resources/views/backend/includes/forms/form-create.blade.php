<div class="card-header bg-primary">
    <h4 class="card-title white"><i class="fa fa-edit fa-sm"></i><span class="mx-1">Create New
            {{ ucfirst(getSinglarModel()) }}</span>
    </h4>
</div>

<div class="card-body">
    <form action="{{ route('backend.' . getModel() . '.store') }}" method="post" class="submit-form"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $row->id ?? '' }}">

        {{-- END FORM INPUTS --}}
        @include('backend.' . getModel() . '.form')
        {{-- END FORM INPUTS --}}

        {{-- END FORM BUTTONS --}}
        @include('backend.includes.buttons.form-buttons')
        {{-- END FORM BUTTONS --}}
    </form>
</div>
