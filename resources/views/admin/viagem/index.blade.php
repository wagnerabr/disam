@extends('template.admin')

@section('content')
    <div class="row">
        <div class="span12">
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.viagem.create')}}" role="button">Cadastrar</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Destino</th>
                      <th>Data</th>
                      <th>Valor</th>
                      <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viagens as $viagem)
                        <tr>
                            <td>{{ $viagem->id }}</td>
                            <td>{{ $viagem->destino }}</td>
                            <td>{{ $viagem->dataFormatada() }}</td>
                            <td>R$ {{ $viagem->valor }}</td>
                            <td>
                                <!-- <a class="btn btn-mini" href="{{ route('admin.viagem.show', ['id' => $viagem->id]) }}">Ver</a> -->
                                <a class="btn btn-mini" href="{{ route('admin.viagem.edit', [$viagem] )}}">Editar</a>
                                <form method="post" action="{{ route('admin.viagem.destroy', $viagem) }}" style="display:inline;">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {!! csrf_field() !!}
                                    <button class="btn btn-mini" type="submit">Excluir</button>
                                </form>
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
