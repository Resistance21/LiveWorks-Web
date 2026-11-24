<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /**
         * array of rules that are used for validation the data
         * that is pass to the request from the 
         * user profile update when an admin is updating a user's
         * profile.
         */
        return [
            'name' => ['string', 'max:128'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                /**
                 * makes sure that other one instance of this email is in the database
                 * and is tied to this user.
                 */
                Rule::unique(User::class)->ignore($this->route('user')->id),
            ],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }
}