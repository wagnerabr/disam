@extends('template.admin')

@section('content')
    <div class="row">
        <div class="span12">
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.cliente.create')}}" role="button">Cadastrar</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome</th>
                      <th>CPF</th>
                      <th>Celular</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>
                                <a class="btn btn-mini" href="{{ route('admin.cliente.edit', [$cliente] )}}">Editar</a>
                                <form method="post" action="{{ route('admin.cliente.destroy', $cliente) }}" style="display:inline;">
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
            {!! $clientes->render() !!}

        </div>
    </div>
@endsection
