<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $movies = Movie::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', "%{$search}%");
        })->paginate(10);

        return view('movies', compact('movies'));
    }
}