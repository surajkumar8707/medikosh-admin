<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomePageCarouselController;
use App\Http\Controllers\Admin\BlogCarouselController;
use App\Http\Controllers\Admin\ProductVerificationController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Admin" middleware group. Make something great!
|
*/

// Admin routes
Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'adminLogin'])->name('login.post');
Route::any('/logout', [LoginController::class, 'adminLogout'])->name('logout');

// Authenticated routes
Route::middleware('role:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/change-password', [AdminController::class, 'changePassword'])->name('password');
    Route::post('/update-password', [AdminController::class, 'updatePassword'])->name('update.password');
    Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
    Route::post('/setting-update/{id}', [AdminController::class, 'settingUpdate'])->name('setting.update');

    Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts');
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');

    Route::get('/social-media', [AdminController::class, 'socialMedia'])->name('social.media');
    Route::post('/social-media-update/{id}', [AdminController::class, 'socialMediaUpdate'])->name('social.media.update');

    // Pages
    Route::group(['prefix' => '/pages', 'as' => 'pages.'], function () {
        Route::get('/about', [AdminController::class, 'aboutPage'])->name('about');
        Route::get('/our-room', [AdminController::class, 'ourRoomPage'])->name('our.room');
        Route::get('/gallery', [AdminController::class, 'galleryPage'])->name('gallery');
        Route::get('/gallery/create', [AdminController::class, 'galleryCreate'])->name('gallery.create');
        Route::post('gallery', [AdminController::class, 'store'])->name('gallery.store');
        Route::get('gallery/{gallery}', [AdminController::class, 'show'])->name('gallery.show');
        Route::get('gallery/{gallery}/edit', [AdminController::class, 'edit'])->name('gallery.edit');
        Route::put('gallery/{gallery}', [AdminController::class, 'update'])->name('gallery.update');
        Route::patch('gallery/{gallery}', [AdminController::class, 'update']); // Optional — for PATCH method
        Route::delete('gallery/{gallery}', [AdminController::class, 'destroy'])->name('gallery.destroy');
        Route::post('/gallery/change-status', [AdminController::class, 'changeStatus'])->name('gallery.change.status');
    });

    Route::resource('home-page-carousel', HomePageCarouselController::class);
    Route::resource('blog', BlogCarouselController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product-verification', ProductVerificationController::class);
    Route::get('blog/{blog}/delete', [BlogCarouselController::class, 'destroy'])->name('blog.delete');
    Route::post('/change-status', [HomePageCarouselController::class, 'changeStatus'])->name('change.status');
    Route::post('/blog/change-status', [BlogCarouselController::class, 'changeStatus'])->name('blog.change.status');
    Route::post('/products/{id}/change-status', [ProductController::class, 'updateStatus'])->name('products.change.status');
    Route::post('/product-verification/{id}/change-status', [ProductVerificationController::class, 'updateStatus'])->name('product-verification.change.status');
});
