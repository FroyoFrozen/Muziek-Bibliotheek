<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class DashboardController extends Controller
{
    public function index()
    {
        $albums = auth()->user()->albums;
        return view('dashboard', compact('albums'));
    }
}
