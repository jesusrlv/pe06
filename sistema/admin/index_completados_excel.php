<?php
    header("Pragma: public");
    header("Expires: 0");
    $filename = "reporte_datos_personales.xls";
    header("Content-type: application/x-msdownload");
    header("Content-Disposition: attachment; filename=$filename");
    header("Pragma: no-cache");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

    session_start();

    $id = $_SESSION['id'];
    $usr = $_SESSION['usr'];
    $nombre = $_SESSION['nombre'];
    $perfil = $_SESSION['perfil'];

    include('query/lista_postulantes_completados2.php');
?>
