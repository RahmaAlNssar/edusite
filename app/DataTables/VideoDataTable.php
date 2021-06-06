<?php

namespace App\DataTables;

use App\Models\Video;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

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
            ->editColumn('course_id', function ($category) {
                return $category->course->title;
            })
            ->editColumn('video', function ($video) {
                return '<video width="100%" height="70px" controls class="review-file"><source src="' . $video->video_path . '" type="' . $video->type . '">Your browser does not support the video tag.</video>';
            })
            ->filterColumn('is_active', function ($query, $keywords) {
                $query->whereHas('course', function ($q) use ($keywords) {
                    return $q->where('title', 'like', '%' . $keywords . '%');
                });
            })
            ->addColumn('no_ajax', function () {
                return $no_ajax = '';
            })
            ->addColumn('tags', 'backend.includes.tables.tags')
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->addColumn('action', 'backend.videos.table-buttons')
            ->rawColumns(['action', 'check', 'video', 'tags', 'description']);
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
            Column::make('video')->width(100)->orderable(false)->searchable(false)->addClass('text-center'),
            Column::make('title'),
            Column::make('description')->width(100),
            Column::make('tags'),
            Column::make('course_id')->title('Course')->orderable(false),
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
