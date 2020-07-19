<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClienteRequest extends Request
{
    protected $errorBag = 'formCadastroCliente';
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
            'cpf' => 'required',
            'data_nascimento' => 'required',
            'telefone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Por favor digite o nome do cliente',
            'cpf.required' => 'Por favor digite o cpf do cliente',
            'data_nascimento.required' => 'Por favor digite a data de nascimento',
            'telefone.required' => 'Por favor digite um telefone para o cliente'
        ];
    }
}
