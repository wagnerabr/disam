<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProcedimentoRequest extends Request
{
    protected $errorBag = 'formCadastroProcedimento';
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
            'title' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Por favor digite o nome do procedimento',
            'description.required' => 'Por favor digite uma descrição para o procedimento',
        ];
    }
}
