<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\DataTables\ProductDatatable;
use App\Models\ProductBatch;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function index(ProductDatatable $dataTable)
    {
        return $dataTable->render('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'order_url' => 'nullable|string',
            'description' => 'nullable|string',
            'certifications' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_verified' => 'required|in:0,1',
            'status' => 'required|in:0,1',
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Create product
            $product = Product::create([
                'name' => $request->name,
                'order_url' => $request->order_url,
                'description' => $request->description,
                'certifications' => $request->certifications,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'is_verified' => $request->is_verified,
                'status' => $request->status,
            ]);

            // Upload and save multiple images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $path = 'uploads/products';
                    $image->move(public_path($path), $filename);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path . '/' . $filename,
                    ]);
                }
            }

            // // Save batches if provided (only batch_number)
            // if ($request->has('batch_number') && !empty(array_filter($request->batch_number))) {
            //     foreach ($request->batch_number as $batchNumber) {
            //         if (!empty($batchNumber)) {
            //             ProductBatch::create([
            //                 'product_id' => $product->id,
            //                 'batch_number' => $batchNumber,
            //             ]);
            //         }
            //     }
            // }

            return redirect()->route('admin.products.index')
                ->with('success', 'Product created successfully.');

        } catch (\Exception $e) {
            // dd($e->getMessage());
            return back()->withInput()
                ->with('error', 'Error creating product: ' . $e->getMessage());
        }
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'order_url' => 'nullable|string',
            'description' => 'nullable|string',
            'certifications' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_verified' => 'required|in:0,1',
            'status' => 'required|in:0,1',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'batch_number.*' => 'nullable|string|max:255',
            'existing_batch_number.*' => 'nullable|string|max:255',
        ]);

        try {
            $product = Product::findOrFail($id);

            // Update product
            $product->update([
                'name' => $request->name,
                'order_url' => $request->order_url,
                'description' => $request->description,
                'certifications' => $request->certifications,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'is_verified' => $request->is_verified,
                'status' => $request->status,
            ]);

            // Handle deleted images
            if ($request->has('delete_images')) {
                foreach ($request->delete_images as $imageId) {
                    $image = ProductImage::find($imageId);
                    if ($image) {
                        // Delete file from server
                        if (file_exists(public_path($image->image_path))) {
                            unlink(public_path($image->image_path));
                        }
                        $image->delete();
                    }
                }
            }

            // Upload new images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $path = 'uploads/products';
                    $image->move(public_path($path), $filename);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path . '/' . $filename,
                    ]);
                }
            }

            // // Handle deleted batches
            // if ($request->has('deleted_batches') && !empty($request->deleted_batches)) {
            //     $deletedBatchIds = json_decode($request->deleted_batches, true);
            //     ProductBatch::whereIn('id', $deletedBatchIds)->delete();
            // }

            // // Update existing batches
            // if ($request->has('existing_batch_ids')) {
            //     foreach ($request->existing_batch_ids as $index => $batchId) {
            //         $batch = ProductBatch::find($batchId);
            //         if ($batch && isset($request->existing_batch_number[$index])) {
            //             $batch->update([
            //                 'batch_number' => $request->existing_batch_number[$index],
            //             ]);
            //         }
            //     }
            // }

            // // Add new batches
            // if ($request->has('batch_number') && !empty(array_filter($request->batch_number))) {
            //     foreach ($request->batch_number as $batchNumber) {
            //         if (!empty($batchNumber)) {
            //             ProductBatch::create([
            //                 'product_id' => $product->id,
            //                 'batch_number' => $batchNumber,
            //             ]);
            //         }
            //     }
            // }

            return redirect()->route('admin.products.index')
                ->with('success', 'Product updated successfully.');

        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error updating product: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $product = Product::with(['images', 'batches'])->findOrFail($id);

            // Delete associated images from server
            foreach ($product->images as $image) {
                $imagePath = public_path($image->image_path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Delete product (cascades to images and batches due to foreign key)
            $product->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product deleted successfully.'
                ]);
            }

            return redirect()->route('admin.products.index')
                ->with('success', 'Product deleted successfully.');

        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting product: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Error deleting product: ' . $e->getMessage());
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->status = $request->status;
            $product->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating status.'
            ], 500);
        }
    }
}
