<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'desc' => 'required',
            'use_time' =>  'required|date_format:H:i'

        ];
    }

    public function messages()
    {
        return [
            'desc.required' => ' Please input desc',
            'use_time' => 'Please input use_time',
            'use_time.date_format' => 'Wrong time format'
        ];
    }
}
