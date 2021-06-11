<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PostDataTable;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Traits\UploadFile;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
class PostsController extends BackendController
{
    use UploadFile;
    public function __construct(PostDataTable $dataTable,Post $post){
        parent::__construct($dataTable,$post);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function append(){
     
        return [
            'categories' => Category::select('id', 'name', 'visibility')->get(),
             'users' => User::select('id', 'name')->get(),
             'no_ajax' => ''
        ];
    }

   
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request,Post $post)
    {
        try {
        Post::create($request->except(['id']));
        toast('Your Post has been created!', 'success');
            return response()->json(['redirect' => route('backend.posts.index')]);
    } catch (Exception $e) {
        return response()->json($e->getMessage(), 500);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        try {
            if ($request->has('image'))
            $this->remove($post->image, 'courses');
            $post->update($request->except(['id']));
            toast('Your Post has been updated!', 'success');
                return response()->json(['redirect' => route('backend.posts.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

   

  
}
