<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoriaRequest extends Request
{
    protected $errorBag = 'formCadastroCategoria';
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
            'category' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'Por favor digite o nome da Categoria'
        ];
    }
}
