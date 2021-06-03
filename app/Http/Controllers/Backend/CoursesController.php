<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CourseDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseDataTable $dataTable)
    {
        try {
            if (request()->ajax())
                return $dataTable->render('backend.includes.tables.rows');

            return view('backend.courses.index', ['count' => Course::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categories = Category::all();
            return view('backend.includes.forms.form-create',compact('categories'));
            
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        try {
            Course::create($request->except(['id']));
            return response()->json(['message' => 'Your Course has been created!', 'icon' => 'success', 'count' => Course::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        try {
            $category = Category::where('id',$course->category_id)->get();
            return view('backend.includes.forms.form-update', ['course' => $course,'category'=>$category]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request,Course $course)
    {
        try {
            $course->update($request->except(['id']));
            return response()->json(['message' => 'Your Course has been updated!', 'icon' => 'success']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        try {
            if ($course->delete())
                return response()->json(['message' => 'Your Course has been deleted!', 'icon' => 'success', 'count' => Category::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function multidelete(Request $request)
    {
        try {
            $courses = Course::whereIn('id', (array)$request['id'])->get();
            DB::beginTransaction();
            foreach ($courses as $course)
                $course->delete();
            DB::commit();
            return response()->json(['message' => 'Your courses has been deleted!', 'icon' => 'success', 'count' => Course::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
