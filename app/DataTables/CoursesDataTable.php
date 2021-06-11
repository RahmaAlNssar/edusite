<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;
use App\Models\Course;

class CoursesDataTable extends DataTable
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
            ->editColumn('price', function ($course) {
                if ($course->discount != null) {
                    return $course->total() . '<br> <del class="red">$' . $course->price . '</del>';
                }
                return $course->price ? '$' . $course->price : '<span class="badge badge-info">FREE</span>';
            })
            ->editColumn('image', function ($course) {
                return '<img src="' . $course->image_url . '" class="img-thumbnail" width="150px">';
            })
            ->editColumn('title', function ($course) {
                return $course->title . '<hr> <span class="red">Category | </span> ' . $course->category->name;
            })
            ->filterColumn('visibility', function ($query, $keywords) {
                $keywords = strtolower($keywords);
                if ($keywords == 'visible') {
                    $query->where('visibility', 1);
                } else if ($keywords == 'hidden') {
                    $query->where('visibility', 0);
                }
            })
            ->filterColumn('desc', function ($query, $keywords) {
                return $query->where('desc', 'like', '%' . $keywords . '%');
            })
            ->filterColumn('title', function ($query, $keywords) {
                return $query->where('title', 'like', '%' . $keywords . '%')
                    ->orWhereHas('category', function ($q) use ($keywords) {
                        $q->where('name', 'like', '%' . $keywords . '%');
                    });
            })
            ->setRowClass(function ($course) {
                return $course->visibility == 0 ? 'bg-primary bg-accent-1' : '';
            })
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->addColumn('action', 'backend.includes.buttons.table-buttons')
            ->rawColumns(['action', 'check', 'image', 'visibility', 'price', 'title']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Course $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Course $model)
    {
        return $model->newQuery()->with('category');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('coursesdatatables-table')
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
            Column::make('title')->width(300),
            Column::make('image')->orderable(false)->searchable(false),
            Column::make('short_desc')->width(200),
            Column::make('price'),
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
        return 'Courses_' . date('YmdHis');
    }
}
