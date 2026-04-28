<?php
    // include('../query/qc.php');

    $sqlVisualizar = "SELECT * FROM usr WHERE id = '$id'";
    $resultadoVisualizar = $conn -> query($sqlVisualizar);
    $rowVisualizar = $resultadoVisualizar -> fetch_assoc();
    $municipio = $rowVisualizar['municipio'];

    $sqlMunicipio ="SELECT * FROM municipio WHERE id = '$municipio'";
    $resultadoMunicipio = $conn -> query($sqlMunicipio);
    $rowMunicipio = $resultadoMunicipio -> fetch_assoc();

    $sqlMunicipio2 ="SELECT * FROM municipio";
    $resultadoMunicipio2 = $conn -> query($sqlMunicipio2);
    

    echo'
    <!-- Modal visualizar-->
    <div class="modal fade" id="modalEditar" tabindex="-1"  data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-secondary text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-circle"></i> Datos personales</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="prcd/editar_datos_personales.php" method="POST">
                
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" value="'.$rowVisualizar['nombre'].'" name="nombre" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" placeholder="Usuario" aria-label="Usuario" aria-describedby="basic-addon1" value="'.$rowVisualizar['usr'].'" name="usr" disabled>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-vcard"></i></span>
                    <input type="text" class="form-control" placeholder="CURP" aria-label="CURP" aria-describedby="basic-addon1" value="'.$rowVisualizar['curp'].'" name="curp" disabled>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-123"></i></span>
                    <input type="text" class="form-control" placeholder="Edad" aria-label="Edad" aria-describedby="basic-addon1" value="'.$rowVisualizar['edad'].'" name="edad" disabled>
                </div>
                


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Actualizar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cerrar</button>
                </form>
            </div>
            </div>
        </div>
    </div>';
