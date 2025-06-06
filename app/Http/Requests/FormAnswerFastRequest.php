<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTOs\FormAnswerFastDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class FormAnswerFastRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function getDto(): FormAnswerFastDTO
    {
        return FormAnswerFastDTO::fromArray($this->validated());
    }
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
            'page' => 'string',
            'form_name' => 'required|max:255',
            'name' => 'max:255',
            'phone' => 'required|max:255',
        ];
    }

    /**
     * @param Validator $validator
     * @return mixed
     */
    protected function failedValidation(Validator $validator): mixed
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'errors' => $validator->errors()->keys()
            ], JsonResponse::HTTP_OK)
        );
    }
}
