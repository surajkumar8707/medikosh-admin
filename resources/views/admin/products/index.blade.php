@extends('admin.layout.app')

@section('content')
    <style>
        .btn-sm {
            padding: 0.25rem 0.5rem;
            margin: 0 2px;
        }
        .btn-sm i {
            font-size: 1rem;
        }
        .dataTables_wrapper .dataTables_length {
            margin-bottom: 15px;
        }
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 15px;
        }
        .dataTables_wrapper .dataTables_filter input {
            height: 38px;
            padding: 0 10px;
        }
        .dataTables_wrapper .dataTables_length select {
            height: 38px;
            padding: 0 10px;
        }
        .btn-create {
            margin-bottom: 20px;
        }
    </style>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="card-title mb-0">Products</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-create">
                            <i class="bx bx-plus"></i> New Product
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table(['class' => 'table table-bordered table-striped'], true) }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        function deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product? This will also delete all associated images and batches.')) {
                $.ajax({

                    url: "{{ url('/') }}/admin/products/" + id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if(response.success) {
                            $('#product-table').DataTable().ajax.reload();
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Error deleting product');
                    }
                });
            }
        }

        // Handle status change
        $(document).on('change', '.change-status-input', function() {
            let productId = $(this).data('product-id');
            let status = this.checked ? 1 : 0;

            $.ajax({
                url: "{{ url('/') }}/admin/products/" + productId + "/change-status",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "status": status
                },
                success: function(response) {
                    toastr.success('Status updated successfully');
                },
                error: function(xhr) {
                    toastr.error('Error updating status');
                }
            });
        });
    </script>
@endpush
