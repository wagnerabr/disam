<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Model\Site\Banner;
use App\Http\Model\CategoryProduct;

class HomeController extends Controller
{
	private $modelPost;

	public function __construct()
    {
		$this->setModelPost();
    }

	public function index()
	{	
		$viewVars = [
			'banners' => $this->getAllBanners(),
			'paginaHome' => true,
			'param1' => '',
			'posts' => $this->getPostHome()
		];

		return view('paginas.home', $viewVars);
	}

	public function getAllBanners()
	{
		$banners = Banner::where('active', 1)
			->orderBy('id')
				->get();

		return $banners;
	}

	public function getPostHome()
	{
		$posts = $this->getModelPost()->where('status', 1)
			->orderBy('created_at', 'DESC')->limit(3)
				->get();

		return $posts;
	}
	
  	private function setModelPost()
    {
        $app = app();
        $this->modelPost = $app->make('App\Http\Model\Site\Post');
    }

    private function getModelPost()
    {
    	return $this->modelPost;
    }
}
