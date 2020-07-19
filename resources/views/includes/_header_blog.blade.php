<header class="header-principal">	
	<nav class="navbar navbar-expand-lg navbar-light ">
	  <div class="container box-principal-menu">
		  <a class="navbar-brand" href="./" title="Celmar Moveis Planejados">
		  		<img class="img-fluid img-logo" alt="Celmar Moveis Planejados" src="{{ url('/') }}/assets/img/logo.png">
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse box-menu-link" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-item nav-link <?php if (!$param1) echo 'active'; ?>" href="{{ url('/') }}/">Home <span class="sr-only">(current)</span></a> 
		      <a class="nav-item nav-link <?php if ($param1 == 'ambientes') echo 'active'; ?>" href="{{ url('/') }}/blog">Posts</a>
		      <a class="nav-item nav-link <?php if ($param1 == 'projetos') echo 'active'; ?>" href="{{ url('/') }}/quem-somos">Quem Somos</a>
		      <a class="nav-item nav-link <?php if ($param1 == 'contato') echo 'active'; ?>" href="{{ url('/') }}/contato">Contato</a>
		    </div>
		  </div>
	  </div>
	</nav>
</header>
<div class="area-central-relacionamento" id="central-relacionamento">
	<a href="{{ url('/') }}/contato" class="transition03 link box-whatsapp">
		<i class="fa fa-envelope"></i>
		<small class="aviso">
			Solicite um <br>
			Orçamento
		</small>
	</a>
</div> 
