<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductBatch;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Ayurvedic Immunity Booster',
                'description' => 'Natural ayurvedic immunity booster made with herbal extracts.',
                'certifications' => 'GMP, ISO',
                'meta_title' => 'Ayurvedic Immunity Booster',
                'meta_description' => 'Natural ayurvedic immunity booster made with herbal extracts.',
                'is_verified' => 1,
                'status' => 1,
                'batch' => 'ABX1023',
                'image' => 'uploads/products/ayurvedic-immunity-booster.jpg',
            ],
            [
                'name' => 'Organic Herbal Shampoo',
                'description' => 'Chemical-free herbal shampoo for healthy hair.',
                'certifications' => 'ISO, FDA',
                'meta_title' => 'Organic Herbal Shampoo',
                'meta_description' => 'Chemical-free herbal shampoo for healthy hair.',
                'is_verified' => 1,
                'status' => 1,
                'batch' => 'SHP2211',
                'image' => 'uploads/products/organic-herbal-shampoo.jpg',
            ],
            [
                'name' => 'Vitamin C Tablets',
                'description' => 'Vitamin C supplement tablets for daily nutrition.',
                'certifications' => 'GMP, WHO',
                'meta_title' => 'Vitamin C Tablets',
                'meta_description' => 'Vitamin C supplement tablets for daily nutrition.',
                'is_verified' => 1,
                'status' => 1,
                'batch' => 'VIT8899',
                'image' => 'uploads/products/vitamin-c-tablets.jpg',
            ],
            [
                'name' => 'Pain Relief Spray',
                'description' => 'Fast-acting spray for muscle and joint pain.',
                'certifications' => 'ISO',
                'meta_title' => 'Pain Relief Spray',
                'meta_description' => 'Fast-acting spray for muscle and joint pain.',
                'is_verified' => 1,
                'status' => 1,
                'batch' => 'PRS4502',
                'image' => 'uploads/products/pain-relief-spray.jpg',
            ],
        ];

        // foreach ($products as $product) {
        //     Product::create($product);
        // }

        foreach ($products as $product) {
            $product_data = Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'certifications' => $product['certifications'],
                'meta_title' => $product['meta_title'],
                'meta_description' => $product['meta_description'],
                'is_verified' => $product['is_verified'],
                'status' => $product['status'],
            ]);

            ProductBatch::create([
                'product_id' => $product_data['id'],
                'batch_number' => $product['batch'],
            ]);
            ProductImage::create([
                'product_id' => $product_data['id'],
                'image_path' => $product['image'],
            ]);
        }
    }
}
