<?php

namespace Compass\Http\Requests\Helpdesk;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TicketValidation 
 * 
 * @package
 */
class TicketValidation extends FormRequest
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
            'title' => 'required|string|max:191',
            'content' => 'required|string',
            'category' => 'required'
        ];
    }
}
