@extends('template.master')

@section('title', 'DISAM')
@section('description', 'Atuando desde o início no comércio e distribuição de insumos agrícolas, a DISAM firmou sua excelência no segmento ao expandir suas atividades no ano de 2002 para o recebimento, importação e exportação de cereais, além da produção de sementes de soja e trigo a partir de 2004.')
@section('canonical', '<link rel="canonical" href="">')

@section('content')
	<section class="unidades">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Nossa Unidades</h2>
				</div>
			</div>
			<div class="row">
				@foreach ($unidades as $unidade)	
					<div class="col-md-6 box-unidade">
						<img src="{{url('/')}}/upload/unidades/media/{{ $unidade->image }}" alt="{{ $unidade->title }}" class="img-responsive img-unidade">
						<h3>{{ $unidade->title }}</h3>
						<p>
							{{ $unidade->description }}<br>
							<i class="fas fa-phone-alt"></i> {{ $unidade->phone }}
						</p>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@endsection

@section('script')
	<script type="text/javascript">
	</script>
@endsection