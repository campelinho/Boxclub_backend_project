<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // Toon de lijst van gebruikers
    public function index()
    {
        $gebruikers = User::all();
        return view('admin.gebruikers.index', compact('gebruikers'));
    }

    // Verander admin rechten
    public function toggleAdmin(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()->route('admin.gebruikers.index')->with('status', 'Gebruiker aangepast.');
    }
}
