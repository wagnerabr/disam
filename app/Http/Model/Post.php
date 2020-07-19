<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers\StringHelper;

class Post extends Model
{
    protected $table = "post_blog";

    protected $fillable = ['id', 'id_category_blog', 'title', 'text', 'meta_description', 'author', 'photos', 'slug', 'status'];

    public function categoria()
    {
        return $this->hasOne('App\Http\Model\Categoria', 'id_category_blog');
    }

    // public function dataFormatada()
    // {
    // 	return StringHelper::date2br($this->data);
    //     //return $this->data;
    // }

}
