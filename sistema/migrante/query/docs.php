<?php
include('qc.php');

$sqlQuery = "SELECT * FROM catalogo_documentos ORDER BY id ASC";
$resultadoQuery = $conn -> query($sqlQuery);
$noCatalogoquery = mysqli_num_rows($resultadoQuery);
// $rowQuery = $resultadoQuery ->fetch_assoc();

while($rowQuery = $resultadoQuery ->fetch_assoc()){
    $idDoc = $rowQuery['id'];
    $usr1 = $_SESSION['usr'];
    // query docs usr
    $sqlDocs = "SELECT * FROM documentos WHERE id_ext = '$id' AND documento = '$idDoc' ORDER BY id ASC";
    $resultadoDocs = $conn -> query($sqlDocs);
    $no_resultados = mysqli_num_rows($resultadoDocs);
    $no_resultados_warning = $no_resultados - 1;
    $rowDocs = $resultadoDocs ->fetch_assoc();
    echo'
        <div class="col">
    ';
        if($no_resultados == 0 || empty($no_resultados)){
            echo '
        <div class="card border-danger text-light" style="height:300px; background-color:rgba(250, 6, 22, 0.7);" id="botonesFiles">
        ';
        }
        // else if($no_resultados > 0 && $no_resultados <= $no_resultados_warning){
        //     echo '
        // <div class="card border-warning" style="height:300px">
        //     ';
        // }
        else if($no_resultados > 0){
            echo '
        <div class="card border-success  text-light" style="height:300px; background-color:rgba(8, 66, 152, 0.9);">
            ';
        }
          echo'
            
            <div class="card-body text-justify">
            
            <h5 class="card-title"><i class="bi bi-filetype-pdf"></i> '.$rowQuery['documento'].'</h5>
            <p>
              <small class="card-text text-justify">'.$rowQuery['descripcion'].'</small>
            </p>
              <p class="text-center h1 h-50"><i class="bi bi-filetype-pdf"></i></p>
            </div>
            <div class="card-footer">
            ';
            if($no_resultados == 0 || empty($no_resultados)){
                echo'
            <a href="#" class="card-link text-light" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#cargarDoc'.$rowQuery['id'].'"><i class="bi bi-plus-circle"></i> Cargar documento</a>';
            }
            else{
                echo'
            <a href="#" class="card-link text-light" style="text-decoration: none"><i class="bi bi-pencil-square"></i> Editar documento</a>
            <a href="../'.$rowDocs['link'].'" target="_blank" class="card-link text-light" style="text-decoration: none"><i class="bi bi-eye"></i> Visualizar documento</a>
            ';
            }
            echo'
            </div>
        
          </div>
        </div>
        <!-- Modal agregar file -->
        <div class="modal fade" id="cargarDoc'.$rowQuery['id'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cargar documento <strong>'.$rowQuery['documento'].'</strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
              </div>
              <div class="modal-body">
                <form id="upload_form" enctype="multipart/form-data" method="post">';
                ?>
                  <input type="file" name="file<?php echo $idDoc?>" id="file<?php echo $idDoc?>" onchange="uploadFile(<?php echo $idDoc ?>,<?php echo $id ?>)" accept="application/pdf" class="h6 w-100 mt-3"><br>
                <?php
                echo'
                  <progress id="progressBar'.$idDoc.'" value="0" max="100" style="width:300px;"></progress>
                  <small id="status'.$idDoc.'"></small>
                  <p id="loaded_n_total'.$idDoc.'"></p>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="window.location.reload();">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
    ';
}

?>