<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\DataTables\CourseDataTable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use Exception;

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

            return view('backend.includes.pages.index', ['count' => Course::count(),'no_ajax'=>'']);
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
            return view('backend.courses.create', compact('categories'));
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
    public function store(Request $request)
    {
        
        try {
            $course = new Course();
            $course->title = $request->title;
            $course->price = $request->price;
            $course->description = $request->description;
            $course->discount = $request->discount;
            $course->category_id = $request->category_id;
            $course->user_id = 1;
           // $course->image = $request->file('image')->getClientOriginalName();
          
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $image = $request->file('image');
               // $name = $image->getClientOriginalName();
               // $image->store('Courses','public');
                $course->image =  $image->store('Courses','public');;
            }
            $course->save();
       
            return response()->json(['redirect'=>route('backend.courses.index'),'Your Course has been created!','icon'=>'success', 'count' => Course::count()]);
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
            $categories = Category::all();
            return view('backend.courses.edit', ['row' => $course, 'categories' => $categories,'no_ajax'=>'']);
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
    public function update(CourseRequest $request, Course $course)
    {
        try {
            $data = $request->except(['id','image']);
            
            if(File::exists('storage/'.$course->image)){
                unlink('storage/'.$course->image);
            }
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $image = $request->file('image');
                $course->image = $image->store('Courses','public');
            }
            $course->update($data);
            return response()->json(['redirect'=>route('backend.courses.index'),'message' => 'Your Course has been updated!', 'icon' => 'success']);
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
            if(File::exists('storage/'.$course->image)){
                unlink('storage/'.$course->image);
            }
            $course->delete();
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
            foreach ($courses as $course){
            if(File::exists('storage/'.$course->image)){
                unlink('storage/'.$course->image);
           }
                $course->delete();
        }
            DB::commit();
            return response()->json(['message' => 'Your courses has been deleted!', 'icon' => 'success', 'count' => Course::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
/*
    public function Total(Course $course)
    {
        $course->sum(function($q){
            $total = $q->price * $q->dicount;
            return $total;
        });
    }
    */
}
