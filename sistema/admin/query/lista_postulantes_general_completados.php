<?php
include('qc.php');
// Mx
// $sqlPostulantes ="SELECT * FROM usr WHERE perfil = 1";
// $calificacionProm = "SELECT AVG(calificacion) as promedio FROM calificacion WHERE id_ext='$idDocs'";
// $sqlPostulantes ="SELECT usr.id as id, usr.nombre as nombre, usr.edad as edad, usr.municipio as municipio, usr.telefono as telefono, usr.curp as curp, AVG(calificacion.calificacion) as promedio, calificacion.documento as documento, calificacion.id_jurado as id_jurado, calificacion.calificacion as calificacion FROM usr INNER JOIN calificacion ON usr.id = calificacion.id_ext WHERE usr.perfil = 1 GROUP BY calificacion.calificacion ORDER BY promedio LIMIT 1";
$sqlPostulantes ="SELECT AVG(calificacion) as promedio, id_ext as id FROM calificacion GROUP BY id_ext ORDER BY promedio DESC";
$resultadoSQL = $conn->query($sqlPostulantes);
$x = 0;
while($rowSQL = $resultadoSQL->fetch_assoc()){
    $x++;
    $idDocs = $rowSQL['id'];
    $contador = "SELECT COUNT(documento) AS contar FROM documentos WHERE id_ext = '$idDocs'";
    $resultadoContar = $conn->query($contador);
    $rowContar = $resultadoContar -> fetch_assoc();
    $numero = $rowContar['contar'];
    if($numero==9){

    $datos ="SELECT * FROM usr WHERE id = '$idDocs'";
    $resultadoDatos = $conn->query($datos);
    $rowDatos = $resultadoDatos->fetch_assoc();
    
    echo'
    <tr class="table-primary">
        <td>'.$x.'</td>
        <td>'.$rowDatos['nombre'].'</td>
        <td>'.$rowDatos['curp'].'</td>
        <td>'.$rowDatos['edad'].'</td>
        ';
    $mun = $rowDatos['municipio'];
    $sqlMunicipio = "SELECT * FROM municipio WHERE id = '$mun'";
    $resultadoMunicipio = $conn -> query($sqlMunicipio);
    $rowMunicipio = $resultadoMunicipio->fetch_assoc();    
    echo'
    <td>'.$rowMunicipio['municipio'].'</td>
    <td>'.$rowDatos['telefono'].'</td>
    <td>'.$rowDatos['usr'].'</td>
        <td>
            <a href="listado_docs.php?id='.$rowSQL['id'].'">';
        if ($numero == 0){
            echo'
            <span class="badge rounded-pill text-bg-danger">
            ';
        }
        else if ($numero == 1 || $numero == 2 || $numero == 3 || $numero == 4 || $numero == 5 || $numero == 6 || $numero == 7 || $numero == 8){
            echo'
            <span class="badge rounded-pill text-bg-warning">
            ';
        }
        else if ($numero == 9){
            echo'
            <span class="badge rounded-pill text-bg-primary">
            ';
        }
            echo'
                '.$numero.'
            </span>
            </a>
        </td>
        ';
    // $calificacionProm = "SELECT AVG(calificacion) as promedio FROM calificacion WHERE id_ext='$idDocs'";
    // $resultadoProm = $conn->query($calificacionProm);
    // $rowProm = $resultadoProm->fetch_assoc();
        $promedio=$rowSQL['promedio'];
        $numero = 2;
    // }
    // $totalPromedio = $promedio / $numero;
    echo'
        <td>
        <span class="badge text-bg-primary">'.round($promedio,PHP_ROUND_HALF_DOWN).'</span>
        </td>'; 


        echo'

    </tr>
    <tr>
        <td colspan="9">
            <div class="accordion accordion-flush" id="accordionFlushExample'.$rowDatos['id'].'">
                <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne'.$rowDatos['id'].'" aria-expanded="false" aria-controls="flush-collapseOne">
                    <i class="bi bi-card-checklist me-2"></i> Descripción de calificaciones
                    </button>
                </h2>
                <div id="flush-collapseOne'.$rowDatos['id'].'" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample'.$rowDatos['id'].'">
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
                            $califProm = "SELECT * FROM calificacion WHERE id_ext ='$idDocs'";
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
}
}


?>