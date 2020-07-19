@extends('template.master')

@section('title', 'Sobre | Dra Juliana Ruthes Martines - Dermatologia com ênfase em cosmiatria')
@section('description', 'Clínica médica especializada em procedimentos estéticos é pioneiro(a) em Clínica de estética na área de São Paulo, oferecendo uma variedade de serviços de estilo, e produtos para deixar você com o visual que deseja.')
@section('canonical', '<link rel="canonical" href="sobre">')

@section('content')
	<section class="section-pagina-sobre">
    	<div class="container">
    		<div class="row">
				<div class="col-12 col-sm-12 col-md-12">
                    <div class="box-content-sobre">
                        <h1>
                            Dra Juliana<br>
                            Ruthes Martines
                        </h1>
                        <h2>
                            DERMATOLOGIA COM <br>
                            ÊNFASE EM COSMIATRIA
                        </h2>
                    </div>
				</div>
            </div>
    	</div>
	</section>
	{{-- <section class="section-pagina-sobre">
    	<div class="container">
            <div class="row">
				<div class="col-12 col-sm-12 col-md-12">
                    <div class="box-text-sobre">
                        <p>
                            Dra. Juliana Ruthes Martines, médica formada pela Puc Campinas no ano de 2007, especialista em Dermatologia com ênfase em estética e Especialista em ultrassonografia, que ajuda no diagnóstico, quanto guia procedimentos de maior risco. <br><br>
                            Realizou diversas imersões e especializações em cursos direcionados, em destaque para o curso de Anatomia em Cadáver Fresco pela Universidade de Lisboa. <br><br>
                            Sempre atualizada nas novidades do mercado com participações em congressos internacionais com o IMCAS em Paris. <br><br>
                            Trabalha com os mais modernos tratamentos e equipamentos estéticos, através de métodos não invasivos e protocolos combinados, que trazem resultados eficientes para a melhora da autoestima das pacientes.
						</p>
						<img class="img-fluid" src="{{url('/')}}/assets/img/dra-juliana-mobile.png" alt="Dra. Juliana Martines">
                    </div>
				</div>
    		</div>
    	</div>
	</section> --}}
	<section class="section-sobre page-sobre">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-12 col-sm-12 no-padding">
					<img class="img-fluid d-none d-md-block" src="{{url('/')}}/assets/img/dra-juliana.png" alt="Dra. Juliana Martines"> 
					<img class="img-fluid d-block d-sm-block d-md-none" src="{{url('/')}}/assets/img/dra-juliana-mobile.png" alt="Dra. Juliana Martines"> 
					<div class="box-sobre">
						<p>
							Dra. Juliana Ruthes Martines, médica formada pela Puc Campinas no ano de 2007, especialista em Dermatologia com ênfase em cosmiatria pela faculdade ISMD e imersão em Medicina Estética pela BWS em SP. 
							<br>
							Dentre outros conhecimentos aprofundou-se na área de Radiologia, com especialidade em ultrassonografia, que requer estudos específicos e detalhados da anatomia humana, o que permite uma análise mais minuciosa, possibilitando extrair melhores resultados para o paciente, visando facilitar o diagnóstico em casos específicos e guiar procedimentos de maior risco com o ultrassom.
							<br>
							Possui larga experiência de atuação nos principais hospitais e centros médicos da cidade de SP, como Fleury, Hcor, Samaritano dentre outros.
							<br>
							Realizou diversas imersões e especializações em cursos direcionados e diferenciados.
							<br>
							Sempre atualizada nas novidades do mercado, com participações em congressos nacionais e internacionais como IMCAS - Dermatology & Plastic Surgery - e RSNA (Radiological Society of North America).
							<br>
							Trabalha com os mais modernos tratamentos e equipamentos estéticos, através de métodos não invasivos e protocolos combinados, que trazem resultados eficientes para a melhora da autoestima das pacientes.
						</p>
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