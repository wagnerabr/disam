<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    protected $table = "environments";

    protected $fillable = ['title', 'short_description', 'description', 'image', 'slug', 'architect', 'active'];

    public function getDetalhe()
    {
    	//if (is_string($slug)) {
    		return 'dd($slug)';
    	//}
    	
    }

}
