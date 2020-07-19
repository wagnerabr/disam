<?php

namespace App\Http\Model\Site;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "estados";

    protected $fillable = ['id', 'nome', 'sigla'];

}
