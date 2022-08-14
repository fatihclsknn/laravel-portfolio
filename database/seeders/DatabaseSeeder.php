<?php

namespace Database\Seeders;

use App\Models\ProjectDetails;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();
        /*$this->call(ResumeSeeder::class);
        $this->call(ProjectDetailSeeder::class);
        $this->call(ContactSeeder::class);*/
        $this->call(RolePersmissionSeeder::class);
    }
}
