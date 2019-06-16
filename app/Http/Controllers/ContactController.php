<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Utils\Utilities;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactController extends Controller
{
    public function view()
    {
        $prov = Utilities::getRandomProverb();
        return view('contact', compact('prov'));
    }
}
