<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderImage;
use App\Models\Category;
use App\Models\Course;
use App\Models\Post;
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

    public function courses(Request $request)
    {
        $courses = Course::whereVisibility(1)->whereHas('videos')->when($request->search, function ($query) use ($request) {
            return $query->where('title', 'like', '%' . $request->search . '%');
            // This will return all courses that have same title
        })->when($request->category, function ($query) use ($request) {
            return $query->whereHas('category', function ($q) use ($request) {
                return $q->where('slug', 'like', '%' . $request->category . '%');
                // This will return all courses that have in same category name
            });
        })->when($request->tag, function ($query) use ($request) {
            return $query->whereHas('videos', function ($q) use ($request) {
                return $q->whereHas('tags', function ($qu) use ($request) {
                    return $qu->where('slug', 'like', '%' . $request->tag . '%');
                });
            });
            // This will return all courses must have videos and this videos in same tag name
        })->when($request->id, function ($query) use ($request) {
            return $query->whereHas('user', function ($q) use ($request) {
                return $q->whereId($request->id)->whereName($request->teacher);
                // This will return all courses that have in same user name
            });
        })->with('user')->paginate(6);

        if ($courses) {
            $latest  = Course::whereVisibility(1)->whereHas('videos')->latest()->take(3)->get();
            $tags    = Tag::whereVisibility(1)->whereHas('videos')->take(10)->get();
            $categories = Category::whereVisibility(1)->whereHas('courses', function ($query) {
                return $query->whereVisibility(1);
            })->get();
            return view('frontend.courses.index', compact('courses', 'latest', 'tags', 'categories'));
        }
        return abort(404);
    }

    public function course(Request $request)
    {
        $course = Course::whereId($request->id)->whereSlug($request->title)->whereVisibility(1)->with('user')->first();
        if ($course) {
            $latest = Course::whereVisibility(1)->whereHas('videos')->latest()->take(3)->get();
            return view('frontend.courses.single.index', compact('course', 'latest'));
        }
        return abort(404);
    }

    public function blog(Request $request)
    {
        $posts = Post::whereVisibility(1)->when($request->search, function ($query) use ($request) {
            return $query->where('title', 'like', '%' . $request->search . '%');
            // This will return all posts that have same title
        })->when($request->category, function ($query) use ($request) {
            return $query->whereHas('category', function ($q) use ($request) {
                return $q->where('slug', 'like', '%' . $request->category . '%');
                // This will return all posts that have in same category name
            });
        })->when($request->tag, function ($query) use ($request) {
            return $query->whereHas('tags', function ($q) use ($request) {
                return $q->where('slug', 'like', '%' . $request->tag . '%');
            });
            // This will return all posts same tag name
        })->when($request->id, function ($query) use ($request) {
            return $query->whereHas('user', function ($q) use ($request) {
                return $q->whereId($request->id)->whereName($request->teacher);
                // This will return all courses that have in same user name
            });
        })->with('user')->paginate(6);

        if ($posts) {
            $latest  = Post::whereVisibility(1)->latest()->take(3)->get();
            $tags    = Tag::whereVisibility(1)->whereHas('posts')->take(10)->get();
            $categories = Category::whereVisibility(1)->whereHas('posts', function ($query) {
                return $query->whereVisibility(1);
            })->get();
            return view('frontend.blog.index', compact('latest', 'tags', 'categories', 'posts'));
        }
        return abort(404);
    }

    public function post(Request $request)
    {
        $post = Post::whereId($request->id)->whereSlug($request->title)->whereVisibility(1)->with('user')->first();
        if ($post) {
            $latest     = Post::whereVisibility(1)->latest()->take(3)->get();
            $tags       = Tag::whereVisibility(1)->whereHas('posts')->take(10)->get();
            $categories = Category::whereVisibility(1)->whereHas('posts', function ($query) {
                return $query->whereVisibility(1);
            })->get();
            return view('frontend.blog.single.index', compact('latest', 'tags', 'categories', 'post'));
        }
        return abort(404);
    }

    public function about()
    {
        return view('frontend.about.index');
    }

    public function contact()
    {
        return view('frontend.contact.index');
    }
}
