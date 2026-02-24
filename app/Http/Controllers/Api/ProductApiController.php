<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Get all products OR search by batch number
     * URL:
     * /api/products
     * /api/products?search=ABX1023
     * /api/products?batch=ABX1023
     */
    public function index(Request $request)
    {
        $query = Product::query(); 

        // Search by batch number only
        if ($request->has('search') || $request->has('batch')) {
            $searchTerm = $request->search ?? $request->batch;

            $query->whereHas('batches', function ($q) use ($searchTerm) {
                $q->where('batch_number', 'like', '%' . $searchTerm . '%');
            });
            $query->where('product_type', '1');
        }
        else{
            $query->where('product_type', '0');
        }

        // Get all products without pagination
        $products = $query->with(['images', 'batches'])
            ->latest()
            ->get(); // Using get() instead of paginate()

        // Transform the data to include full image URLs
        $products->transform(function ($product) {
            // Transform images to include full URLs
            if ($product->images) {
                $product->images->transform(function ($image) {
                    if (!filter_var($image->image_path, FILTER_VALIDATE_URL)) {
                        $image->image_path = public_asset($image->image_path);
                    }
                    return $image;
                });
            }
            return $product;
        });

        return response()->json([
            'status' => true,
            'message' => 'Products retrieved successfully',
            'total' => $products->count(),
            'data' => $products
        ]);
    }

    /**
     * Get single product with all details
     * URL: /api/products/{id}
     */
    public function show($id)
    {
        $product = Product::with(['images', 'batches'])->where('product_type', '1')
            ->find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ], 404);
        }

        // Transform images to include full URLs
        if ($product->images) {
            $product->images->transform(function ($image) {
                if (!filter_var($image->image_path, FILTER_VALIDATE_URL)) {
                    $image->image_path = public_asset($image->image_path);
                }
                return $image;
            });
        }

        return response()->json([
            'status' => true,
            'message' => 'Product retrieved successfully',
            'data' => $product
        ]);
    }

    /**
     * Get products by batch number
     * URL: /api/products/batch/{batch_number}
     */
    public function getByBatch($batchNumber = null)
    {
        if (!$batchNumber) {
            $batchNumber = request()->batch_number;
        }
        $products = Product::whereHas('batches', function ($query) use ($batchNumber) {
            $query->where('batch_number', 'like', $batchNumber);
        })
            ->with(['images', 'batches'])
            ->where('product_type', '1')
            ->latest()
            ->get(); // Using get() instead of paginate()

        if ($products->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No products found with this batch number'
            ], 404);
        }

        // Transform images to include full URLs
        $products->transform(function ($product) {
            if ($product->images) {
                $product->images->transform(function ($image) {
                    if (!filter_var($image->image_path, FILTER_VALIDATE_URL)) {
                        $image->image_path = public_asset($image->image_path);
                    }
                    return $image;
                });
            }
            return $product;
        });

        return response()->json([
            'status' => true,
            'message' => 'Products retrieved successfully',
            'total' => $products->count(),
            'data' => $products
        ]);
    }

    /**
     * Get all batches for a product
     * URL: /api/products/{id}/batches
     */
    public function getProductBatches($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ], 404);
        }

        $batches = $product->batches;

        return response()->json([
            'status' => true,
            'message' => 'Product batches retrieved successfully',
            'product_name' => $product->name,
            'total_batches' => $batches->count(),
            'data' => $batches
        ]);
    }

    /**
     * Get all images for a product
     * URL: /api/products/{id}/images
     */
    public function getProductImages($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ], 404);
        }

        $images = $product->images;

        // Transform images to include full URLs
        $images->transform(function ($image) {
            if (!filter_var($image->image_path, FILTER_VALIDATE_URL)) {
                $image->image_path = public_asset($image->image_path);
            }
            return $image;
        });

        return response()->json([
            'status' => true,
            'message' => 'Product images retrieved successfully',
            'product_name' => $product->name,
            'total_images' => $images->count(),
            'data' => $images
        ]);
    }
}
