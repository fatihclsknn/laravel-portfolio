<?php

namespace Database\Seeders;

use App\Models\Contacts;
use Faker\Generator;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $contact = Contacts::create([
            'page_content' => $faker->paragraph('3'),
            'name'  => $faker->name,
            'email' => $faker->email(),
            'subject' => $faker->text('20'),
            'message' => $faker->paragraph('10'),
        ]);
    }
}
