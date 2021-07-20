<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Str;
use App\Models\Post;
use Yajra\DataTables\Html\Button;

class PostsDataTable extends DataTable
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
            ->filterColumn('visibility', function ($query, $keywords) {
                $keywords = strtolower($keywords);
                if ($keywords == 'visible') {
                    $query->where('visibility', 1);
                } else if ($keywords == 'hidden') {
                    $query->where('visibility', 0);
                }
            })
            ->editColumn('image', function ($post) {
                return '<img src="' . $post->image_url . '" class="img-thumbnail" width="150px">';
            })
            ->editColumn('title', function ($post) {
                return $post->title . '<hr> <span class="red">Category | </span> ' . $post->category->name . '<hr> <span class="red">Author | </span> ' . $post->user->name;
            })
            ->filterColumn('title', function ($query, $keywords) {
                return $query->where('title', 'like', '%' . $keywords . '%')->orWhereHas('category', function ($q) use ($keywords) {
                    return $q->where('name', 'like', '%' . $keywords . '%');
                })->orWhereHas('user', function ($q) use ($keywords) {
                    return $q->where('name', 'like', '%' . $keywords . '%');
                });
            })
            ->editColumn('desc', function ($post) {
                return Str::limit($post->desc, 200);
            })
            ->setRowClass(function ($post) {
                return $post->visibility == 0 ? 'bg-primary bg-accent-1' : '';
            })
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->addColumn('action', function ($post) {
                return view('backend.posts.show-button', ['id' => $post->id, 'slug' => $post->slug, 'visibility' => $post->visibility, 'user_id' => $post->user_id, 'no_ajax' => '']);
            })
            ->rawColumns(['action', 'check', 'desc', 'image', 'title']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Post $model)
    {
        return $model->newQuery()->author();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('post-table')
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
                    this.api().columns([3,5]).every(function () {
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
            Column::make('visibility')->hidden(),
            Column::make('check')->title('<input type="checkbox" id="check-all">')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width(15)->addClass('text-center'),
            Column::make('title')->width(330),
            Column::make('image')->orderable(false)->searchable(false)->width(100),
            Column::make('desc'),
            Column::computed('action')->exportable(false)->printable(false)->width(75)->addClass('text-center')->width(65),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Post_' . date('YmdHis');
    }
}
