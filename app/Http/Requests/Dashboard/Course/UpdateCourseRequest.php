<?php

namespace App\Http\Requests\Dashboard\Course;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // You can customize the authorization logic if needed.
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'course_name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,department_id',
        ];
    }
}








?>