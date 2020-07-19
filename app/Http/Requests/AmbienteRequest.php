<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AmbienteRequest extends Request
{
    protected $errorBag = 'formCadastroAmbiente';
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
            'arquivo' => 'required',
            'legenda' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'arquivo.required' => 'Por favor envie uma imagem',
            'legenda.required' => 'Por favor digite uma legenda para a imagem'
        ];
    }
}
