<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Viagem;
use App\Http\Model\Cliente;
use App\Http\Model\Agencia;
use App\Http\Model\Reserva;
use App\Http\Requests\ReservaRequest;
use Event;
use App\Events\UpdatedReservaEvent;

class ReservasController extends Controller
{
    private $modelReserva;

    public function __construct()
    {
        $this->setModelReserva();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $viagens = Viagem::orderBy('data')->paginate(8);

        return view('admin.reserva.index', compact('viagens'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function listReservas($id_viagem)
    {
        $reservas = $this->getModelReserva()->getListaReservas($id_viagem);

        $viagem = Viagem::where('id', $id_viagem)->first();

        return view('admin.reserva.list', compact('reservas', 'viagem'));
    }

     /**
     * Mostra o formulário para criar uma nova reserva.
     *
     * @return Response
     */
    public function reservar($id_viagem)
    {
        $clientes = Cliente::all();
        $agencias = Agencia::all();

        return view('admin.reserva.create', compact('clientes', 'agencias', 'id_viagem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ReservaRequest $request)
    {   
        $dados = $request->all();
        $total = count($dados['cpf']);
        $id_viagem = $dados['id_viagem'];

        for ($i=0; $i < $total; $i++) { 

            if ($this->verificaNumeroReservas($dados['id_viagem'])) {

                $reserva = new Reserva;
                
                $cliente = Cliente::where("cpf", $dados['cpf'][$i])->first();

                if ($cliente) {
                    if ($this->verificaCpfReserva($dados['id_viagem'], $cliente->id)) {
                        $reserva->id_viagem = $dados['id_viagem'];
                        $reserva->id_cliente = $cliente->id;
                        $reserva->id_agencia = $dados['id_agencia'][$i];

                        $reserva->save();
                    } else {
                        return redirect()
                        ->route('admin.ver-reservar', $id_viagem)
                        ->with('status', 'O CPF n° ' . $dados['cpf'][$i] .' já está cadastrado para essa viagem!');
                    }    
                } else {
                    return redirect()
                    ->route('admin.ver-reservar', $id_viagem)
                    ->with('status', 'Cliente não cadastrado!');
                } 
                

            } else {
                return redirect()
                ->route('admin.ver-reservar', $id_viagem)
                ->with('status', 'Essa viagem não possui mais vagas!');
            }
            
        }

        return redirect()
        ->route('admin.ver-reservar', $id_viagem)
        ->with('status', 'Reserva realizada com sucesso!');
    }

    public function edit($id)
    {
        $reserva = Reserva::find($id);
        $clientes = Cliente::all();
        $agencias = Agencia::all();

        return view('admin.reserva.edit', compact('clientes', 'agencias', 'reserva'));
    }

    public function update(ReservaRequest $request, $id)
    {
        $reserva = Reserva::find($id);
        $reserva->fill($request->all());
         
        if ($reserva->save()) {

            Event::fire(new UpdatedReservaEvent($reserva));
            
            return redirect()
                ->action('Admin\ReservasController@index')
                ->with('status', 'Reserva alterada com sucesso!');
        }
    }

    public function destroy(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        $id_viagem = $reserva->id_viagem;
        if ($reserva->delete()) {
            return redirect()
                ->route('admin.ver-reservar', $id_viagem)
                ->with('status', 'Reserva removida com sucesso!!!');
        }
    }

    private function setModelReserva()
    {
        $app = app();
        $this->modelReserva = $app->make('App\Http\Model\Reserva');
    }

    private function getModelReserva()
    {
        return $this->modelReserva;
    }

    public function getAgencias(Request $request)
    {
        $url = url('/');
  
        $agencias = Agencia::all();
        $html = "";
        
        $html .= "<div class='row'>";
        $html .= "<div class='col-xs-12 col-sm-3 col-md-3'> <label for='nome'>CPF</label> <input class='form-control cpf' type='text' name='cpf[]' value='' placeholder='CPF do passageiro'> </div>";

        $html .= "
                <div class='col-xs-12 col-sm-3 col-md-3'>
                    <div class='form-group'>
                        <label for='agencia'>Agência</label>
                        <select class='form-control' id='sel1' name='id_agencia[]'>
                            <option value=''>Selecione a agência*</option>";
                            foreach ($agencias as $key => $agencia) { 
                                $html .= " <option value=". $agencia->id .">". $agencia->nome ."</option>";          
                            }
        $html .= "
                    </div>
                </div>";

        $html .= "</div>";

        $html .= "
        <script src='$url/assets/js/jquery.maskedinput-1.4.min.js' type='text/javascript'></script>
        <script type='text/javascript'>
            $(function() {
                $('.cpf').mask('999999999-99');
            });
        </script>";

        return $html;
    }

    public function verificaNumeroReservas($id_viagem)
    {
        $viagem = Viagem::find($id_viagem);

        $reservas = Reserva::where('id_viagem', $id_viagem)->get();
        
        if ($viagem->vagas > count($reservas)) {
            return true;
        } else {
            return false;
        }
    }

    public function verificaCpfReserva($id_viagem, $id_cliente)
    {
        $reservas = Reserva::where('id_viagem', $id_viagem)
                    ->where('id_cliente', $id_cliente)
                        ->get();
        
        if (count($reservas) > 0) {
            return false;
        } else {
            return true;
        }
    }

}
