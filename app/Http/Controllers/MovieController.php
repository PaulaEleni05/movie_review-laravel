<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
 


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate input
        $request->validate([            
        'title' => 'required',
        'year' => 'required|integer',
        'rating' => 'required|integer',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Check if the image is uploaded and handle it
        if ($request->hasFile('image') ) {

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/movies'), $imageName);
        }
     

        //Create a movie record in the datbase
        Movie::create([
            'title' => $request->title,
            'year' => $request->year,
            'rating' => $request->rating,
            'image' => $imageName, //store the image URL in DB
            'created_at' => now(),
            'updated_at' => now()
        ]);
       

        //Redirect to the index page with a success message
        return to_route('movies.index')->with('success', 'Movie created successfully!');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie, Request $request)
    {        
        return view('movies.edit')->with('movie', $movie);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([            
            'title' => 'required',
            'year' => 'required|integer',
            'rating' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // I've made this NOT required. We'd need a way to persist images.
            ]);

        if ($request->hasFile('image') ) {

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/movies'), $imageName);
        }

        // https://stackoverflow.com/questions/43614815/what-is-the-update-method-in-laravel-5-4-crud
        $movie->update($request->all());

        return to_route('movies.index')->with('success', 'Movie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        if($movie){
            return to_route('movies.index')->with('danger', 'Movie deleted successfully!');
        }

        else{
            throw new Error('Movie failed to delete');
        }
        
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
