<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

/**
 * Class SignupRequest
 * @package App\Http\Requests
 */
final class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
