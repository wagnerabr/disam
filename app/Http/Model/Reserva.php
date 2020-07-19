<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "reservas";

    protected $fillable = ['id_viagem', 'id_cliente', 'id_agencia'];

    public function agencia()
    {
        return $this->hasOne('App\Http\Model\Agencia', 'id');
    }

    public function cliente()
    {
        return $this->hasOne('App\Http\Model\Cliente', 'id');
    }

    public function viagem()
    {
        return $this->hasOne('App\Http\Model\Viagem', 'id');
    }

    public function getListaReservas($id_viagem)
	{
		return $this->join('agencias', 'agencias.id', '=', 'reservas.id_agencia')
			->join('clientes', 'clientes.id', '=', 'reservas.id_cliente')
			->select(
				'reservas.id',
				'clientes.nome', 
				'agencias.nome AS agencia'
				)
				->where('reservas.id_viagem', $id_viagem)
					->orderBy('reservas.id')
						->get();

	}
}
