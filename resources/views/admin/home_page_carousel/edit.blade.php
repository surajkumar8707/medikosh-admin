@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Home Page Carousel</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <a class="btn btn-primary" href="{{ route('admin.home-page-carousel.index') }}">List</a>
                    </div>
                </div>
                <div class="container">

                    <form action="{{ route('admin.home-page-carousel.update', $homePageCarousel->id) }}" method="POST" enctype="multipart/form-data">
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

                        <div class="form-group my-2">
                            <label for="title">Title:</label>
                            <input class="form-control" type="text" placeholder="Enter title link" name="title"
                                value="{{ old('title', $homePageCarousel->title ?? '') }}" />
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-2">
                            <label for="image">Image:</label>
                            <input class="form-control selectImgToRender" type="file" name="image" id="image"/>

                            <div class="w-100 my-1 render-image">
                                <img class="w-25 img-thumbnail imgRenderContainer" src="{{ public_asset($homePageCarousel->image) }}" alt="{{ $homePageCarousel->title }}">
                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group my-3">
                            <label for="status">Status:</label>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status"
                                    @if (old('status', $homePageCarousel->status) == 1) checked @endif value="1">
                            </div>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="my-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="{{ route('admin.home-page-carousel.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
