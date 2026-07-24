<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public Controllers
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\ContactController;

// Admin Controllers
use App\Http\Controllers\Api\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Api\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Api\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Api\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Api\Admin\SettingController as AdminSettingController;

// =====================
// Public API Routes
// =====================

Route::get('/profile', [ProfileController::class, 'show']);

Route::get('/services', [ServiceController::class, 'index']);

Route::get('/services/{service}', [ServiceController::class, 'show']);

Route::get('/gallery', [GalleryController::class, 'index']);

Route::get('/testimonials', [TestimonialController::class, 'index']);

Route::get('/settings', [SettingController::class, 'show']);

Route::post('/appointments', [AppointmentController::class, 'store']);

Route::post('/contact', [ContactController::class, 'store']);

// =====================
// Authentication
// =====================

Route::post('/login', [AuthController::class, 'login']);

// =====================
// Protected Admin Routes
// =====================

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('admin')->group(function () {

        // Testimonials CRUD
        Route::apiResource('testimonials', AdminTestimonialController::class);

        // Settings update
        Route::put('/settings', [AdminSettingController::class, 'update']);

        // Services CRUD
        Route::apiResource('services', AdminServiceController::class);

        // Doctor Profile Update
        Route::put('/profile', [AdminProfileController::class, 'update']);

        // Gallery Management
        Route::apiResource('gallery', AdminGalleryController::class)->only([
            'index', 'store', 'destroy'
        ]);

    });

});