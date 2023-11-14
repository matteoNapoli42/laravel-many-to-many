<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesSeeders extends Seeder
{

    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'Javascript', 'Bootstrap', 'VueJs', 'Vite', 'Php', 'Laravel', 'MySQL'];

        foreach ($technologies as $technology) {
            $newTech = new Technology();
            $newTech->name = $technology;
            $newTech->save();
        }
    }
}
