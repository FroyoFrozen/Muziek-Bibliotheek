<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Artiest;

class ArtiestController extends Controller
{
    public function index()
    {
        // Haal de artiesten op die bij de huidige gebruiker horen
        $artiesten = Auth::user()->artiesten ?? [];

        return view('mijnArtiesten', compact('artiesten'));
    }

    public function store(Request $request)
    {
        // Valideer het formulier
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
        ]);

        // Maak een nieuwe artiest aan en koppel deze aan de huidige gebruiker
        $artiest = new Artiest($validated);
        $artiest->user_id = auth()->id();
        $artiest->save();

        // Redirect terug naar de pagina met de artiestenlijst
        return redirect()->route('mijnArtiesten')->with('success', 'Artiest succesvol toegevoegd!');
    }
}
