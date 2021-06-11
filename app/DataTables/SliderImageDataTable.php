<?php

namespace App\DataTables;

use App\Models\SliderImage;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;
class SliderImageDataTable extends DataTable
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
        ->editColumn('visibility', function ($sliderimage) {
            return $sliderimage->visibilityType();
        })
        ->filterColumn('visibility', function ($query, $keywords) {
            $keywords = strtolower($keywords);
            if ($keywords == 'visible') {
                $query->where('visibility', 1);
            } else if ($keywords == 'hidden') {
                $query->where('visibility', 0);
            }
        })
        ->editColumn('image', function ($sliderimage) {
            return '<img src="' . $sliderimage->image_url . '" class="img-thumbnail" width="150px">';
        })
        ->editColumn('title', function ($sliderimage) {
            return Str::limit($sliderimage->title, 30) . '<hr> <span class="red">Page | </span> ' . Str::limit($sliderimage->page->name, 30);
        })
        ->editColumn('descrption', function ($sliderimage) {
            return Str::limit($sliderimage->descrption, 100);
        })
        ->addColumn('check', 'backend.includes.tables.checkbox')
        ->addColumn('action', 'backend.includes.buttons.table-buttons')
        ->rawColumns(['action', 'check','visibility','descrption','image','title']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SliderImage $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SliderImage $model)
    {
        return $model->newQuery();
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
                    ->orderBy(2);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('check')->title('<input type="checkbox" id="check-all">')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width(15)->addClass('text-center'),
            Column::make('title')->width(270),
            Column::make('image')->orderable(false)->searchable(false),
            Column::make('descrption')->width(300),
            Column::make('visibility'),
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
