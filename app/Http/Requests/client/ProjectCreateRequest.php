<?php

namespace App\Http\Requests\client;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectCreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'project' => ['required', 'file', 'mimes:zip', 'max:10240'],
            // 'unit' => ['required','string', 'exists:units,id'],
            'team_members' => ['nullable', 'array'],
            'team_members.*' => ['exists:users,id'],
            'project_description' => ['nullable', 'string', 'max:256'],
            'documentation' => ['nullable', 'array'],
            ['file', 'mimes:txt,pdf', 'mimetypes:text/plain,application/pdf'],
            // 'documentation' =>['nullable', 'file', 'extensions:txt,pdf'],
            'year' => ['required', 'string'],
        ];
    }
}
