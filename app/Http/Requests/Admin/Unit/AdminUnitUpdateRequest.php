<?php

namespace App\Http\Requests\Admin\Unit;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUnitUpdateRequest extends FormRequest
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
            'unit_name' => ['required','string','max:255'],
            'unit_code' => ['required','string','max:255', Rule::unique('units', 'Unit_code')->ignore($this->unit->id)],
        ];
    }
}
