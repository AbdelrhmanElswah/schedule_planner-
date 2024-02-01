<?php

namespace App\Http\Requests\Dashboard\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id, // Assuming $this->admin is the admin being updated
            'password' => 'nullable|string|min:6|confirmed',
            'phone_number' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'about_us' => 'nullable|string|max:1000',
            'whatsapp' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ];
    }
}
