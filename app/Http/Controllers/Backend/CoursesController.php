<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\DataTables\CoursesDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Traits\UploadFile;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Exception;

class CoursesController extends Controller
{
    use UploadFile;

    public function index(CoursesDataTable $dataTable)
    {
        try {
            if (request()->ajax())
                return $dataTable->render('backend.includes.tables.rows');

            return view('backend.includes.pages.index-page', ['count' => Course::count(), 'no_ajax' => '']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function create()
    {
        try {
            return view('backend.includes.pages.form-page', ['categories' => Category::select('id', 'name', 'visibility')->get(), 'users' => User::select('id', 'name')->get()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function store(CourseRequest $request)
    {
        try {
            DB::beginTransaction();
            Course::create($request->except(['id']));
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
            return view('backend.includes.pages.form-page', ['row' => $course, 'categories' => Category::select('id', 'name', 'visibility')->get(), 'users' => User::select('id', 'name')->get(), 'no_ajax' => '']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function update(CourseRequest $request, Course $course)
    {
        try {
            DB::beginTransaction();
            if ($request->has('image'))
                $this->remove($course->image, 'courses');
          $updated = $course->update(array_merge($request->except(['id','discount','start_date','end_date']),$this->checkIfNull($request)));
         // DB::table('courses')->where([['id',$course->id],['price',0]])->update(['discount'=>0,'start_date'=>null,'end_date'=>null]);
          //DB::table('courses')->where([['id',$course->id],['discount',0]])->update(['start_date'=>null,'end_date'=>null]);
            DB::commit();
            toast('Your Course has been updated!', 'success');
            return response()->json(['redirect' => route('backend.courses.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
    public function checkIfNull($request){
        
        if($request->price == null || $request->discount == null){
            return [
                'start_date'=>null,
                'end_date'=>null,
                'discount'=>null
            ];
        }
        return [];
      
    }
    public function destroy(Course $course)
    {
        try {
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
                $course->delete();
            }
            DB::commit();
            return response()->json(['message' => 'Your courses has been deleted! (' . count($courses) . ')', 'icon' => 'success', 'count' => Course::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
