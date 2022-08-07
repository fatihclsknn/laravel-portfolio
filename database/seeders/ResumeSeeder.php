<?php

namespace Database\Seeders;

use App\Models\Resume;
use Faker\Generator;
use http\Client\Curl\User;
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        for ($i = 0; $i <= 5;$i++){
        $resume = Resume::create([
            'job_title'  => $faker->text('10'),
            'company_name' => $faker->name(),
            'description' => $faker->paragraph('3'),
            'user_id' => '1',
            'job_year' => $faker->year(),
            'experiences_or_education' => rand(0,1),

        ]);
    }
}
}
