<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        if ($this->getUser())
            return view('frontend.profile.index', ['user' => $this->getUser()]);

        return abort(404);
    }

    public function courses()
    {
        if (!$this->getUser())
            return abort(404);

        $courses = Course::whereUserId($this->getUser()->id)->whereVisibility(1)->whereHas('videos')->get();
        return view('frontend.profile.courses-section', compact('courses'));
    }

    public function posts()
    {
        if (!$this->getUser())
            return abort(404);

        $posts = Post::whereUserId($this->getUser()->id)->whereVisibility(1)->get();
        return view('frontend.profile.posts-section', compact('posts'));
    }

    public function videos()
    {
        if (!$this->getUser())
            return abort(404);

        $videos = Video::whereHas('course', function ($query) {
            return $query->whereVisibility(1)->whereUserId($this->getUser()->id);
        })->whereHas('likes')->whereHas('visitors')->get();
        return view('frontend.profile.videos-section', compact('videos'));
    }

    private function getUser()
    {
        if (request()->has('id'))
            $user = User::whereId(request()->id)->whereName(request()->name)->first();
        else
            $user = auth()->user();

        if ($user)
            return $user;

        return false;
    }
}
