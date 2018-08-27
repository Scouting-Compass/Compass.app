<?php

namespace Compass\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required|max:191|unique:categories',
            'color' => 'string|required|max:10',
            'type' => 'string|required|max:50',
        ];
    }
}
