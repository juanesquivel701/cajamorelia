<?php 

class TipoCuentaC{

	//Ver tipo cuenta
	public function VerTipoCuentaC(){
		$tablaBD = "cat_cmv_tipo_cuenta";
		$respuesta = TipoCuentaM::VerTipoCuentaM($tablaBD);

		foreach ($respuesta as $key => $value) {
			echo '<tr>
				<td>'.$value["id_cuenta"].'</td>
                <td>'.$value["nombre_cuenta"].'</td>
                <td style="padding-top: 5px;">
                    <button class="btn btn-success EditarTCuenta" TCid="'.$value["id_cuenta"].'" data-toggle="modal" data-target="#EditarTCuenta"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger BorrarTCuenta" TCid="'.$value['id_cuenta'].'"><i class="fa fa-trash"></i></button>
                </td>
                </tr>';

		}
	}
	// Fin ver tipo cuenta

	// Crear Tipo Cuenta
	public function CrearTipoCuentaC(){

		if (isset($_POST["nombre_cuentaN"])) {

			$tablaBD = "cat_cmv_tipo_cuenta";

			$datosC = array("nombre_cuenta" => $_POST["nombre_cuentaN"]);

			$respuesta = TipoCuentaM::CrearTipoCuentaM($tablaBD, $datosC);

			if ($respuesta == true) {
					
			echo '<script>
					window.location = "tipoCuenta";
					</script>';

			}else{
				echo "Error al crear Tipo de Cuenta";
			}

		}

	}
	// Fin Crear Tipo Cuenta

	//Llamar datos para editar tipo de cuenta
	public function ETipoCuentaC($item, $valor){

		$tablaBD = "cat_cmv_tipo_cuenta";
		
		$respuesta = TipoCuentaM::ETipoCuentaM($tablaBD, $item, $valor);

		return $respuesta;
		
	}
	// Fin Llamar Datos

	// Actualizar Datos de tipo cuenta
	public function ActualizarTipoCuentaC(){

		if (isset($_POST["TCid"])) {

			$tablaBD = "cat_cmv_tipo_cuenta";

			$datosC = array("id_cuenta"=>$_POST["TCid"], "nombre_cuenta"=>$_POST["nombre_cuentaE"]);

			$respuesta = TipoCuentaM::ActualizarTipoCuentaM($tablaBD, $datosC);

			if ($respuesta = true) {
				echo '<script>
					window.location = "tipoCuenta";
					</script>';
			}else{
				echo "ERROR AL ACTUALIZAR TIPO DE CUENTA";
			}

		}
	}
	// Fin Actualizar tipo cuenta

	// Eliminar Cliente Tipo Cuenta
	public function BorrarTipoCuentaC(){

		if(isset($_GET["TCid"])){

		$tablaBD = "cat_cmv_tipo_cuenta";
		$datosC = $_GET["TCid"];

		$respuesta = TipoCuentaM::BorrarTipoCuentaM($tablaBD, $datosC);

		if($respuesta == true){

			echo '<script>

					window.location = "tipoCuenta";
					</script>';

			}else{

				echo 'ERROR AL BORRAR TIPO DE CUENTA';

			}

		}

	}
	// Fin Eliminar Tipo Cuenta

}

?>