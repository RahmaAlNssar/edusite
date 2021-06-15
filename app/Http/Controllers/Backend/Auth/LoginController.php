<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show_login()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        dd($request->all());
    }
}
