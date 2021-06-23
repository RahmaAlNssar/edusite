<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Post;
use App\Models\Video;
use Exception;

class CommentsController extends Controller
{
    public function courseComment(Request $request, Course $course)
    {
        try {
            if ($course->comments()->create(array_merge($request->only('comment'), ['user_id' => auth()->id()]))) {
                toast('Your Comment has been added!', 'success');
                return redirect()->back();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function videoComment(Request $request, Video $video)
    {
        try {
            if ($video->comments()->create(array_merge($request->only('comment'), ['user_id' => auth()->id()]))) {
                toast('Your Comment has been added!', 'success');
                return redirect()->back();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function postComment(Request $request, Post $post)
    {
        try {
            if ($post->comments()->create(array_merge($request->only('comment'), ['user_id' => auth()->id()]))) {
                toast('Your Comment has been added!', 'success');
                return redirect()->back();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
