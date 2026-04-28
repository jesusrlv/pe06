<?php
include('qc.php');

$sqlCategoria = "SELECT * FROM categorias ORDER BY id ASC";
$resultadoCategorias = $conn->query($sqlCategoria);
while($rowCategoria=$resultadoCategorias->fetch_assoc()){
    $categoria = $rowCategoria['id'];
    echo'
    <p class="h2">
          <i class="bi bi-flag-fill text-success"></i> 
          '.$rowCategoria['nombre'].'
              <a href="#inicio">
                <i class="bi bi-arrow-bar-up"></i>
              </a>
          </p>
          <table class="table" id="tablaOrder">
            <thead class="text-light text-center" style="background:#b23933">
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">CURP</th>
                <th scope="col">Edad</th>
                <th scope="col">Municipio</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Documentos</th>
                <th scope="col">Calificaciones</th>
                </tr>
            </thead>
            <tbody class="text-center">

    ';

    // while interno
    $sqlUsr = "SELECT * FROM usr WHERE categoria = '$categoria' AND perfil = 1 ORDER BY id ASC";
    $resultadoUsr = $conn->query($sqlUsr);
    while($rowUsr=$resultadoUsr->fetch_assoc()){
        $idD = $rowUsr['id'];
        $sqlDoc = "SELECT * FROM documentos WHERE id_ext='$idD'";
        $resultadoDoc = $conn->query($sqlDoc);
        $noDocs=$resultadoDoc->num_rows;
        if($noDocs == 11){
        echo'
        <tr>
            <td>'.$rowUsr['nombre'].'</td>
            <td>'.$rowUsr['curp'].'</td>
            <td>'.$rowUsr['edad'].'</td>';
            $idMun = $rowUsr['municipio'];
            $idMun = "SELECT * FROM municipio WHERE id = '$idMun'";
            $resultadoMun = $conn->query($idMun);
            $rowMun = $resultadoMun->fetch_assoc();
        echo'
            <td>'.$rowMun['municipio'].'</td>
            ';
        echo'
            <td>'.$rowUsr['telefono'].'</td>';

        if($noDocs==0){
            echo'
            <td><span class="badge text-bg-danger">'.$noDocs.'</span></td>
            ';
        }
        else if($noDocs >= 1 && $noDocs <= 10 ){
            echo'
            <a href="#">
            <td><a href="listado_docs.php?id='.$idD.'"><span class="badge text-bg-warning">'.$noDocs.'</span></a></td>
            </a>
            ';
        }
        else if($noDocs == 11 ){
            echo'
            <td><a href="listado_docs.php?id='.$idD.'"><span class="badge text-bg-primary">'.$noDocs.'</span></a></td>
            ';
        }
        $calificaciones = "SELECT AVG(calificacion) as promedio FROM calificacion WHERE id_ext = '$idD'";
        $resultadoCalif = $conn->query($calificaciones);
        $rowCalificaciones = $resultadoCalif->fetch_assoc();

        echo'
        <td><span class="badge text-bg-primary">'.round($rowCalificaciones['promedio'],PHP_ROUND_HALF_DOWN).'</span></td>
        ';
        echo'</tr>
        ';
        echo'
        <tr>
        <td colspan="9">
            <div class="accordion accordion-flush" id="accordionFlushExample'.$rowUsr['id'].'">
                <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne'.$rowUsr['id'].'" aria-expanded="false" aria-controls="flush-collapseOne">
                    <i class="bi bi-card-checklist me-2"></i> Descripción de calificaciones
                    </button>
                </h2>
                <div id="flush-collapseOne'.$rowUsr['id'].'" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample'.$rowUsr['id'].'">
                    <div class="accordion-body text-start">
                    <div class="row">
                                <div class="col-4 text-center border bg-primary">
                                    <strong class="text-light">Jurado</strong>
                                </div>
                                <div class="col-4 text-center border bg-primary">
                                    <strong class="text-light">Documento</strong>
                                </div>
                                <div class="col-4 text-center border bg-primary">
                                    <strong class="text-light">Calificación</strong>
                                </div>
                            </div>
                      ';
                            $califProm = "SELECT * FROM calificacion WHERE id_ext ='$idD'";
                            $resultadoProm = $conn->query($califProm);
                            
                            while($rowProm = $resultadoProm->fetch_assoc()){
                            
                                $documento = $rowProm['documento'];
                                $doc = "SELECT * FROM catalogo_documentos WHERE id = '$documento'";
                                $resultadoDoc = $conn->query($doc);
                                $rowDoc = $resultadoDoc->fetch_assoc();

                                $jur = $rowProm['id_jurado'];
                                $jurado = "SELECT * FROM usr WHERE id = '$jur'";
                                $resultadoJur = $conn->query($jurado);
                                $rowJur = $resultadoJur->fetch_assoc();
                                
                                echo '
                                <div class="row">
                                    <div class="col-4 text-center border">
                                        '.$rowJur['nombre'].'
                                    </div>
                                    <div class="col-4 text-center border">
                                        '.$rowDoc['documento'].'
                                    </div>
                                    <div class="col-4 text-center border">
                                        '.$rowProm['calificacion'].'
                                    </div>
                                </div>';
                            }

                        echo'    
                        <hr>
                    </div>
                </div>
                </div>
                
            </div>
        </td>
    </tr>
        ';
    }//fin de if docs
}
    // while interno
        echo '
            </tbody>
        </table>

        ';
}
?>
