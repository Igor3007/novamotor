<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTOs\FormAnswerContactsDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class FormAnswerContactsRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function getDto(): FormAnswerContactsDTO
    {
        return FormAnswerContactsDTO::fromArray($this->validated());
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
            'name' => 'required|max:255',
            'company' => 'max:255',
            'phone' => 'required|max:255',
            'email' => 'email|nullable',
            'message' => 'required|string',
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
