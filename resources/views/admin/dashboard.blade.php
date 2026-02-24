@extends('admin.layout.app')
@section('title', 'Dashboard Page')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">

            <!-- Products Card -->
            <div class="col-lg-3 col-sm-6">
                <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
                    <div class="card card-border-shadow-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded bg-label-primary">
                                        <i class="bx bx-box icon-lg"></i> {{-- Product Icon --}}
                                    </span>
                                </div>
                                <h4 class="mb-0">{{ $products }}</h4>
                            </div>
                            <p class="mb-2 text-muted">Products</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Product Verification Card -->
            <div class="col-lg-3 col-sm-6">
                <a href="{{ route('admin.product-verification.index') }}" class="text-decoration-none">
                    <div class="card card-border-shadow-success h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded bg-label-success">
                                        <i class="bx bx-check-shield icon-lg"></i> {{-- Verification Icon --}}
                                    </span>
                                </div>
                                <h4 class="mb-0">{{ $product_verifications }}</h4>
                            </div>
                            <p class="mb-2 text-muted">Product Verification</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
