<?php
namespace App\Http\Requests\Dashboard\Lectures;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLectureRequest extends FormRequest
{
    public function rules()
    {
        return 
        [
            'room_id' => 'required',
            'period_id' => [
                'required',
                Rule::unique('lectures')->where(function ($query) {
                    return $query->where('weekday', $this->weekday) // Check for the same day
                                 ->where('room_id', $this->room_id)
                                 ->where('period_id', $this->period_id);
                }),
            ],
            'instructor_id' => [
                'required',
                Rule::unique('lectures')->where(function ($query) {
                    return $query->where('weekday', $this->weekday) // Check for the same day
                                 ->where('instructor_id', $this->instructor_id)
                                 ->where('period_id', $this->period_id);
                }),
            ],

        ];
    }

    public function messages()
    {
        return [
            'period_id.unique' => '- The selected room is already booked for this period.',
            'instructor_id.unique' => '- The instructor is already assigned to another lecture in this period.',
            'room_id.required'=>'- Room Field is required',
            'instructor_id.required'=>'- Instructor Field is required',

        ];
    }
}
