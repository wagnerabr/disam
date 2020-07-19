<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers\StringHelper;

class Viagem extends Model
{
    protected $table = "viagens";

    protected $fillable = ['destino', 'data', 'valor', 'vagas', 'cartao', 'boleto', 'deposito', 'descricao'];

    public function dataFormatada()
    {
    	return StringHelper::date2br($this->data);
        //return $this->data;
    }

}
