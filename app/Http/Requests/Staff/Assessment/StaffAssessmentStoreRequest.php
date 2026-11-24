<?php

namespace App\Http\Requests\Staff\Assessment;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StaffAssessmentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'year'=> ['required', 'integer', 'digits:4', 'min:2000', 'max:2099'],
            'name'=> ['required', 'string', 'max:255']
        ];
    }
}
