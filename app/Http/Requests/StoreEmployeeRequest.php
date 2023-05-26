<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'alpha'],
            'last_name' => ['required', 'alpha'],
            'company_id' => ['required', 'integer'],
            'phone' => ['required', 'regex:/^(\+?63|0)9\d{9}$/'],
            'email' => ['required', 'email'],
        ];
    }
}
