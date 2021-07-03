<?php

namespace App\Http\Controllers\Frontend;

use App\Events\NewLike;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Controller;
use App\Notifications\AddLike;
use App\Models\Video;
use App\Models\Post;
use Carbon\Carbon;

class LikesController extends Controller
{
    public function videoLike(Video $video)
    {
        if ($video->likes()->whereUserId(auth()->id())->count()) {
            $video->likes()->whereUserId(auth()->id())->delete();
        } else {
            $data = [
                'message'     => auth()->user()->name . ' liked your video.',
                'image'       => auth()->user()->image_url,
                'name'        => auth()->user()->name,
                'title'       => $video->title,
                'date'        => Carbon::parse(now())->diffForHumans(),
                'url'         => route('course.video', ['video' => $video->id, 'title' => $video->slug]),
            ];
            if (auth()->id() != $video->course->user_id)
                Notification::send($video->course->user, new AddLike($data));
            $video->likes()->create(['user_id' => auth()->id()]);
        }
        event(new NewLike(['count' => $video->likes()->count()]));

        return response()->json(['count' => $video->likes()->count()]);
    }

    public function postLike(Post $post)
    {
        if ($post->likes()->whereUserId(auth()->id())->count())
            $post->likes()->whereUserId(auth()->id())->delete();
        else {
            $data = [
                'message'     => auth()->user()->name . ' liked your post.',
                'image'       => auth()->user()->image_url,
                'name'        => auth()->user()->name,
                'title'       => $post->title,
                'date'        => Carbon::parse(now())->diffForHumans(),
                'url'         => route('post', ['id' => $post->id, 'title' => $post->slug]),
            ];

            if (auth()->id() != $post->user_id)
                Notification::send($post->user, new AddLike($data));
            $post->likes()->create(['user_id' => auth()->id()]);
        }
        event(new NewLike(['count' => $post->likes()->count()]));
        return response()->json(['count' => $post->likes()->count()]);
    }
}
