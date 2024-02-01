<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CoursesDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CoursesDataTable $coursesDataTable)
    {
     return $coursesDataTable->render('admin.course.index', ['title' => 'Course']);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::pluck('department_name', 'dept_id');
        return view('admin.course.create', [
            'title' => 'Create Course',
            'departments' => $departments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_name' => 'required|string|max:255',
            'dept_id' => 'required|exists:departments,dept_id', // Ensure dept_id exists in the departments table
        ]);

        Course::create($validatedData);

        return redirect()->route('course.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.course.show', [
            'title' => 'Course Details',
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $departments = Department::pluck('department_name', 'dept_id');

        return view('admin.course.edit', [
            'title' => 'Edit Course',
            'course' => $course,
            'departments' => $departments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'course_name' => 'required|string|max:255',
            'dept_id' => 'required|exists:departments,dept_id',
        ]);

        $course->update($validatedData);

        return redirect()->route('course.index', $course)->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // Delete dependent records in the lectures table
        $course->lectures()->delete();
    
        // Now, delete the course
        $course->delete();
    
        return redirect()->route('course.index')->with('success', 'Course deleted successfully.');
    }
    
}
