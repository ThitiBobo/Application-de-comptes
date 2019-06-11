<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpendingListController extends Controller
{
    /**
     * Creates a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function view()
    {
        return view('spendingList');
    }
}
