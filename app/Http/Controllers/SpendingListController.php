<?php

namespace App\Http\Controllers;

use App\Http\DAOs\DepenseDAO;
use App\Http\Utils\Utilities;
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


    public function basicView()
    {
        $prov = Utilities::getRandomProverb();

        $depensesDAO = new DepenseDAO();
        $depenses = $depensesDAO->getAllDepensesOfUser();
        return view('spendingList', compact('prov', 'depenses'));
    }

    public function ascendingView()
    {
        $prov = Utilities::getRandomProverb();

        $depensesDAO = new DepenseDAO();
        $depenses = $depensesDAO->getAllDepensesOfUserAscDsc(true);
        return view('spendingList', compact('prov', 'depenses'));
    }

    public function descendingView()
    {
        $prov = Utilities::getRandomProverb();

        $depensesDAO = new DepenseDAO();
        $depenses = $depensesDAO->getAllDepensesOfUserAscDsc(false);
        return view('spendingList', compact('prov', 'depenses'));
    }

    public function thisMonthView()
    {
        $prov = Utilities::getRandomProverb();

        $depensesDAO = new DepenseDAO();
        $depenses = $depensesDAO->getAllDepensesOfMonth();
        return view('spendingList', compact('prov', 'depenses'));
    }

    public function thisYearView()
    {
        $prov = Utilities::getRandomProverb();

        $depensesDAO = new DepenseDAO();
        $depenses = $depensesDAO->getAllDepensesOfYear();
        return view('spendingList', compact('prov', 'depenses'));
    }


}
