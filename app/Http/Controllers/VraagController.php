<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqVraag;

class VraagController extends Controller
{
    
    public function create()
    {
        return view('faq.vraag.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'vraag' => 'required|string',
            'antwoord' => 'required|string',
        ]);

        FaqVraag::create([
            'vraag' => $request->vraag,
            'antwoord' => $request->antwoord,
        ]);

        return redirect()->route('faq.publiek')->with('success', 'Vraag succesvol toegevoegd!');
    }
}
