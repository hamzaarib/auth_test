<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitantRequest extends FormRequest
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
            'cin' => 'required|between:8,10',
            'nom' => 'required',
            'ville_id' => 'required|exists:villes,id',
        ];
    }
}
