<?php

namespace Database\Seeders;

use App\Models\Timeslot;
use Illuminate\Database\Seeder;

class TimeslotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Timeslot::factory()->create([
            'starts_at' => '10:00',
            'ends_at' => '10:30',
        ]);

        Timeslot::factory()->create([
            'starts_at' => '10:35',
            'ends_at' => '11:15',
        ]);

        Timeslot::factory()->create([
            'starts_at' => '11:20',
            'ends_at' => '12:00',
        ]);

        Timeslot::factory()->create([
            'starts_at' => '12:10',
            'ends_at' => '13:05',
        ]);

        Timeslot::factory()->create([
            'starts_at' => '15:30',
            'ends_at' => '16:15',
        ]);

        Timeslot::factory()->create([
            'starts_at' => '16:30',
            'ends_at' => '17:00',
        ]);

        Timeslot::factory()->create([
            'starts_at' => '17:00',
            'ends_at' => '17:40',
        ]);

        Timeslot::factory()->create([
            'starts_at' => '17:40',
            'ends_at' => '18:20',
        ]);

        Timeslot::factory()->create([
            'starts_at' => '18:30',
            'ends_at' => '19:10',
        ]);

        Timeslot::factory()->create([
            'starts_at' => '18:30',
            'ends_at' => '19:00',
        ]);

        Timeslot::factory()->create([
            'starts_at' => '19:10',
            'ends_at' => '19:55',
        ]);

        Timeslot::factory()->create([
            'starts_at' => '19:50',
            'ends_at' => '20:40',
        ]);
    }
}
