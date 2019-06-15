<?php

namespace App\Http\Controllers;

use App\Http\Utils\Utilities;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function view()
    {
        $prov = Utilities::getRandomProverb();
        return view('about', compact('prov'));
    }
}
