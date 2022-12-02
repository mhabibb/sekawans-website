<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // $this->email ?? $this->merge([
        //     'email'  => auth()->user()->email
        // ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = auth()->id();
        return [
            'email'                      => "required|email|unique:users,email,{$id}",
            'password'                   => 'required|current_password',
            'new_password'               => 'nullable|confirmed|string|min:8',
            'new_password_confirmation'  => 'required_with:new_password',
        ];
    }
}
