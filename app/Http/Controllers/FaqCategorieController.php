<?php

namespace App\Http\Controllers;

use App\Models\FaqCategorie;
use Illuminate\Http\Request;

class FaqCategorieController extends Controller
{
    public function index()
    {
        $categorieën = FaqCategorie::orderBy('naam')->get();
        return view('faq.categorie.index', compact('categorieën'));
    }

    public function create()
    {
        return view('faq.categorie.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
        ]);

        FaqCategorie::create([
            'naam' => $request->naam,
        ]);

        return redirect()->route('faq-categorie.index')->with('status', 'Categorie toegevoegd!');
    }

    public function edit(FaqCategorie $faqCategorie)
    {
        return view('faq.categorie.edit', compact('faqCategorie'));
    }

    public function update(Request $request, FaqCategorie $faqCategorie)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
        ]);

        $faqCategorie->update([
            'naam' => $request->naam,
        ]);

        return redirect()->route('faq-categorie.index')->with('status', 'Categorie bijgewerkt!');
    }

    public function destroy(FaqCategorie $faqCategorie)
    {
        $faqCategorie->delete();

        return redirect()->route('faq-categorie.index')->with('status', 'Categorie verwijderd!');
    }
}
