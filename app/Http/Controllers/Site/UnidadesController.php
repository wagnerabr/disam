<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Unidade;

class UnidadesController extends Controller
{
    public function index()
	{	
		$unidades = Unidade::where('active', 1)
			->orderBy('id')
				->get();

		$viewVars = [
			'unidades' => $unidades,
			'pagina' => 'unidade' 
		];
		
		return view('paginas.unidades', $viewVars);
	}
}
