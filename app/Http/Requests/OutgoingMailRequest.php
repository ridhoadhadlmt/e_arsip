<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutgoingMailRequest extends FormRequest
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
            'workunit_id' => 'required',
            'as_for' => 'required',
            'to' => 'required',
            'category_id' => 'required',
            'characteristic' => 'required',
            'address' => 'required|min:30',
            'content' => 'required|min:30',
            'send_via' => 'required',
            'description' => 'required',
            'file_name' => 'mimes:jpeg,png,jpg,pdf|max:1000',
        ];
    }
    public function messages()
    {
        return [
            'no_mail.required' => 'Harus diisi',
            'date.required' => 'Harus diisi',
            'workunit_id.required' => 'Harus dipilih',
            'as_for.required' => 'Harus diisi',
            'to.required' => 'Harus diisi',
            'category_id.required' => 'Harus dipilih',
            'characteristic.required' => 'Harus diisi',
            'address.required' => 'Harus diisi',
            'address.min' => 'Harus lebih dari 30 karakter',
            'content.required' => 'Harus diisi',
            'content.min' => 'Harus lebih dari 30 karakter',
            'send_via.required' => 'Harus diisi',
            'description.required' => 'Harus diisi',
            'file_name.mimes' => 'Harus type jpeg,png,jpg,pdf',
            'file_name.max' => 'Maksimal ukuran 1024 kb',
        ];
    }
}
