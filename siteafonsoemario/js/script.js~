$(document).ready(function(e){
	$("#dialogo").hide();
	$(".menuPrincipal a ").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
	});
	$(".sobre").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
		$(".comentario").hide();
		$(".menuPrincipal").hide();
	});
	$(".links").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
		$(".comentario").hide();
		$(".menuPrincipal").hide();
	});
});

function dialogo() {
	$("#dialogo").dialog({
			modal:true,
			resizable:false,
			width:400,
			height:200,
		buttons: {
	"Confirma": function(){
	$(this).dialog("close");
	verifica();
		},
	Cancelar: function(){
		$(this).dialog("close");
		}
		}
	});
};

function verifica(){
	var testen = 0;
	var validou = 0;

	var nome = document.querySelector("#nome").value;
	var email = document.querySelector("#email").value;

	for (var i=0; i<nome.length; i++){
		if(nome[i]== " "){
		testen= 1;
		}
	}

	for (var i=0; i<email.length; i++){
		if(email[i]== "@"){
		validou= 1;
		}
	}
	if(testen==1){
		var nome = document.querySelector("#nome").value.split(' ');
		var fnome = nome[0];
		var snome = nome[1];


		if(fnome.length < 3){
			var teste = 1;	
		}
		if(snome.length < 4){
			var teste = 1;	
		}
	}else{
			var teste = 1;	
	 }

	if(validou==1){	
		var email = document.querySelector("#email").value.split('@');

		var fmail = email[0];
		var smail = email[1];

		if(fmail.length < 3){
			var teste = 1;	
		}
		if(smail.length < 4){
			var teste = 1;		
		}
	}else{
			var teste = 1;	
	 }
	 if(teste== 1){
		alert("Verificar os campos obrigatorio!")	 
	 }
}
