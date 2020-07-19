@extends('template.master')

@section('title', 'DISAM')
@section('description', 'Atuando desde o início no comércio e distribuição de insumos agrícolas, a DISAM firmou sua excelência no segmento ao expandir suas atividades no ano de 2002 para o recebimento, importação e exportação de cereais, além da produção de sementes de soja e trigo a partir de 2004.')
@section('canonical', '<link rel="canonical" href="">')

@section('content')
	<section>   
		<div class="loop owl-carousel owl-theme mb-50">
		    @foreach($banners as $b)
		        <div>    
					<picture>
						@if($b->image_mobile)
							<!-- <a href="{{ $b->url }}" title="{{ $b->legenda }}"> -->
	                        	<img class="img-fluid d-none d-sm-block" src="{{url('/')}}/upload/banners/original/{{ $b->image }}" alt="{{ $b->subtitle }}" >
								<img class="img-fluid d-block d-sm-none" src="{{url('/')}}/upload/banners-mobile/original/{{ $b->image_mobile }}" alt="{{ $b->subtitle }}">	

							<!-- </a>  -->
						@else
	                        <img class="img-fluid d-none d-sm-block" src="{{url('/')}}/upload/banners/original/{{ $b->image }}" alt="{{ $b->subtitle }}">
							<img class="img-fluid d-block d-sm-none" src="{{url('/')}}/upload/banners/original/{{ $b->image }}" alt="{{ $b->subtitle }}">	
						@endif
					</picture>
		        </div>
		    @endforeach
		</div> 
	</section>
	<section class="section-nossos-servicos" id="box-nossos-servicos-nav">
    	<div class="container">
    		<div class="row">
				<div class="col-12 col-sm-12 col-md-12">
					<div class="box-title">
						<h2>
							Nossos <strong> Serviços </strong>
						</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-4 col-md-4">
					<div class="box-servicos">
						<img src="{{url('/')}}/assets/img/seguranca-armada.jpg" alt="SEGURANÇA ARMADA">
						<h3>
							SEGURANÇA ARMADA
						</h3>
						<p>
							Lorem ipsum dolor sicon adipiscing elit. Etiam antferme ntubero eget rorem interdum.
						</p>
					</div>
				</div>
				<div class="col-12 col-sm-4 col-md-4">
					<div class="box-servicos">
						<img src="{{url('/')}}/assets/img/monitoramento.jpg" alt="MONITORAMENTO DIGITAL">
						<h3>
							MONITORAMENTO DIGITAL
						</h3>
						<p>
							Lorem ipsum dolor sicon adipiscing elit. Etiam antferme ntubero eget rorem interdum.
						</p>
					</div>
				</div>
				<div class="col-12 col-sm-4 col-md-4">
					<div class="box-servicos">
						<img src="{{url('/')}}/assets/img/limpeza.jpg" alt="LIMPEZA E JARDINAGEM">
						<h3>
							LIMPEZA E JARDINAGEM
						</h3>
						<p>
							Lorem ipsum dolor sicon adipiscing elit. Etiam antferme ntubero eget rorem interdum.
						</p>
					</div>
				</div>
    		</div>
    	</div>
	</section>
	<section class="section-sobre" id="box-valores-nav">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-12 col-sm-12 ">
					<div class="box-sobre">
						<h2>
							Missão
						</h2>
						<h3>
							Lorem ipsum dolor sit amet, consectetur.
						</h3>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tincidunt sit amet erat malesuada interdum. Aenean sodales dui quis leo fermentum scelerisque. Fusce condimentum dolor justo, ac tristique diam iaculis at.
						</p>
					</div>
					<img class="img-fluid d-none d-md-block" src="{{url('/')}}/assets/img/background-missao.jpg" alt="Dra. Juliana Martines"> 					
				</div>
			</div>
		</div>
	</section>
	<section class="section-unidade" id="box-unidades-nav">
		<div class="container">
			<div class="row">
    			<div class="col-12 col-sm-12">
					<h2>
						Unidade Vila Hortência <br>
						<span>Sorocaba-SP</span>
					</h2>
				</div>
			</div>
    		<div class="row">
    			<div class="col-12 col-sm-12 col-md-6 box-unidade">
					<img class="img-fluid d-block" src="{{url('/')}}/assets/img/unidade-sorocaba.jpg" alt="Unidade Sorocaba">
					<h3>
						SOROCABA
					</h3> 
				</div>
				<div class="col-12 col-sm-12 col-md-3 box-unidade">
    				<img class="img-fluid d-block" src="{{url('/')}}/assets/img/unidade-sao-paulo.jpg" alt="Unidade São Paulo"> 
					<h3>
						SÃO PAULO
					</h3> 
				</div>
				<div class="col-12 col-sm-12 col-md-3 box-unidade">
    				<img class="img-fluid d-block" src="{{url('/')}}/assets/img/unidade-sorocaba2.jpg" alt="Unidade Sorocaba 2"> 
					<h3>
						SOROCABA 2
					</h3> 
				</div>
			</div>
		</div>
	</section>
	<section class="section-form" id="box-contato-nav">
		<div class="container">
			<div class="row">	
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 box-form">
					<h2>
						Contato
					</h2>
					<form class="form-horizontal" method="POST" data-grecaptcha-action="message" action="{{url('/')}}/post-contato">
						{!! csrf_field() !!}
						<div class="form-group">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<input type="text" class="form-control" name="nome" placeholder="*Nome:" maxlength="255"  value="{{ old('nome') }}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<input type="text" class="form-control" name="email" placeholder="*E-mail:" maxlength="255" value="{{ old('email') }}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<input type="text" class="form-control" name="assunto" placeholder="*Assunto:" maxlength="255" value="{{ old('assunto') }}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-15">
									<textarea class="form-control" rows="5" name="mensagem" placeholder="*Mensagem:">{{ old('mensagem') }}</textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row justify-content-sm-center">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<input type="submit" class="btn btn-enviar transition03" value="Enviar">
								</div>
							</div>
						</div>
					</form>
					@if (count($errors) > 0)
						<div class="modal fade in" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></br>
									</div>
	
									<div class="modal-body">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="alert alert-danger">
												<ul>
													@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										</div>
										<div class="clear"></div>     
									</div>
								</div>
							</div>
						</div>
					@endif
	
					@if(Session::has('sucesso'))
						<div class="modal fade in" id="modalSucesso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></br>
									</div>
									<div class="modal-body">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="alert alert-success">{{Session::get('sucesso')}}</div>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
						</div>
					@endif
				</div>	
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 content-telefone">
					<div class="box-telefone">
						<h3>
							Telefone
						</h3>
						<i class="fa fa-whatsapp"></i>
						<a href="">
							+15  3326-0008
						</a>	<br>
						<a href="">
							+15  98120-0560
						</a>
					</div>	
					<div class="box-telefone">
						<h3>
							E-mail 
						</h3>
						<i class="fas fa-envelope"></i>
						<a href="">
							diretoria@grupoarf.com.br
						</a><br>
						<a href="">
							comercial@grupoarf.com.br
						</a><br>
						<a href="">
							comercial@grupoarf.com.br
						</a>
					</div>	
					<div class="box-telefone ultimo">
						<h3>
							Rede Social
						</h3>
						<div class="row">
							<div class="col-12 col-sm-6">
								<a href="">
									<i class="fab fa-facebook-square"></i> grupoarf
								</a><br>
								<a href="">
									<i class="fab fa-instagram"></i> @grupoarf
								</a><br>
							</div>
							<div class="col-12 col-sm-6">
								<a href="">
									<i class="fab fa-youtube"></i> grupoarf
								</a><br>
								<a href="">
									<i class="fab fa-twitter"></i> @grupoarf
								</a>
							</div>
						</div>
					</div>	
				</div>		
			</div>
		</div>
	</section>
