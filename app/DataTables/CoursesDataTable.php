<?php

namespace App\DataTables;

use App\Models\Course;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CoursesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($course) {
                return view('admin.course.buttons.actions', ['id' => $course->course_id])->render();
            })
            ->addColumn('department_name', function ($model) {
                return $model->department->department_name; 
            })
            ->addColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d H:i:s');
            })
            ->setRowId('course_id');
    }


    public function query(Course $model): QueryBuilder
    {
        return $model->newQuery()->with('department'); 
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('courses-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0, 'asc') // Order by course_id in ascending order
                    ->selectStyleSingle()
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['create', 'print', 'reset', 'reload'],
                    ]);
    }


    public function getColumns(): array
    {
        return [
            Column::make('course_id'),
            Column::make('course_name'),
            Column::make('department_name'), 
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(70)
                ->addClass('text-center'),
        ];
    }

 
    protected function filename(): string
    {
        return 'Courses_' . date('YmdHis');
    }
}
