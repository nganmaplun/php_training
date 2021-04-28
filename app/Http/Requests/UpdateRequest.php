<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:25','unique:users'] ,
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Please input name',
        'email.required' => 'Please input email',
        'name.unique' => 'Name is already exits',
        'email.unique' => 'Email is already exits'
    ];
}
}
