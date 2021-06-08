<?php

namespace App\DataTables;

use App\Models\Tag;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TagsDataTable extends DataTable
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
            ->editColumn('icon', function ($tag) {
                return '<i class="' . $tag->icon . ' font-large-1"></i>';
            })
            ->editColumn('visibility', function ($tag) {
                return $tag->visibilityType();
            })
            ->filterColumn('visibility', function ($query, $keywords) {
                $keywords = strtolower($keywords);
                if ($keywords == 'visible') {
                    $query->where('visibility', 1);
                } else if ($keywords === 'hidden') {
                    $query->where('visibility', 0);
                }
            })
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->addColumn('action', 'backend.includes.buttons.table-buttons')
            ->rawColumns(['action', 'check', 'icon', 'visibility']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tag $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tag $model)
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
            ->setTableId('tag-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->setTableAttribute('class', 'table table-striped table-bordered w-100 dataTable')
            ->parameters([
                'responsive' => true,
            ])
            ->dom('Bfrtip')
            ->orderBy(1);
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
            Column::make('id')->width(40)->addClass('text-center'),
            Column::make('name'),
            Column::make('icon')->width(60)->addClass('text-center'),
            Column::make('visibility')->title('Visibility')->width(100)->addClass('text-center'),
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
        return 'Tag_' . date('YmdHis');
    }
}
