<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $newProject = new Project();
            $newProject->name = $faker->words(3, true);
            $newProject->description = $faker->text(100);
            $newProject->start_date = $faker->date();
            $newProject->end_date = $faker->date();
            $newProject->slug = Str::slug($newProject->name, '-');
            $newProject->save();
        }
    }
}
