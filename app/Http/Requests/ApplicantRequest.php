<?php

namespace App\Http\Requests;

use App\Enum\ApplicantStatusEnum;
use App\Models\Applicant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ApplicantRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
            'country' => ['nullable', 'string'],
            'status' => ['nullable', Rule::enum(ApplicantStatusEnum::class)],
        ] + ($this->isMethod('post') ? $this->store() : $this->update());
    }

    public function store()
    {
        return[
                'email' => ['required', 'string', 'email', 'unique:'.Applicant::class],
                'password' => ['required', 'confirmed',
                    Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()],
                'password_confirmation' => ['required',
                    Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
                ],
        ];
    }

    public function update()
    {
        $applicant = $this->route('applicant');

        return[
                'email' => [
                    'required',
                    'string',
                    'email',
                    Rule::unique('applicants')->ignore($applicant)
                ],
            ];
    }
}
