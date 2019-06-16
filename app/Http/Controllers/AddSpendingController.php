<?php

namespace App\Http\Controllers;

use App\Http\DAOs\CategorieDAO;
use App\Http\DAOs\NaturePaiementDAO;
use App\Http\Requests\InsertionDepenseRequest;
use App\Http\Utils\Utilities;
use App\Models\Depense;
use App\Http\DAOs\DepenseDAO;

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

    public function post(InsertionDepenseRequest $request)
    {
        // récupération de l'utilisateur courant
        $user = auth()->user();

        $depense = new Depense();
        $depense->setDateDepense($request->input('date_depense'));
        $depense->setMontant($request->input('montant'));
        $depense->setNom($request->input('nom'));
        $depense->setDescription($request->input('description'));
        $depense->setFkUser($user->getAuthIdentifier());
        $depense->setFkCategorie($request->input('categorie'));
        $depense->setFkNaturePaiement($request->input('nature_paiement'));
        /* debug
        $inputs = array();
        $inputs["date_depense"] = $request->input('date_depense');
        $inputs["montant"] = $request->input('montant');
        $inputs["nom"] = $request->input('nom');
        $inputs["description"] = $request->input('description');
        $inputs["fk_user"] = $user->getAuthIdentifier();
        $inputs["fk_categorie"] = $request->input('categorie');
        $inputs["fk_nature_paiement"] = $request->input('nature_paiement');
        */

        $depenseDAO = new DepenseDAO();
        $depenseDAO->createDepense($depense);

        //debug
       // return view('debug', compact('inputs'));


        // returning view
        $prov = Utilities::getRandomProverb();
        $categoriesDAO = new CategorieDAO();
        $naturesPaiementDAO = new NaturePaiementDAO();
        $natures = $naturesPaiementDAO->getAllNaturePaiement();
        $categories = $categoriesDAO->getAllCategories();
        return view('addSpendingOK', compact('prov', 'natures', 'categories'));
    }
}
