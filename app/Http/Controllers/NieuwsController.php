<?php

namespace App\Http\Controllers;

use App\Models\Nieuws;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NieuwsController extends Controller
{
    public function index()
    {
        $nieuws = Nieuws::latest()->get();
        return view('nieuws.index', compact('nieuws'));
    }

    public function create()
    {
        return view('nieuws.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titel' => 'required|string|max:255',
            'inhoud' => 'required|string',
            'publicatiedatum' => 'required|date',
            'afbeelding' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['titel', 'inhoud', 'publicatiedatum']);

        if ($request->hasFile('afbeelding')) {
            $pad = $request->file('afbeelding')->store('nieuws_afbeeldingen', 'public');
            $data['afbeelding'] = $pad;
        }

        Nieuws::create($data);

        return redirect()->route('nieuws.index')->with('status', 'Nieuwsitem toegevoegd!');
    }

    public function show(Nieuws $nieuw)
    {
        return view('nieuws.show', compact('nieuw'));
    }

    public function edit(Nieuws $nieuw)
    {
        return view('nieuws.edit', compact('nieuw'));
    }

    public function update(Request $request, Nieuws $nieuw)
    {
        $request->validate([
            'titel' => 'required|string|max:255',
            'inhoud' => 'required|string',
            'publicatiedatum' => 'required|date',
            'afbeelding' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['titel', 'inhoud', 'publicatiedatum']);

        if ($request->hasFile('afbeelding')) {
            // Verwijder oude afbeelding als die er is
            if ($nieuw->afbeelding) {
                Storage::disk('public')->delete($nieuw->afbeelding);
            }
            $pad = $request->file('afbeelding')->store('nieuws_afbeeldingen', 'public');
            $data['afbeelding'] = $pad;
        }

        $nieuw->update($data);

        return redirect()->route('nieuws.index')->with('status', 'Nieuwsitem bijgewerkt!');
    }

    public function destroy(Nieuws $nieuw)
    {
        if ($nieuw->afbeelding) {
            Storage::disk('public')->delete($nieuw->afbeelding);
        }

        $nieuw->delete();

        return redirect()->route('nieuws.index')->with('status', 'Nieuwsitem verwijderd!');
    }
}
