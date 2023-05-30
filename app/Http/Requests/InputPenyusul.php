<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputPenyusul extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id_role' => 'required',
            'id_wilayah' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required'
        ];
    }
}
