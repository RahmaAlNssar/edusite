<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PostDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Traits\UploadFile;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
class PostsController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostDataTable $dataTable)
    {
        try {
            if (request()->ajax())
                return $dataTable->render('backend.includes.tables.rows');

            return view('backend.includes.pages.index-page', ['count' => Post::count(), 'no_ajax' => '']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('backend.posts.form-page',['categories' => Category::select('id', 'name', 'visibility')->get(), 'users' => User::select('id', 'name')->get()]);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
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
        Post::create($request->except(['id','image']),['image'=>$this->upload($request->image,'posts')]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        try {
            return view('backend.posts.form-page',['row'=>$post,'categories' => Category::select('id', 'name', 'visibility')->get(), 'users' => User::select('id', 'name')->get(),'no_ajax' => '']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
        
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return response()->json(['message' => 'Your Post has been deleted!', 'icon' => 'success', 'count' => Post::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function multidelete(Request $request){
        try {
            $posts = Post::whereIn('id', (array)$request['id'])->get();
            DB::beginTransaction();
            foreach ($posts as $post) {
                $post->delete();
            }
            DB::commit();
            return response()->json(['message' => 'Your posts has been deleted! (' . count($posts) . ')', 'icon' => 'success', 'count' => Post::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
