<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GebruikerController extends Controller
{
    public function index()
    {
        $gebruikers = User::all();
        return view('gebruikers.index', compact('gebruikers'));
    }

    public function create()
    {
        return view('gebruikers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'nullable|boolean',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $request->has('is_admin'),
        ]);

        return redirect()->route('gebruikers.index')->with('success', 'Gebruiker succesvol aangemaakt.');
    }

    public function promoveer(User $gebruiker)
    {
        $gebruiker->is_admin = true;
        $gebruiker->save();

        return back()->with('success', 'Gebruiker is gepromoveerd tot admin.');
    }

    public function demoveer(User $gebruiker)
    {
        $gebruiker->is_admin = false;
        $gebruiker->save();

        return back()->with('success', 'Adminrechten zijn verwijderd van deze gebruiker.');
    }

    public function destroy(User $gebruiker)
    {
        $gebruiker->delete();
        return back()->with('success', 'Gebruiker succesvol verwijderd.');
    }
}
