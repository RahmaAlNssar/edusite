<?php

namespace App\DataTables;

use App\Models\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CategoriesDataTable extends DataTable
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
            ->editColumn('order', function ($category) {
                return $category->order();
            })
            ->editColumn('visibility', function ($category) {
                return $category->visibilityType();
            })
            ->filterColumn('visibility', function ($query, $keywords) {
                $keywords = strtolower($keywords);
                if ($keywords == 'visible') {
                    $query->where('visibility', 1);
                } else if ($keywords == 'hidden') {
                    $query->where('visibility', 0);
                }
            })
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->addColumn('action', 'backend.includes.buttons.table-buttons')
            ->rawColumns(['action', 'order', 'visibility', 'check']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model)
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
            ->setTableId('categoriesdatatables-table')
            ->columns($this->getColumns())
            ->setTableAttribute('class', 'table table-bordered table-striped w-100 dataTable dtr-inline')
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->lengthMenu([[10, 20, 25, 30, -1], [10, 20, 25, 30, 'All']])
            ->pageLength(10)
            ->buttons([
                Button::make('print')->text('<i class="fa fa-print"></i>')->addClass('btn btn-success')->titleAttr('Print (p)')->key('p'),
                Button::make('excel')->text('<i class="fas fa-file-excel"></i>')->addClass('btn btn-info')->titleAttr('Excel (e)')->key('e'),
                Button::make('csv')->text('<i class="fas fa-file-csv"></i>')->addClass('btn btn-primary')->titleAttr('CSV (c)')->key('c'),
                Button::make()->text('<i class="fas fa-trash"></i>')->addClass('btn btn-danger multi-delete')->titleAttr('Delete (d)')->key('d'),
                Button::make('pageLength')->text('<i class="fa fa-sort-numeric-up"></i>')->addClass('btn btn-light page-length')->titleAttr('Page Length (l)')->key('l')
            ])
            ->responsive(true)
            ->parameters([
                'initComplete' => " function () {
                    this.api().columns([2,3,4]).every(function () {
                        var column = this;
                        var input = document.createElement(\"input\");
                        $(input).appendTo($(column.footer()).empty())
                        .on('keyup', function () {
                            column.search($(this).val(), true, true, true).draw();
                        });
                    });
                }",
            ])
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
            Column::make('order')->width(50)->addClass('text-center'),
            Column::make('name'),
            Column::make('visibility')->width(100)->addClass('text-center'),
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
        return 'CategoriesDatatables_' . date('YmdHis');
    }
}
