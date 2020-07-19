<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers\StringHelper;

class Categoria extends Model
{
    protected $table = "category_blog";

    protected $fillable = ['category', 'slug', 'status'];

    // public function dataFormatada()
    // {
    // 	return StringHelper::date2br($this->data);
    //     //return $this->data;
    // }

}
