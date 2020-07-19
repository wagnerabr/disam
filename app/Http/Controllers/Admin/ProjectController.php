<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Project;
use Event;
use App\Events\UpdatedProjectsEvent;
use App\Http\Requests\ProjectRequest;
use DateTime;
use Storage;
use App\Http\Helpers\StringHelper;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::paginate(8);

        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $project = new Project;
        //$categories = Category::all();

        return view('admin.project.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ProjectRequest $request)
    {   
        $dados = $request->only(['title', 'subtitle', 'description', 'image', 'date']);

        $dados['date'] = StringHelper::date2us($dados['date']);

        $dados['slug'] = str_slug($dados['title'], '-');

        $dados['active'] = 1;

        $project = Project::create(
            $dados
        );

        if ($project->save()) {
            return redirect()
            ->route('admin.projetos.index')
            ->with('status', 'Projeto salvo com sucesso!');
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
        $project = Project::find($id);

        return view('project.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::find($id);

        return view('admin.project.edit', compact('project'));
    }

    public function update(ProjectRequest $request, $id)
    {
        $project = Project::find($id);

        $dados = $request->all();
        
        $dados['date'] = StringHelper::date2us($dados['date']);

        $dados['slug'] = str_slug($dados['title'], '-');
   
        $project->fill($dados);
        
        if ($project->save()) {

            Event::fire(new UpdatedProjectsEvent($project));
            
            return redirect()
                ->action('Admin\ProjectController@index')
                ->with('status', 'Projeto salvo com sucesso!');
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
