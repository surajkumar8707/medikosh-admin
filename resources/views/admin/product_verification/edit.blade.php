@extends('admin.layout.app')
@section('title', 'Product Edit')

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
        border: 1px solid #ddd;
        padding: 5px;
        border-radius: 5px;
    }
    .existing-image {
        position: relative;
        display: inline-block;
        margin: 10px;
    }
    .delete-image-checkbox {
        position: absolute;
        top: 5px;
        right: 5px;
        background: white;
        padding: 2px 5px;
        border-radius: 3px;
        border: 1px solid #dc3545;
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
                        <h4 class="card-title">Edit Product</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <a class="btn btn-primary" href="{{ route('admin.product-verification.index') }}">List</a>
                    </div>
                </div>

                <form action="{{ route('admin.product-verification.update', $product_verification) }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Error block --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">

                        <div class="col-md-12 my-2">
                            <label>Product</label>
                            <select name="product_id" id="product_id" class="form-control" value="{{ old('product_id', $product_verification->product_id) }}">
                                <option value="">Select product</option>
                                @foreach ($products as $product)
                                    <option @selected($product_verification->product_id == $product->id) value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 my-2">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $product_verification->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 my-2">
                            <label>MFG Date <span class="text-danger">*</span></label>
                            <input type="date" name="mfg_date" class="form-control"
                                   value="{{ old('mfg_date', $product_verification->mfg_date) }}" placeholder="MFG Date" required>
                            @error('mfg_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 my-2">
                            <label>Expiry Date <span class="text-danger">*</span></label>
                            <input type="date" name="exp_date" class="form-control"
                                   value="{{ old('exp_date', $product_verification->exp_date) }}" placeholder="Exp Date" required>
                            @error('exp_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 my-2">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control"
                                   value="{{ old('price', $product_verification->price) }}" placeholder="Price">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 my-2">
                            <label>Certifications</label>
                            <input type="text" name="certifications" class="form-control"
                                value="{{ old('certifications', $product_verification->certifications) }}">
                            @error('certifications')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="is_verified">Is Verified</label>
                            <select name="is_verified" id="is_verified" class="form-control">
                                <option value="">-- Select --</option>
                                <option value="1" {{ old('is_verified', $product_verification->is_verified) == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('is_verified', $product_verification->is_verified) == '0' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('is_verified')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- Select --</option>
                                <option value="1" {{ old('status', $product_verification->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $product_verification->status) == '0' ? 'selected' : '' }}>Inactive</option>
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

                            {{-- Existing Images --}}
                            @if($product_verification->images->count() > 0)
                                <div class="mb-3">
                                    <label>Existing Images (check to delete):</label>
                                    <div class="row">
                                        @foreach($product_verification->images as $image)
                                            <div class="col-md-3 existing-image">
                                                <div class="position-relative">
                                                    <img src="{{ public_asset($image->image_path) }}"
                                                         class="img-fluid border p-1"
                                                         style="height: 150px; width: 100%; object-fit: cover;">
                                                    <div class="delete-image-checkbox">
                                                        <label class="mb-0">
                                                            <input type="checkbox" name="delete_images[]" value="{{ $image->id }}"> Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            {{-- New Images Container --}}
                            <div id="imageContainer">
                                {{-- New images will be added here --}}
                            </div>

                            @error('images')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @error('images.*')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Product Batches Section --}}
                        <div class="col-md-12 my-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Product Batches (Optional)</h5>
                                <button type="button" class="btn btn-info btn-sm" id="addBatchBtn">
                                    <i class="fas fa-plus"></i> Add Batch
                                </button>
                            </div>
                            <small class="text-muted d-block mb-3">You can add multiple batches or leave empty</small>

                            <div id="batchContainer">
                                {{-- Existing Batches --}}
                                @foreach($product_verification->batches as $index => $batch)
                                    <div class="batch-item" data-batch-id="{{ $batch->id }}">
                                        <button type="button" class="remove-btn remove-existing-batch" title="Remove batch">×</button>
                                        <input type="hidden" name="existing_batch_ids[]" value="{{ $batch->id }}">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label>Batch Number</label>
                                                <input type="text" name="existing_batch_number[]"
                                                       class="form-control"
                                                       value="{{ $batch->batch_number }}"
                                                       placeholder="Enter batch number">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Hidden input for deleted batches --}}
                            <input type="hidden" name="deleted_batches" id="deletedBatches" value="">
                        </div>
                    </div>

                    <div class="my-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('admin.product-verification.index') }}" class="btn btn-light">Cancel</a>
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
                    <input type="file" name="images[]" class="form-control image-input" accept="image/*">
                </div>
            </div>
            <img class="image-preview" style="display: none;">
        `;
        imageContainer.appendChild(imageItem);
    });

    // Batch Management
    document.getElementById('addBatchBtn').addEventListener('click', function() {
        const batchContainer = document.getElementById('batchContainer');
        const batchItem = document.createElement('div');
        batchItem.className = 'batch-item';
        batchItem.innerHTML = `
            <button type="button" class="remove-btn remove-batch">×</button>
            <div class="row">
                <div class="col-md-12">
                    <label>Batch Number</label>
                    <input type="text" name="batch_number[]" class="form-control" placeholder="Enter batch number">
                </div>
            </div>
        `;
        batchContainer.appendChild(batchItem);
    });

    // Track deleted batches
    let deletedBatches = [];

    // Remove item functions
    document.addEventListener('click', function(e) {
        // Remove new image
        if (e.target.classList.contains('remove-image')) {
            e.target.closest('.image-item').remove();
        }

        // Remove new batch
        if (e.target.classList.contains('remove-batch')) {
            e.target.closest('.batch-item').remove();
        }

        // Remove existing batch
        if (e.target.classList.contains('remove-existing-batch')) {
            const batchItem = e.target.closest('.batch-item');
            const batchId = batchItem.dataset.batchId;

            if (batchId && !deletedBatches.includes(batchId)) {
                deletedBatches.push(batchId);
                document.getElementById('deletedBatches').value = JSON.stringify(deletedBatches);
            }

            batchItem.remove();
        }
    });

    // Image preview on file select
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('image-input')) {
            const imageItem = e.target.closest('.image-item');
            const preview = imageItem.querySelector('.image-preview');
            previewImage(e.target, preview);
        }
    });

    // Form submission warning for required images
    document.querySelector('form').addEventListener('submit', function(e) {
        const existingImages = {{ $product_verification->images->count() }};
        const newImages = document.querySelectorAll('.image-item').length;
        const imagesToDelete = document.querySelectorAll('input[name="delete_images[]"]:checked').length;

        const remainingExistingImages = existingImages - imagesToDelete;
        const totalImages = remainingExistingImages + newImages;

        if (totalImages < 1) {
            e.preventDefault();
            alert('At least one product image is required.');
        }
    });
</script>
@endpush
