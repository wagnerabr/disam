<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Model\CategoriaAmbiente;

class Banner extends Model
{
    protected $table = "banners";

    protected $fillable = ['image', 'image_mobile', 'subtitle', 'active'];


}
