<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Requests\VideoRequest;
use Illuminate\Support\Facades\DB;
use App\DataTables\VideoDataTable;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Video;
use App\Models\Tag;
use Exception;

class VideosController extends BackendController
{

    public function index(VideoDataTable $dataTables)
    {
        if (request()->ajax())
            return $dataTables->render('backend.includes.tables.rows');

        return view('backend.includes.pages.index-page', ['count' => Video::count(), 'no_ajax' => '']);
    }

    public function create()
    {
        return view('backend.includes.pages.form-page', ['courses' => Course::select('id', 'title')->get(), 'tags' => Tag::all()]);
    }

    public function store(VideoRequest $request)
    {
        try {
            DB::beginTransaction();
            $video = Video::create($request->except(['id', 'tags']));
            $video->tags()->attach($request->tags);
            DB::commit();
            toast('Your Video has been created!', 'success');
            return response()->json(['redirect' => route('backend.videos.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function show(Video $video)
    {
        dd($video);
    }

    public function edit(Video $video)
    {
        return view('backend.includes.pages.form-page', ['courses' => Course::select('id', 'title')->get(), 'tags' => Tag::all(), 'row' => $video]);
    }

    public function update(VideoRequest $request, Video $video)
    {
        try {
            DB::beginTransaction();
            if ($request->file('video'))
                $this->remove($video->video, 'videos');
            $video->update($request->except(['id', 'tags']));
            $video->tags()->sync($request->tags);
            DB::commit();
            toast('Your Video has been updated!', 'success');
            return response()->json(['redirect' => route('backend.videos.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function destroy(Video $video)
    {
        try {
            if ($video->delete())
                return response()->json(['message' => 'Your Video has been deleted!', 'icon' => 'success', 'count' => Video::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function multidelete(Request $request)
    {
        try {
            DB::beginTransaction();
            $rows = Video::whereIn('id', (array)$request['id'])->get();
            foreach ($rows as $row)
                $row->delete();
            DB::commit();
            return response()->json(['message' => 'Your Videos has been deleted! (' . count($rows) . ')', 'icon' => 'success', 'count' => Video::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
