<?php

include('qc.php');

$sqlQuery = "SELECT * FROM catalogo_documentos ORDER BY id ASC";
$resultadoQuery = $conn -> query($sqlQuery);
$noCatalogoquery = mysqli_num_rows($resultadoQuery);
// $rowQuery = $resultadoQuery ->fetch_assoc();

// while($rowQuery = $resultadoQuery ->fetch_assoc()){
//     $idDoc = $rowQuery['id'];
    // query docs usr
    $sqlDocs = "SELECT * FROM documentos WHERE id_ext = '$id'";
    $resultadoDocs = $conn -> query($sqlDocs);
    $no_resultados = mysqli_num_rows($resultadoDocs);
    
    $resultadoSuma = ($no_resultados * 100)/($noCatalogoquery);
    $porcentajeDocs = round($resultadoSuma);
        if($no_resultados == 0){
            echo '
            <div class="col">
                <div class="card border-danger" style="height:300px;background-color:rgba(250, 6, 22, 0.1);">
                    <div class="card-body">
                        <p><h5 class="card-title">Estatus del perfil</h5></p>
                        <p><h6 class="card-subtitle mb-2 text-muted">Documentos cargados en el sistema</h6></p>
                        <p class="card-text text-center display-1">0</p>
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: '.$porcentajeDocs.'%">'.$porcentajeDocs.'%</div>
                        </div>
                    </div>
                </div>
            </div>
        ';
        }
        else if($no_resultados == 1 || $no_resultados == 2 || $no_resultados == 3 || $no_resultados == 4 || $no_resultados == 5 || $no_resultados == 6 || $no_resultados == 7 || $no_resultados == 8 ){
            echo '
            <div class="col">
                <div class="card border-primary bg-warning" style="height:300px;background-color:rgba 255, 193, 7, 0.1);">
                    <div class="card-body">
                        <p><h5 class="card-title">Estatus del perfil</h5></p>
                        <p><h6 class="card-subtitle mb-2 text-muted">Documentos cargados en el sistema</h6></p>
                        <p class="card-text text-center display-1">'.$no_resultados.'</p>
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: '.$porcentajeDocs.'%">'.$porcentajeDocs.'%</div>
                        </div>
                        
                    </div>
                </div>
            </div>
            ';
        }
        else if($no_resultados == 9){
            echo '
            <div class="col">
                <div class="card border-success" style="height:300px; background-color:rgba(117, 183, 152, 0.9);">
                    <div class="card-body text-light text-center">
                        <p><h5 class="card-title">Estatus del perfil</h5></p>
                        <p><h6 class="card-subtitle mb-2 text-light">Documentos cargados en el sistema</h6></p>
                        <p class="card-text text-center display-1">'.$no_resultados.'</p>
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: '.$porcentajeDocs.'%">'.$porcentajeDocs.'%</div>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
          
// }

?>