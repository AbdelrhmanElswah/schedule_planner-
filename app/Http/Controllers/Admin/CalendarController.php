<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Models\Period;
use App\Models\Lecture;
use App\Models\Room;
use App\Models\Instructor;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $lecture;
    protected $period;
    protected $rooms;
    protected $instructor;
    protected $course;
    protected $department;

    public function __construct(Lecture $lecture, Period $period, Room $rooms, Instructor $instructor, Course $course,Department $department)
    {
        $this->lecture = $lecture;
        $this->period = $period;
        $this->rooms = $rooms;
        $this->instructor = $instructor;
        $this->course = $course;
        $this->department=$department;
    }
     public function filterCalender()
        {
            $departments = Department::all();
            $years = ['First', 'Second', 'Third', 'Fourth'];
            return view('admin.calendar.filter_calender', [
                'title' => 'Select Department and Year',
                'departments' => $departments,
                'years' => $years,
            ]);
        }

    public function showCalendar(Request $request)
    {
        $daysOfWeek = [ 'Saturday','Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];

        $departmentId = $request->dept_id;
        $year = $request->year;
        
        $department=$this->department->where('dept_id',$departmentId)->first();
        $periods = $this->period->all();
        $rooms = $this->rooms->all();
        $instructors = $this->instructor->all();
        $courses = $this->course->all();

        $lectures = $this->lecture->where('dept_id', $departmentId)->where('year', $year)->get();
    
        return view('admin.calendar.calendar', [
            'title' => 'Calendar',
            'periods' => $periods,
            'rooms' => $rooms,
            'instructors' => $instructors,
            'courses' => $courses,
            'lectures' => $lectures,
            'department'=>$department,
            'year'=> $year,
            'daysOfWeek' => $daysOfWeek,

        ]);
    }

    public function index()
    {
        $departments = Department::all();
        $periods = Period::all();  
        $lectures = Lecture::all();  
        $rooms = Room::all();
        $instructors = Instructor::all();
        $courses = Course::all();

        $daysOfWeek = [ 'Saturday','Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
        $years=['First','Second','Third','Fourth'];
        // Pass data to the view
        return view('admin.calendar.calendar', [
            'title' => 'Calendar',
            'departments' => $departments,
            'years' => $years,
            'periods' => $periods,
            'lectures' => $lectures,
            'daysOfWeek' => $daysOfWeek,
            'rooms' => $rooms,
            'instructors' => $instructors,
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(calendar $calendar)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(calendar $calendar)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, calendar $calendar)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(calendar $calendar)
    // {
    //     //
    // }
}
