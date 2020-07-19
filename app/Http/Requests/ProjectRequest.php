<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectRequest  extends Request
{
    protected $errorBag = 'formCadastroProjeto';
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
            // 'subtitle' => 'required',
            // 'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Por favor digite um "Título" para o projeto',
            // 'subtitle.required' => 'Por favor escreva um "Subtítulo" para o projeto',
            // 'description.required' => 'Por favor escreva uma "Descrição" para o projeto'
        ];
    }
}
