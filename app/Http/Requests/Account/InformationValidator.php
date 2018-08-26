<?php

namespace Compass\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class InformationValidator
 *
 * @package Compass\Http\Requests\Account
 */
class InformationValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
        ];
    }
}
