<?php

namespace App\DataTables;

use App\Models\BeritaAcara;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BeritaAcaraDataTable extends DataTable
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
                return '<button type="button" class="btn mb-2 btn-primary btn-sm"><i class="ti-pencil"</i></button>';
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BeritaAcara $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BeritaAcara $model): QueryBuilder
    {
        // $model = BeritaAcara::with('user', 'shift')->get();
        return $model->newQuery()->with('user', 'shift');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('beritaacaras')
                    ->columns($this->getColumns())
                    ->parameters(['searchDelay' => '1000'])
                    ->minifiedAjax()
                    ->dom('lBfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('csv'),
                        Button::make('print')
                    ]);
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
            ['title' => 'Nama', 'data' => 'user.name', 'name' => 'user_id'],
            Column::make('informasi'),
            ['title' => 'Shift', 'data' => 'shift.nama_shift', 'name' => 'shift_id'],
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
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
        return 'BeritaAcara_' . date('YmdHis');
    }
}
