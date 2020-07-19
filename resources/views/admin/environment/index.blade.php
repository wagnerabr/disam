@extends('template.admin')

@section('content')
    <div class="row">
        <div class="span12">
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.ambiente.create')}}" role="button">Cadastrar</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>Imagem</th>
                      <th>Título</th>
                      <th>Arquiteto</th>
                      <th>Pequena Descrição</th>
                      <th>Recursos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($environments as $environment)
                        <tr>
                            <td><img src="{{ url('/') }}/upload/ambientes/thumb/{{ $environment->image }}"></td>
                            <td>{{ $environment->title }}</td>
                            <td>{{ $environment->architect }}</td>
                            <td style="max-width: 300px;">{{ str_limit($environment->short_description, 200) }}</td>
                            <td>
                                <a class="btn btn-mini" href="{{ route('admin.ambiente.edit', [$environment] )}}">Editar</a>
                                <form method="post" action="{{ route('admin.ambiente.destroy', $environment) }}" style="display:inline;">
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
            {!! $environments->render() !!}

        </div>
    </div>
@endsection
