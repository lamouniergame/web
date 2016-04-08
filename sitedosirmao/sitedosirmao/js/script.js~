$(document).ready(function(e){
	$(".menuPrincipal a ").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
	});
});

function verifica(){
	var teste = 0;
	var validou = 0;
	var nome = document.querySelector("#nome").value.split(' ');
	var email = document.querySelector("#email").value.split('@');
	
	var fnome = nome[0];
	var snome = nome[1];
	var fmail = email[0];
	var smail = email[1];
	
	if((fnome.length < 3) && (snome.length < 4)){
		alert("Verificar campos obrigatórios");	
	}
	
	if((fmail.length < 3) && (smail.length < 4)){
		alert("Verificar campos obrigatórios");	
	}
}