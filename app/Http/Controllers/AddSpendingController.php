<?php

namespace App\Http\Controllers;

use App\Http\DAOs\CategorieDAO;
use App\Http\DAOs\NaturePaiementDAO;
use App\Http\Utils\Utilities;
use Illuminate\Http\Request;

class AddSpendingController extends Controller
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
        $naturesPaiementDAO = new NaturePaiementDAO();
        $natures = $naturesPaiementDAO->getAllNaturePaiement();
        $categories = $categoriesDAO->getAllCategories();
        return view('addSpending', compact('prov', 'natures', 'categories'));
    }

    public function post()
    {
        $prov = Utilities::getRandomProverb();
        return view('addSpendingOK', compact('prov'));
    }
}
