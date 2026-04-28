<?php
include('../query/qc.php');
date_default_timezone_set('America/Mexico_City');
                  setlocale(LC_TIME, 'es_MX.UTF-8');
$fecha_sistema = strftime("%Y-%m-%d,%H:%M:%S");
$id = $_POST['id'];
$documento = $_POST['documento'];
$calificacion = $_POST['calificacion'];
$jurado = $_POST['jurado'];

$editarCalificacion ="UPDATE calificacion SET calificacion='$calificacion',fecha='$fecha_sistema' WHERE id_ext='$id' AND id_jurado='$jurado' AND documento='$documento'";
$resultadoCalificar = $conn->query($editarCalificacion);

?>