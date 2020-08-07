@extends('template.admin')

@section('content')
    <div class="row">
        <div class="span12">
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.unidades.create')}}" role="button">Cadastrar</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>Título</th>
                      <th>Recursos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidades as $unidade)
                        <tr>
                            <!-- <td>{{ $unidade->id }}</td> -->
                            <td>{{ $unidade->title }}</td>
                            <td>
                                <a class="btn btn-mini" href="{{ route('admin.unidades.edit', [$unidade] )}}">Editar</a>
                                <form method="post" action="{{ route('admin.unidades.destroy', $unidade) }}" style="display:inline;">
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
            {!! $unidades->render() !!}

        </div>
    </div>
@endsection
