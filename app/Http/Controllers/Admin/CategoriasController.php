<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Categoria;
use Event;
use App\Events\UpdatedCategoriaEvent;
use App\Http\Requests\CategoriaRequest;
use DateTime;
use App\Http\Helpers\StringHelper;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id')->paginate(8);

        return view('admin.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categoria = new Categoria;
        //$categories = Category::all();

        return view('admin.categoria.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CategoriaRequest $request)
    {
        $dados = $request->only(['category']);
        
        $dados['slug'] = str_slug($dados['category'], '-');

        $dados['status'] = 1;

        $categoria = Categoria::create(
            $dados
        );

        if ($categoria->save()) {
            return redirect()
            ->route('admin.categoria.index')
            ->with('status', 'Categoria salva com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria.show', compact('categoria'));
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('admin.categoria.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, $id)
    {
        $categoria = Categoria::find($id);

        $dados = $request->all();

        $dados['slug'] = str_slug($dados['category'], '-');

        $dados['status'] = 1;
        
        $categoria->fill($dados);
         
        if ($categoria->save()) {

            Event::fire(new UpdatedCategoriaEvent($categoria));
            
            return redirect()
                ->action('Admin\CategoriasController@index')
                ->with('status', 'Categoria salva com sucesso!');
        }
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        
        if ($categoria->delete()) {
            return redirect()
                ->action('Admin\CategoriasController@index')
                ->with('status', 'Categoria removida com sucesso!');
        }
    }

    public function categoryChangeStatus($id)
    {
        $categoria = Categoria::find($id);

        if ($categoria->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $categoria->status = $status;
                
        if ($categoria->save()) {

            Event::fire(new UpdatedCategoriaEvent($categoria));
            
            return redirect()
                ->action('Admin\CategoriasController@index')
                ->with('status', 'Status atualizado com sucesso!');
        }
    }
}
