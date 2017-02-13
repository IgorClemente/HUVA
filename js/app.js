$(document).ready(function(){
	$('.name').mask({'translation': {S: {pattern: /[A-Za-z]/}}});
	$('.cep').mask('00000-000');
	$('.phone_with_ddd').mask('(00) 0000-0000');
	$('.celular').mask('(00) 0 0000-0000');
});