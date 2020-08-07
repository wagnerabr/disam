<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = "unidades";

    protected $fillable = ['title', 'description', 'phone', 'image', 'active'];

}
