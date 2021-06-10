<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoriesDataTable;
use App\Http\Controllers\BackendController;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Exception;

class CategoriesController extends BackendController
{
   public function __construct(CategoriesDataTable $dataTable,Category $category){
       parent::__construct($dataTable,$category);
     
   }

   public function index()
   {
       try {
           if (request()->ajax())
               return $this->dataTable->render('backend.includes.tables.rows');

           return view('backend.categories.index', ['count' => Category::count()]);
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

    public function edit($id)
    {
        try {
            $row = Category::findOrFail($id);
            return view('backend.includes.forms.form-update',compact('row'));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }


    public function store(CategoryRequest $request)
    {
        try {
            Category::create($request->except(['id']));
            return response()->json(['message' => 'Your Category has been created!', 'icon' => 'success', 'count' => Category::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function show(Category $category)
    {
        //
    }

    

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->except(['id']));
            return response()->json(['message' => 'Your Category has been updated!', 'icon' => 'success']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

 

    public function visibilityToggle(Category $category)
    {
        try {
            DB::beginTransaction();
            $category->update(['visibility' => !$category->visibility]);
            DB::commit();
            return response()->json(['message' => ' Visibility of Your Category has been Changed!', 'icon' => 'success']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
