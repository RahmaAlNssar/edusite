<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FatoorahController extends Controller
{
    public function payment(Request $request)
    {
        dd($request->all());
    }
}
