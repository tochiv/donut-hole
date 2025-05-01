<?php

declare(strict_types=1);

namespace App\Http\Requests\Employee;

use App\Enums\Gender;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'patronymic' => 'required|string',
            'gender' => 'nullable|in:' . implode(',', array_column(Gender::cases(), 'value')),
            'salary' => 'required|integer',
            'departments' => 'required|array|exists:departments,id'
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
