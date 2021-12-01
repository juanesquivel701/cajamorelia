<?php  

require_once "ConexionBD.php";

class ClientesM extends ConexionBD{

	//Ver Lista de Clientes
	static public function VerClientesM($tablaBD){
		$pdo = ConexionBD::cBD()->prepare("SELECT id_cliente, concat(nombre, ' ', apellido_paterno, ' ', apellido_materno) as nombre, rfc, curp, fecha_alta FROM $tablaBD");
		$pdo -> execute();
		
		return $pdo -> fetchAll();
		
		$pdo -> close();
		$pdo = null;
	}
	// Fin Ver Lista de Clientes

	// Crear Cliente
	static public function CrearClienteM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("CALL $tablaBD(:nombre, :apellido_paterno, :apellido_materno, :rfc, :curp);");

		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido_paterno", $datosC["apellido_paterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido_materno", $datosC["apellido_materno"], PDO::PARAM_STR);
		$pdo -> bindParam(":rfc", $datosC["rfc"], PDO::PARAM_STR);
		$pdo -> bindParam(":curp", $datosC["curp"], PDO::PARAM_STR);

		if ($pdo -> execute()) {
			return true;
		}else{
			return false;
		}

		$pdo->close();
		$pdo = null;
		
	}
	// Fin Crear Cliente

	//Llamar Datos del cliente a editar
	static public function EClienteM($tablaBD, $item, $valor){

		if($item != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item");

			$pdo -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();
		$pdo = null;

	}
	// Fin Llamar Datos

	// Actualizar Clientes
	static public function ActualizarClienteM($tablaBD, $datosC){
		$pdo = ConexionBD::cBD()->prepare("CALL $tablaBD (:nombre, :apellido_paterno , :apellido_materno, :rfc, :curp, :id_cliente);");

		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido_paterno", $datosC["apellido_paterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido_materno", $datosC["apellido_materno"], PDO::PARAM_STR);
		$pdo -> bindParam(":rfc", $datosC["rfc"], PDO::PARAM_STR);
		$pdo -> bindParam(":curp", $datosC["curp"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_cliente", $datosC["id_cliente"], PDO::PARAM_INT);

		if($pdo -> execute()){

			return true;

		}else{

			return false;

		}

		$pdo -> close();
		$pdo = null; 
	}
	// Fin Actualizar Cliente

	// Eliminar Cliente
	static public function BorrarClienteM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("CALL $tablaBD(:id_cliente);");

		$pdo -> bindParam(":id_cliente", $datosC, PDO::PARAM_INT);

		if ($pdo -> execute()) {
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;
	}
	// Fin Eliminar Cliente

}

?>