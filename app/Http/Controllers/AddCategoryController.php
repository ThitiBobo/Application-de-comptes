<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddCategoryController extends Controller
{
    public function view()
    {
        return view('addCategory');
    }

    public function post()
    {
        return view('addCategoryOK');
    }
}
