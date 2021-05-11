<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        $user = Auth::user();
        return [
            'name'=> ['required','string','max:25', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255',  Rule::unique('users')->ignore($user->id)],
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
