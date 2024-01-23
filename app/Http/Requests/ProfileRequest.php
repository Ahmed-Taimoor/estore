<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone_number' => 'required|min:3',
            'street_address' => 'required|min:3',
            'city' => 'required|min:3',
            'country' => 'required|min:3',
        ];
    }
}