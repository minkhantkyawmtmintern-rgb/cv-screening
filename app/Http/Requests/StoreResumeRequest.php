<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreResumeRequest extends FormRequest
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
            'resume'=>[
                'required',
                'file',
                'mimes:pdf,doc,docx',
                'max:5120'
            ],
        ];
    }

    public function messages():array
    {
        return [
            'resume.required'=>'Please upload your resume.',
            'resume.mimes'=>'Only PDF, DOC and DOCX files are allowed.',
            'resume.max'=>'File size must not exceed 5MB.',
        ];
    }
}
