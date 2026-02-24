@extends('admin.layout.app')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Home Page Carousel</h4>
                    </div>
                    {{-- <div class="col-md-6 text-end">
                        <a class="btn btn-primary" href="{{ route('admin.home-page-carousel.create') }}">Add +</a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                {{-- <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carousels as $key => $carousel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $carousel->title }}</td>
                                    <td>
                                        <img class="w-25 img-thumbnail imgRenderContainer"
                                            src="{{ public_asset($carousel->image) }}" alt="{{ $carousel->title }}">
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input change-status-input" type="checkbox"
                                                id="flexSwitchCheckChecked" data-carousel-id="{{ $carousel->id }}""
                                                @if ($carousel->status == 1) checked @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.home-page-carousel.destroy', $carousel) }}"
                                            method="POST"
                                            onsubmit="if(confirm('Are you sure want to delete ?') == false){ return false; }">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.home-page-carousel.edit', $carousel) }}"
                                                class="text-primary"><i class="menu-icon tf-icons bx bx-pencil"></i></a>
                                            <button class="text-danger btn"><i
                                                    class="menu-icon tf-icons bx bx-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th class="text-center" colspan="10">No enquiry available in the table</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="carousel-pagination">
                        {{ $carousels->links() }}
                    </div>
                </div> --}}
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
                var carouselId = $(this).data('carousel-id');
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
