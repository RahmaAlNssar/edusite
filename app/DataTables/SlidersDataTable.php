<?php

namespace App\DataTables;

use App\Models\Slider;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;

class SlidersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('no_ajax', function () {
                return $no_ajax = '';
            })
            ->editColumn('images', function ($slider) {
                return view('backend.sliders.images', ['slices' => $slider->slices]);
            })
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->addColumn('action', 'backend.includes.buttons.table-buttons')
            ->rawColumns(['action', 'check', 'images']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Slider $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Slider $model)
    {
        return $model->newQuery()->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('sliderimage-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->setTableAttribute('class', 'table table-striped table-bordered w-100 dataTable')
            ->parameters([
                'responsive' => true,
            ])
            ->dom('Bfrtip')
            ->orderBy(0);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->hidden(),
            Column::make('check')->title('<input type="checkbox" id="check-all">')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width(15)->addClass('text-center'),
            Column::make('name')->width(150),
            Column::make('images')->orderable(false)->searchable(false),
            Column::computed('action')->exportable(false)->printable(false)->width(75)->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'SliderImage_' . date('YmdHis');
    }
}
