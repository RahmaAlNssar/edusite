<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class FrontendController extends Controller
{
    public function index()
    {
        $courses = Course::whereVisibility(1)->with('user')->whereHas('videos')->inRandomOrder()->take(3)->get();
        return view('frontend.frontend', compact('courses'));
    }

    public function course($id, $slug)
    {
        $course = Course::whereId($id)->whereSlug($slug)->whereVisibility(1)->with('user')->first();
        return view('frontend.course.index', compact('course'));
    }
}
