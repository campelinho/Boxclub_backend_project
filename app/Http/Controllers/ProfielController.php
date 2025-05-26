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
        ]);

        $gebruiker->update([
            'gebruikersnaam' => $request->gebruikersnaam,
            'verjaardag' => $request->verjaardag,
            'over_mij' => $request->over_mij,
        ]);

        return redirect()->route('profiel.bewerken')->with('status', 'Profiel bijgewerkt!');
    }
}
