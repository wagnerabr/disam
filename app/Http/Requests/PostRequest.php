<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request
{
    protected $errorBag = 'formCadastroPost';
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
            'id_category_blog' => 'required',
            'title' => 'required',
            'author' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_category_blog.required' => 'Por favor selecione uma "Categoria" para o Post',
            'title.required' => 'Por favor digite um "Título" para o Post',
            'author.required' => 'Por favor digite o nome do "Autor" do Post'
        ];
    }
}
