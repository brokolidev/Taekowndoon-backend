<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // classes for SAT
        Schedule::factory()->create([
            'timeslot_id' => 1,
            'dow' => 6,
            'level' => 'Little Warriors'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 2,
            'dow' => 6,
            'level' => 'Beginner Class'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 3,
            'dow' => 6,
            'level' => 'Family Class'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 4,
            'dow' => 6,
            'level' => 'Private Class'
        ]);

        // classes for 3:30 ~ 4:15
        Schedule::factory()->create([
            'timeslot_id' => 5,
            'dow' => 2,
            'level' => 'Private Lesson'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 5,
            'dow' => 3,
            'level' => 'Private Lesson'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 5,
            'dow' => 4,
            'level' => 'Private Lesson'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 5,
            'dow' => 5,
            'level' => 'Private Lesson'
        ]);

        // classes for 4:30 ~ 5:00
        Schedule::factory()->create([
            'timeslot_id' => 6,
            'dow' => 2,
            'level' => 'Little Warriors 1'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 6,
            'dow' => 3,
            'level' => 'Little Warriors 1'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 6,
            'dow' => 4,
            'level' => 'Little Warriors 1'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 6,
            'dow' => 5,
            'level' => 'Little Warriors 1'
        ]);

        // classes for 5:00 ~ 5:40
        Schedule::factory()->create([
            'timeslot_id' => 7,
            'dow' => 2,
            'level' => 'Beginner Class 1'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 7,
            'dow' => 3,
            'level' => 'Beginner Class 1'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 7,
            'dow' => 4,
            'level' => 'Beginner Class 1'
        ]);

        Schedule::factory()->create([
            'timeslot_id' => 7,
            'dow' => 5,
            'level' => 'Beginner Class 1'
        ]);


        $schedules = Schedule::all();
        foreach ($schedules as $schedule) {
            $instructorIds = User::where('role', 'instructor')
                ->inRandomOrder()
                ->take(rand(1, 3))
                ->pluck('id')
                ->toArray();

            $studentIds = User::where('role', 'student')
                ->inRandomOrder()
                ->take(rand(100, 200))
                ->pluck('id')
                ->toArray();
            $schedule->students = $studentIds;
            $schedule->instructors = $instructorIds;
            $schedule->save();
        }
    }
}
