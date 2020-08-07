<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Unidade;
use Event;
use App\Events\UpdatedUnidadesEvent;
use App\Http\Requests\UnidadeRequest;
use DateTime;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $unidades = Unidade::paginate(8);

        return view('admin.unidade.index', compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.unidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UnidadeRequest $request)
    {   
        $dados = $request->only(['title', 'description', 'phone', 'image', 'image_mobile', 'subtitle']);

        $dados['active'] = 1;

        $unidade = Unidade::create(
            $dados
        );

        if ($unidade->save()) {
            return redirect()
            ->route('admin.unidades.index')
            ->with('status', 'Unidade salva com sucesso!');
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
        $unidade = Unidade::find($id);

        return view('admin.unidade.show', compact('unidade'));
    }

    public function edit($id)
    {
        $unidade = Unidade::find($id);

        return view('admin.unidade.edit', compact('unidade'));
    }

    public function update(UnidadeRequest $request, $id)
    {
        $unidade = Unidade::find($id);

        if($request->image != $unidade->image && $unidade->image) {
            $folder_original = public_path('upload/unidades/original/');
            $folder_media = public_path('upload/unidades/media/');
            $folder_thumb = public_path('upload/unidades/thumb/');

            if (file_exists($folder_original.$unidade->image)) {
                unlink($folder_original.$unidade->image);
                unlink($folder_media.$unidade->image);
                unlink($folder_thumb.$unidade->image);
            }
        }

        if($request->image_mobile != $unidade->image_mobile && $unidade->image_mobile) {
            $folder_original_mobile = public_path('upload/unidades-mobile/original/');
            $folder_media_mobile = public_path('upload/unidades-mobile/media/');
            $folder_thumb_mobile = public_path('upload/unidades-mobile/thumb/');

            if (file_exists($folder_original_mobile.$unidade->image_mobile)) {
                unlink($folder_original_mobile.$unidade->image_mobile);
                unlink($folder_media_mobile.$unidade->image_mobile);
                unlink($folder_thumb_mobile.$unidade->image_mobile);
            }
        } 
        
        $unidade->fill($request->all());
        
        if ($unidade->save()) {

            Event::fire(new UpdatedUnidadesEvent($unidade));
            
            return redirect()
                ->action('Admin\UnidadesController@index')
                ->with('status', 'Unidade salva com sucesso!');
        }
    }

    public function destroy($id)
    {
        $unidade = Unidade::find($id);

        $folder_original = public_path('upload/unidades/original/');
        $folder_media = public_path('upload/unidades/media/');
        $folder_thumb = public_path('upload/unidades/thumb/');

        unlink($folder_original.$unidade->image);
        unlink($folder_media.$unidade->image);
        unlink($folder_thumb.$unidade->image);

        if ($unidade->delete()) {
            return redirect()
                ->action('Admin\UnidadesController@index')
                ->with('status', 'Unidade removida com sucesso!');
        }
    }

    public function changeStatus($id)
    {
        $unidade = Unidade::find($id);

        if ($unidade->active == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $unidade->active = $status;
                
        if ($unidade->save()) {

            Event::fire(new UpdatedUnidadesEvent($unidade));
            
            return redirect()
                ->action('Admin\UnidadesController@index')
                ->with('status', 'Status atualizado com sucesso!');
        }
    }
}
