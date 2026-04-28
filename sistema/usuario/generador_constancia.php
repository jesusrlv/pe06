<?php
session_start();

    $usuario = $_SESSION['usr'];
    $id = $_SESSION['id'];
    $perfil = $_SESSION['perfil'];
    $nombre = $_SESSION['nombre'];

require('pdf/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $pdf->MultiCell(0,9, $pdf->Image("../img/logos_pej2022.png", $pdf->GetX()+5, $pdf->GetY()+3, 180) ,0,"C");

    $this->Image('../../img/logos_pej2025_01.png',5,0,200);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    // $this->Cell(30,10,utf8_decode('Constancia de participación'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    // $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../../img/fondo_pej2022.png','0','0','250','300','PNG');
// $pdf->MultiCell(190,9, $pdf->Image("../img/logos_pej2022.png", $pdf->GetX()+5, $pdf->GetY()+3, 180) ,0,"C");
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Multicell(190,8,utf8_decode('

CONSTANCIA DE PARTICIPACIÓN'),0,'C',0);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,12,utf8_decode('Estimado(a) participante, '.$nombre.' '),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Multicell(190,9,utf8_decode('Por medio de la presente, el Instituto de la Juventud del Estado de Zacatecas, a través de su Director General, el Ing. Mauricio Acevedo Rodríguez, reconoce a usted su participación como candidato(a) a recibir el Premio Estatal de la Juventud en su edición 2025.

Su postulación es fundamental para la construcción de un Estado más próspero, incluyente, democrático e igualitario. Gracias a su intervención, recordamos lo importante que es reconocer el talento y la trayectoria de las y los jóvenes en nuestra entidad. Los principios rectores de la Nueva Gobernanza, nos obligan a impulsar y generar los espacios oportunos para que las juventudes puedan alcanzar sus objetivos, desarrollarse de manera integral y vivir en bienestar. No sólo representas uno de los cimientos más importantes de la sociedad, también eres protagonista del presente y agente estratégico para la transformación nacional.

Continúa abriendo brechas, rompiendo estigmas y creciendo, ¡Tu talento y capacidades, no tienen límites!

'),0,'J',0);
$pdf->SetFont('Arial','I',10);
$pdf->Multicell(190,9,'En la ciudad de Zacatecas, Zac., julio de 2025.',0,'C',0);
$pdf->MultiCell(190,9, $pdf->Image("../../img/rubrica_pej2022.png", $pdf->GetX()+20, $pdf->GetY()+1, 150) ,0,"C",0);
//IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Multicell(190,8,'DIRECTOR GENERAL
INSTITUTO DE LA JUVENTUD 
DEL ESTADO DE ZACATECAS',0,'C',0);

// $pdf->Output();
$modo="I";
$nombre_archivo="constancia_PEJ2025_".$usuario.".pdf";
$pdf->Output($nombre_archivo,$modo);  

?>
