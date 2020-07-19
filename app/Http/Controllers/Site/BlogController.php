<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Model\Site\Post;
use App\Http\Model\Site\Categoria;

class BlogController extends Controller
{
	private $modelPost;
	private $modelCategoria;

	public function __construct()
    {
    	$this->setModelPost();
    	$this->setModelCategoria();
    }

	public function index(Request $request)
	{	
		$posts = $this->getModelPost()->where('status', '=', 1)->orderBy('created_at', 'DESC')->get();

		$categorias = $this->getModelCategoria()->where('status', '=', 1)->orderBy('created_at', 'DESC')->get();

		$params = $request->segments();
		$viewVars = [
			'paginaHome' => false,
			'param1' => $params[0],
			'posts'  => $posts,
			'categorias' => $categorias
		];

		return view('paginas.blog', $viewVars);
	}

	public function loadCategory(Request $request)
	{	
		$slug = $request->permalink;

		$categorias = $this->getModelCategoria()->where('status', '=', 1)->orderBy('created_at', 'DESC')->get();

		foreach ($categorias as $key => $categoria) {
			if($categoria->slug == $slug) {
				$idCategoria = $categoria->id;
			}
		}

		$posts = $this->getModelPost()->where('status', '=', 1)->where('id_category_blog', '=', $idCategoria)->orderBy('created_at', 'DESC')->get();
		
		$params = $request->segments();
		$viewVars = [
			'paginaHome' => false,
			'param1' => $params[0],
			'posts'  => $posts,
			'categorias' => $categorias
		];

		return view('paginas.blog', $viewVars);
	}

	

	public function loadDetail(Request $request)
	{	
		$slug = $request->permalink;
		$post = $this->getModelPost()->where('slug', '=', $slug)->orderBy('id')->first();

		$params = $request->segments();

		$getRelatedPost = $this->getRelatedPost($post->id_category_blog);

		$viewVars = [
			'paginaHome' => false,
			'param1' => $params[0],
			'post' => $post,
			'relatedPost' => $getRelatedPost
		];

		return view('paginas.post', $viewVars);
	}

	#get related blog post Editar
    public function getRelatedPost($category)
    {
        $findCategory = Categoria::find($category)->first();

        if ($findCategory) {
            $relatedPost = Post::with('categoria')
                ->whereIdCategoryBlog($category)
                ->limit(2)
                ->orderBy('id', 'DESC')
                ->get();

            return $relatedPost;
        } else {
            return false;
        }

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

    private function setModelCategoria()
    {
        $app = app();
        $this->modelCategoria = $app->make('App\Http\Model\Site\Categoria');
    }

    private function getModelCategoria()
    {
    	return $this->modelCategoria;
    }

}
