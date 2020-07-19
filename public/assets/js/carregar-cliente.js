var Cliente = {
	cpf : null,
	agencia : null,
	btn : null,
	conteudo : null,

	init : function (){
		this.btn = $('#btn_mais');

		$(document).on('click', "button#btn_mais", Cliente.carregaNovoBox);

		//$(document).on("click", "a.offsite", function () {
	},

	carregaNovoBox : function () {
		$.ajax({
		    type: 'GET',
		    url: "../busca-agencias",
		    data: 1,
		    enctype: 'multipart/form-data',
		    success: function(data){
		        $(".conteudo").append(data);
		    },
		    error: function(){
		        alert('Erro no Ajax !');
		    }
		});

	}
};