<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\DataTables\TagsDataTable;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;
use App\Models\Tag;
use Exception;

class TagsController extends BackendController

{
    public function __construct(TagsDataTable $dataTable,Tag $tag){
        parent::__construct($dataTable,$tag);
      
    }
 
    public function index()
    {
        try {
            if (request()->ajax())
                return $this->dataTable->render('backend.includes.tables.rows');

            return view('backend.tags.index', ['count' => Tag::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
 
     public function append(){
      
         return [
         
         ];
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
    public function edit($id)
    {
        try {
           $row = Tag::findOrFail($id);
            return view('backend.includes.forms.form-update', compact('row'));
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



    public function visibilityToggle(Tag $tag)
    {
        try {
            DB::beginTransaction();
            $tag->update(['visibility' => !$tag->visibility]);
            DB::commit();
            return response()->json(['message' => ' Visibility of Your Tag has been Changed!', 'icon' => 'success']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
