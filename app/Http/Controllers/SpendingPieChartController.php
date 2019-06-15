<?php

namespace App\Http\Controllers;

use App\Http\DAOs\NaturePaiementDAO;
use App\Http\Utils\Utilities;
use App\Models\Nature_paiement;
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
        $prov = Utilities::getRandomProverb();

        return view('spendingPieChart', compact('prov'));
    }
}