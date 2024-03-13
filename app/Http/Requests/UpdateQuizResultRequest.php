<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizResultRequest extends FormRequest
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
            'guest' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'point' => 'required|integer',
            'question_id' => 'required|exists:questions,id',
            'quiz_id' => 'required|exists:quizzes,id',
        ];
    }
}
