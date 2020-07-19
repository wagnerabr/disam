<?php

namespace App\Http\Model\Site;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    protected $table = "procedimentos";

    protected $fillable = ['id', 'title', 'description', 'position', 'slug', 'status'];
}

