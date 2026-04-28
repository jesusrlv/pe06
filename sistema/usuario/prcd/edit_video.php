<?php    
    session_start();
    include('../query/qc.php');

    date_default_timezone_set('America/Mexico_City');
                  setlocale(LC_TIME, 'es_MX.UTF-8');
    
    $idUsr = $_POST['idU'];
    $doc = $_POST['idD'];
    $fecha_sistema = strftime("%Y-%m-%d,%H:%M:%S");
    $link= $_POST['video'];

    $query = "UPDATE documentos SET link = '$link', fecha = '$fecha_sistema' WHERE id_ext = '$idUsr' AND documento = '$doc'";
    $resultado= $conn->query($query);
    
if ($resultado){
    echo json_encode(array('success' => 1));
}   
else {
    $error = $conn->error;
    echo json_encode(array('error'=>$error));
}
    
?>
