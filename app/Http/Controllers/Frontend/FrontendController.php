<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderImage;
use App\Models\Course;
use App\Models\Tag;

class FrontendController extends Controller
{
    public function home()
    {
        $courses = Course::whereVisibility(1)->with('user')->inRandomOrder()->take(3)->get();
        $slices = SliderImage::select('title', 'desc', 'image')->whereHas('slider', function ($query) {
            return $query->whereName('home');
        })->get();
        return view('frontend.home.index', compact('courses', 'slices'));
    }

    public function courses()
    {
        $courses = Course::whereVisibility(1)->with('user')->paginate(6);
        $latest  = Course::whereVisibility(1)->latest()->take(3)->get();
        $tags    = Tag::whereVisibility(1)->inRandomOrder()->take(10)->get();
        return view('frontend.courses.index', compact('courses', 'latest', 'tags'));
    }

    public function about()
    {
        return view('frontend.about.index');
    }

    public function contact()
    {
        return view('frontend.contact.index');
    }

    public function course($id, $slug)
    {
        $course = Course::whereId($id)->whereSlug($slug)->whereVisibility(1)->with('user')->first();
        return view('frontend.course.index', compact('course'));
    }
}
