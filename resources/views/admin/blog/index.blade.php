@extends('admin.layout.app')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Blog</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.change-status-input').change(function() {
                var status = $(this).is(':checked') ? '1' : '0';
                var carouselId = $(this).data('blog-id');
                var requestData = {
                    'status': status,
                    'id': carouselId,
                    '_token': "{{ csrf_token() }}",
                }
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.change.status') }}",
                    data: requestData,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'success') {
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log(xhr);
                        console.log(xhr.responseText);
                        console.log(textStatus, errorThrown);
                        console.log(errorThrown);
                    },
                });
            });
        });
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
