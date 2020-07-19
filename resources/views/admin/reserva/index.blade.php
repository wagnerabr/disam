@extends('template.admin')

@section('content')
    <div class="row">
        <div class="span12">
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.viagem.create')}}" role="button">Cadastrar</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>Destino</th>
                      <th>Data</th>
                      <th>Valor</th>
                      <th>Descrição</th>
                      <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viagens as $viagem)
                        <tr>
                            <td>{{ $viagem->destino }}</td>
                            <td>{{ $viagem->dataFormatada() }}</td>
                            <td width="7%">R$ {{ $viagem->valor }}</td>
                            <td width="60%">{{ $viagem->descricao }}</td>
                            <td>
                                <a class="btn btn-mini" href="{{ route('admin.reservar', [$viagem] )}}">Reservar</a>
                                <a class="btn btn-mini" href="{{ route('admin.ver-reservar', [$viagem] )}}">Ver Reservas</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Mostra controle de paginação / Gera paginação automáticamente --}}
            {!! $viagens->render() !!}

        </div>
    </div>
@endsection
