<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorSeeder extends Seeder
{

    public function run(): void
    {
        Director::insert([
            ['name' => 'Vince Giligan', 'image' => 'vince.jpg', 'bio' => 'Director of El Camino. '],
            ['name' => 'David Leitch', 'image' => 'david1.jpg', 'bio' => 'Director of Bullet Train. '],
            ['name' => 'Brett Ratner', 'image' => 'brett.jpg', 'bio' => 'Director of Rush Hour. '],
            ['name' => 'Sergio Pablos', 'image' => 'sergio.jpg', 'bio' => 'Director of Klaus. '],
            ['name' => 'Hayao Miyazaki', 'image' => 'hayao.jpg', 'bio' => 'Director of My Neighbor Totoro. '],
            ['name' => 'Peter Weir', 'image' => 'peter.jpg', 'bio' => 'Director of The Truman Show. '],
            ['name' => 'Seth Rogen', 'image' => 'seth.jpg', 'bio' => 'Director of The Interview. '],
        ]);
    }




}
