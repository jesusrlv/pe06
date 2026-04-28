<?php
include('conn/qc.php');
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');

$fechaCierre = $_POST['dateBLQ'];
$fecha_sistema = strftime("%Y-%m-%d,%H:%M:%S");

if($fecha_sistema > $fechaCierre){
    echo json_encode(array('success' => 1));
}
else{
    echo json_encode(array('success' => 0));
}
?>