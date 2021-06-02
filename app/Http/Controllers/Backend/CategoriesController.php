<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoriesDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('backend.categories.index', ['count' => Category::count()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
