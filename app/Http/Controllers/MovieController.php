<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
 


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }





    /**
     * Movie Controller section
     */



      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies =Movie::all(); // Fetch all movies
        return view('movies.index', compact('movies')); // Return the view with movies
    }



      /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movies.show')->with('movie', $movie);
    }




      /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    
}
