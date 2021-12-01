<?php  
// Llamar Datos cliente
require_once "../Controladores/clientesC.php";

require_once "../Modelos/clientesM.php";

class ClientesA{

	public $Cid;

	public function EClienteA(){

		$item = "id_cliente";
		$valor = $this->Cid;

		$respuesta = ClientesC::EClienteC($item, $valor);

		echo json_encode($respuesta);

	}

}

if(isset($_POST["Cid"])){

	$editarCliente = new ClientesA();
	$editarCliente -> Cid = $_POST["Cid"];
	$editarCliente -> EClienteA();

}

?>