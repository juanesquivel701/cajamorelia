//Llamar Datos para editar tipo cuenta
$(".TB").on("click", ".EditarTCuenta", function(){

	var TCid = $(this).attr("TCid");
	var datos = new FormData();

	datos.append("TCid", TCid);

	$.ajax({

		url: "Ajax/tipoCuentaA.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			//DATOS DE ADMINISTRADOR
			$("#TCid").val(respuesta["id_cuenta"]);
			$("#nombre_cuentaE").val(respuesta["nombre_cuenta"]);	 

		}
	})

})
// Fin Llamar Datos

//Borrar tipo cuenta
$(".TB").on("click", ".BorrarTCuenta", function(){

	var TCid = $(this).attr("TCid");

	window.location = "index.php?url=tipoCuenta&TCid="+TCid;

})