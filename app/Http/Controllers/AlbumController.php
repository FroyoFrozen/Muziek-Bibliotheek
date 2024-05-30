<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = auth()->user()->albums;
        return view('albums.index', compact('albums'));
    }

    public function show(Album $album)
    {
        // Breadcrumb for the dashboard page
        $breadcrumbs = [
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => $album->title],
        ];
        return view('albums.show', compact('album', 'breadcrumbs'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('albums.create', compact('genres'));
    }

    public function store(Request $request)
    {
        Log::info($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'artist_id' => 'required|integer|exists:artists,id',
            'genre_id' => 'required|integer|exists:genres,id',
            'release_year' => 'nullable|integer',
            'number_of_tracks' => 'nullable|integer',
        ]);

        $album = new Album($request->all());
        $album->user_id = auth()->id();
        $album->save();

        return redirect()->route('dashboard');
    }
}
