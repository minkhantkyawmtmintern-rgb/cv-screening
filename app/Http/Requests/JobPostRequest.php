<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'experience_level' => 'required|in:junior,mid,senior',
            'minimum_experience' => 'nullable|integer|min:0',
            'location' => 'nullable|string|max:100',
            'skills' => 'nullable|array',
            'skills.*.selected'  => 'nullable:',
        ];
    }
}
