<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminBulkUserCreateRequest extends FormRequest
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
            'csv_file' => ['required', 'file', 'mimes:csv,txt', 
            function($attribute, $value, $fail){
                $handle = fopen($value->getRealPath(), 'r');
                $header = fgetcsv($handle);
                fclose($handle);

                if ($header === false) {
                    $fail('The CSV file appears to be empty.');
                    return;
                }

                $normalized = array_map(fn ($col) => strtolower(trim($col)), $header);

                $expected = ['name', 'student_number'];
                $missing = array_diff($expected, $normalized);
                
                if(!empty($missing)){
                    $fail('This CSV header row my be: ' . implode(', ', $expected));
                }
            }],
        ];
    }
}
