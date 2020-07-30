<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UnidadesController extends Controller
{
    public function index()
	{	
		return view('paginas.unidades');
	}
}
