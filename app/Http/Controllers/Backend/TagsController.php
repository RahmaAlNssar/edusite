<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TagsDataTable;
use App\Http\Controllers\BackendController;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;
use App\Models\Tag;
use Exception;
use Illuminate\Support\Facades\DB;

class TagsController extends BackendController
{
    public function index(TagsDataTable $dataTable)
    {
        try {
            if (request()->ajax())
                return $dataTable->render('backend.includes.tables.rows');

            return view('backend.tags.index', ['count' => Tag::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function create()
    {
        try {
            return view('backend.includes.forms.form-create');
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function store(TagRequest $request)
    {
        try {
            Tag::create($request->except(['id']));
            return response()->json(['message' => 'Your Tag has been created!', 'icon' => 'success', 'count' => Tag::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        try {
            return view('backend.includes.forms.form-update', ['row' => $tag]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function update(TagRequest $request, Tag $tag)
    {
        try {
            $tag->update($request->except(['id']));
            return response()->json(['message' => 'Your Tag has been created!', 'icon' => 'success', 'count' => Tag::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function destroy(Tag $tag)
    {
        try {
            if ($tag->delete())
                return response()->json(['message' => 'Your Tag has been deleted!', 'icon' => 'success', 'count' => Tag::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function multidelete(Request $request)
    {
        try {
            $rows = Tag::whereIn('id', (array)$request['id'])->get();
            DB::beginTransaction();
            foreach ($rows as $row)
                $row->delete();
            DB::commit();
            return response()->json(['message' => 'Your Tags has been deleted! (' . count($rows) . ')', 'icon' => 'success', 'count' => Tag::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
