<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'middle_name' => 'min:0|max:255',
            'last_name' => 'required|min:2|max:255',
            'gender' => 'required',
            // 'role' => 'required',

            // 'password' => 'required',
            // 'status' => 'required',
            'phone_number' => 'required|numeric|min_digits:9|max_digits:11',

            'permission_id' => 'required',
        ];
    }
}
