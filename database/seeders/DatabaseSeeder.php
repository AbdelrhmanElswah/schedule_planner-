<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Room;
use App\Models\Year;
use App\Models\Lecture;
use App\Models\Period;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AppSeeder::class,
        ]);
        // Seed Departments
        $dept = Department::create(['department_name' => 'Computer Science']);

        // Continue with seeding if department creation is successful
        // Seed Courses

        $courseNames = ['Intro to Comp Sci', 'Data Structures', 'Algorithms', 'Database Systems', 'Operating Systems'];
        foreach ($courseNames as $name) {
            $courses[] = Course::create([
                'course_name' => $name,
                'dept_id' => $dept->dept_id
            ]);
        }

        // Seed Instructors
        $instructor = Instructor::create(['instructor_name' => 'John Doe']);
        // Add more instructors if needed

        // Seed Rooms
        $rooms = [
            ['room_name' => 'Room 101'],
            ['room_name' => 'Room 102'],
            // Add more rooms as needed
        ];
        foreach ($rooms as $roomData) {
            Room::create($roomData);
        }
        // Seed Years
        // Seed Lectures
        $periodsData = [
            ['start_time' => '08:30', 'end_time' => '10:00'],
            ['start_time' => '10:15', 'end_time' => '11:45'],
            ['start_time' => '12:00', 'end_time' => '13:30'],
            ['start_time' => '14:00', 'end_time' => '15:30'],
            ['start_time' => '15:45', 'end_time' => '17:15'],
        ];

        foreach ($periodsData as $periodData) {
            Period::create([
                'start_time' => Carbon::now()->setTimeFromTimeString($periodData['start_time'])->toDateTimeString(),
                'end_time' => Carbon::now()->setTimeFromTimeString($periodData['end_time'])->toDateTimeString(),
            ]);
        }


    }
}
