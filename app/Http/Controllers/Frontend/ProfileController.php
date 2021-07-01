<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Video;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        if ($this->profileId())
            return view('frontend.profile.index', ['user' => User::whereId($this->profileId())->first()]);

        return abort(404);
    }

    public function follow()
    {
        if ($this->profileId() && $this->profileId() !== auth()->id()) {
            $profile = User::whereId($this->profileId())->first();
            $type = 0;

            if (auth()->user()->follows()->whereFollowId($this->profileId())->first()) {
                auth()->user()->follows()->detach($this->profileId());
                $type = 1;
            } else
                auth()->user()->follows()->attach($this->profileId());

            return response()->json(['count' => $profile->followers()->count(), 'type' => $type]);
        }
        return response()->json([], 404);
    }

    public function courses()
    {
        if (!$this->profileId())
            return response()->json([], 404);

        $courses = Course::whereUserId($this->profileId())->whereVisibility(1)->whereHas('videos')->get();
        return view('frontend.profile.courses-section', compact('courses'));
    }

    public function posts()
    {
        if (!$this->profileId())
            return response()->json([], 404);

        $posts = Post::whereUserId($this->profileId())->whereVisibility(1)->get();
        return view('frontend.profile.posts-section', compact('posts'));
    }

    public function videos()
    {
        if (!$this->profileId())
            return response()->json([], 404);

        $videos = Video::whereHas('course', function ($query) {
            return $query->whereVisibility(1)->whereUserId($this->profileId());
        })->whereHas('likes')->whereHas('visitors')->get();
        return view('frontend.profile.videos-section', compact('videos'));
    }

    private function profileId()
    {
        $id = request()->has('id') ? User::whereId(request()->id)->first()->id : auth()->id();
        return $id ?? false;
    }
}
