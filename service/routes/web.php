<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SectionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ping', function () {
    return 'pong';
});

// Status
Route::get('/statuses', [StatusController::class, 'index']);

// Courses
Route::post('/courses', [CourseController::class, 'store']);
Route::put('/courses/{id}', [CourseController::class, 'update']);
Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
Route::get('/courses', [CourseController::class, 'index']);
Route::put('/courses/{id}/publish', [CourseController::class, 'publish']);
Route::get('/courses/published', [CourseController::class, 'publishedCourses']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

// Sections
Route::post('/courses/{course_id}/sections', [SectionController::class, 'store']);
Route::put('/sections/{id}', [SectionController::class, 'update']);
Route::delete('/sections/{id}', [SectionController::class, 'destroy']);
Route::get('/sections', [SectionController::class, 'index']);
Route::get('/sections/course/{course_id}', [SectionController::class, 'sectionsByCourse']);
Route::get('/sections/{id}', [SectionController::class, 'show']);
