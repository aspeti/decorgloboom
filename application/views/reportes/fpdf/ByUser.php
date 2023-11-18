<?php

require('fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      //$this->Image('application/views/reportes/fpdf/logo.png', 270, 5, 20);
      $this->Image('application/views/reportes/fpdf/logo.png', 60, 10, 10);
      $this->Image('application/views/reportes/fpdf/logo.png', 210, 10  , 10);
      
      
      
      $this->Cell(70);  // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(80, 10, utf8_decode("TIENDA DE COTILLONES NACIONALES S.A"), 0, 0, '', 0);
      $this->Ln(5);

      $this->Cell(100);  // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(85, 10, utf8_decode("DECORGLOBOOM"), 0, 0, '', 0);
      $this->Ln(13);
      /* UBICACION */
     

      /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Direccion: Avenida San Martin Esquina Heroinas"), 0, 0, '', 0);
      $this->Ln(30);


      /* CAMPOS DE LA TABLA */
      //color
      //$this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetFillColor(141, 13, 229); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);

      $this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(80, 10, utf8_decode('Nombre Cliente'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Fecha de venta'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('serie'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Total'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage('landscape'); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas


$pdf->SetY(33);
$pdf->Cell(10);  // mover a la derecha
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(96, 10, utf8_decode("Usuario : " .$usuario->nombre.' '.$usuario->apellido), 0, 0, '', 0);
$pdf->Ln(5);
/*
$hoy = date('d/m/Y');
$this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)*/

/* TELEFONO */
$pdf->Cell(10);  // mover a la derecha
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(96, 10, utf8_decode("Correo : " .$usuario->email), 0, 0, '', 0);
$hoy = date('d/m/Y');
$pdf->Ln(5);


/* COREEO */
$pdf->Cell(10);  // mover a la derecha
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(96, 10, utf8_decode("Dirreccion : " .$usuario->direccion), 0, 0, '', 0);
$pdf->Ln(25);


$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;
/* TABLA 
$pdf->Cell(18, 10, utf8_decode("N°"), 1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode("numero"), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode("nombre"), 1, 0, 'C', 0);
$pdf->Cell(25, 10, utf8_decode("precio"), 1, 0, 'C', 0);
$pdf->Cell(70, 10, utf8_decode("info"), 1, 0, 'C', 0);
$pdf->Cell(25, 10, utf8_decode("total"), 1, 1, 'C', 0);
*/
$total = 0;
$cont = 1;
foreach($ventas as $venta):
   $pdf->Cell(10, 10, utf8_decode($cont), 1, 0, 'C', 0);
   $pdf->Cell(80, 10, utf8_decode($venta->cliente), 1, 0, 'C', 0);
   $pdf->Cell(60, 10, utf8_decode(date('d-m-Y', strtotime($venta->fecha_creacion))), 1, 0, 'C', 0);
   $pdf->Cell(60, 10, utf8_decode($venta->num_documento), 1, 0, 'C', 0);
   $pdf->Cell(60, 10, utf8_decode($venta->total), 1, 1, 'C', 0);                      
$cont++;
$total = $total + $venta->total;
endforeach;
$pdf->Cell(10, 10, utf8_decode(""), 0, 0, 'C', 0);
$pdf->Cell(80, 10, utf8_decode(""), 0, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode(""), 0, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode("Total Bs: "), 1, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode($total), 1, 1, 'C', 0);                  


$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
