<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Str;
use App\Models\Video;

class VideoDataTable extends DataTable
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
            ->editColumn('title', function ($video) {
                return Str::limit($video->title, 35) . '<hr> <span class="red">Course | </span> ' . Str::limit($video->course->title, 25);
            })
            ->editColumn('desc', function ($video) {
                return Str::limit($video->desc, 150);
            })
            ->addColumn('no_ajax', function () {
                return $no_ajax = '';
            })
            ->addColumn('video', function ($video) {
                return '<video width="200px" height="200px" controls><source src="' . $video->video_path . '"></video>';
            })
            ->filterColumn('title', function ($query, $keywords) {
                return $query->where('title', 'like', '%' . $keywords . '%')
                    ->orWhereHas('course', function ($q) use ($keywords) {
                        $q->where('title', 'like', '%' . $keywords . '%');
                    });
            })
            ->filterColumn('tags', function ($query, $keywords) {
                return $query->whereHas('tags', function ($q) use ($keywords) {
                    return $q->where('name', 'like', '%' . $keywords . '%');
                });
            })
            ->addColumn('tags', 'backend.includes.tables.tags')
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->addColumn('action', 'backend.videos.table-buttons')
            ->rawColumns(['action', 'check', 'video', 'tags', 'desc', 'title']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Video $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Video $model)
    {
        return $model->newQuery()->with(['course', 'tags']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('video-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->setTableAttribute('class', 'table table-striped table-bordered w-100 dataTable')
            ->parameters([
                'responsive' => true,
            ])
            ->pageLength(1)
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
            Column::make('video')->orderable(false)->searchable(false)->addClass('text-center'),
            Column::make('title')->width(250),
            Column::make('desc')->width(250),
            Column::make('tags')->orderable(false)->width(65),
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
        return 'Video_' . date('YmdHis');
    }
}
