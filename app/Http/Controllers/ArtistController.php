<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function index()
    {
        // Breadcrumb for the dashboard page
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'My Artists'],
        ];

        // Get the artists belonging to the current user
        $artists = Auth::user()->artists ?? [];

        return view('myArtists', compact('artists', 'breadcrumbs'));
    }

    public function show(Artist $artist)
    {
        // Breadcrumb for the show page
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'My Artists', 'url' => route('myArtists')],
            ['label' => $artist->name],
        ];

        return view('artist.show', compact('artist', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        // Validate the form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new artist and associate it with the current user
        $artist = new Artist($validated);
        $artist->user_id = auth()->id();
        $artist->save();

        // Redirect back to the page with the list of artists
        return redirect()->route('myArtists')->with('success', 'Artist successfully added!');
    }
}
