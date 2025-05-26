<?php

namespace App\Http\Controllers;

use App\Models\Vraag;
use App\Models\FaqCategorie;
use Illuminate\Http\Request;

class VraagController extends Controller
{
    // Exibir todas as perguntas
    public function index()
    {
        $vragen = Vraag::with('categorie')->get();
        return view('faq.vraag.index', compact('vragen'));
    }

    // Formulário de criação
    public function create()
    {
        $categorieën = FaqCategorie::all();
        return view('faq.vraag.create', compact('categorieën'));
    }

    // Salvar nova pergunta
    public function store(Request $request)
    {
        $request->validate([
            'vraag' => 'required',
            'antwoord' => 'required',
            'categorie_id' => 'required|exists:faq_categorieën,id',
        ]);

        Vraag::create($request->all());

        return redirect()->route('vraag.index')->with('success', 'Vraag succesvol toegevoegd!');
    }

    // Formulário de edição
    public function edit(Vraag $vraag)
    {
        $categorieën = FaqCategorie::all();
        return view('faq.vraag.edit', compact('vraag', 'categorieën'));
    }

    // Atualizar pergunta
    public function update(Request $request, Vraag $vraag)
    {
        $request->validate([
            'vraag' => 'required',
            'antwoord' => 'required',
            'categorie_id' => 'required|exists:faq_categorieën,id',
        ]);

        $vraag->update($request->all());

        return redirect()->route('vraag.index')->with('success', 'Vraag succesvol bijgewerkt!');
    }

    // (Opcional) Deletar pergunta
    public function destroy(Vraag $vraag)
    {
        $vraag->delete();
        return redirect()->route('vraag.index')->with('success', 'Vraag verwijderd!');
    }
}
