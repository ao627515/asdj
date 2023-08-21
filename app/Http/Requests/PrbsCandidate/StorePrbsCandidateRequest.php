<?php

namespace App\Http\Requests\PrbsCandidate;

use Illuminate\Foundation\Http\FormRequest;

class StorePrbsCandidateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'funding_difficulties' => 'required|string',
            'last_name' => 'required|string|max:255|min:1',
            'first_names' => 'required|string|max:255|min:1',
            'gender' => 'required|string|max:10',
            'birthplace' => 'required|string|max:255|min:1',
            'birth_date' => 'required|date',
            'nationality' => 'required|string|max:255|min:1',
            'id_document_number' => 'required|string|max:255|min:1',
            'id_document_date' => 'required|date',
            'residence_city' => 'required|string|max:255|min:1',
            'residence_district' => 'required|string|max:255|min:1',
            'phone' => 'required|string|min:8',
            'email' => 'required|email|max:255|min:1',
            'status' => 'required|string|max:255|min:1',

            'university_1' => 'required|string|max:255|min:1',
            'major_1' => 'required|string|max:255|min:1',
            'study_level_1' => 'required|string|max:255|min:1',
            'tuition_1' => 'required|integer',
            'course_mode_1' => 'required|string|max:255|min:1',

            'university_2' => 'required|string|max:255|min:1',
            'major_2' => 'required|string|max:255|min:1',
            'study_level_2' => 'required|string|max:255|min:1',
            'tuition_2' => 'required|integer',
            'course_mode_2' => 'required|string|max:255|min:1',

            'university_3' => 'required|string|max:255|min:1',
            'major_3' => 'required|string|max:255|min:1',
            'study_level_3' => 'required|string|max:255|min:1',
            'tuition_3' => 'required|integer',
            'course_mode_3' => 'required|string|max:255|min:1',
        ];
    }
}
