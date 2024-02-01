<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Lectures\StoreLectureRequest;
use App\Http\Requests\Dashboard\Lectures\UpdateLectureRequest;
use App\Models\Lecture;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LectureController extends Controller
{
    // In LectureController 
    protected $lecture;
    public function __construct(Lecture $lecture)
    {
        $this->lecture = $lecture;
    }
    public function store(StoreLectureRequest $request)
    {
        $lecture = $this->lecture->create($request->all());

        // Re-fetch the lecture with its relations
        $lectureWithRelations = $this->lecture->withRelations()->find($lecture->lecture_id);
    
        return response()->json(['success' => 'Lecture added successfully','data'=>$lectureWithRelations]);
    }

    public function update(Request $request, $id)
    {

        $conflictError = $this->checkForConflicts($request, $id);
        if ($conflictError) {
            return response()->json(['errors' => $conflictError], 422);
        }
           // Define your validation rules
    $rules = [
        'room_id' => 'required',
        'period_id' => [
            'required'
           
        ],
        'instructor_id' => [
            'required'

        ],        
    ];
    $messages = [
        'period_id.unique' => '- The selected room is booked for this period.',
        'instructor_id.unique' => '- The instructor is assigned to lecture in this period.',
        'room_id.required' => '- Room Field is required',
        'instructor_id.required' => '- Instructor Field is required',
    ];
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
        $lecture = $this->lecture->findOrFail($id);
        $lecture->update($request->all());

        // Re-fetch the lecture with its relations
        $lectureWithRelations = $this->lecture->withRelations()->find($lecture->lecture_id);

        return response()->json(['success' => 'Lecture updated successfully', 'data' => $lectureWithRelations]);
    }
    public function delete($id)
    {
        $lecture = $this->lecture->findOrFail($id);
        $lecture->delete();

        return response()->json(['success' => 'Lecture deleted successfully']);
    }

    private function checkForConflicts(Request $request, $lectureId)
    {
        // Check for room conflicts
        $roomConflict = Lecture::where('lecture_id', '!=', $lectureId)
                               ->where('room_id', $request->room_id)
                               ->where('period_id', $request->period_id)
                               ->exists();

        if ($roomConflict) {
            return ['period_id' => ['- The selected room is booked for this period.']];
        }

        // Check for instructor conflicts
        $instructorConflict = Lecture::where('lecture_id', '!=', $lectureId)
                                     ->where('instructor_id', $request->instructor_id)
                                     ->where('period_id', $request->period_id)
                                     ->exists();
        if ($instructorConflict) {
            return ['instructor_id' => ['- The instructor is assigned to lecture in this period.']];
        }

        return null; // No conflicts found
    }
}
    

