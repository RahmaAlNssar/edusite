<?php

namespace App\DataTables;

use App\Models\Course;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

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
            ->editColumn('category_id', function ($course) {
                return $course->category->name;
            })
            ->editColumn('image', function ($course) {
                return $course->image_url;
            })
            ->addColumn('total', function ($course) {
                return $total = '';
            })
            ->editColumn('total', function ($course) {
                return $course->Total();
            })
            ->addColumn('no_ajax', function () {
                return $no_ajax = '';
            })
            ->filterColumn('category_id', function ($query, $keywords) {
                return $query->whereHas('category', function ($q) use ($keywords) {
                    return $q->where('name', 'like', '%' . $keywords . '%');
                });
            })
            ->orderColumn('category_id', function ($query, $order) {
                return $query->whereHas('category', function ($q) use ($order) {
                    return $q->orderBy('name', $order);
                });
            })
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->addColumn('action', 'backend.includes.buttons.table-buttons')
            ->rawColumns(['action', 'check', 'image', 'total']);
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
            Column::make('discount')->width(40)->addClass('text-center'),
            Column::make('title'),
            Column::make('image')->orderable(false)->searchable(false),
            Column::make('price'),
            Column::make('category_id')->title('Category'),
            Column::make('description'),
            Column::make('total')->orderable(false),
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
