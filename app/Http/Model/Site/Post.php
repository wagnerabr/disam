<?php

namespace App\Http\Model\Site;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers\StringHelper;

class Post extends Model
{
    protected $table = "post_blog";

    protected $fillable = ['id', 'id_category_blog', 'title', 'text', 'meta_description', 'author', 'photos', 'slug', 'status'];

    public function categoria()
    {
        return $this->hasOne('App\Http\Model\Categoria', 'id', 'id_category_blog');
    }

    public function dataFormatada()
    {
    	return StringHelper::datetime2br($this->created_at);
    }

}
