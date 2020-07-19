<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    protected $table = "procedimentos";

    protected $fillable = ['id', 'title', 'description', 'slug', 'status'];
}

