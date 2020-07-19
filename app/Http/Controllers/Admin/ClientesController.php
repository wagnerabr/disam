<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Cliente;
use Event;
use App\Events\UpdatedClientesEvent;
use App\Http\Requests\ClienteRequest;
use DateTime;
use App\Http\Helpers\StringHelper;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(8);

        return view('admin.cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cliente = new Cliente;
        //$categories = Category::all();

        return view('admin.cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ClienteRequest $request)
    {
        $dados = $request->only(['nome', 'cpf', 'rg', 'endereco', 'numero', 'bairro', 'cidade', 'estado', 'complemento', 'cep', 'telefone', 'celular', 'data_nascimento']);

        $dados['data_nascimento'] = StringHelper::date2us($request->data_nascimento);

        $cliente = Cliente::create(
            $dados
        );

        if ($cliente->save()) {
            return redirect()
            ->route('admin.cliente.index')
            ->with('status', 'Cliente salvo com sucesso!');
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
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('admin.cliente.edit', compact('cliente'));
    }

    public function update(ClienteRequest $request, $id)
    {
        //$request->data = DateTime::createFromFormat('d/m/Y', $request->data)->format('Y-m-d');
        $request->valor = str_replace(',', '.', str_replace('.', '', $request->valor));
        $cliente = Cliente::find($id);

        $dados = $request->all();
        $dados['data_nascimento'] = StringHelper::date2us($request->data_nascimento);

        $cliente->fill($dados);
         
        if ($cliente->save()) {

            Event::fire(new UpdatedClientesEvent($cliente));
            
            return redirect()
                ->action('Admin\ClientesController@index')
                ->with('status', 'Cliente salvo com sucesso!');
        }
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if ($cliente->delete()) {
            return redirect()
                ->action('Admin\ClientesController@index')
                ->with('status', 'Cliente removido com sucesso!');
        }
    }
}
