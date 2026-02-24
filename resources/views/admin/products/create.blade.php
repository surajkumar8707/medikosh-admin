@extends('admin.layout.app')
@section('title', 'Product Create')

@push('styles')
<style>
    #editor {
        min-height: 300px !important;
    }
    .batch-item, .image-item {
        background: #f8f9fa;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #dee2e6;
        position: relative;
    }
    .remove-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .remove-btn:hover {
        background: #bb2d3b;
    }
    .image-preview {
        max-width: 150px;
        max-height: 150px;
        margin-top: 10px;
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
                        <h4 class="card-title">Create Product</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <a class="btn btn-primary" href="{{ route('admin.products.index') }}">List</a>
                    </div>
                </div>

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 my-2">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name') }}" placeholder="Product name" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 my-2">
                            <label>Order URL</label>
                            <input type="text" name="order_url" class="form-control"
                                   value="{{ old('order_url') }}" placeholder="Product order URL">
                            @error('order_url')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 my-2">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="editor"
                                      rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 my-2">
                            <label>Certifications</label>
                            <input type="text" name="certifications" class="form-control"
                                   value="{{ old('certifications') }}" placeholder="Enter certifications">
                            @error('certifications')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 my-2">
                            <label>Meta title</label>
                            <input class="form-control" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"/>
                        </div>

                        <div class="col-md-12 my-2">
                            <label>Meta Description</label>
                            <input class="form-control" name="meta_description" id="meta_description" value="{{ old('meta_description') }}"/>
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="is_verified">Is Verified</label>
                            <select name="is_verified" id="is_verified" class="form-control">
                                <option value="">-- Select --</option>
                                <option value="1" {{ old('is_verified') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('is_verified') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('is_verified')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- Select --</option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Product Images Section --}}
                        <div class="col-md-12 my-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Product Images <span class="text-danger">*</span></h5>
                                <button type="button" class="btn btn-success btn-sm" id="addImageBtn">
                                    <i class="fas fa-plus"></i> Add Another Image
                                </button>
                            </div>
                            <small class="text-muted d-block mb-3">At least one image is required</small>

                            <div id="imageContainer">
                                <div class="image-item">
                                    <button type="button" class="remove-btn remove-image" style="display: none;">×</button>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Image File <span class="text-danger">*</span></label>
                                            <input type="file" name="images[]" class="form-control image-input" accept="image/*" required>
                                        </div>
                                    </div>
                                    <img class="image-preview" style="display: none;">
                                </div>
                            </div>
                            @error('images')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @error('images.*')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Product Batches Section --}}
                        {{-- <div class="col-md-12 my-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Product Batches (Optional)</h5>
                                <button type="button" class="btn btn-info btn-sm" id="addBatchBtn">
                                    <i class="fas fa-plus"></i> Add Batch
                                </button>
                            </div>
                            <small class="text-muted d-block mb-3">You can add multiple batches or leave empty</small>

                            <div id="batchContainer">
                            </div>
                        </div> --}}
                    </div>

                    <div class="my-3">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-light">Cancel</a>
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
    ClassicEditor.create(document.querySelector('#editor'))
        .catch(error => console.error(error));

    // Image preview function
    function previewImage(input, previewElement) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewElement.src = e.target.result;
                previewElement.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Image Management
    document.getElementById('addImageBtn').addEventListener('click', function() {
        const imageContainer = document.getElementById('imageContainer');
        const imageItem = document.createElement('div');
        imageItem.className = 'image-item';
        imageItem.innerHTML = `
            <button type="button" class="remove-btn remove-image">×</button>
            <div class="row">
                <div class="col-md-12">
                    <label>Image File <span class="text-danger">*</span></label>
                    <input type="file" name="images[]" class="form-control image-input" accept="image/*" required>
                </div>
            </div>
            <img class="image-preview" style="display: none;">
        `;
        imageContainer.appendChild(imageItem);

        // Show remove button for all images except first if there's more than one
        toggleRemoveButtons();
    });

    // Batch Management - Simplified to only batch_number
    // document.getElementById('addBatchBtn').addEventListener('click', function() {
    //     const batchContainer = document.getElementById('batchContainer');
    //     const batchItem = document.createElement('div');
    //     batchItem.className = 'batch-item';
    //     batchItem.innerHTML = `
    //         <button type="button" class="remove-btn remove-batch">×</button>
    //         <div class="row">
    //             <div class="col-md-12">
    //                 <label>Batch Number</label>
    //                 <input type="text" name="batch_number[]" class="form-control" placeholder="Enter batch number">
    //             </div>
    //         </div>
    //     `;
    //     batchContainer.appendChild(batchItem);
    // });

    // Remove item function
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-image')) {
            e.target.closest('.image-item').remove();
            toggleRemoveButtons();
        }
        if (e.target.classList.contains('remove-batch')) {
            e.target.closest('.batch-item').remove();
        }
    });

    // Toggle remove buttons visibility for images
    function toggleRemoveButtons() {
        const imageItems = document.querySelectorAll('.image-item');
        const removeButtons = document.querySelectorAll('.remove-image');

        if (imageItems.length > 1) {
            removeButtons.forEach(btn => btn.style.display = 'flex');
        } else {
            removeButtons.forEach(btn => btn.style.display = 'none');
        }
    }

    // Image preview on file select
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('image-input')) {
            const imageItem = e.target.closest('.image-item');
            const preview = imageItem.querySelector('.image-preview');
            previewImage(e.target, preview);
        }
    });

    // Initialize - hide remove button for first image
    toggleRemoveButtons();
</script>
@endpush
