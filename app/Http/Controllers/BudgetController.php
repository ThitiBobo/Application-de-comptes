<?php

namespace App\Http\Controllers;

use App\Http\Utils\Utilities;
use Illuminate\Http\Request;

class BudgetController extends Controller
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
        $prov = Utilities::getRandomProverb();
        return view('budget', compact('prov'));
    }
}
