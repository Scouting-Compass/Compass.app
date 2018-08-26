<?php

namespace Compass\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SecurityValidator
 *
 * @package Compass\Http\Requests\Account
 */
class SecurityValidator extends FormRequest
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
        return ['password' => 'required|string|min:6|confirmed'];
    }
}
