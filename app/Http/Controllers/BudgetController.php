<?php

namespace App\Http\Controllers;

use App\Http\DAOs\CategorieDAO;
use App\Http\DAOs\DepenseDAO;
use App\Http\Utils\Utilities;
use App\Models\Depense;
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
        $categoriesDAO = new CategorieDAO();
        $usedCategories = $categoriesDAO->getUsedCategoriesByUserWithNameAsKey();
        $depensesDAO = new DepenseDAO();
        $depenses = $depensesDAO->getAllDepensesOfUser();
        $depensesParCategorie = SpendingPieChartController::createArrayDepenseCat($depenses);
        return view('budget', compact('prov', 'depensesParCategorie', 'usedCategories'));
    }
}
