<span class="dropdown">
    <button id="table-optins" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
    <span aria-labelledby="table-optins" class="dropdown-menu mt-1 dropdown-menu-left" x-placement="bottom-end">

        <a href="{{ route('backend.' . getModel() . '.edit', $id) }}"
<<<<<<< HEAD
            class="btn btn-outline-primary dropdown-item {{$no_ajax ?? 'show-model-form'}}">
=======
            class="btn btn-outline-primary {{ $no_ajax ?? 'show-modal-form' }} dropdown-item">
>>>>>>> 88e5c997e592c8dba26a4e849ceca9c509b8cbc2
            <i class="ft-edit"></i> Edit
        </a>

        @yield('table-buttons')

        <form action="{{ route('backend.' . getModel() . '.destroy', $id) }}" method="POST" class="form-destroy">
            {{ csrf_field() }}
            @method('delete')
            <button type="submit" class="btn btn-outline-danger dropdown-item delete">
                <i class="ft-trash-2"></i> Delete
            </button>
        </form>

    </span>
</span>
