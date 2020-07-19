@extends('template.admin')

@section('content')
    <div class="row">
        <div class="span12">
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.agencia.create')}}" role="button">Cadastrar</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome</th>
                      <th>CNPJ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agencias as $agencia)
                        <tr>
                            <td>{{ $agencia->id }}</td>
                            <td>{{ $agencia->nome }}</td>
                            <td>{{ $agencia->cnpj }}</td>
                            <td>
                                <a class="btn btn-mini" href="{{ route('admin.agencia.edit', [$agencia] )}}">Editar</a>
                                <form method="post" action="{{ route('admin.agencia.destroy', $agencia) }}" style="display:inline;">
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
            {!! $agencias->render() !!}

        </div>
    </div>
@endsection
