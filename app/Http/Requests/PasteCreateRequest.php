<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasteCreateRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]~
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'text' => 'required',
            'expiration_time' => 'required',
            'access_restriction' => 'required',
            'language' => 'required',
        ];
    }
}
