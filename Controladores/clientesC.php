<?php  

class ClientesC{

	//Ver Lista de Clientes
	public function VerClientesC(){
		$tablaBD = "tbl_cmv_cliente";
		$respuesta = ClientesM::VerClientesM($tablaBD);

		foreach ($respuesta as $key => $value) {
			echo '<tr>
				<td>'.$value["id_cliente"].'</td>
                <td>'.$value["nombre"].'</td>
                <td>'.$value["rfc"].'</td>
                <td>'.$value["curp"].'</td>
                <td>'.$value["fecha_alta"].'</td>
                <td style="padding-top: 5px;">
                    <a class="btn btn-primary" href="/cajamorelia/cuentaClientes.php?cliente='.$value["id_cliente"].'" target="_blank"><i class="fa fa-eye"></i></a>
                    <button class="btn btn-success EditarCliente" Cid="'.$value["id_cliente"].'" data-toggle="modal" data-target="#EditarCliente"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger BorrarCliente" Cid="'.$value['id_cliente'].'"><i class="fa fa-trash"></i></button>
                </td>
                </tr>';

		}
	}
	// Fin Ver Lista de Clientes

	// Crear Cliente
	public function CrearClienteC(){

		if (isset($_POST["nombreN"])) {

			$tablaBD = "crear_cliente";

			$datosC = array("nombre" => $_POST["nombreN"], "apellido_paterno" => $_POST["apellido_paternoN"], "apellido_materno" => $_POST["apellido_maternoN"], "rfc" => $_POST["rfcN"], "curp" => $_POST["curpN"]);

			$respuesta = ClientesM::CrearClienteM($tablaBD, $datosC);

			if ($respuesta == true) {
					
			echo '<script>
					window.location = "clientes";
					</script>';

			}else{
				echo "Error al crear Cliente";
			}

		}

	}
	// Fin Crear Clientes

	//Llamar datos para editar cliente
	public function EClienteC($item, $valor){

		$tablaBD = "tbl_cmv_cliente";
		
		$respuesta = ClientesM::EClienteM($tablaBD, $item, $valor);

		return $respuesta;
		
	}
	// Fin Llamar Datos

	// Actualizar Datos del cliente
	public function ActualizarClienteC(){

		if (isset($_POST["Cid"])) {

			$tablaBD = "actualizar_cliente";

			$datosC = array("id_cliente"=>$_POST["Cid"], "nombre"=>$_POST["nombreE"], "apellido_paterno"=>$_POST["apellido_paternoE"], "apellido_materno"=>$_POST["apellido_maternoE"], "rfc"=>$_POST["rfcE"], "curp"=>$_POST["curpE"]);

			$respuesta = ClientesM::ActualizarClienteM($tablaBD, $datosC);

			if ($respuesta = true) {
				echo '<script>
					window.location = "clientes";
					</script>';
			}else{
				echo "ERROR AL ACTUALIZAR CLIENTE";
			}

		}
	}
	// Fin Actualizar Clientes

	// Eliminar Cliente
	public function BorrarClienteC(){

		if(isset($_GET["Cid"])){

		$tablaBD = "borrar_cliente";
		$datosC = $_GET["Cid"];

		$respuesta = ClientesM::BorrarClienteM($tablaBD, $datosC);

		if($respuesta == true){

			echo '<script>

					window.location = "clientes";
					</script>';

			}else{

				echo 'ERROR AL BORRAR CLIENTE';

			}

		}

	}
	// Fin Eliminar Cliente

}

?>