<?php

namespace App\Http\Controllers;

use App\Models\FaqCategorie;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Admin only: overzicht van alles
    public function index()
    {
        $categorieën = FaqCategorie::all();
        return view('faq.index', compact('categorieën'));
    }

    // Publieke FAQ-pagina
    public function indexPubliek()
    {
        $categorieën = FaqCategorie::with('vragen')->get();
        return view('faq.index', compact('categorieën'));
    }
}
