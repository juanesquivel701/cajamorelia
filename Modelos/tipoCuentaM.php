<?php  

require_once "ConexionBD.php";

class TipoCuentaM extends ConexionBD{

//Ver tipo de cuenta
static public function VerTipoCuentaM($tablaBD){
	$pdo = ConexionBD::cBD()->prepare("SELECT id_cuenta, nombre_cuenta FROM $tablaBD");
	$pdo -> execute();
	
	return $pdo -> fetchAll();
	
	$pdo -> close();
	$pdo = null;
}
// Fin Ver tipo de cuenta

// Crear Tipo Cuenta
static public function CrearTipoCuentaM($tablaBD, $datosC){

	$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre_cuenta) VALUES (:nombre_cuenta);");

	$pdo -> bindParam(":nombre_cuenta", $datosC["nombre_cuenta"], PDO::PARAM_STR);

	if ($pdo -> execute()) {
		return true;
	}else{
		return false;
	}

	$pdo->close();
	$pdo = null;
	
}
// Fin Crear Tipo Cuenta

//Llamar Datos de tipo de cuenta a editar
static public function ETipoCuentaM($tablaBD, $item, $valor){

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

// Actualizar Tipo Cuenta
static public function ActualizarTipoCuentaM($tablaBD, $datosC){
	$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre_cuenta = :nombre_cuenta WHERE id_cuenta = :id_cuenta");

	$pdo -> bindParam(":nombre_cuenta", $datosC["nombre_cuenta"], PDO::PARAM_STR);
	$pdo -> bindParam(":id_cuenta", $datosC["id_cuenta"], PDO::PARAM_INT);

	if($pdo -> execute()){

		return true;

	}else{

		return false;

	}

	$pdo -> close();
	$pdo = null; 
}
// Fin Actualizar Tipo Cuenta

// Eliminar Tipo Cuenta
	static public function BorrarTipoCuentaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id_cuenta = :id_cuenta");

		$pdo -> bindParam(":id_cuenta", $datosC, PDO::PARAM_INT);

		if ($pdo -> execute()) {
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;
	}
	// Fin Eliminar Tipo Cuenta

}

?>