<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{

    public function store(Request $request, $course_id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'section_name' => 'required|string|max:255',
            'section_content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Cari course berdasarkan course_id
            $course = Course::findOrFail($course_id);

            // Buat section baru
            $section = new Section([
                'section_name' => $request->input('section_name'),
                'section_content' => $request->input('section_content'),
            ]);

            // Simpan section dalam relationship course
            $course->sections()->save($section);

            return response()->json([
                'message' => 'Section created successfully.',
                'data' => $section,
            ], 201);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Course not found.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Could not create section. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'section_name' => 'nullable|string|max:255',
            'section_content' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Cari section berdasarkan id
            $section = Section::findOrFail($id);

            // Lakukan update field yang ada dalam request
            if ($request->has('section_name')) {
                $section->section_name = $request->input('section_name');
            }
            if ($request->has('section_content')) {
                $section->section_content = $request->input('section_content');
            }

            // Simpan perubahan pada section
            $section->save();

            return response()->json([
                'message' => 'Section updated successfully.',
                'data' => $section,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Section not found.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Could not update section. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Cari section berdasarkan id
            $section = Section::findOrFail($id);

            // Hapus section
            $section->delete();

            return response()->json([
                'message' => 'Section deleted successfully.',
                'data' => $section,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Section not found.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Could not delete section. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function index()
    {
        try {
            // Ambil semua section dari database
            $sections = Section::all();

            return response()->json([
                'message' => 'Sections retrieved successfully.',
                'data' => $sections,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve sections.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function sectionsByCourse($course_id)
    {
        try {
            // Ambil semua section berdasarkan course_id dari database
            $sections = Section::where('course_id', $course_id)->get();

            return response()->json([
                'message' => 'Sections for course retrieved successfully.',
                'data' => $sections,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve sections for course.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            // Cari section berdasarkan id
            $section = Section::findOrFail($id);

            return response()->json([
                'message' => 'Section retrieved successfully.',
                'data' => $section,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Section not found.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve section.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
