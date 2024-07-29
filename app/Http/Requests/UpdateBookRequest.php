<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' => 'string',
            'author' => 'string',
            'isbn' => 'string|unique:books,isbn',
            'cover' => 'string',
            'description' => 'string',
            'language' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'The title field must be a string.',
            'author.string' => 'The author field must be a string.',
            'isbn.string' => 'The isbn field must be a string.',
            'isbn.unique' => 'The isbn field must be unique.',
            'cover.string' => 'The cover field must be a string.',
            'description.string' => 'The description field must be a string.',
            'language.string' => 'The language field must be a string.',
        ];

    }

    /**
     * Handle a failed validation attempt.
     * @param Validator $validator
     * @throws \HttpResponseException
     *
     */
    public function failedValidation(Validator $validator)
    {
        throw new \HttpResponseException(response()->json(
            [
                'success'   => false,
                'message'   => 'Validation errors',
                'data'      => $validator->errors()
            ]
        ));
    }
}
