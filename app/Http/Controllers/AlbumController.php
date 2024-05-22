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

    public function create()
    {
        $genres = Genre::all();
        return view('albums.create', compact('genres'));
    }

    public function store(Request $request)
    {
        Log::info($request->all());
        $request->validate([
            'titel' => 'required|string|max:255',
            'artiest_id' => 'required|integer|exists:artiesten,id',
            'genre_id' => 'required|integer|exists:genres,id',
            'jaar_van_uitgave' => 'nullable|integer',
            'aantal_nummers' => 'nullable|integer',
        ]);

        $album = new Album($request->all());
        $album->user_id = auth()->id();
        $album->save();

        return redirect()->route('dashboard');
    }
}

