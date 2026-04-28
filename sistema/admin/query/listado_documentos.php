<?php
include('qc.php');
$x=0;
$sqlDocs = "SELECT * FROM documentos WHERE id_ext = '$idPostulante' ORDER BY documento ASC";
$resultadoDocs = $conn->query($sqlDocs);
while($rowDocs = $resultadoDocs->fetch_assoc()){
    $x++;
    $doc = $rowDocs['documento'];
    $sqlDocumento ="SELECT * FROM catalogo_documentos WHERE id ='$doc'";
    $resultadoDocumento = $conn->query($sqlDocumento);
    $rowDocumento = $resultadoDocumento->fetch_assoc();
    echo'
    <tr class="align-middle">
        <td>'.$x.'</td>
        <td><strong>'.$rowDocumento['documento'].'</strong></td>
        <td class="text-start">'.$rowDocumento['descripcion'].'</td>';
        if($rowDocumento['id'] == 9){
            echo'
            <td><a href="'.$rowDocs['link'].'" target="_blank"><i class="bi bi-filetype-pdf h4"></i></a></td>
            ';
        }
        else{
            echo'
            <td><a href="../'.$rowDocs['link'].'" target="_blank"><i class="bi bi-filetype-pdf h4"></i></a></td>
            ';
        }
        echo'
    </tr>
    ';
}

?>