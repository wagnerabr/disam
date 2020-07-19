<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AgenciaRequest extends Request
{
    protected $errorBag = 'formCadastroAgencia';
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
            'cnpj' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Por favor digite o nome da Agência',
            'cnpj.required' => 'Por favor digite o CNPJ da Agência'
        ];
    }
}
