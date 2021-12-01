<?php 

require('fpdf/fpdf.php');

if (isset($_GET["cliente"])) {

$conn = new PDO('mysql:host=localhost;dbname=cajavalladolid', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$resultado = $conn->prepare("SELECT * FROM cuentaclienteview where id_cliente = ".$_GET['cliente']." ");

$resultado->execute();

class PDF extends FPDF{}

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetMargins(20, 0 , 20);

$pdf->SetFont('Times', 'B', 20);
$pdf->Cell(80);
$pdf->Cell(30, 10, 'Detalles de cuenta', 0, 1, 'C');

while ($value = $resultado->fetch()) {

$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(80, 10, utf8_decode('Cliente: '.$value["nombre"]. " " .$value["apellido_paterno"]. " " .$value["apellido_materno"]), 0, 1, 'L');
$pdf->SetFont('Times', '', 12);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(80, 10, utf8_decode('Fecha de último movimiento: '.$value["fecha_ultimo_movimiento"]), 0, 1, 'L');
$pdf->SetFont('Times', '', 12);

$pdf->Cell(80, 12, utf8_decode('Nombre de cuenta'), 1, 0, 'C');
$pdf->Cell(95, 12, utf8_decode($value['nombre_cuenta']), 1, 1, 'C');
$pdf->Cell(80, 12, utf8_decode('Saldo actual'), 1, 0, 'C');
$pdf->Cell(95, 12, utf8_decode('$'.number_format($value["saldo_actual"])), 1, 1, 'C');

}


$pdf->Output();

}else{

	echo 'error';

}

?>