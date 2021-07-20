<?php

namespace App\DataTables;

use App\Models\Comment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CommentsDataTable extends DataTable
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
            ->addColumn('model', function ($comment) {
                return $comment->commentable_type;
            })
            ->addColumn('object_id', function ($comment) {
                return $comment->commentable_id;
            })
            ->addColumn('username', function ($comment) {
                return $comment->user->name;
            })
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->addColumn('action', 'backend.comments.action')
            ->rawColumns(['action', 'check']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Comment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Comment $model)
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
            ->setTableId('comment-table')
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
                    this.api().columns([2,3]).every(function () {
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
            Column::make('comment')->width(300),
            Column::make('model'),
            Column::make('object_id'),
            Column::make('username'),
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
        return 'Comment_' . date('YmdHis');
    }
}
