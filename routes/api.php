<?php

use App\Http\Controllers\Api\AppSettingApiController;
use App\Http\Controllers\Api\HomePageCarouselApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{id}', [ProductApiController::class, 'show']);
Route::get('/products/batch/{batchNumber?}', [ProductApiController::class, 'getByBatch']);
Route::get('/products/{id}/batches', [ProductApiController::class, 'getProductBatches']);
Route::get('/products/{id}/images', [ProductApiController::class, 'getProductImages']);

// Other Routes
Route::get('/app-setting', [AppSettingApiController::class, 'appSetting']);
Route::get('/social-media-link', [AppSettingApiController::class, 'getSocialMediaLink']);
Route::get('/home-page-carousel', [HomePageCarouselApiController::class, 'homePageCarousel']);
Route::get('/runsql/{query?}', [HomePageCarouselApiController::class, 'runSQL']);
