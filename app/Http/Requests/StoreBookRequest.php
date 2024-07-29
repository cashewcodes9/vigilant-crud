<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|string',
            'author' => 'required|string',
            'isbn' => 'required|string|unique:books,isbn',
            'cover' => 'required|string',
            'description' => 'required|string',
            'language' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'author.required' => 'The author field is required.',
            'isbn.required' => 'The isbn field is required.',
            'isbn.unique' => 'The isbn field must be unique.',
            'cover.required' => 'The cover field is required.',
            'description.required' => 'The description field is required.',
            'language.required' => 'The language field is required.',
        ];
    }

    /**
     * Handle a failed validation attempt.
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
