<?php  

class CuentaClientesC{

	//Ver Lista de Cuenta de Clientes
	public function VerCuentaClientesC(){
		$tablaBD = "tbl_cmv_cliente_cuenta";
		$respuesta = CuentaClientesM::VerCuentaClientesM($tablaBD);

		foreach ($respuesta as $key => $value) {
			echo '<tr>
				<td>'.$value["id_cliente_cuenta"].'</td>
                <td>$'.number_format($value["saldo_actual"]).'</td>
                <td>'.$value["fecha_contratacion"].'</td>
                <td>'.$value["fecha_ultimo_movimiento"].'</td>
                <td style="padding-top: 5px;">
                    <button class="btn btn-danger BorrarCCliente" CCid="'.$value['id_cliente_cuenta'].'"><i class="fa fa-trash"></i></button>
                </td>
                </tr>';

		}
	}
	// Fin Ver Lista de Cuenta de Clientes

	// Ver ID del Cliente
	public function VerIdClientesC(){

		$tablaBD = "tbl_cmv_cliente";

		$respuesta = CuentaClientesM::VerIdClientesM($tablaBD);

		foreach ($respuesta as $key => $value) {
			echo '<option>'.$value["id_cliente"]." - ".$value["nombre"].'</option>';
		}

	}
	// Fin ID cliente

	// Ver ID del Cuenta
	public function VerIdCuentaC(){

		$tablaBD = "cat_cmv_tipo_cuenta";

		$respuesta = CuentaClientesM::VerIdCuentaM($tablaBD);

		foreach ($respuesta as $key => $value) {
			echo '<option>'.$value["id_cuenta"]." - ".$value["nombre_cuenta"].'</option>';
		}

	}
	// Fin ID Cuenta

	// Crear Cuenta Clientes
	public function CrearCuentaClientesC(){

		if (isset($_POST["saldo_actualN"])) {

			$tablaBD = "crear_cliente_cuenta";

			$datosC = array("id_cliente" => $_POST["clienteN"], "id_cuenta" => $_POST["cuentaN"], "saldo_actual" => $_POST["saldo_actualN"], "fecha_contratacion" => $_POST["fecha_contratacionN"]);

			$respuesta = CuentaClientesM::CrearCuentaClientesM($tablaBD, $datosC);

			if ($respuesta == true) {
					
			echo '<script>
					window.location = "cuentaCliente";
					</script>';

			}else{
				echo "Error al crear Cuenta Cliente";
			}

		}

	}
	// Fin Crear Cuenta Clientes

	// Eliminar Cuenta Cliente
	public function BorrarCuentaClientesC(){

		if(isset($_GET["CCid"])){

		$tablaBD = "borrar_cliente_cuenta";
		$datosC = $_GET["CCid"];

		$respuesta = CuentaClientesM::BorrarCuentaClientesM($tablaBD, $datosC);

		if($respuesta == true){

			echo '<script>

					window.location = "cuentaCliente";
					</script>';

			}else{

				echo 'ERROR AL BORRAR CUENTA CLIENTE';

			}

		}

	}
	// Fin Eliminar Cuenta Cliente

}

?>