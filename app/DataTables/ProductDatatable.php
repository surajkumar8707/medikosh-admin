<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\HtmlString;
use Yajra\DataTables\Services\DataTable;

class ProductDatatable extends DataTable
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
            ->addColumn('status', function (Product $product) {
                $checked = $product->status == '1' ? 'checked' : '';
                return '<div class="form-check form-switch">
                    <input class="form-check-input change-status-input"
                           type="checkbox"
                           data-product-id="' . $product->id . '"
                           ' . $checked . '>
                </div>';
            })
            ->addColumn('index', function ($row) {
                static $index = 0;
                return ++$index;
            })
            ->addColumn('created_at', function (Product $product) {
                return 'Created: ' . $product->created_at->format('d M Y') . '<br>
                        Updated: ' . $product->updated_at->format('d M Y');
            })
            ->addColumn('image', function (Product $product) {
                // Load the first image
                $image = $product->images()->first();

                if ($image) {
                    $imagePath = $image->image_path;
                    // Check if it's a full URL or local path
                    if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
                        $src = $imagePath;
                    } else {
                        $src = public_asset($imagePath);
                    }

                    $count = $product->images()->count();
                    $badge = $count > 1 ? '<span class="badge bg-info">' . $count . '</span>' : '';

                    return '<div>
                        <img src="' . $src . '" width="60" height="60" style="object-fit: cover;">
                        ' . $badge . '
                    </div>';
                }

                return '<span class="text-muted">No image</span>';
            })
            ->addColumn('batches', function (Product $product) {
                $batches = $product->batches;

                if ($batches->count() > 0) {
                    $html = '<span class="badge bg-secondary">' . $batches->count() . ' Batches</span><br>';
                    foreach ($batches as $batch) {
                        $html .= '<span class="badge bg-light text-dark m-1">' . $batch->batch_number . '</span>';
                    }
                    return $html;
                }

                return '<span class="text-muted">No batches</span>';
            })
            ->addColumn('product_url', function (Product $product) {
                $html = '<a target="_blank" href="https://medikosh-nutria.daarukavaneresort.com/product/' . $product->id . '" class="btn btn-link">View <i class="fa fa-eye"></i></a>';
                return new HtmlString($html);
            })
            ->addColumn('action', function (Product $product) {
                return '
                    <a href="' . route('admin.products.edit', $product) . '"
                       class="btn btn-sm btn-primary"
                       title="Edit">
                        <i class="bx bx-edit-alt"></i>
                    </a>
                    <button class="btn btn-sm btn-danger delete-product"
                            onclick="deleteProduct(' . $product->id . ')"
                            data-id="' . $product->id . '"
                            title="Delete">
                        <i class="bx bx-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['image', 'status', 'created_at', 'batches', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $product): QueryBuilder
    {
        return $product->newQuery()->where('product_type', '0');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>
                    <"row"<"col-sm-12"tr>>
                    <"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>')
            ->orderBy(1, 'asc')
            ->language([
                "search" => "",
                "lengthMenu" => "_MENU_",
                "searchPlaceholder" => "Search Products"
            ])
            ->buttons([
                // This is the create button that takes you to the create page
                [
                    'text' => '<i class="bx bx-plus"></i> New Product',
                    'className' => 'btn btn-primary',
                    'action' => 'function(e, dt, node, config) {
                        window.location.href = "' . route('admin.products.create') . '";
                    }'
                ],
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ])
            ->parameters([
                'paging' => true,
                'info' => true,
                'responsive' => true,
                'autoWidth' => false,
                'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, 'All']],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('index')
                ->title('S.No')
                ->width(50)
                ->addClass('text-center'),

            Column::computed('image')
                ->title('Image')
                ->width(100)
                ->addClass('text-center'),

            Column::make('name')
                ->title('Name')
                ->width(200),

            Column::make('certifications')
                ->title('Certifications')
                ->width(150),

            Column::make('status')
                ->title('Status')
                ->width(80)
                ->addClass('text-center'),

            Column::make('created_at')
                ->title('Created')
                ->width(150),

            Column::computed('action')
                ->title('Actions')
                ->width(120)
                ->addClass('text-center')
                ->exportable(false)
                ->printable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
