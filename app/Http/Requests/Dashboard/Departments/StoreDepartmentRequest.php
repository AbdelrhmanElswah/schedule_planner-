<?php

namespace App\Http\Requests\Dashboard\Departments;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'department_name' => 'required|string|max:255',
        ];
    }
}
