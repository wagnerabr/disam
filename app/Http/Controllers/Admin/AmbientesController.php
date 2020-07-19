<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Ambiente;
use Event;
use App\Events\UpdatedAmbientesEvent;
use App\Http\Requests\AmbienteRequest;
use DateTime;

class AmbientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ambientes = Ambiente::paginate(8);

        return view('admin.ambiente.index', compact('ambientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $ambiente = new Ambiente;
        //$categories = Category::all();

        return view('admin.ambiente.create', compact('ambientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(AmbienteRequest $request)
    {   
        $dados = $request->only(['arquivo', 'legenda']);

        $ambiente = Ambiente::create(
            $dados
        );

        if ($ambiente->save()) {
            return redirect()
            ->route('admin.ambiente.index')
            ->with('status', 'Ambiente salvo com sucesso!');
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
        $ambiente = Ambiente::find($id);

        return view('ambiente.show', compact('ambiente'));
    }

    public function edit($id)
    {
        $ambiente = Ambiente::find($id);

        return view('admin.ambiente.edit', compact('ambiente'));
    }

    public function update(AmbienteRequest $request, $id)
    {
        $ambiente = Ambiente::find($id);

        if($request->arquivo != $ambiente->arquivo) {
            $folder_original = public_path('upload/ambientes/original/');
            $folder_media = public_path('upload/ambientes/media/');
            $folder_thumb = public_path('upload/ambientes/thumb/');

            unlink($folder_original.$ambiente->arquivo);
            unlink($folder_media.$ambiente->arquivo);
            unlink($folder_thumb.$ambiente->arquivo);
        } 
        
        $ambiente->fill($request->all());
        
        if ($ambiente->save()) {

            Event::fire(new UpdatedAmbientesEvent($ambiente));
            
            return redirect()
                ->action('Admin\AmbientesController@index')
                ->with('status', 'Ambiente salvo com sucesso!');
        }
    }

    public function destroy($id)
    {
        $ambiente = Ambiente::find($id);

        $folder_original = public_path('upload/ambientes/original/');
        $folder_media = public_path('upload/ambientes/media/');
        $folder_thumb = public_path('upload/ambientes/thumb/');

        unlink($folder_original.$ambiente->arquivo);
        unlink($folder_media.$ambiente->arquivo);
        unlink($folder_thumb.$ambiente->arquivo);

        if ($ambiente->delete()) {
            return redirect()
                ->action('Admin\AmbientesController@index')
                ->with('status', 'Ambiente removido com sucesso!');
        }
    }

}
