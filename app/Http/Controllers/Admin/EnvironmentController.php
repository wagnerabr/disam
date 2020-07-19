<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Environment;
use Event;
use App\Events\UpdatedEnvironmentsEvent;
use App\Http\Requests\EnvironmentRequest;
use DateTime;
use Storage;

class EnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $environments = Environment::paginate(8);

        return view('admin.environment.index', compact('environments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $environment = new Environment;
        //$categories = Category::all();

        return view('admin.environment.create', compact('environment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(EnvironmentRequest $request)
    {   
        $dados = $request->only(['title', 'short_description', 'description', 'image', 'architect']);

        $dados['slug'] = str_slug($dados['title'], '-');

        $dados['status'] = 1;

        $environment = Environment::create(
            $dados
        );

        if ($environment->save()) {
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
        $environment = Environment::find($id);

        return view('environment.show', compact('environment'));
    }

    public function edit($id)
    {
        $environment = Environment::find($id);

        return view('admin.environment.edit', compact('environment'));
    }

    public function update(EnvironmentRequest $request, $id)
    {
        $environment = Environment::find($id);

        $dados = $request->all();

        $dados['slug'] = str_slug($dados['title'], '-');
   
        $environment->fill($dados);
        
        if ($environment->save()) {

            Event::fire(new UpdatedEnvironmentsEvent($environment));
            
            return redirect()
                ->action('Admin\EnvironmentController@index')
                ->with('status', 'Ambiente salvo com sucesso!');
        }
    }

    public function destroy($id)
    {
        $environment = Environment::find($id);

        $folder_original = public_path('upload/blog/original/');
        $folder_media = public_path('upload/blog/media/');
        $folder_thumb = public_path('upload/blog/thumb/');

        if ($environment->image) {
            unlink($folder_original.$environment->image);
            unlink($folder_media.$environment->image);
            unlink($folder_thumb.$environment->image);
        }

        if ($environment->delete()) {
            return redirect()
                ->action('Admin\EnvironmentController@index')
                ->with('status', 'Ambiente removido com sucesso!');
        }
    }

    public function upload(Request $request)
    {
    
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);


            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            //$request->file('upload')->storeAs('public/uploads', $filenametostore);

            Storage::put(
                'public/storage/'.$filenametostore,
                file_get_contents($request->file('upload')->getRealPath()),
                'public'
            );
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/storage/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            
            //echo asset('storage/file.txt');

            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
    }
}
