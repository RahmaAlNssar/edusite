<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\DataTables\PostsDataTable;
use App\Http\Requests\PostRequest;
use App\Traits\UploadFile;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Exception;

class PostsController extends BackendController
{
    use UploadFile;

    public function __construct(PostsDataTable $dataTable, Post $post)
    {
        parent::__construct($dataTable, $post);
    }

    public function append()
    {
        return [
            'categories' => Category::select('id', 'name', 'visibility')->get(),
            'users'      => User::select('id', 'name')->get(),
            'tags'       => Tag::whereVisibility(1)->get(),
            'no_ajax'    => ''
        ];
    }

    public function store(PostRequest $request)
    {
        try {
            $post = Post::create($request->except(['id']));
            $post->tags()->attach($request->tags);
            toast('Your Post has been created!', 'success');
            return response()->json(['redirect' => route('backend.posts.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function update(PostRequest $request, Post $post)
    {
        try {
            if ($request->has('image')) {
                if ($post->image)
                    $this->remove($post->image, 'posts');
            }
            $post->update($request->except(['id']));
            $post->tags()->sync($request->tags);
            toast('Your Post has been updated!', 'success');
            return response()->json(['redirect' => route('backend.posts.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
