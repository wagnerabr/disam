@extends('template.admin')

@section('content')
    <div class="row">
        <div class="span12">
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.ambiente.create')}}" role="button">Cadastrar</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <!-- <th>#</th> -->
                      <th>Imagem</th>
                      <th>Legenda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ambientes as $ambiente)
                        <tr>
                            <!-- <td>{{ $ambiente->id }}</td> -->
                            <td><img src="{{ url('/') }}/upload/ambientes/thumb/{{ $ambiente->arquivo }}"> </td>
                            <td>{{ $ambiente->legenda }}</td>
                            <td>
                                <a class="btn btn-mini" href="{{ route('admin.ambiente.edit', [$ambiente] )}}">Editar</a>
                                <form method="post" action="{{ route('admin.ambiente.destroy', $ambiente) }}" style="display:inline;">
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
            {!! $ambientes->render() !!}

        </div>
    </div>
@endsection
