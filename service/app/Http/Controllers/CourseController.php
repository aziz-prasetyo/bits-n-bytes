<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{

    public function store(Request $request): JsonResponse
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'course_name' => 'required|string|max:255',
            'course_description' => 'nullable|string',
            'course_price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $course = Course::create([
                'course_name' => $request->input('course_name'),
                'course_description' => $request->input('course_description'),
                'course_price' => $request->input('course_price'),
                'status_id' => 2, // Set status_id menjadi 2
            ]);

            return response()->json([
                'message' => 'Course created successfully.',
                'data' => $course,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Could not create course. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function index()
    {
        $courses = Course::with('sections')->get();
        return response()->json([
            'message' => 'Courses retrieved successfully.',
            'data' => $courses
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'course_name' => 'sometimes|string|max:255',
            'course_description' => 'sometimes|string',
            'course_price' => 'sometimes|integer',
            'status_id' => 'sometimes|exists:statuses,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Cari course berdasarkan id
            $course = Course::findOrFail($id);

            // Update hanya field yang ada pada request
            $course->update($request->only('course_name', 'course_description', 'course_price', 'status_id'));

            return response()->json([
                'message' => 'Course updated successfully.',
                'data' => $course,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Could not update course. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Cari course berdasarkan id
            $course = Course::findOrFail($id);
            $course->delete();

            return response()->json([
                'message' => 'Course deleted successfully.',
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Course not found.',
                'error' => $e->getMessage(),
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Could not delete course. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function publish($id)
    {
        try {
            // Cari course berdasarkan id
            $course = Course::findOrFail($id);

            // Update status_id menjadi 1 (Published)
            $course->update(['status_id' => 1]);

            return response()->json([
                'message' => 'Course published successfully.',
                'data' => $course,
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Course not found.',
                'error' => $e->getMessage(),
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Could not publish course. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function publishedCourses()
    {
        try {
            $courses = Course::where('status_id', 1)->with('sections')->get();

            return response()->json([
                'message' => 'Published courses retrieved successfully.',
                'data' => $courses,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve published courses.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            // Cari course berdasarkan id
            $course = Course::with('sections')->findOrFail($id);

            return response()->json([
                'message' => 'Course retrieved successfully.',
                'data' => $course,
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Course not found.',
                'error' => $e->getMessage(),
            ], 404);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve course.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
