<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfielController extends Controller
{
    public function bewerken()
    {
        $gebruiker = Auth::user();
        return view('profiel.bewerken', compact('gebruiker'));
    }

    public function update(Request $request)
    {
        $gebruiker = Auth::user();

        $request->validate([
            'gebruikersnaam' => 'nullable|string|max:255',
            'verjaardag' => 'nullable|date',
            'over_mij' => 'nullable|string',
            'profielfoto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['gebruikersnaam', 'verjaardag', 'over_mij']);

        if ($request->hasFile('profielfoto')) {
            // Salva a imagem em storage/app/public/profielfotos
            $pad = $request->file('profielfoto')->store('profielfotos', 'public');
            $data['profielfoto'] = $pad;
        }

        $gebruiker->update($data);

        return redirect()->route('profiel.bewerken')->with('status', 'Profiel bijgewerkt!');
    }
}
