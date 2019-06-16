<?php

namespace App\Http\Controllers;

use App\Http\DAOs\CategorieDAO;
use App\Http\Requests\InsertionDepenseRequest;
use App\Http\Utils\Utilities;
use Illuminate\Http\Request;
use App\Models\Categorie;

class AddCategoryController extends Controller
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
        return view('addCategory', compact('prov'));
    }

    public function post(InsertionDepenseRequest $request)
    {
        $catego = new Categorie();
        $catego->setNom($request->nom);
        $catego->setPlafond($request->plafond);
        $catego->setDescription($request->description);

        $categorieDAO = new CategorieDAO();
        $categorieDAO->insertCustomCategory($catego);


        $prov = Utilities::getRandomProverb();
        return view('addCategoryOK', compact('prov'));
    }
}
