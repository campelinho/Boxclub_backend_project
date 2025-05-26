<?php

namespace App\Http\Controllers;

use App\Models\FaqVraag;
use App\Models\FaqCategorie;
use Illuminate\Http\Request;

class FaqVraagController extends Controller
{
    public function index()
    {
        $vragen = FaqVraag::with('categorie')->get();
        return view('faq.vraag.index', compact('vragen'));
    }

    public function create()
    {
        $categorieën = FaqCategorie::orderBy('naam')->get();
        return view('faq.vraag.create', compact('categorieën'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'faq_categorie_id' => 'required|exists:faq_categorieën,id',
            'vraag' => 'required|string|max:255',
            'antwoord' => 'required|string',
        ]);

        FaqVraag::create($request->only('faq_categorie_id', 'vraag', 'antwoord'));

        return redirect()->route('faq-vraag.index')->with('status', 'Vraag toegevoegd!');
    }

    public function edit(FaqVraag $faqVraag)
    {
        $categorieën = FaqCategorie::orderBy('naam')->get();
        return view('faq.vraag.edit', compact('faqVraag', 'categorieën'));
    }

    public function update(Request $request, FaqVraag $faqVraag)
    {
        $request->validate([
            'faq_categorie_id' => 'required|exists:faq_categorieën,id',
            'vraag' => 'required|string|max:255',
            'antwoord' => 'required|string',
        ]);

        $faqVraag->update($request->only('faq_categorie_id', 'vraag', 'antwoord'));

        return redirect()->route('faq-vraag.index')->with('status', 'Vraag bijgewerkt!');
    }

    public function destroy(FaqVraag $faqVraag)
    {
        $faqVraag->delete();

        return redirect()->route('faq-vraag.index')->with('status', 'Vraag verwijderd!');
    }
}
