<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SectionController;
use App\Http\Middleware\IsGuru;

Route::get('/ping', function () {
    return response()->json(['message' => 'pong!']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/refresh', [AuthController::class, 'refreshToken']);
// Courses
        Route::post('/courses', [CourseController::class, 'store']);
        Route::put('/courses/{id}', [CourseController::class, 'update']);
        Route::delete('/courses/{id}', [CourseController::class, 'destroy']);

        // Section
        Route::post('/courses/{course_id}/sections', [SectionController::class, 'store']);
        Route::put('/sections/{id}', [SectionController::class, 'update']);
        Route::delete('/sections/{id}', [SectionController::class, 'destroy']);
Route::group(['middleware' => ['auth:api']], function () {

    // Route::middleware([IsGuru::class])->group(function() {
        
    // });

    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Status
    Route::get('/statuses', [StatusController::class, 'index']);

    // Courses
    Route::get('/courses', [CourseController::class, 'index']);
    Route::put('/courses/{id}/publish', [CourseController::class, 'publish']);
    Route::get('/courses/published', [CourseController::class, 'publishedCourses']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);

    // Sections
    Route::get('/sections', [SectionController::class, 'index']);
    Route::get('/sections/course/{course_id}', [SectionController::class, 'sectionsByCourse']);
    Route::get('/sections/{id}', [SectionController::class, 'show']);
});



