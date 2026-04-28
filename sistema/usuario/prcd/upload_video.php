<?php    
    session_start();
    include('../query/qc.php');

    date_default_timezone_set('America/Mexico_City');
                  setlocale(LC_TIME, 'es_MX.UTF-8');
    
    $idUsr = $_POST['idU'];
    $doc = $_POST['idD'];
    $fecha_sistema = strftime("%Y-%m-%d,%H:%M:%S");
    $link= $_POST['video'];

    $sqlInsert= "INSERT INTO documentos (documento,id_ext,link,fecha) 
    VALUES('$doc','$idUsr','$link','$fecha_sistema')";
    $resultado= $conn->query($sqlInsert);
    
if ($resultado){
    echo json_encode(array('success' => 1));
}   
else {
    echo'
    <script>
    console.log("Registro de video no exitoso");
    </script>
    ';
    $error = $conn->error;
    echo json_encode(array('error'=>$error));
}
    
?>
