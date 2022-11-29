<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->id() == $this->route('user')->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'                      => 'required|email',
            'password'                   => 'required|current_password:api|min:8',
            'new_password'               => 'nullable|confirmed|string|min:8',
            'new_password_confirmation'  => 'required_unless:newPassword,null|string|min:8',
        ];
    }
}
