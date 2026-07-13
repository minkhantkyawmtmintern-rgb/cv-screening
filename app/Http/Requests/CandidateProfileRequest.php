<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CandidateProfileRequest extends FormRequest
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
            'phone'=>['required','string','max:20'],
            'date_of_birth'=>['nullable','date'],
            'gender'=>['nullable','in:male,female,other'],
            'address'=>['nullable','string'],
            'education'=>['nullable','string','max:255'],
            'university'=>['nullable','string','max:255'],
            'major'=>['nullable','string','max:255'],
            'experience_years'=>['nullable','integer','min:0'],
            'linkedin_url'=>['nullable','url'],
            'portfolio_url'=>['nullable','url'],
            'summary'=>['nullable','string'],
        ];
    }
}
