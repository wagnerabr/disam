@extends('template.admin')

@section('content')
<style type="text/css" media="print">
    a.print, p.observacao, .btn-cadastrar, .box-cabecalho, .form-excluir, .box-direitos-rodape, .btn-warning {
        display: none !important;
    }
</style>
</head>
    <div class="row">
        <div class="span12">
            
            <h2>Destino: {{ $viagem->destino }}</h2>
            <a type="button" class="btn btn-warning" href="javascript:print();">Imprimir Listagem de Reservas</a>
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.reservar', [$viagem->id])}}" role="button">Cadastrar</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>Número da Reserva</th>
                      <th>Nome do Cliente</th>
                      <th>Agência</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva->id }}</td>
                            <td>{{ $reserva->nome }}</td> 
                            <td>{{ $reserva->agencia }}</td>
                            <td>
                               <!--  <a class="btn btn-mini" href="{{ route('admin.reserva.edit', [$reserva->id] )}}">Editar</a> -->
                                <form class="form-excluir" method="post" action="{{ route('admin.reserva.destroy', $reserva->id) }}" style="display:inline;">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="id_viagem" type="hidden" value="{{ $viagem->id }}">
                                    {!! csrf_field() !!}
                                    <button class="btn btn-mini" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Mostra controle de paginação / Gera paginação automáticamente --}}
            

        </div>
    </div>
@endsection
@section('script')
    <script language="javascript">
        function imprimir(){
            if (window.print){
                resposta = confirm('Deseja imprimir essa página ?');
                if (resposta) 
                    window.print(); 
            }
        }
    </script>
@endsection

