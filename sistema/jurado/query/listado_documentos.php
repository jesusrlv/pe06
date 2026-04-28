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

    $calif = "SELECT * FROM calificacion WHERE id_ext = '$idPostulante' AND id_jurado = '$id' AND documento = '$doc'";
    $resultadoCalif = $conn->query($calif);
    $rowCalif = $resultadoCalif->fetch_assoc();

    echo'
    <tr class="align-middle">
        <td>'.$x.'</td>
        <td><strong>'.$rowDocumento['documento'].'</strong></td>
        <td class="text-start">'.$rowDocumento['descripcion'].'</td>';

        if($doc == 9){
            echo ' <td><a href="'.$rowDocs['link'].'"><i class="bi bi-filetype-pdf h4"></i></a></td>';
        }
        else{
            echo ' <td><a href="../'.$rowDocs['link'].'"><i class="bi bi-filetype-pdf h4"></i></a></td>';
        }

       
        
        echo'
        <td>
        ';
    if($rowDocs['documento']==1 || $rowDocs['documento']==2 || $rowDocs['documento']==3 || $rowDocs['documento']==8 || $rowDocs['documento']==9){
        if(empty($rowCalif['calificacion'])){

        echo'
        
            <select class="form-select" aria-label="Default select example" id="calificacion'.$rowDocs['documento'].'" onchange="calificar('.$rowDocs['id_ext'].','.$rowDocs['documento'].','.$_SESSION['id'].')">
                <option selected value="">Calificar</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <select class="form-select" aria-label="Default select example" onchange="editarCalificacion('.$rowDocs['id_ext'].','.$rowDocs['documento'].','.$_SESSION['id'].')" id="editadCalf'.$rowDocs['documento'].'" hidden>
                <option selected value="">Editar</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            ';
        }else{
            echo'
        
            <select class="form-select" aria-label="Default select example" onchange="editarCalificacion('.$rowDocs['id_ext'].','.$rowDocs['documento'].','.$_SESSION['id'].')" id="editadCalf'.$rowDocs['documento'].'">
            <option selected value="">Editar</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
            ';
        }
        echo'
        </td>
        <td>
            <span id="calificacionActual'.$rowDocs['documento'].'">';
                if($rowDocs['documento']==1){
                    $resultadoCon = $conn->query($calif);
                    $rowCon = $resultadoCon->fetch_assoc();
                    if(empty($rowCon['calificacion'])){
                        echo 'Sin calificar';
                    }
                    else{
                    echo $rowCon['calificacion'];
                    }

                }
                else if($rowDocs['documento']==2){
                    $resultadoCon = $conn->query($calif);
                    $rowCon = $resultadoCon->fetch_assoc();
                    if(empty($rowCon['calificacion'])){
                        echo 'Sin calificar';
                    }
                    else{
                    echo $rowCon['calificacion'];
                    }

                }
                else if($rowDocs['documento']==3){
                    $resultadoCon = $conn->query($calif);
                    $rowCon = $resultadoCon->fetch_assoc();
                    if(empty($rowCon['calificacion'])){
                        echo 'Sin calificar';
                    }
                    else{
                    echo $rowCon['calificacion'];
                    }

                }
                else if($rowDocs['documento']==8){
                    $resultadoCon = $conn->query($calif);
                    $rowCon = $resultadoCon->fetch_assoc();
                    if(empty($rowCon['calificacion'])){
                        echo 'Sin calificar';
                    }
                    else{
                    echo $rowCon['calificacion'];
                    }

                }
                else if($rowDocs['documento']==9){
                    $resultadoCon = $conn->query($calif);
                    $rowCon = $resultadoCon->fetch_assoc();
                    if(empty($rowCon['calificacion'])){
                        echo 'Sin calificar';
                    }
                    else{
                    echo $rowCon['calificacion'];
                    }

                }
                // else if($rowDocs['documento']==9){
                //     $idCon = $rowDocs['documento'];
                //     $idExtCon = $rowDocs['id_ext'];
                //     $jurado = $_SESSION['id'];
                //     $docCon = "SELECT * FROM calificacion WHERE documento = 9 AND id_ext = '$idExtCon' AND id_jurado = '$jurado'";
                //     $resultadoCon = $conn->query($docCon);
                //     $rowCon = $resultadoCon->fetch_assoc();
                //     if(empty($rowCon['calificacion'])){
                //         echo 'Sin calificar';
                //     }
                //     else{
                //     echo $rowCon['calificacion'];
                //     }
                // }
                else{
                    echo '---';
                }
            echo'
            </span>
        </td>
        ';
    }
    else{
        echo '---';
        echo '
        <td>
        ---
        </td>
        ';
    }
    echo'
    </tr>
    ';
}

?>
