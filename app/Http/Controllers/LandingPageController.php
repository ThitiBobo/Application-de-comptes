<?php

namespace App\Http\Controllers;

use App\Http\Utils\Utilities;

class LandingPageController extends Controller
{
    public function view()
    {
        $prov = Utilities::getRandomProverb();
        return view('landingPage', compact('prov'));
    }
}
