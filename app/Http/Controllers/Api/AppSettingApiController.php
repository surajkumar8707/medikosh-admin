<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppSettingApiController extends Controller
{
    public function appSetting(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => "App setting get successfully",
            'data' => getSettings()
        ]);
    }

    public function getSocialMediaLink(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => "Social Media Link get successfully",
            'data' => getSocialMediaLink()
        ]);
    }
}
