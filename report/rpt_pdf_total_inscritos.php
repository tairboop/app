<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/app/config/global.php");
require_once (ROOT_DIR . "/model/InscripcionesModel.php");
include (ROOT_CORE . "/fpdf/fpdf.php");

class PDF extends FPDF
{
    function convertxt($p_txt)
    {
        return iconv('UTF-8', 'iso-8859-1', $p_txt);
    }
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "Reporte", 0, 1, 'C');
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->setFont('Arial', 'I', 8);
        $this->Cell(0, 10, $this->convertxt("Página ") . $this->PageNo() . '/{nb}', 0, 0, 'c');
    }
}
$rpt = new InscripcionesModel();
$records = $rpt->findall();
$records = $records['DATA'];


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');
//Cabecera
$pdf->SetFont('Arial', 'B', 8);
$header = array(
    $pdf->convertxt("No."),
    $pdf->convertxt("Código Pedido"),
    $pdf->convertxt("Nombre Cliente"),
    $pdf->convertxt("Apellido Cliente"),
    $pdf->convertxt("Dirección Entrega"),
    $pdf->convertxt("Teléfono"),
    $pdf->convertxt("Email"),
    $pdf->convertxt("Producto Pedido"),
    $pdf->convertxt("Fecha Pedido"),
    $pdf->convertxt("Estado Pedido"),
    $pdf->convertxt("Cantidad"),
    $pdf->convertxt("Precio Total"),
    $pdf->convertxt("Observaciones"),
    $pdf->convertxt("Comentarios"),
    $pdf->convertxt("Tipo Pago"),
    $pdf->convertxt("Número Pedidos")
);
$widths = array(6, 23, 24, 24, 28, 17, 37, 28, 26, 30, 30, 30, 40, 40, 30, 30);
for ($i = 0; $i < count($header); $i++) {
    $pdf->Cell($widths[$i], 7, $header[$i], 1);
}
$pdf->Ln();
//Cuerpo
$pdf->SetFont('Arial', '', 7);
$j = 1;
foreach ($records as $row) {
    $pdf->Cell($widths[0], 6, $pdf->convertxt($j), 1);
    $pdf->Cell($widths[1], 6, $pdf->convertxt($row['codigo_pedido']), 1);
    $pdf->Cell($widths[2], 6, $pdf->convertxt($row['nombre_cliente']), 1);
    $pdf->Cell($widths[3], 6, $pdf->convertxt($row['apellido_cliente']), 1);
    $pdf->Cell($widths[4], 6, $pdf->convertxt($row['direccion_entrega']), 1);
    $pdf->Cell($widths[5], 6, $pdf->convertxt($row['telefono']), 1);
    $pdf->Cell($widths[6], 6, $pdf->convertxt($row['email']), 1);
    $pdf->Cell($widths[7], 6, $pdf->convertxt($row['producto_pedido']), 1);
    $pdf->Cell($widths[8], 6, $pdf->convertxt($row['fecha_pedido']), 1);
    $pdf->Cell($widths[9], 6, $pdf->convertxt($row['estado_pedido']), 1);
    $pdf->Cell($widths[10], 6, $pdf->convertxt($row['cantidad']), 1);
    $pdf->Cell($widths[11], 6, $pdf->convertxt($row['precio_total']), 1);
    $pdf->Cell($widths[12], 6, $pdf->convertxt($row['observaciones']), 1);
    $pdf->Cell($widths[13], 6, $pdf->convertxt($row['comentarios']), 1);
    $pdf->Cell($widths[14], 6, $pdf->convertxt($row['tipo_pago']), 1);
    $pdf->Cell($widths[15], 6, $pdf->convertxt($row['numero_pedidos']), 1);
    $pdf->Ln();
    $j++;
}
$pdf->Output();