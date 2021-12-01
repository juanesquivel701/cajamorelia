<?php  
// Llamar Datos tipo de cuenta
require_once "../Controladores/tipoCuentaC.php";

require_once "../Modelos/tipoCuentaM.php";

class TipoCuentaA{

	public $TCid;

	public function ETipoCuentaA(){

		$item = "id_cuenta";
		$valor = $this->TCid;

		$respuesta = TipoCuentaC::ETipoCuentaC($item, $valor);

		echo json_encode($respuesta);

	}

}

if(isset($_POST["TCid"])){

	$editarTCuenta = new TipoCuentaA();
	$editarTCuenta -> TCid = $_POST["TCid"];
	$editarTCuenta -> ETipoCuentaA();

}

?>