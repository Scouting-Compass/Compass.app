<?php

namespace Compass\Http\Requests\Helpdesk;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CommentValidator
 * 
 * @package Compass\Http\Requests\Helpdesk
 */
class CommentValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('create-comment', $this->ticket);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return ['comment' => 'required|string'];
    }
}
