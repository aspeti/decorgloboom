<?php


require('fpdf.php');

class PDF extends FPDF
{
      


   // Cabecera de página
   function Header()
   {
      $this->Image('application/views/reportes/fpdf/logo.png', 20, 3, 20);
      $this->Image('application/views/reportes/fpdf/logo.png', 175, 3, 20);

      
      $this->Cell(60);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(80, 10, utf8_decode("TIENDA DE COTILLONES NACIONALES S.A"), 0, 0, '', 0);
      $this->Ln(5);

      $this->Cell(80);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("DECORGLOBOOM"), 0, 0, '', 0);
      $this->Ln(15);

      

      $this->Cell(135);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85,0, utf8_decode("NIT:098789-233"), 0, 1, '', 0);

      $this->Cell(135);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Reporte por cliente"), 0, 0, '', 0);
      $this->Ln(30);

      $this->SetFillColor(141, 13, 229); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      /*
      $this->Cell(18, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('NÚMERO'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('TIPO'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('PRECIO'), 1, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode('CARACTERÍSTICAS'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1);*/

      $this->Cell(10);
      $this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(80, 10, utf8_decode('Nombre Producto'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
      $this->Cell(32, 10, utf8_decode('Precio Unidad'), 1, 0, 'C', 1);
      $this->Cell(32, 10, utf8_decode('Precio Total'), 1, 0, 'C', 1);
      

      
   }

   // Pie de página
   function Footer()
   {
     
   }
   
}
$pdf = new PDF();
$pdf->AddPage();

$pdf->SetY(30);



      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(125 , 10, utf8_decode("Sr.(a): ".$cliente->nombre), 0, 0, '', 0);
      $pdf->Ln(5);

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(125, 10, utf8_decode("Numero de telefono.: ".$cliente->telefono), 0, 0, '', 0);
      $pdf->Ln(5);

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(125 , 10, utf8_decode("CI: ".$cliente->num_documento), 0, 0, '', 0);
      $pdf->Ln(5);

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(125 , 10, utf8_decode("Direccion: ".$cliente->direccion), 0, 0, '', 0);
      $pdf->Ln(5);
      
      


      $pdf->Cell(80);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 20);
      $pdf->Cell(80, 10, utf8_decode(""), 0, 0, '', 0);
      $pdf->Ln(20);
      
      
      $i = 0;
      $pdf->SetFont('Arial', '', 12);
      $pdf->SetDrawColor(163, 163, 163);



      $total = 0;
      $cont = 1;
      foreach($ventas as $venta):
         $pdf->Cell(10);
         $pdf->Cell(10, 10, utf8_decode($cont), 1, 0, 'C', 0);
         $pdf->Cell(80, 10, utf8_decode($venta->nombre), 1, 0, 'C', 0);
         $pdf->Cell(25, 10, utf8_decode($venta->cantidad), 1, 0, 'C', 0);
         $pdf->Cell(32, 10, utf8_decode($venta->precioU), 1, 0, 'C', 0);
         $pdf->Cell(32, 10, utf8_decode($venta->precioT), 1, 0, 'C', 0);
         
         
         $pdf->Ln();    
         $cont++;               
      $total = $total + ($venta->precioT);
      endforeach;

      $pdf->Cell(10);
      $pdf->Cell(10, 10, utf8_decode(""), 0, 0, 'C', 0);
      $pdf->Cell(25, 10, utf8_decode(""), 0, 0, 'C', 0);
      $pdf->Cell(80, 10, utf8_decode(""), 0, 0, 'C', 0);
      $pdf->Cell(32, 10, utf8_decode("Importe Bs: "), 1, 0, 'C', 0);
      $pdf->Cell(32, 10, utf8_decode($total.".00"), 1, 1, 'C', 0); 
      $pdf->Ln(5);  

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(125, 10, utf8_decode("Recibo Original: DECORGLOBOOM" ), 0, 0, '', 0);
      $pdf->Ln(5);

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(15, 10, utf8_decode("No. Autorizacion 345-543LM" ), 0, 0, '', 0);
      $pdf->Ln(5);

      
      
      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(125, 10, utf8_decode("Direccion: Av. Pando Hupermoll 3er piso"), 0, 0, '', 0);
      $pdf->Ln(5);
      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(85, 10, utf8_decode("Sucursal:  Cochabamba"), 0, 0, '', 0);
      $pdf->Ln(5);

      $pdf->Cell(10);  // mover a la derecha
      $pdf->SetFont('Arial', 'B', 10);
      
      $pdf->Ln(10);



//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();
 /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */




/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/

$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
?>
