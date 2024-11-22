<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Director;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        
            $movies = [
                ['title' => 'Truman Show', 'year' => 1998, 'rating' => 8.2, 'image' => ''],
                ['title' => 'The Interview', 'year' => 2014, 'rating' => 6.5, 'image' => ''],
                ['title' => 'El Camino', 'year' => 2019, 'rating' => 7.3, 'image' => ''],
                ['title' => 'Bullet Train', 'year' => 2022, 'rating' => 7.3, 'image' => ''],
                ['title' => 'Rush Hour', 'year' => 1998, 'rating' => 7.0, 'image' => ''],
                ['title' => 'Klaus', 'year' => 2019, 'rating' => 8.2, 'image' => ''],
                ['title' => 'My Neighbor Totoro', 'year' => 1998, 'rating' => 8.1, 'image' => ''],

                
            ];
            


            foreach ($movies as $movieData)
            {
                // insert the movie into the movie table 
                $movie = Movie::create(array_merge($movieData, ['created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp]));

                // randomly slect 2 directors !note directors must exist in the authors table
                // So DirectorSeeder must be excuted before MovieSeeder
                $directors =Director::inRandomOrder()->take(2)->pluck('id');

                //Attach directors to movies
                $movie->directors()->attach($directors);
            }
    }
}
