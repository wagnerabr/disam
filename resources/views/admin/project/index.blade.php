@extends('template.admin')

@section('content')
    <div class="row">
        <div class="span12">
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.projetos.create')}}" role="button">Cadastrar</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>Imagem</th>
                      <th>Título</th>
                      <th>Subtítulo</th>
                      <th>Data</th>
                      <th>Recursos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td><img src="{{ url('/') }}/upload/projetos/thumb/{{ $project->image }}"></td>
                            <td>{{ $project->title }}</td>
                            <td style="max-width: 300px;">{{ str_limit($project->subtitle, 200) }}</td>
                            <td>{{ $project->dataFormatada() }}</td>
                            <td>
                                <a class="btn btn-mini" href="{{ route('admin.projetos.edit', [$project] )}}">Editar</a>
                                <form method="post" action="{{ route('admin.projetos.destroy', $project) }}" style="display:inline;">
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
            {!! $projects->render() !!}

        </div>
    </div>
@endsection
