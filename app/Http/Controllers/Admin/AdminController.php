<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\StoreAdminRequest;
use App\Http\Requests\Dashboard\Admin\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminsDataTable $adminsDataTable)
    {
        return $adminsDataTable->render('admin.admins.index', ['title' => 'Admins']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create',['title' => 'Create Admin']);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $adminData = $request->validated();
        $adminData['password'] = bcrypt($adminData['password']); // Hash password
        $admin = Admin::create($adminData);
        return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Admin::findOrFail($id); // Find the admin by ID or fail with a 404 error
        if (!$admin) {
            return redirect()->back()->with('error', 'Admin not found.');
        }
        return view('admin.admins.show', [
            'title' => 'Admin Details',
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id); // Find the admin by ID or fail with a 404 error
        if (!$admin) {
            return redirect()->back()->with('error', 'Admin not found.');
        }
        return view('admin.admins.edit', ['title' => 'Edit Admin','admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin) // Assuming route model binding
    {
        $adminData = $request->validated();

        if (!empty($adminData['password'])) {
            $adminData['password'] = bcrypt($adminData['password']); // Hash new password
        } else {
            unset($adminData['password']); // Ignore the password if not entered
        }

        $admin->update($adminData);

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id); // Find the admin by ID or fail with a 404 error
        $admin->delete(); // Delete the admin

        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
    }
}
