<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    protected $table = "agencias";

    protected $fillable = ['nome', 'cnpj'];

}
