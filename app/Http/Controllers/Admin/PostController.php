<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Post;
use Event;
use App\Events\UpdatedPostEvent;
use App\Http\Requests\PostRequest;
use DateTime;
use App\Http\Helpers\StringHelper;
use App\Http\Model\Categoria;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(8);

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $post = new Post;
        $categorias = Categoria::all();

        return view('admin.post.create', compact('post', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $dados = $request->only(['id_category_blog', 'title', 'meta_description', 'text', 'author', 'photos']);
        
        $dados['slug'] = str_slug($dados['title'], '-');

        $dados['status'] = 1;

        $post = Post::create(
            $dados
        );

        if ($post->save()) {
            return redirect()
            ->route('admin.posts.index')
            ->with('status', 'Post salvo com sucesso!');
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
        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categorias = Categoria::all();

        return view('admin.post.edit', compact('post','categorias'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        if($post->photos != $post->photos) {
            $folder_original = public_path('upload/blog/original/');
            $folder_media = public_path('upload/blog/media/');
            $folder_thumb = public_path('upload/blog/thumb/');

            if ($post->photos) {
                unlink($folder_original.$post->photos);
                unlink($folder_media.$post->photos);
                unlink($folder_thumb.$post->photos);
            }
        } 

        $dados = $request->all();
        
        $post->fill($dados);
         
        if ($post->save()) {

            Event::fire(new UpdatedPostEvent($post));
            
            return redirect()
                ->action('Admin\PostController@index')
                ->with('status', 'Post salva com sucesso!');
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $folder_original = public_path('upload/blog/original/');
        $folder_media = public_path('upload/blog/media/');
        $folder_thumb = public_path('upload/blog/thumb/');

        if ($post->photos) {
            //unlink($folder_original.$post->photos);
            unlink($folder_media.$post->photos);
            //unlink($folder_thumb.$post->photos);
        }
        
        if ($post->delete()) {
            return redirect()
                ->action('Admin\PostController@index')
                ->with('status', 'Post removido com sucesso!');
        }
    }

    public function postChangeStatus($id)
    {
        $post = Post::find($id);

        if ($post->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $post->status = $status;
                
        if ($post->save()) {

            Event::fire(new UpdatedPostEvent($post));
            
            return redirect()
                ->action('Admin\PostController@index')
                ->with('status', 'Status atualizado com sucesso!');
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
