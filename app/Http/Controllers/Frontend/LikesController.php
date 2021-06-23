<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Post;

class LikesController extends Controller
{
    public function videoLike(Video $video)
    {
        if ($video->likes()->whereUserId(auth()->id())->count())
            $video->likes()->whereUserId(auth()->id())->delete();
        else
            $video->likes()->create(['user_id' => auth()->id()]);

        return redirect()->back();
    }

    public function postLike(Post $post)
    {
        if ($post->likes()->whereUserId(auth()->id())->count())
            $post->likes()->whereUserId(auth()->id())->delete();
        else
            $post->likes()->create(['user_id' => auth()->id()]);

        return redirect()->back();
    }
}
