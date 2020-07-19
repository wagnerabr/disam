<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers\StringHelper;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = ['nome', 'cpf', 'rg', 'endereco', 'numero', 'bairro', 'cidade', 'estado', 'complemento', 'cep', 'telefone', 'celular', 'data_nascimento'];

    public function dataFormatada()
    {
    	return StringHelper::date2br($this->data_nascimento);
        //return $this->data;
    }

}
