<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimesheetRequest extends FormRequest
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
            'date' => 'required|date|before_or_equal:now',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => 'Please choose date',
            'date.date' => 'Please iput date format wrong',
            'date.before_or_equal' => 'Please iput date before or equal today'
        ];
    }
}
