<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpendingPieChartController extends Controller
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

    /**
     * Shows the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('spendingPieChart');
    }
}