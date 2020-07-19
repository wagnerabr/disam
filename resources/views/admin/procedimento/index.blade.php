@extends('template.admin')

@section('content')
    <div class="row">
        <div class="span12">
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.procedimento.create')}}" role="button">Cadastrar</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome</th>
                      <th>Recursos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($procedimentos as $procedimento)
                        <tr>
                            <td>{{ $procedimento->id }}</td>
                            <td>{{ $procedimento->title }}</td>
                            <td width="200">
                                <a class="btn btn-mini" href="{{ route('admin.procedimento.edit', [$procedimento] )}}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a class="btn btn-mini <?= ($procedimento->status == 1)? 'ativo': 'desativo'; ?>" href="{{ route('admin.procedimento.status', [$procedimento->id] )}}">
                                    <i class="fas fa-flag"></i>
                                </a>
                                <form method="post" action="{{ route('admin.procedimento.destroy', $procedimento) }}" style="display:inline;">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {!! csrf_field() !!}
                                    <button class="btn btn-mini" type="submit">
                                        <i class="fas fa-minus-circle red"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Mostra controle de paginação / Gera paginação automáticamente --}}
            {!! $procedimentos->render() !!}

        </div>
    </div>
@endsection
