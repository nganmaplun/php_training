<?php

namespace App\Http\Requests\Timesheets;

use App\Http\Requests\Request;

class StoreTimesheetRequest extends Request
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
            'date' => 'required|date|before_or_equal:now|after_or_equal:first day of this month',
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
