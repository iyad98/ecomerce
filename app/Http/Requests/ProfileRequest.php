<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'nullable | email | unique:admins,email,'.$this->id,
            'password' => 'nullable | confirmed |min:8'
        ];
    }

    public function messages()
    {
       return [
           'name.required' => __('admin/profile.error.name.required'),
           'email.unique' => __('admin/profile.error.email.unique'),
           'password.confirmed' => __('admin/profile.error.password.confirmed'),
           'password.min' => __('admin/profile.error.password.min')
           ];
    }
}
