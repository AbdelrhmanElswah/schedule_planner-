<?php

namespace App\Http\Requests\Dashboard\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users,email' , // Assuming $this->admin is the admin being updated
            'password' => 'sometimes|required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'about_us' => 'sometimes|string|max:1000',
            'whatsapp' => 'sometimes|string|max:255',
            'instagram' => 'sometimes|string|max:255',
        ];
    }
}
