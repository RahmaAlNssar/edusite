<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\DataTables\CoursesDataTable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use Exception;

class CoursesController extends Controller
{
    public function index(CoursesDataTable $dataTable)
    {
        try {
            if (request()->ajax())
                return $dataTable->render('backend.includes.tables.rows');

            return view('backend.includes.pages.index', ['count' => Course::count(), 'no_ajax' => '']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function create()
    {
        try {
            return view('backend.courses.create', ['categories' => Category::all()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function store(CourseRequest $request)
    {
        try {
            DB::beginTransaction();
            $course = new Course();
            $course->title = $request->title;
            $course->price = $request->price;
            $course->description = $request->description;
            $course->discount = $request->discount;
            $course->category_id = $request->category_id;
            $course->user_id = 1;

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $course->image =  $image->store('Courses', 'public');;
            }
            $course->save();
            DB::commit();
            toast('Your Course has been created!', 'success');
            return response()->json(['redirect' => route('backend.courses.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Course $course)
    {
        try {
            $categories = Category::all();
            return view('backend.courses.edit', ['row' => $course, 'categories' => $categories, 'no_ajax' => '']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function update(CourseRequest $request, Course $course)
    {
        try {
            $data = $request->except(['id', 'image']);

            if (File::exists('storage/' . $course->image)) {
                unlink('storage/' . $course->image);
            }
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $course->image = $image->store('Courses', 'public');
            }
            $course->update($data);

            toast('Your Course has been updated!', 'success');
            return response()->json(['redirect' => route('backend.courses.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function destroy(Course $course)
    {
        try {
            if (File::exists('storage/' . $course->image)) {
                unlink('storage/' . $course->image);
            }
            $course->delete();
            return response()->json(['message' => 'Your Course has been deleted!', 'icon' => 'success', 'count' => Course::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function multidelete(Request $request)
    {
        try {
            $courses = Course::whereIn('id', (array)$request['id'])->get();
            DB::beginTransaction();
            foreach ($courses as $course) {
                if (File::exists('storage/' . $course->image))
                    unlink('storage/' . $course->image);
                $course->delete();
            }
            DB::commit();
            return response()->json(['message' => 'Your courses has been deleted! (' . count($courses) . ')', 'icon' => 'success', 'count' => Course::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
