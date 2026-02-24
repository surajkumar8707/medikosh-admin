@extends('admin.layout.app')
@section('title', 'Blog Update')

@push('styles')
    <style>
        #editor {
            min-height: 400px !important;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Edit Blog</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a class="btn btn-primary" href="{{ route('admin.blog.index') }}">List</a>
                        </div>
                    </div>

                    <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                                    <input class="form-control" type="text" name="title" placeholder="Enter title"
                                           value="{{ old('title', $blog->title) }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group my-3">
                                    <label for="status">Status:</label>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox"
                                               name="status" value="1" id="flexSwitchCheckChecked"
                                               @if(old('status', $blog->status)) checked @endif>
                                    </div>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-2">
                            <label for="content">Content:</label>
                            <textarea class="form-control" name="content" id="editor" cols="30" rows="10">{{ old('content', $blog->content) }}</textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="my-2">
                            <button class="btn btn-primary" type="submit">Update</button>
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
                editor.editing.view.change(writer => {
                    writer.setStyle('min-height', '400px', editor.editing.view.document.getRoot());
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
