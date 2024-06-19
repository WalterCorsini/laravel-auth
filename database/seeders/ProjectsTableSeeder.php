<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10; $i++) {
            $newItem = new Project();
            $newItem->title = $faker->sentence(3);
            $newItem->description = $faker->text(255);
            $newItem->slug = Str::slug($newItem->title);
            $newItem->save();
        }
    }
}
