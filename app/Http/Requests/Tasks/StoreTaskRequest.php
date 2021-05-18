<?php

namespace App\Http\Requests\Tasks;

use App\Http\Requests\Request;

class StoreTaskRequest extends Request
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
            'name' => 'required|max:100',
            'desc' => 'required',
            'use_time' =>  'required|date_format:H:i'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please input task name',
            'desc.required' => ' Please input desc',
            'use_time' => 'Please input use_time',
            'use_time.date_format' => 'Wrong time format'
        ];
    }
}
