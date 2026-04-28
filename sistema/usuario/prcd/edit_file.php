<?php    
    session_start();
    include('../query/qc.php');

    date_default_timezone_set('America/Mexico_City');
                  setlocale(LC_TIME, 'es_MX.UTF-8');
    
    // $id=$_SESSION['id'];
    $idUsr = $_POST['idUsuario'];
    $doc = $_POST['documento'];
    // $tipo_doc = 1;
    $fecha_sistema = strftime("%Y-%m-%d,%H:%M:%S");
    $link= 'archivo'.$doc;
    // $validacion = 1;

$fileName = $_FILES["fileEditar"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileEditar"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileEditar"]["type"]; // The type of file it is
$fileSize = $_FILES["fileEditar"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileEditar"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}


$archivo_ext=$_FILES['fileEditar']['name'];
$extension = pathinfo($archivo_ext, PATHINFO_EXTENSION);

    if(move_uploaded_file($_FILES["fileEditar"]["tmp_name"],"../../docs/". $link .'_'. $idUsr .'.'.$extension)){
    echo "$fileName carga completa";
    
    $ruta = "docs/". $link .'_'. $idUsr .'.'.$extension;
    $sqlUpdate= "UPDATE documentos SET link='$ruta',fecha='$fecha_sistema' WHERE id_ext='$idUsr' AND documento = '$doc'";
    // $sqlInsert= "INSERT INTO documentos (documento,id_ext,link,fecha) 
    // VALUES('$doc','$idUsr','$ruta','$fecha_sistema')";
    $resultado= $conn->query($sqlUpdate);
    
    
} else {
    echo "move_uploaded_file function failed";
}
    
?>
