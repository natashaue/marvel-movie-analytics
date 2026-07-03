<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        // Table Movies
        $movies = Movie::paginate(10);

        // Statistics
        $totalMovies = Movie::count();
        $totalRevenue = Movie::sum('worldwide');
        $avgRevenue = Movie::avg('worldwide');

        // Highest Revenue Movie (pastikan ada data)
        $topMovie = Movie::orderByDesc('worldwide')->first();

        // Chart (Top 10 Highest Grossing Movies)
        $moviesForChart = Movie::select(
                'title',
                'release_date',
                'worldwide'
            )
            ->whereNotNull('worldwide') // Hindari data NULL
            ->orderByDesc('worldwide')
            ->take(10)
            ->get();

        return view('dashboard', compact(
            'movies',
            'totalMovies',
            'totalRevenue',
            'avgRevenue',
            'topMovie',
            'moviesForChart'
        ));
    }
}