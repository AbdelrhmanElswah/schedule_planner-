<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\DataTables\RoomsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoomsDataTable $RoomsDataTable)
    {
        return $RoomsDataTable->render('admin.room.index', ['title' => 'Room']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Room'; // You can customize the title as needed
        return view('admin.room.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            // Add validation rules for other fields if needed
        ]);

        Room::create($request->all());

        return redirect()->route('room.index')
            ->with('success', 'Room created successfully.');
    }

    public function show($id)
    {

        $room = Room::findOrFail($id);
        $title = 'Room Details';
        return view('admin.room.show', compact('room','title'));
    }

    public function edit(Room $room)
    {
        $title = 'Edit Room'; // You can customize the title as needed
        return view('admin.room.edit', compact('room', 'title'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            // Add validation rules for other fields if needed
        ]);

        $room->update($request->all());

        return redirect()->route('room.index')
            ->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('room.index')
        ->with('success', 'Room deleted successfully.');
    }
}
