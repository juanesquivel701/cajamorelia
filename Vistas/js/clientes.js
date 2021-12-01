//Llamar Datos para editar cliente
$(".TB").on("click", ".EditarCliente", function(){

	var Cid = $(this).attr("Cid");
	var datos = new FormData();

	datos.append("Cid", Cid);

	$.ajax({

		url: "Ajax/clientesA.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			//DATOS DE ADMINISTRADOR
			$("#Cid").val(respuesta["id_cliente"]);
			$("#nombreE").val(respuesta["nombre"]);
			$("#apellido_paternoE").val(respuesta["apellido_paterno"]);
			$("#apellido_maternoE").val(respuesta["apellido_materno"]);
			$("#rfcE").val(respuesta["rfc"]);
			$("#curpE").val(respuesta["curp"]);	 

		}
	})

})
// Fin Llamar Datos

//Borrar Admin
$(".TB").on("click", ".BorrarCliente", function(){

	var Cid = $(this).attr("Cid");

	window.location = "index.php?url=clientes&Cid="+Cid;

})