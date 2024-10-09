<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {

        $loginRules = [
            'email' => 'required|email',
            'password' => 'required|min:8',
            'remember' => 'required|boolean',
        ];

        $registerRules = [
            'firstName' => 'required|between:4,20',
            'lastName' => 'sometimes|between:4,10',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:11|numeric',
            'password' => 'required|min:8',
        ];

        $infoRules = [
            'country' => 'required',
            'city' => 'required|max:15',
            'district' => 'required|max:15',
            'address' => 'required|between:10,100',

        ];

        if ($this->route()->getName() === 'api.user.login') {
            return $loginRules;
        } elseif ($this->route()->getName() === 'api.user.register') {
            return $registerRules;
        } else {
            return [];
        }
    }
}
