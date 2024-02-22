<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['email', 'max:255', 'unique:users,id,except,id'],
            'middle_name' => 'min:0|max:255',
            'last_name' => 'required|min:2|max:255',
            'gender' => 'required',
            // 'role' => 'required',
            'phone_number' => 'required|numeric|min_digits:9|max_digits:11',
            // 'status' => 'required',



            // 'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
