<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;

use App\Http\Model\Site\Banner;
use App\Http\Requests\ContatoRequest;

class ContatoController extends Controller
{
	private $modelEstado;
	private $modelFaleConosco;

	public function __construct()
    {
    	$this->setModelEstado();
        $this->setModelFaleConosco();
    }

	public function index(Request $request)
	{	
		$params = $request->segments();
        $viewVars = [
			'paginaHome' => false,
			'estados'    => $this->getAllEstados(),
            'param1' => $params[0],
		];

		return view('paginas.contato', $viewVars);
	}


	public function postContato(ContatoRequest $request)
	{
		$inputs = $request->all();
        return $this->getModelFaleConosco()->sendEmail($inputs);
	}

	public function getAllEstados()
	{
		return $this->getModelEstado()->orderBy('id')->get();
	}

	private function setModelEstado()
    {
        $app = app();
        $this->modelEstado = $app->make('App\Http\Model\Site\Estado');
    }

    private function getModelEstado()
    {
    	return $this->modelEstado;
    }

    private function setModelFaleConosco()
    {
        $app = app();
        $this->modelFaleConosco = $app->make('App\Http\Model\Site\Contato');
    }

    private function getModelFaleConosco()
    {
    	return $this->modelFaleConosco;
    }

}
