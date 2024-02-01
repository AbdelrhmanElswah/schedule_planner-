<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Users\StoreUserRequest;
use App\Http\Requests\Dashboard\Users\UpdateUserRequest;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('admin.users.index', ['title' => 'Users']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create', ['title' => 'Create User']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index') // Replace with the route you want to redirect to
            ->with('error', 'User not found.');
        }

        return view('admin.users.edit', [
            'title' => 'Edit User',
            'user' => $user
        ]);
    }


    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index') // Replace with the route you want to redirect to
            ->with('error', 'User not found.');
        }

        return view('admin.users.show', [
            'title' => 'User Details',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user) // Using route model binding
    {
        $validatedData = $request->validated();

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) // Using route model binding
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
