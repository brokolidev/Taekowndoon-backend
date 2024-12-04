<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create 300 students
        User::factory(300)->create();

        // create 5 instructors
        User::factory(5)->create([
            'role' => 'instructor'
        ]);

        // Create a admin user
        User::factory()->create([
            'first_name' => 'Ted',
            'last_name' => 'Ted',
            'email' => 'bocalist@gmail.com',
            'belt_color' => 'black',
            'role' => 'admin',
        ]);

        $this->call([
            TimeslotSeeder::class,
            ScheduleSeeder::class,
        ]);

    }
}
