@extends('template.admin')

@section('content')
    <div class="row">
        <div class="span12">
            <a class="btn btn-info btn-cadastrar" style="float: right;" href="{{ route('admin.banner.create')}}" role="button">Cadastrar</a>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                      <!-- <th>#</th> -->
                      <th>Imagem</th>
                      <th>Legenda</th><!-- 
                      <th>Categoria</th> -->
                      <th>Recursos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr>
                            <!-- <td>{{ $banner->id }}</td> -->
                            <td><img src="{{ url('/') }}/upload/banners/thumb/{{ $banner->image }}"> </td>
                            <td>{{ $banner->subtitle }}</td>
                            
                            <td>
                                <a class="btn btn-mini" href="{{ route('admin.banner.edit', [$banner] )}}">Editar</a>
                                <form method="post" action="{{ route('admin.banner.destroy', $banner) }}" style="display:inline;">
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
            {!! $banners->render() !!}

        </div>
    </div>
@endsection
