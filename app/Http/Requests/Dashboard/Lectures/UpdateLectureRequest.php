<?php

namespace App\Http\Requests\Dashboard\Lectures;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLectureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules()
    {

        return [
            'room_id' => 'required',
            'period_id' => [
                'required',
                Rule::unique('lectures')->ignore($this->lecture_id)->where(function ($query) {
                    return $query->where('room_id', $this->room_id)
                                 ->where('period_id', $this->period_id);
                }),
            ],
            'instructor_id' => [
                'required',
                Rule::unique('lectures')->ignore($this->lecture_id)->where(function ($query) {
                    return $query->where('instructor_id', $this->instructor_id)
                                 ->where('period_id', $this->period_id);
                }),
            ],
            // ... other fields
        ];
    }

    public function messages()
    {
        return [
            'period_id.unique' => '- The selected room is  booked for this period.',
            'instructor_id.unique' => '- The instructor is assigned to lecture in this period.',
            'room_id.required'=>'- Room Field is required',
            'instructor_id.required'=>'- Instructor Field is required',

        ];
    }
}
