<?php

namespace Database\Seeders;



use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(Faker $faker): void
    {
        /*
        Project data :

            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->longText('thumb')->nullable();
            $table->string('github')->nullable();
            $table->string('technologies')->nullable();
            $table->timestamps();
         */

        for ($i = 0; $i < 5; $i++) {
            $project = new Project();
            $project->title = $faker->word();
            $project->description = $faker->paragraph();
            $project->thumb = $faker->imageUrl(200, 200, 'projects', true);
            $project->github = 'https://github.com/matteoNapoli42';
            $project->technologies = $faker->word();

            $project->save();
        }
    }
}
