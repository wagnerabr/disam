<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UnidadeRequest extends Request
{
    protected $errorBag = 'formCadastroUnidade';
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
            'image' => 'required',
            'title' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Por favor envie uma imagem',
            'title.required' => 'Por favor digite um título para a unidade'
        ];
    }
}
