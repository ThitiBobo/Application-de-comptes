<?php

namespace App\Http\Controllers;

use App\Http\Utils\Utilities;
use Illuminate\Http\Request;

class LegalTermsController extends Controller
{
    public function view()
    {
        $prov = Utilities::getRandomProverb();
        return view('legalTerms', compact('prov'));
    }
}
