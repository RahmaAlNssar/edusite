<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        toast('test toast', 'success');
        return $dataTable->render('backend.users.index', ['count' => User::count()]);
    }
}
