<span class="dropdown">
    <button id="table-optins" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
    <span aria-labelledby="table-optins" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="bottom-end">

        <a href="{{ route('backend.' . getModel() . '.edit', $id) }}"
            class="btn btn-outline-primary dropdown-item {{$no_ajax ?? 'show-model-form'}}">
            <i class="ft-edit"></i> Edit
        </a>

        <form action="{{ route('backend.' . getModel() . '.destroy', $id) }}" method="POST" class="form-destroy">
            {{ csrf_field() }}
            @method('delete')
            <button type="submit" class="btn btn-outline-danger dropdown-item delete">
                <i class="ft-trash-2"></i> Delete
            </button>
        </form>
    </span>
</span>
