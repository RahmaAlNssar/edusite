<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Events\NewNotification;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Video;
use App\Models\Post;
use Exception;

class CommentsController extends Controller
{
    public function courseComment(Request $request, Course $course)
    {
        try {
            DB::beginTransaction();
            if ($comment = $course->comments()->create(array_merge($request->only('comment'), ['user_id' => auth()->id()]))) {
                $data = [
                    'message'   => auth()->user()->name . ' commented on your Course',
                    'comment'   => $comment->comment,
                    'image'     => auth()->user()->image_url,
                    'title'     => $course->title,
                    'name'      => auth()->user()->name,
                    'date'      => $comment->created_at->diffForHumans(),
                    'url'       => route('course', ['id' => $course->id, 'title' => $course->slug]) . '#comment_' . $comment->id,
                    'id'        => $comment->id,
                ];
                event(new NewNotification($data));
                DB::commit();
                return response()->json($data);
                // toast('Your Comment has been added!', 'success');
                // return redirect()->back();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function videoComment(Request $request, Video $video)
    {
        try {
            DB::beginTransaction();
            if ($comment = $video->comments()->create(array_merge($request->only('comment'), ['user_id' => auth()->id()]))) {
                $data = [
                    'message'   => auth()->user()->name . ' commented on your Video',
                    'comment'   => $comment->comment,
                    'image'     => auth()->user()->image_url,
                    'title'     => $video->title,
                    'name'      => auth()->user()->name,
                    'date'      => $comment->created_at->diffForHumans(),
                    'url'       => route('course.video', ['video' => $video->id, 'title' => $video->slug]) . '#comment_' . $comment->id,
                    'id'        => $comment->id
                ];
                event(new NewNotification($data));
                DB::commit();
                return response()->json($data);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function postComment(Request $request, Post $post)
    {
        try {
            DB::beginTransaction();
            if ($comment = $post->comments()->create(array_merge($request->only('comment'), ['user_id' => auth()->id()]))) {
                $data = [
                    'message'   => auth()->user()->name . ' commented on your post',
                    'comment'   => $comment->comment,
                    'image'     => auth()->user()->image_url,
                    'title'     => $post->title,
                    'name'      => auth()->user()->name,
                    'date'      => $comment->created_at->diffForHumans(),
                    'url'       => route('post', ['id' => $post->id, 'title' => $post->slug]) . '#comment_' . $comment->id,
                    'id'        => $comment->id
                ];
                event(new NewNotification($data));
                DB::commit();
                return response()->json(['comment' => $comment->comment, 'id' => $comment->id, 'image' => auth()->user()->image_url, 'name' => auth()->user()->name, 'date' => $comment->created_at->diffForHumans()]);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
