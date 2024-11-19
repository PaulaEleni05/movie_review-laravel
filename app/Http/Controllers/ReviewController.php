<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Movie;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Movie $movie)
    {

        //Validate input
        $request->validate([            
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
            ]);
            
            //Create the review associated with the movie and user
            $movie->reviews()->create([            
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'movie_id' => $movie->id
            ]);
            
            return redirect()->route('movies.show', $movie)->with('success', 'Review added successfully.');    
        }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
        if (auth()->user()->id !== $review->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('movies.index')->with('error', 'Access denied.');
        }

        return view('reviews.edit', compact('review'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $review->update($request->only(['rating', 'comment']));

        return redirect()->route('movies.show', $review->movie_id)
                         ->with('success', 'Review updated successfully.');
    }



    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
