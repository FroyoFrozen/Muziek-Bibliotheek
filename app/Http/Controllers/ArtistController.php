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

    public function edit(Artist $artist)
    {
        // Breadcrumb for the edit page
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'My Artists', 'url' => route('myArtists')],
            ['label' => $artist->name, 'url' => route('artists.show', $artist->id)],
            ['label' => 'Edit'],
        ];

        return view('artist.edit', compact('artist', 'breadcrumbs'));
    }

    public function update(Request $request, Artist $artist)
    {
        // Validate the form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'genre' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'website' => 'nullable|url|max:255',
            'awards' => 'nullable|string',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ]);

        // Update the artist with the validated data
        $artist->update($validated);

        // Redirect back to the artist's show page with success message
        return redirect()->route('artists.show', $artist->id)->with('success', 'Artist updated successfully');
    }
}

