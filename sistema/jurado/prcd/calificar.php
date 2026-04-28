<?php
include('../query/qc.php');
date_default_timezone_set('America/Mexico_City');
                  setlocale(LC_TIME, 'es_MX.UTF-8');
$fecha_sistema = strftime("%Y-%m-%d,%H:%M:%S");
$id = $_POST['id'];
$documento = $_POST['documento'];
$calificacion = $_POST['calificacion'];
$jurado = $_POST['jurado'];

// $calificar = "UPDATE documentos SET calificacion='$calificacion' WHERE id_ext = '$id' AND documento = '$documento'";
$calificar = "INSERT INTO calificacion(
    id_ext,
    id_jurado,
    documento,
    calificacion,
    fecha) 
VALUES(
    '$id',
    '$jurado',
    '$documento',
    '$calificacion',
    '$fecha_sistema')
";
$resultadoCalificar = $conn->query($calificar);

?>