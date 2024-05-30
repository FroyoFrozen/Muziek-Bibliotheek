<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function index()
    {
        // Breadcrumb voor de dashboardpagina
        $breadcrumbs = [
            ['label' => 'Dashboard'],
        ];

        // Haal de albums van de huidige gebruiker op
        $albums = auth()->user()->albums;

        // Stuur de albums en breadcrumbs naar de view
        return view('dashboard', compact('albums', 'breadcrumbs'));
    }
}
