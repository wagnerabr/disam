@extends('template.master')

@section('title', 'Contato | Dra Juliana Ruthes Martines - Dermatologia com ênfase em cosmiatria')
@section('description', 'Clínica médica especializada em procedimentos estéticos é pioneiro(a) em Clínica de estética na área de São Paulo, oferecendo uma variedade de serviços de estilo, e produtos para deixar você com o visual que deseja.')
@section('canonical', '<link rel="canonical" href="contato">')

@section('content')
	<section class="section-page-contato mb-60">
    	<div class="container">
    		<div class="row">
    			<div class="col-12 col-sm-12 banner-contato">
	    			<h1>
	    				Contato
	    			</h1>
    			</div>
    		</div>
    	</div>
    </section>
    <div class="container">
		<div class="row">
			<div class="col-12 divisor">
			</div>
		</div>
	</div>
	<section class="section-mapa mb-60">
		<div class="container">
			{{-- <div class="row">
				<div class="col-12 col-sm-12 col-md-10 offset-md-1">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nisl arcu, venenatis vitae justo fringilla, aliquet ornare ante.
					</p>
				</div>
			</div> --}}
			
			<div class="row">
				<div class="col-12 col-sm-12 col-md-10 offset-md-1">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-4 box-contato">
							<h2>
								contato <br>
								<span>Endereço</span>
							</h2>
						</div>
						<div class="col-12 col-sm-12 col-md-4 box-contato">
							<ul class="box-atendimento">
								<li>
									<i class="fab fa-facebook-square"></i> 
									<a href="https://www.facebook.com/Dra-Juliana-Mancini-Ruthes-Martines-107620443970049/" target="_blank">
										Dra. Juliana Ruthes Martines
									</a>
								</li>
								<li>
									<i class="fab fa-instagram"></i> 
									<a href="https://www.instagram.com/dra.julianaruthesmartines/" target="_blank">
										@dra.julianaruthesmartines
									</a>
								</li>
								<li>
									<i class="fab fa-whatsapp"></i> 
									<a href="">
										(11) 99381 0307
									</a>
								</li>
							</ul>
						</div>
						<div class="col-12 col-sm-12 col-md-4">
							<ul class="box-atendimento">
								<li>
									<span>Atendimento <span>Horário</span></span>
								</li>
								<li>
									Seg - Sex: 9:00 - 18:00
								</li>
								<li>
									Sáb: 10:00 - 14:00
								</li>
								<li>
									Dom: fechado
								</li>
							</ul>
							
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-10 offset-md-1">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-6 mb-60">
							{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.380448881235!2d-47.4447743855451!3d-23.482802364579797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf600696cc495b%3A0x1442e54ffb8e5e3!2sR.%20Aparecida%2C%202071%20-%20Jardim%20Santa%20Ros%C3%A1lia%2C%20Sorocaba%20-%20SP%2C%2018095-000!5e0!3m2!1spt-BR!2sbr!4v1584027803197!5m2!1spt-BR!2sbr" width="100%" height="240" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14635.884557582849!2d-46.84614!3d-23.497549000000003!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe7def5d950d72a4!2sPravda%20-%20Edif%C3%ADcio%20de%20Consult%C3%B3rios!5e0!3m2!1spt-BR!2sbr!4v1586804563176!5m2!1spt-BR!2sbr" width="100%" height="240" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
						<div class="col-12 col-sm-12 col-md-6 mb-60">
							<img class="img-fluid" src="{{url('/')}}/assets/img/pravda.jpg" alt="Pravda Alphaville">
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
			$('#modalSucesso, #modalError').modal('show');
			$('#modalSucesso, #modalError').on('hidden.bs.modal', function (e) {
				positionPage = $('#formularioInteresse').offset().top - 70;
				$('html, body').animate({
					scrollTop: positionPage
				}, 1000);
				return false;
			});

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
	</script>
@endsection