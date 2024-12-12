<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispositionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'content' => 'required|min:5',

        ];
    }
    public function messages()
    {
        return [
            'content.required' => 'Tidak boleh kosong',
            'content.min' => 'Harus lebih dari 5 karakter',
        ];
    }
}
