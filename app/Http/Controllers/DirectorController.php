<?php

namespace App\Http\Controllers;

use App\Models\Director;
// use App\Models\Movie;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // this gets all directors from the database and all the movies related to each director
        $directors = Director::with('movies')->get();
        return view('directors.index', compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()-user()->role !== 'admin'){
            return redirect()-route('movies.index')->with('error', 'Access denied.');
        }

        $movies = Movie::all();
        return view('directors.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   {
      if (auth()->user()->role !== 'admin') {
        return redirect()->route('directors.index')->with('error', 'Access denied.');
      }

      $validated =$request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
        'bio' => 'nullable|string|max:1000',
        // 'movies' => 'array',
      ]);

      if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images/directors'), $imageName);

        $validated['image'] = $imageName;
      }

      $director =Director::create($validated);

      if ($request->has('movies')) {

        $director->movies()->attach($request->movies);
      }

      return redirect()->route('directors.index')->with('success', 'Director created successfully.');

   }


        

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
      $director->load('movies');
      return (view('directors.show', compact('director')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        //get all the movies
        $movies = Movie::all();
        $directorMovies = $director->movies->pluck('id')->toArray();
        return view('directors.edit', compact('director', 'movies', 'directorMovies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
    {
        $validated =$request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'bio' => 'nullable|string|max:1000',
            // 'movies' => 'array',
          ]);

          $director->update($validated);

          if($request->has('movies')) {
            $director->movies()->sync($request->movies);
          }
        
          return redirect()->route('directors.index')->with('success', 'Director updated successfully.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        $director->movies()->detach();
        $director->delete();

        return redirect()->route('directors.index')->with('success', 'Director deleted successfully.');
    }
}
