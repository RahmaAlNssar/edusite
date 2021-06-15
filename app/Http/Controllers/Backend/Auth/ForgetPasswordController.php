<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function forgot_password()
    {
        return view('backend.auth.forget-password');
    }

    public function send_password(Request $request)
    {
        dd($request->all());
    }
}
