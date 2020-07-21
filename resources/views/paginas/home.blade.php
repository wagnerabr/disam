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


	<section class="section-institucional" id="box-institucional-nav">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<img src="{{url('/')}}/assets/img/sobre-nos.png" alt="Nossa Unidades" class="img-responsive">
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<h2>SOBRE NÓS</h2>
				<p>
					Atuando desde o início no comércio e distribuição de insumos agrícolas, a DISAM firmou sua excelência no segmento ao expandir suas atividades no ano de 2002 para o recebimento, importação e exportação de cereais, além da produção de sementes de soja e trigo a partir de 2004.<br>
					A partir daí a empresa se consolidou no mercado em que atua tornando-se uma referencia no fornecimento de produtos, assistência técnica e credibilidade no ramo agrícola.
				</p>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-5">
							<img src="{{url('/')}}/assets/img/missao.png" alt="Missão" class="img-responsive">
						</div>
						<div class="col-md-9 col-sm-8 col-xs-7">
							<h3>Missão</h3>
							<p>“Fornecer produtos e serviços de alta tecnologia e qualidade, que auxiliem na produção e comercialização de alimentos, visando a satisfação de nossos clientes e o respeito ao meio ambiente”.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-5">
							<img src="{{url('/')}}/assets/img/visao.png" alt="Visão" class="img-responsive">
						</div>
						<div class="col-md-9 col-sm-8 col-xs-7">
							<h3>Visão</h3>
							<p>“Ser reconhecida como uma empresa líder do agronegócio brasileiro, desenvolvendo os melhores produtos e serviços com a mais moderna tecnologia para agricultura”.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-5">
							<img src="{{url('/')}}/assets/img/valores.png" alt="Valores" class="img-responsive">
						</div>
						<div class="col-md-9 col-sm-8 col-xs-7">
							<h3>Valores</h3>
							<p>Responsabilidade Social, Respeito ao meio ambiente, Honestidade e Compromisso com seus clientes e colaboradores.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<img src="{{url('/')}}/assets/img/banner-home.png" alt="Responsabilidade Social" class="img-responsive" width="100%">
	</section>


	<section class="section-cotacoes" id="box-cotacoes-nav">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6">
    				<h2>Cotações: <span>10/07/2020</span></h2>
    				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod dignissim dictum. Mauris arcu leo, blandit quis vestibulum ac, lacinia quis dolor.</p>
    			</div>
    			<div class="col-md-6">
    				<div class="row">
    					<div class="col-md-6">
    						<img src="{{url('/')}}/assets/img/trigo.png" alt="Cotação Trigo" class="img-responsive">
    						<h3>Trigo</h3>
    						<h4>R$ 58,00</h4>
    					</div>
    					<div class="col-md-6">
    						<img src="{{url('/')}}/assets/img/soja.png" alt="Cotação Soja" class="img-responsive">
    						<h3>Soja</h3>
    						<h4>R$ 100,00</h4>
    					</div>
    					<div class="col-md-6">
    						<img src="{{url('/')}}/assets/img/dolar.png" alt="Cotação Dolar" class="img-responsive">
    						<h3>Dolar</h3>
    						<h4>R$ 5,2978</h4>
    					</div>
    					<div class="col-md-6">
    						<img src="{{url('/')}}/assets/img/milho.png" alt="Cotação Milho" class="img-responsive">
    						<h3>Milho</h3>
    						<h4>R$ 41,50</h4>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
	</section>

	<section class="section-noticias" id="box-noticias-nav">
		<div class="container">
			<div class="row">
				<h2><span>ÚLTIMAS</span>NOTÍCIAS</h2>
			</div>
			<div class="row carousel-noticias">
				@for ($i = 0; $i < 9; $i++)
				    <article>
				    	<a href="#">
					    	<img src="{{url('/')}}/assets/img/noticia.png" alt="NOTICIA" class="img-responsive">
					    	<h3>Título Aqui {{ $i }}</h3>
					    	<p>Lorem ipsum dolor sit amet, consectetur.</p>
				    	</a>
				    </article>
				@endfor
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

			$('.carousel-noticias').owlCarousel({
				loop:false,
				margin:20,
				responsiveClass:true,
				dots:true,
				nav:false,
				autoplay:false,
				autoplayTimeout:3000,
				autoplayHoverPause:true,
				smartSpeed: 1000,
				responsive:{
					0:{
						items:1,
						nav:true,
						dots:false,
						slideBy: 1,
					},
					600:{
						items:2,
						nav:false,
						dots:true,
						slideBy: 2,
						dotsEach: 2,
					},
					1000:{
						items:3,
						nav:false,
						dots:true,
						slideBy: 3,
						dotsEach: 3,
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