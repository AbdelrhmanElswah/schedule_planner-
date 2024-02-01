<?php

namespace App\Http\Controllers\Admin;

use App\Models\Instructor;
use App\Models\Lecture;
use App\DataTables\InstructorsDataTable; // Remove the extra space at the end
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstrusctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(InstructorsDataTable $InstructorsDataTable)
    {
        return $InstructorsDataTable->render('admin.instrusctor.index', ['title' => 'Instrusctor']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Instructor';
        return view('admin.instrusctor.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'instructor_name' => 'required|string|max:255',
        ]);

        $instructor = Instructor::create([
            'instructor_name' => $request->input('instructor_name'),
        ]);

        return redirect()->route('instrusctor.index', $instructor->id)
            ->with('success', 'Instructor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $instructor = Instructor::findOrFail($id);
        $title = 'Instructor Details';
        return view('admin.instrusctor.show', compact('title', 'instructor'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $instructor = Instructor::findOrFail($id);
        $title = 'Edit Instructor';
        return view('admin.instrusctor.edit', compact('title', 'instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'instructor_name' => 'required|string|max:255',
            // Add validation rules for other fields if needed
        ]);

        $instructor = Instructor::findOrFail($id);
        $instructor->update([
            'instructor_name' => $request->input('instructor_name'),
            // Update other fields as needed
        ]);

        return redirect()->route('instrusctor.index', $instructor->instructor_id)
            ->with('success', 'Instructor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);
    
        // Delete related lectures
        Lecture::where('instructor_id', $instructor->instructor_id)->delete();
    
        // Delete the instructor
        $instructor->delete();
    
        return redirect()->route('instrusctor.index')
            ->with('success', 'Instructor and related lectures deleted successfully.');
    }
}
