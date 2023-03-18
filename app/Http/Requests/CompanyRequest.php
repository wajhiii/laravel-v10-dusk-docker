<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'symbol' => 'required|string|max:255',
            'email' => 'required|email',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ];
    }

            /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'symbol.required' => 'Symbol is required!',
            'email.required' => 'Email is required!',
            'start_date.required' => 'Start date is required!',
            'end_date.required' => 'End date is required!',
        ];
    }
}
