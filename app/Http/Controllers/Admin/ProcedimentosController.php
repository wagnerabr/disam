<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Procedimento;
use Event;
use App\Events\UpdatedProcedimentoEvent;
use App\Http\Requests\ProcedimentoRequest;
use DateTime;
use App\Http\Helpers\StringHelper;

class ProcedimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $procedimentos = Procedimento::orderBy('id')->paginate(8);

        return view('admin.procedimento.index', compact('procedimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //$procedimento = new Procedimento;
        //$categories = Category::all();

        return view('admin.procedimento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ProcedimentoRequest $request)
    {
        $dados = $request->only(['title', 'description']);
        
        $dados['slug'] = str_slug($dados['title'], '-');

        $dados['status'] = 1;

        $procedimento = Procedimento::create(
            $dados
        );

        if ($procedimento->save()) {
            return redirect()
            ->route('admin.procedimento.index')
            ->with('status', 'Procedimento salvo com sucesso!');
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
        $procedimento = Procedimento::find($id);

        return view('procedimento.show', compact('procedimento'));
    }

    public function edit($id)
    {
        $procedimento = Procedimento::find($id);

        return view('admin.procedimento.edit', compact('procedimento'));
    }

    public function update(ProcedimentoRequest $request, $id)
    {
        $procedimento = Procedimento::find($id);

        $dados = $request->all();

        $dados['slug'] = str_slug($dados['title'], '-');

        $dados['status'] = 1;
        
        $procedimento->fill($dados);
         
        if ($procedimento->save()) {

            Event::fire(new UpdatedProcedimentoEvent($procedimento));
            
            return redirect()
                ->action('Admin\ProcedimentosController@index')
                ->with('status', 'Procedimento salvo com sucesso!');
        }
    }

    public function destroy($id)
    {
        $procedimento = Procedimento::find($id);
        
        if ($procedimento->delete()) {
            return redirect()
                ->action('Admin\ProcedimentosController@index')
                ->with('status', 'Procedimento removido com sucesso!');
        }
    }

    public function changeStatus($id)
    {
        $procedimento = Procedimento::find($id);

        if ($procedimento->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $procedimento->status = $status;
                
        if ($procedimento->save()) {

            Event::fire(new UpdatedProcedimentoEvent($procedimento));
            
            return redirect()
                ->action('Admin\ProcedimentosController@index')
                ->with('status', 'Status atualizado com sucesso!');
        }
    }
}
