<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class TeamRequest extends FormRequest
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

     protected function failedValidation(Validator $validator)
     {
         throw new HttpResponseException(response()->json(['success' => false, 'message' => $validator->errors()], 412));
     }

    public function rules(): array
    {
        return [
            'teamName' => [
                'required',
                'min:10',
                'max:30',
                Rule::unique('teams')->ignore($this->id),
            ],
            'members' => [
                'required',
                Rule::unique('teams')->ignore($this->id),
            ],
        ];
    }
}
