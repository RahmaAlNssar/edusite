<div class="card-header bg-info white">
    <h4 class="card-title white">{{ ucfirst(getModel()) }} : <span id="recourds-count"> {{ $count }}
        </span> </h4>
    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
    <div class="heading-elements">
        <ul class="list-inline mb-0">
            <li> <a data-action="collapse"> <i class="ft-minus"></i> </a> </li>
            <li> <a data-action="expand"> <i class="ft-maximize"></i> </a> </li>
            <li class="btn-group">
                <a data-toggle="dropdown"> <i class="fas fa-wrench"></i> </a>
                <div class="dropdown-menu" x-placement="bottom-start">
                    <a href="{{ route('backend.' . getModel() . '.create') }}"
                        class=" btn btn-outline-primary dropdown-item {{ $no_ajax ?? 'show-modal-form' }}">
                        <i class="ft-plus"></i> Create {{ ucfirst(getSinglarModel()) }}
                    </a>

                    <a href="{{ route('backend.' . getModel() . '.multidelete') }}"
                        class=" btn btn-outline-danger dropdown-item multi-delete">
                        <i class="ft-trash"></i> Multi Delete
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
