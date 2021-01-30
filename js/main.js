/*DESPLEGAR BARSIDE*/
$("#wrapper").click( function() {
	$(".menu-hamburger").toggleClass("close");
});
$(".oscuro").click( function() {
	$(".menu-hamburger").toggleClass("close");
});



$("#menu-toggle").click(function (e){
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});


/*MOSTRAR IMAGEN DE PERFIL*/
function validarExt()
{
	var BtnFotoPerfil = document.getElementById('BtnFotoPerfil');
	var	archivoRuta = BtnFotoPerfil.value;
	var extPermitidas = /(.pdf)$/i;
}