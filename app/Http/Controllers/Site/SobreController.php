<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;

class SobreController extends Controller
{
	public function index(Request $request)
	{	
		$params = $request->segments();
		$viewVars = [
			'paginaHome' => false,
			'param1' => $params[0],
		];

		return view('paginas.sobre', $viewVars);
	}

}
