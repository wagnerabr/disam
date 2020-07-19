<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table = "ambiente";

    protected $fillable = ['arquivo', 'legenda', 'ativo'];

}
