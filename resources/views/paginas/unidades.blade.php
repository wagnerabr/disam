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
				@for ($i = 0; $i < 16; $i++)
				    <div class="col-md-6 box-unidade">
					    <img src="{{url('/')}}/assets/img/unidade.jpg" alt="Cascavel - Cachoeira Alta {{ $i }}" class="img-responsive img-unidade">
					    <h3>Cascavel - Cachoeira Alta {{ $i }}</h3>
					    <p>
					    	Lorem ipsum dolor sit amet, consectetur.<br>
					    	<i class="fas fa-phone-alt"></i> <a href="">(45) 3112-4237</a>
					    </p>
				    </div>
				@endfor
			</div>
		</div>
	</section>
@endsection

@section('script')
	<script type="text/javascript">
	</script>
@endsection