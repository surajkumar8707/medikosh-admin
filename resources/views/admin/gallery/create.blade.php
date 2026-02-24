@extends('admin.layout.app')
@section('title', isset($gallery) ? 'Edit Gallery' : 'Add Gallery')

@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>{{ isset($gallery) ? 'Edit Gallery' : 'Add New Gallery' }}</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6 text-end">
                                <a class="btn btn-primary" href="{{ route('admin.pages.gallery') }}">List</a>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @php
                        $route = isset($gallery)
                            ? route('admin.pages.gallery.update', $gallery)
                            : route('admin.pages.gallery.store');
                        $method = isset($gallery) ? 'PUT' : 'POST';
                    @endphp

                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method($method)

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $gallery->title ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image
                                {{ isset($gallery) ? '(leave blank to keep current)' : '' }}</label>
                            <input type="file" name="image" class="form-control">
                            @if (isset($gallery))
                                <img src="{{ asset($gallery->image) }}" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-control">
                                <option value="mivan" {{ old('type', $gallery->type ?? '') == 'mivan' ? 'selected' : '' }}>
                                    Mivan
                                </option>
                                <option value="post_tensioning"
                                    {{ old('type', $gallery->type ?? '') == 'post_tensioning' ? 'selected' : '' }}>Post
                                    Tensioning
                                </option>
                            </select>
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="status" name="status" value="1"
                                {{ old('status', $gallery->status ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">Active</label>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ isset($gallery) ? 'Update' : 'Create' }}</button>
                        <a href="{{ route('admin.pages.gallery') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
