<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
            Movie::insert([
                ['title' => 'Truman Show', 'year' => 1998, 'rating' => 8.2, 'images' => ''],
                ['title' => 'The Interview', 'year' => 2014, 'rating' => 6.5, 'images' => ''],
                ['title' => 'El Camino', 'year' => 2019, 'rating' => 7.3, 'images' => ''],
                ['title' => 'Bullet Train', 'year' => 2022, 'rating' => 7.3, 'images' => ''],
                ['title' => 'Rush Hour', 'year' => 1998, 'rating' => 7.0, 'images' => '']
                
                ]
            );
    }
}
