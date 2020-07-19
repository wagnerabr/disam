<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReservaRequest extends Request
{
    protected $errorBag = 'formReservarViagem';
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
            // 'id_viagem' => 'required',
            // 'id_cliente' => 'required',
            // 'id_agencia' => 'required'
        ];
    }

    public function messages()
    {
        return [
            // 'id_viagem.required' => 'Por favor selecione uma viagem',
            // 'id_cliente.required' => 'Por favor selecione um cliente',
            // 'id_agencia.required' => 'Por favor selecione uma agência'
        ];
    }
}
