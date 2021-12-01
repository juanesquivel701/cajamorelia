<?php 
require_once "Controladores/plantillaC.php";

// Controladores
require_once "Controladores/clientesC.php";
require_once "Controladores/tipoCuentaC.php";
require_once "Controladores/cuentaClienteC.php";

// Modelos
require_once "Modelos/clientesM.php";
require_once "Modelos/tipoCuentaM.php";
require_once "Modelos/cuentaClienteM.php";
// require_once "Controladores/contratoC.php";

$plantilla = new PlantillaC();
$plantilla -> LlamarPlantilla();