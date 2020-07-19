@extends('template.admin')

@section('content')
    <div class="row">
        <div class="span12">
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.posts.create')}}" role="button">Cadastrar</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome</th>
                      <th>Recursos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td width="200">
                                <a class="btn btn-mini" href="{{ route('admin.posts.edit', [$post] )}}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a class="btn btn-mini <?= ($post->status == 1)? 'ativo': 'desativo'; ?>" href="{{ route('admin.posts.status', [$post->id] )}}">
                                    <i class="fas fa-flag"></i>
                                </a>
                                <form method="post" action="{{ route('admin.posts.destroy', $post) }}" style="display:inline;">
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
            {!! $posts->render() !!}

        </div>
    </div>
@endsection
