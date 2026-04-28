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
        <div class="card border-danger text-light" style="height:300px; background-color: rgba(230, 55, 92, 0.9);" id="botonesFiles">
        ';
        }
        // else if($no_resultados > 0 && $no_resultados <= $no_resultados_warning){
        //     echo '
        // <div class="card border-warning" style="height:300px">
        //     ';
        // }
        else if($no_resultados > 0){
            echo '
        <div class="card border-success  text-light" style="height:300px; background-color: rgba(61, 42, 93, 0.9);">
            ';
        }


          echo'
            
            <div class="card-body text-justify">
            
            <h5 class="card-title"><i class="bi bi-filetype-pdf"></i> '.$rowQuery['documento'].'</h5>
            <p>
              <small class="card-text text-justify">'.$rowQuery['descripcion'].'</small>
            </p>';
            if($rowQuery['id']==9){
              echo'
              <p class="text-center h1 h-50"><i class="bi bi-youtube"></i></p>
              ';
            }
            else{
              echo'
              <p class="text-center h1 h-50"><i class="bi bi-filetype-pdf"></i></p>
              ';
            }
            echo '
            </div>
            <div class="card-footer">
            ';
            if($no_resultados == 0 || empty($no_resultados)){

              if($rowQuery['id']==9){
                echo'
                <a href="#" class="card-link text-light h6" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#cargarVideo'.$rowQuery['id'].'"><i class="bi bi-plus-circle"></i> Cargar video</a>';
              }
              else{
                echo'
                <a href="#" class="card-link text-light h6" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#cargarDoc'.$rowQuery['id'].'"><i class="bi bi-plus-circle"></i> Cargar documento</a>';
              }
                
            }
            else{
              if($rowQuery['id']==9){
                echo'
            <a href="#" class="card-link text-light h6" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#editarVideo'.$rowQuery['id'].'"><i class="bi bi-pencil-square"></i> Editar video</a>
            <a href="'.$rowDocs['link'].'" target="_blank" class="card-link text-light h6" style="text-decoration: none"><i class="bi bi-eye"></i> Visualizar video</a>
            ';
            }
              else{
                echo'
            <a href="#" class="card-link text-light h6" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#editarDoc'.$rowQuery['id'].'"><i class="bi bi-pencil-square"></i> Editar</a>
            <a href="../'.$rowDocs['link'].'" target="_blank" class="card-link text-light h6" style="text-decoration: none"><i class="bi bi-eye"></i> Visualizar</a>
            ';
            }
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

        <!-- Modal editar file -->
        <div class="modal fade" id="editarDoc'.$rowQuery['id'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar documento <strong>'.$rowQuery['documento'].'</strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
              </div>
              <div class="modal-body">
                <form id="upload_form" enctype="multipart/form-data" method="post">';
                ?>
                  <input type="file" name="fileEditar<?php echo $idDoc?>" id="fileEditar<?php echo $idDoc?>" onchange="uploadFileEditar(<?php echo $idDoc ?>,<?php echo $id ?>)" accept="application/pdf" class="h6 w-100 mt-3"><br>
                <?php
                echo'
                  <progress id="progressBarEditar'.$idDoc.'" value="0" max="100" style="width:300px;"></progress>
                  <small id="statusEditar'.$idDoc.'"></small>
                  <p id="loaded_n_totalEditar'.$idDoc.'"></p>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="window.location.reload();">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal agregar video -->
        <div class="modal fade" id="cargarVideo'.$rowQuery['id'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cargar <strong>'.$rowQuery['documento'].'</strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
              </div>
              <div class="modal-body">
                <form id="upload_form">';
                ?>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-youtube text-danger"></i></span>
                    <input type="text" class="form-control" placeholder="Link de video" aria-label="Username" aria-describedby="basic-addon1" name="file<?php echo $idDoc?>" id="fileVideo<?php echo $idDoc?>" required>
                  </div>
                  <br>
                <?php
                echo'
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="window.location.reload();">Cerrar</button>
                <button id="btnGuardar'.$idDoc.'" type="button" class="btn btn-primary" onclick="uploadVideo('.$idDoc.','.$id.')">Guardar</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal editar video -->
        <div class="modal fade" id="editarVideo'.$rowQuery['id'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar <strong>'.$rowQuery['documento'].'</strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
              </div>
              <div class="modal-body">
                <form id="upload_form" terget="#">';
                ?>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-youtube text-danger"></i></span>
                    <input type="text" class="form-control" placeholder="Link de video" aria-label="Username" aria-describedby="basic-addon1" name="file<?php echo $idDoc?>" id="editVideo<?php echo $idDoc?>" value="<?php echo $rowDocs['link']?>" required>
                  </div>
                  <br>
                <?php
                echo'
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="window.location.reload();">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="editVideo('.$idDoc.','.$id.')" id="btnEditar'.$idDoc.'">Editar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    ';
}

?>