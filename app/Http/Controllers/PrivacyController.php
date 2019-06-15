<?php

namespace App\Http\Controllers;

use App\Http\Utils\Utilities;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function view()
    {
        $prov = Utilities::getRandomProverb();
        return view('privacy', compact('prov'));
    }
}
