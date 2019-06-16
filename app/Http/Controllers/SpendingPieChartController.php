<?php

namespace App\Http\Controllers;

use App\Http\DAOs\CategorieDAO;
use App\Http\DAOs\DepenseDAO;
use App\Http\DAOs\NaturePaiementDAO;
use App\Http\Utils\Utilities;
use App\Models\Depense;
use App\Models\Categorie;
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
        $depensesDAO = new DepenseDAO();
        $depenses = $depensesDAO->getAllDepensesOfUser();
        $depensesParCategorie = $this->createArrayDepenseCat($depenses);
        return view('spendingPieChart', compact('prov', 'depensesParCategorie'));
    }

    public function dashboardPercents()
    {
        $prov = Utilities::getRandomProverb();
        $depensesDAO = new DepenseDAO();
        $depenses = $depensesDAO->getAllDepensesOfUser();
        $depensesParCategoriePourcentages = $this->createArrayDepenseCatPourcentages($depenses);
        return view('spendingPieChartPercents', compact('prov', 'depensesParCategoriePourcentages'));
    }

    public function dashboardMonth()
    {
        $prov = Utilities::getRandomProverb();
        $depensesDAO = new DepenseDAO();
        $depenses = $depensesDAO->getAllDepensesOfMonth();
        $depensesParCategorie = $this->createArrayDepenseCat($depenses);
        return view('spendingPieChart', compact('prov', 'depensesParCategorie'));
    }

    public function dashboardYear()
    {
        $prov = Utilities::getRandomProverb();
        $depensesDAO = new DepenseDAO();
        $depenses = $depensesDAO->getAllDepensesOfYear();
        $depensesParCategorie = $this->createArrayDepenseCat($depenses);
        return view('spendingPieChart', compact('prov', 'depensesParCategorie'));
    }

    private function createArrayDepenseCatPourcentages($depenses)
    {
        $categorieDAO = new CategorieDAO();
        $usedCategories = $categorieDAO->getUsedCategoriesByUser();
        $sommeTotaleDepenses = 0;
        /** @var $depense Depense */
        foreach($depenses as $depense)
        {
            $sommeTotaleDepenses += $depense->getMontant();
        }


        $depensesParCategorie = array();

        // init array
        /** @var $cat Categorie */
        foreach ($usedCategories as $cat)
        {
            $depensesParCategorie[$cat->getNom()] = 0;
        }

        // Avoir une structure qui donne, pour une catégorie,
        // le montant total des dépenses
        /** @var $depense Depense */
        foreach($depenses as $depense)
        {
            $depensesParCategorie[$depense->getCategorie()->getNom()] += $depense->getMontant();
        }

        foreach($depensesParCategorie as $key => $value)
        {
            $depensesParCategorie[$key] = ($value / $sommeTotaleDepenses);
        }
        return $depensesParCategorie;
    }


    public static function createArrayDepenseCat($depenses)
    {
        $categorieDAO = new CategorieDAO();
        $usedCategories = $categorieDAO->getUsedCategoriesByUser();


        $depensesParCategorie = array();

        // init array
        /** @var $cat Categorie */
        foreach ($usedCategories as $cat)
        {
            $depensesParCategorie[$cat->getNom()] = 0;
        }

        // Avoir une structure qui donne, pour une catégorie,
        // le montant total des dépenses
        /** @var $depense Depense */
        foreach($depenses as $depense)
        {
            $depensesParCategorie[$depense->getCategorie()->getNom()] += $depense->getMontant();
        }
        return $depensesParCategorie;
    }
}