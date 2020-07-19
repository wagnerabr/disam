<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers\StringHelper;

class Project extends Model
{
    protected $table = "projects";

    protected $fillable = ['id', 'title', 'slug', 'subtitle', 'description', 'image', 'date', 'active'];

    public function dataFormatada()
    {
    	return StringHelper::date2br($this->date);
        //return $this->data;
    }

}
