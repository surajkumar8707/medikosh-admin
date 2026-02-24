@extends('admin.layout.app')
@section('title', 'Blog Create')
@push('styles')
    <style>
        #editor {
            min-height: 400px !important;
        }
    </style>
@endpush
@section('content')
    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Blog</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a class="btn btn-primary" href="{{ route('admin.blog.index') }}">List</a>
                        </div>
                    </div>
                    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group my-2">
                                    <label for="title">Title:</label>
                                    <input class="form-control" type="text" placeholder="Enter title link" name="title"
                                        value="{{ old('title') }}" />
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group my-3">
                                    <label for="status">Status:</label>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                            name="status" checked @if (old('status') == 1) checked @endif value="1">
                                    </div>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-2">
                            <label for="content">Content:</label>
                            <textarea class="form-control" name="content" id="editor" cols="30" rows="10">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="my-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                // This sets the height reliably after the editor is ready
                editor.editing.view.change(writer => {
                    writer.setStyle('min-height', '400px', editor.editing.view.document.getRoot());
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
