//Borrar Cuenta Cliente
$(".TB").on("click", ".BorrarCCliente", function(){

	var CCid = $(this).attr("CCid");

	window.location = "index.php?url=cuentaCliente&CCid="+CCid;

})