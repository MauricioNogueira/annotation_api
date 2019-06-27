<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class RegistraRequest extends RequestAbstract
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
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'email' => 'email|required|unique:usuarios',
            'login' => 'required',
            'password' => 'required|confirmed',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Obrigatório',
            'email' => 'Não é um email válido',
            'unique' => 'Este email já foi cadastrado',
            'confirmed' => 'Senha é divergente',
        ];
    }
}
