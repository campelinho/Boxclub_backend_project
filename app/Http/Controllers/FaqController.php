<?php

namespace App\Http\Controllers;

use App\Models\FaqCategorie;

class FaqController extends Controller
{
    public function index()
    {
        $categorieën = FaqCategorie::with('vragen')->orderBy('naam')->get();
        return view('faq.index', compact('categorieën'));
    }
}
