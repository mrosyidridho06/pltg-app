<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\PegawaiDatum;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PegawaiDataDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $action ='';
                $action = '<div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button"
                        class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ti-settings"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="#">Edit</a></li>
                        <li><a class="dropdown-item" href="#">Hapus</a></li>
                    </ul>
                </div>';
                // if(Gate::allows('edit users')){
                //     $action = '<button type="button" data-id='.$row->id.' data-jenis="edit" class="btn mb-2 btn-primary btn-sm action"><i class="ti-pencil"></i> Edit</button>';
                // }
                // $action .= '&nbsp;&nbsp;';
                // if(Gate::allows('delete users')){
                //     $action .= '<button type="button" data-id='.$row->id.' data-jenis="delete" class="btn mb-2 btn-danger btn-sm action"><i class="ti-trash"</i> Hapus</button>';
                // }
                return $action;
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PegawaiDatum $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->with('roles');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters(['searchDelay' => '1000'])
                    // ->dom('lBfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle();
                    // ->buttons([
                    //     Button::make('excel'),
                    //     Button::make('csv'),
                    //     Button::make('pdf'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false),
            Column::make('name')->title('Nama'),
            Column::make('email')->title('Email'),
            // ['title' => 'Roles', 'data' => 'users.roles.id', 'name' => 'roles.name'],
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                //   ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'PegawaiData_' . date('YmdHis');
    }
}
