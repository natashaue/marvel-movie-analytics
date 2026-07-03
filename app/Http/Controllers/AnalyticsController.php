<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Statistics
        $totalMovies = Movie::count();
        $highestRevenue = Movie::max('worldwide');
        $lowestRevenue = Movie::min('worldwide');
        $averageRevenue = Movie::avg('worldwide');
        
        // Top Movies
        $topMovies = Movie::orderBy('worldwide', 'desc')->limit(10)->get();
        $highestRevenueMovie = Movie::orderBy('worldwide', 'desc')->first();
        
        // Top Distributors
        $topDistributors = Movie::select('distributor')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('distributor')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();
        $totalDistributors = Movie::distinct('distributor')->count('distributor');
        
        // Chart Data (Top 10 Movies)
        $chartLabels = $topMovies->pluck('title')->toArray();
        $chartRevenue = $topMovies->pluck('worldwide')->toArray();
        
        return view('analytics', compact(
            'totalMovies',
            'highestRevenue',
            'lowestRevenue',
            'averageRevenue',
            'topMovies',
            'highestRevenueMovie',
            'topDistributors',
            'totalDistributors',
            'chartLabels',
            'chartRevenue'
        ));
    }
}