<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoriesDataTable;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class CategoriesController extends Controller
{
    public function index(CategoriesDataTable $dataTable)
    {
        try {
            if (request()->ajax())
                return $dataTable->render('backend.includes.tables.rows');

            return view('backend.categories.index', ['count' => Category::count()]);
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

    public function edit(Category $category)
    {
        try {
            return view('backend.includes.forms.form-update', ['row' => $category]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
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

    public function destroy(Category $category)
    {
        try {
            if ($category->delete())
                return response()->json(['message' => 'Your Category has been deleted!', 'icon' => 'success', 'count' => Category::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function multidelete(Request $request)
    {
        try {
            $rows = Category::whereIn('id', (array)$request['id'])->get();
            DB::beginTransaction();
            foreach ($rows as $row)
                $row->delete();
            DB::commit();
            return response()->json(['message' => 'Your Categories has been deleted! (' . count($rows) . ')', 'icon' => 'success', 'count' => Category::count()]);
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
