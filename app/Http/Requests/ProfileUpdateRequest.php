<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['nullable', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:255'],
            'sex' => ['required', 'string', Rule::in(['male', 'female'])],
            'type' => ['required', 'string', Rule::in(['player', 'coach'])], // removed 'admin' option
            'birthdate' => ['required', 'date'],
            'idnumber' => ['required', 'string', 'max:255'], // added idnumber validation
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'profile_picture' => ['nullable', 'image', 'max:2024'], // addSed profile_picture validation
        ];


     
    }

    
}
