<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimetableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tutorID'=>'required|integer',
            'subjectID'=>'required|integer',
            'week'=>'required|integer|max:4',
            'day'=>'required|integer|max:7',
            'userID'=>'required|string|max:100',
            'isAccept'=>'required|boolean'
        ];
    }
}
