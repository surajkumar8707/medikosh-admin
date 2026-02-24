<?php

namespace App\DataTables;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\HtmlString;

class ContactsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('index', function ($row) {
                // This will add a sequential number column starting from 1
                return $row->serial_no;
            })
            ->addColumn('created_at', function (Contact $Contact) {
                $dates = 'Created: ' . $Contact->created_at->diffForHumans() . '<br><hr/>';
                return new HtmlString($dates);
            })
            ->rawColumns(['created_at']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Contact $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('contacts-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->scrollX('true')
            ->dom('
                <"row"<"col-md-6 d-flex justify-content-start"f><"col-sm-12 col-md-6 d-flex align-items-center justify-content-end"lB>>
                <"row"<"col-md-12 custom-table"tr>>
                <"row"<"col-md-6"i><"col-md-6"p>>
            ')
            ->orderBy(1, 'asc')

            ->language(["search" => "", "lengthMenu" => "_MENU_", "searchPlaceholder" => 'Search Ambassador'])
            ->buttons(
                Button::make()
                    ->className('btn btn-primary')
                    ->text('<i class="bx bx-plus"></i> New')
                    ->visible(true)
                    ->action(
                        'function(e, dt, node, config) {
                        let url = "#";
                        window.location.href = url;
                    }'
                    ),

            )
            ->parameters([
                'paging' => true,
                'lengthMenu' => [
                    [5, 10, 25, 50, -1],
                    ['5', '10', '25', '50', 'Show all']
                ],
                'drawCallback' => 'function(settings) {
                    var api = this.api();
                    api.column(0).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }',
                'initComplete' => 'function () {
                }',

            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('index') // Add this column for serial numbers
                ->title('S.No') // Title for the column header
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('city'),
            Column::make('service'),
            Column::make('message'),
            // Column::make('add your columns'),
            Column::make('created_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Contacts_' . date('YmdHis');
    }
}
