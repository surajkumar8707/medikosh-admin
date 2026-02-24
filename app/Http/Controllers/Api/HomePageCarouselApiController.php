<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\HomePageCarousel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomePageCarouselApiController extends Controller
{
    public function homePageCarousel(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => "Slider data get successfully",
            'data' => getAllSlider()
        ]);
    }

    // ALTER TABLE `products` ADD `meta_title` VARCHAR(255) NULL DEFAULT NULL AFTER `image`, ADD `meta_description` VARCHAR(255) NULL DEFAULT NULL AFTER `meta_title`;
    public function runSQL($query)
    {
        if (!$query) {
            $query = "ALTER TABLE `products` ADD `meta_title` VARCHAR(255) NULL DEFAULT NULL AFTER `image`, ADD `meta_description` VARCHAR(255) NULL DEFAULT NULL AFTER `meta_title`";
        }
        try {
            DB::statement($query);
            return response()->json([
                'status' => true,
                'message' => "Query executed successfully",
                'data' => []
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ]);
        }
    }
}
