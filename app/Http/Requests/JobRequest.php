<?php

namespace App\Http\Requests;

use App\Enum\JobTypeEnum;
use App\Enum\JobModalityEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobRequest extends FormRequest
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
            'title' => ['required','string'],
            'description' => ['required','string'],
            'modality' => ['nullable', Rule::enum(JobModalityEnum::class)],
            'location' => ['nullable','string'],
            'type' => ['nullable', Rule::enum(JobTypeEnum::class)],
            'min_salary' => ['nullable','numeric'],
            'max_salary' => ['nullable','numeric'],
            'user_id' => ['required','numeric'],
        ];
    }
}
