<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContatoRequest extends Request
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
            'nome'          => 'required',
            'email'         => 'required',
            'mensagem'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required'              => 'Por favor informe seu nome',
            'email.required'             => 'Por favor informe um e-mail',
            'mensagem.required'          => 'Por favor digite sua mensagem',
        ];
    }
}
