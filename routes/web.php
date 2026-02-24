<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.login.form');
});

// Route::group(['prefix' => '/', 'as' => 'front.'], function () {
//     Route::get('/', [\App\Http\Controllers\FrontController::class, 'home'])->name('home');
//     Route::get('/room/{id}', [\App\Http\Controllers\FrontController::class, 'roomDetailPage'])->name('room.detail.page');
//     Route::get('/book-room/{id?}', [\App\Http\Controllers\FrontController::class, 'openRoomBookingPage'])->name('room.book');
//     Route::post('/booking/store', [\App\Http\Controllers\FrontController::class, 'roomBookingStore'])->name('room.store');
//     Route::get('/about', [\App\Http\Controllers\FrontController::class, 'aboutUs'])->name('about');
//     Route::get('/room', [\App\Http\Controllers\FrontController::class, 'room'])->name('room');
//     Route::get('/gallery', [\App\Http\Controllers\FrontController::class, 'gallery'])->name('gallery');
//     Route::get('/construction', [\App\Http\Controllers\FrontController::class, 'construction'])->name('construction');
//     Route::get('/interior', [\App\Http\Controllers\FrontController::class, 'interior'])->name('interior');
//     Route::get('/rent-property', [\App\Http\Controllers\FrontController::class, 'rentProperty'])->name('rent.property');
//     Route::get('/blog', [\App\Http\Controllers\FrontController::class, 'blog'])->name('blog');
//     Route::get('/privacy-policy', [\App\Http\Controllers\FrontController::class, 'privacyPolicy'])->name('privacy.policy');
//     Route::get('/terms-condition', [\App\Http\Controllers\FrontController::class, 'termsCondition'])->name('terms.condition');
//     Route::get('/services', [\App\Http\Controllers\FrontController::class, 'services'])->name('services');
//     Route::get('/vision', [\App\Http\Controllers\FrontController::class, 'vision'])->name('vision');
//     Route::get('/blogs/{id?}', [\App\Http\Controllers\FrontController::class, 'blogs'])->name('blogs');
//     // Route::get('/blog/{id}', [\App\Http\Controllers\FrontController::class, 'specificBlog'])->name('specific.blog');
//     Route::get('/contact', [\App\Http\Controllers\FrontController::class, 'contactUs'])->name('contact');
//     Route::post('/save-contact-us', [\App\Http\Controllers\FrontController::class, 'saveContactUs'])->name('save.contact');
// });

// Route::get('lang/{locale}', [\App\Http\Controllers\LanguageController::class, 'switchLang']);

// require __DIR__ . '/auth.php';
