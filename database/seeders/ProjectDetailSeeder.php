<?php

namespace Database\Seeders;

use App\Models\ProjectDetails;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {

        for ($i = 0; $i <= 3;$i++){
            $name= $faker->text('15');

            $project = ProjectDetails::create([
                'name'  => $name,
                'slug' => Str::slug($name),
                'content' => $faker->paragraph('40'),
                'web_site' => $faker->text('5') . '.com',
                'user_id' => '1',
                'image' => $faker->imageUrl(),

            ]);
    }
}
}

