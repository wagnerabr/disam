<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ViagemRequest extends Request
{
    protected $errorBag = 'formCadastroViagem';
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
            'destino' => 'required',
            'data' => 'required',
            'valor' => 'required',
            'descricao' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'destino.required' => 'Por favor digite o destino da viagem',
            'data.required' => 'Por favor digite a data da viagem',
            'valor.required' => 'Por favor o valor da viagem',
            'descricao.required' => 'Por favor digite uma descrição para a viagem'
        ];
    }
}
