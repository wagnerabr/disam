<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EnvironmentRequest  extends Request
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
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Por favor digite um "Título" para o ambiente',
            'short_description.required' => 'Por favor escreva uma "Pequena Descrição" para o ambiente',
            'description.required' => 'Por favor escreva uma "Descrição" para o ambiente'
        ];
    }
}
