<?php

namespace App\Http\Model\Site;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    protected $table = "environments";

    protected $fillable = ['title', 'short_description', 'description', 'architect', 'active'];

}
