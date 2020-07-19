<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Model\Environment;

class AmbienteController extends Controller
{
	private $modelEnvironment;

	public function __construct()
    {
    	$this->setModelEnvironment();
    }

	public function index(Request $request)
	{	
		$ambientes = $this->getModelEnvironment()->orderBy('id')->get();

		$params = $request->segments();
		
		$viewVars = [
			'paginaHome' => false,
			'param1' => $params[0],
			'ambientes' => $ambientes
		];

		return view('paginas.ambiente', $viewVars);
	}

	public function loadDetail(Request $request)
	{	
		$slug = $request->permalink;
		$ambiente = $this->getModelEnvironment()->where('slug', '=', $slug)->orderBy('id')->first();

		$params = $request->segments();
		$viewVars = [
			'paginaHome' => false,
			'param1' => $params[0],
			'ambiente' => $ambiente
		];

		return view('paginas.det-ambiente', $viewVars);
	}

	private function setModelEnvironment()
    {
        $app = app();
        $this->modelEnvironment = $app->make('App\Http\Model\Site\Environment');
    }

    private function getModelEnvironment()
    {
    	return $this->modelEnvironment;
    }

}
