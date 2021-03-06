<?php

namespace Compass\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

/**
 * Class CategoryValidation
 *
 * @package Compass\Http\Requests\Helpdesk
 */
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
     * Get the validation rules that apply to the request.`
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge($this->baseRules(), $this->methodSpecificRules());
    }

    /**
     * Basic validation rules.
     *
     * @return array
     */
    private function baseRules(): array
    {
        return ['color' => 'string|required|max:10', 'type' => 'string|required|max:50',];
    }
    
    /**
     * Validation rules per request type.
     *
     * @return array
     */
    private function methodSpecificRules(): array
    {
        switch ($this->method()) {
            case 'POST':    return ['name' => 'string|required|max:191|unique:categories'];
            case 'PATCH':   return ['name' => 'required|string|max:191|unique:categories,name,'. $this->category->id];
            default:        return [];
        }
    }
}