@endsection

@section('script')
	<script type="text/javascript">
		$(function() {
			$('.loop').owlCarousel({
				loop:false,
				margin:0,
				responsiveClass:true,
				dots:true,
				nav:false,
				autoplay:true,
				autoplayTimeout:3000,
				autoplayHoverPause:true,
				navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
				smartSpeed: 1000,
				responsive:{
					0:{
						items:1,
						nav:true,
						dots:false,
					},
					600:{
						items:1,
						nav:true,
						dots:true,
					},
					1000:{
						items:1,
						nav:false,
						dots:true,
					}
				}
			});

			$('#modalSucesso, #modalError').modal('show');
			$('#modalSucesso, #modalError').on('hidden.bs.modal', function (e) {
				positionPage = $('#formularioInteresse').offset().top - 70;
				$('html, body').animate({
					scrollTop: positionPage
				}, 1000);
				return false;
			});

			$(function() { 
				var phone = $('#telefone, #celular');
				phone.focusin(function() { 
					phone.mask("(99) 99999999?9"); 
				});
				phone.focusout(function() {
						var phone;
						var element;

						element = $(this);
						element.unmask();
						phone = element.val().replace(/\D/g, '');

						if (phone.length > 10) {
							element.mask("(99) 99999-999?9");
						} else {
							element.mask("(99) 9999-9999?9");
						}
				}).trigger('focusout');
			});	

		});
	</script>
@endsection