<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\DataTables\DepartmentsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Departments\StoreDepartmentRequest;
use App\Http\Requests\Dashboard\Departments\UpdateDepartmentRequest;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DepartmentsDataTable $DepartmentsDataTable)
    {
     return $DepartmentsDataTable->render('admin.department.index', ['title' => 'Department']);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.create', ['title' => 'Create Department']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $validatedData = $request->validated();

        $department = Department::create($validatedData);

        return redirect()->route('department.index')->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $department = Department::where('dept_id', $id)->first();

    if (!$department) {
        return redirect()->route('department.index')
            ->with('error', 'Department not found.');
    }

    return view('admin.department.show', [
        'title' => 'Department Details',
        'department' => $department
    ]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::where('dept_id', $id)->first();

        if (!$department) {
            return redirect()->route('department.index') // Replace with the route you want to redirect to
            ->with('error', 'User not found.');
        }

        return view('admin.department.edit', [
            'title' => 'Department Details',
            'department' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, $id)
    {
        $validatedData = $request->validated();

        $department = Department::find($id);

        if (!$department) {
            return redirect()->route('department.index')
                ->with('error', 'Department not found.');
        }

        $department->update($validatedData);

        return redirect()->route('department.index')
            ->with('success', 'Department updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        if ($department->courses()->exists()) {
            // Delete related courses
            $department->courses()->delete();
        }
    
        // Now that there are no related courses, delete the department
        $department->delete();
        
        return redirect()->route('department.index')
            ->with('success', 'Department deleted successfully.');
    }
    
    
}
