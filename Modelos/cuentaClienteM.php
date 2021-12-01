<?php  

require_once "ConexionBD.php";

class CuentaClientesM extends ConexionBD{

	//Ver cuenta de Clientes
	static public function VerCuentaClientesM($tablaBD){
		$pdo = ConexionBD::cBD()->prepare("SELECT id_cliente_cuenta, saldo_actual, DATE_FORMAT(fecha_contratacion,'%d/%m/%Y') as fecha_contratacion, fecha_ultimo_movimiento FROM $tablaBD");
		$pdo -> execute();
		
		return $pdo -> fetchAll();
		
		$pdo -> close();
		$pdo = null;
	}
	// Fin Ver cuenta de Clientes

	// Ver ID Cliente
	static public function VerIdClientesM($tablaBD){
		$pdo = ConexionBD::cBD()->prepare("SELECT * from $tablaBD");
		$pdo -> execute();
		
		return $pdo -> fetchAll();
		
		$pdo -> close();
		$pdo = null;
	}
	// Fin ID Cliente

	// Ver ID Cuenta
	static public function VerIdCuentaM($tablaBD){
		$pdo = ConexionBD::cBD()->prepare("SELECT * from $tablaBD");
		$pdo -> execute();
		
		return $pdo -> fetchAll();
		
		$pdo -> close();
		$pdo = null;
	}
	// Fin ID Cuenta

	// Crear Cuenta Cliente
	static public function CrearCuentaClientesM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("CALL $tablaBD(:id_cliente, :id_cuenta, :saldo_actual, :fecha_contratacion);");

		$pdo -> bindParam(":id_cliente", $datosC["id_cliente"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_cuenta", $datosC["id_cuenta"], PDO::PARAM_INT);
		$pdo -> bindParam(":saldo_actual", $datosC["saldo_actual"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha_contratacion", $datosC["fecha_contratacion"], PDO::PARAM_STR);

		if ($pdo -> execute()) {
			return true;
		}else{
			return false;
		}

		$pdo->close();
		$pdo = null;
		
	}
	// Fin Crear Cuenta Cliente

	// Eliminar Cuenta Cliente
	static public function BorrarCuentaClientesM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("CALL $tablaBD(:id_cliente_cuenta);");

		$pdo -> bindParam(":id_cliente_cuenta", $datosC, PDO::PARAM_INT);

		if ($pdo -> execute()) {
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;
	}
	// Fin Eliminar Cuenta Cliente

}

?>