<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomingMailRequest extends FormRequest
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
            'no_mail' => 'required',
            'date' => 'required',
            'sender' => 'required',
            'as_for' => 'required',
            'category_id' => 'required',
            'characteristic' => 'required',
            'content' => 'required|min:30',
            'file_name' => 'mimes:jpeg,png,jpg,pdf|max:1000',
        ];
    }
    public function messages()
    {
        return [
            'no_mail.required' => 'Harus diisi',
            'date.required' => 'Harus diisi',
            'sender.required' => 'Harus diisi',
            'as_for.required' => 'Harus diisi',
            'category_id' => 'Harus diisi',
            'characteristic' => 'Harus diisi',
            'content.required' => 'Harus diisi',
            'content.min' => 'Harus lebih dari 30 karakter',
            'file_name.mimes' => 'Harus type jpeg,png,jpg,pdf',
            'file_name.max' => 'Maksimal ukuran 1024 kb',
        ];
    }
}
