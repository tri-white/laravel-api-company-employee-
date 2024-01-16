<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeesRequest extends FormRequest
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
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'phone' => 'unique: employees,phone|required|max:255|min:1',
            'email' => 'unique: employees,email|required|min:1|email|max:255',
            'company_id' => 'exists:companies,id|number',
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'Note cannot be empty',
            'first_name.string'  => 'Note cannot contain any data except of characters',
            'first_name.max'  => 'Note cannot be longer than 5000 characters long!',
            //etc
        ];
    }
}
