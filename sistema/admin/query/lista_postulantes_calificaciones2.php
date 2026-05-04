<?php
include('qc.php');

// Verificar conexión antes de continuar
if (!$conn) {
    die("Error de conexión a la base de datos");
}

// Verificar que la tabla categorías existe
$checkTable = "SHOW TABLES LIKE 'categorias'";
$tableExists = $conn->query($checkTable);

if (!$tableExists || $tableExists->num_rows == 0) {
    die("Error: La tabla 'categorias' no existe en la base de datos");
}

$sqlCategoria = "SELECT * FROM categorias ORDER BY id ASC";
$resultadoCategorias = $conn->query($sqlCategoria);

// 🔥 DIAGNÓSTICO: Verificar si la consulta falló
if (!$resultadoCategorias) {
    echo "<!-- Error en consulta de categorías: " . $conn->error . " -->";
    die("Error en la consulta de categorías: " . $conn->error);
}

// Verificar si hay categorías
if ($resultadoCategorias->num_rows == 0) {
    echo "<div class='alert alert-warning'>No hay categorías registradas</div>";
    echo '</div>'; // Cerrar accordion
    return;
}

echo '<div class="accordion w-100" id="accordionCategorias">';

$i = 0;

while($rowCategoria = $resultadoCategorias->fetch_assoc()){
    $categoria = $rowCategoria['id'];
    
    // Validar que $categoria no sea nulo
    if(empty($categoria)) {
        continue;
    }

    // CONTADOR (solo con 11 documentos)
    $sqlCount = "
        SELECT u.id
        FROM usr u
        INNER JOIN documentos d ON d.id_ext = u.id
        WHERE u.categoria = '$categoria' 
        AND u.perfil = 1
        GROUP BY u.id
        HAVING COUNT(d.id_ext) = 11
    ";
    $resultCount = $conn->query($sqlCount);
    $total = ($resultCount && $resultCount->num_rows > 0) ? $resultCount->num_rows : 0;

    $i++;

    $sqlUsr = "
        SELECT usr.id as id, usr.nombre as nombre, usr.curp as curp, 
               usr.edad as edad, usr.municipio as municipio, usr.telefono as telefono, 
               (SUM(calificacion.calificacion)/15) as promedio 
        FROM usr 
        INNER JOIN calificacion ON usr.id = calificacion.id_ext 
        WHERE categoria = '$categoria' AND perfil = 1 
        GROUP BY id 
        ORDER BY promedio DESC
    ";
    $resultadoUsr = $conn->query($sqlUsr);
    $contarQ = $resultadoUsr ->num_rows;

    echo '
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading'.$i.'">
            <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapse'.$i.'">

                <div>
                    <i class="bi bi-flag-fill text-light me-2"></i>
                    '.htmlspecialchars($rowCategoria['nombre']).'
                </div>

                <span class="badge bg-primary ms-2">'.$contarQ.'</span>
            </button>
        </h2>

        <div id="collapse'.$i.'" class="accordion-collapse collapse" data-bs-parent="#accordionCategorias">
            <div class="accordion-body p-0">

                <!-- BUSCADOR -->
                <div class="input-group mb-3 p-3">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Buscar ..." id="myInput'.$i.'">
                </div>

                <table class="table w-100 m-0">
                    <thead class="text-light text-center" style="background:#e4037d">
                        <tr>
                            <th>Nombre</th>
                            <th>CURP</th>
                            <th>Edad</th>
                            <th>Municipio</th>
                            <th>Teléfono</th>
                            <th>Documentos</th>
                            <th>Calificaciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="myTable'.$i.'">
    ';

    // QUERY PRINCIPAL (promedio)
    // $sqlUsr = "
    //     SELECT usr.id as id, usr.nombre as nombre, usr.curp as curp, 
    //            usr.edad as edad, usr.municipio as municipio, usr.telefono as telefono, 
    //            (SUM(calificacion.calificacion)/15) as promedio 
    //     FROM usr 
    //     INNER JOIN calificacion ON usr.id = calificacion.id_ext 
    //     WHERE categoria = '$categoria' AND perfil = 1 
    //     GROUP BY id 
    //     ORDER BY promedio DESC
    // ";
    // $resultadoUsr = $conn->query($sqlUsr);
    
    // Verificar si la consulta de usuarios falló
    if (!$resultadoUsr) {
        echo '<tr><td colspan="7">Error en consulta: ' . htmlspecialchars($conn->error) . '</td></tr>';
        continue;
    }

    if ($resultadoUsr->num_rows == 0) {
        echo '<tr><td colspan="7" class="text-center">No hay postulantes en esta categoría</td></tr>';
    }

    while($rowUsr = $resultadoUsr->fetch_assoc()){
        $idD = $rowUsr['id'];

        $sqlDoc = "SELECT * FROM documentos WHERE id_ext='$idD'";
        $resultadoDoc = $conn->query($sqlDoc);
        
        if (!$resultadoDoc) {
            continue;
        }
        
        $noDocs = $resultadoDoc->num_rows;

        if($noDocs == 11){

            echo '
            <tr>
                <td>'.htmlspecialchars($rowUsr['nombre']).'</td>
                <td>'.htmlspecialchars($rowUsr['curp']).'</td>
                <td>'.htmlspecialchars($rowUsr['edad']).'</td>
            ';

            $idMun = $rowUsr['municipio'];
            $nombreMunicipio = "No disponible";
            
            if(!empty($idMun) && $idMun > 0) {
                // Consulta segura
                $sqlMun = "SELECT municipio FROM municipio WHERE id = " . intval($idMun);
                $resultadoMun = $conn->query($sqlMun);
                
                if ($resultadoMun && $resultadoMun->num_rows > 0) {
                    $rowMun = $resultadoMun->fetch_assoc();
                    $nombreMunicipio = htmlspecialchars($rowMun['municipio']);
                }
            }

            echo '
                <td>'.$nombreMunicipio.'</td>
                <td>'.htmlspecialchars($rowUsr['telefono']).'</td>
                <td>
                    <a href="listado_docs.php?id='.$idD.'">
                        <span class="badge bg-primary">'.$noDocs.'</span>
                    </a>
                  </td>
                <td>
                    <span class="badge bg-primary">'.round($rowUsr['promedio'], PHP_ROUND_HALF_DOWN).'</span>
                  </td>
              </tr>

            <!-- ACCORDION INTERNO -->
            <tr>
                <td colspan="7" class="p-0">
                    <div class="accordion accordion-flush bg-light" id="accordionFlushExample'.$idD.'">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#flush'.$idD.'">
                                    <i class="bi bi-card-checklist me-2"></i> Descripción de calificaciones
                                </button>
                            </h2>

                            <div id="flush'.$idD.'" class="accordion-collapse collapse">
                                <div class="accordion-body text-start">

                                    <div class="row">
                                        <div class="col-4 text-center border bg-primary text-light"><strong>Jurado</strong></div>
                                        <div class="col-4 text-center border bg-primary text-light"><strong>Documento</strong></div>
                                        <div class="col-4 text-center border bg-primary text-light"><strong>Calificación</strong></div>
                                    </div>
            ';

            $califProm = "SELECT * FROM calificacion WHERE id_ext ='$idD'";
            $resultadoProm = $conn->query($califProm);

            if ($resultadoProm && $resultadoProm->num_rows > 0) {
                while($rowProm = $resultadoProm->fetch_assoc()){

                    $documento = $rowProm['documento'];
                    $nombreDocumento = "No disponible";
                    $docQuery = "SELECT documento FROM catalogo_documentos WHERE id = " . intval($documento);
                    $resultadoDocCat = $conn->query($docQuery);
                    
                    if ($resultadoDocCat && $resultadoDocCat->num_rows > 0) {
                        $rowDoc = $resultadoDocCat->fetch_assoc();
                        $nombreDocumento = htmlspecialchars($rowDoc['documento']);
                    }

                    $jur = $rowProm['id_jurado'];
                    $nombreJurado = "No disponible";
                    $juradoQuery = "SELECT nombre FROM usr WHERE id = " . intval($jur);
                    $resultadoJur = $conn->query($juradoQuery);
                    
                    if ($resultadoJur && $resultadoJur->num_rows > 0) {
                        $rowJur = $resultadoJur->fetch_assoc();
                        $nombreJurado = htmlspecialchars($rowJur['nombre']);
                    }

                    echo '
                    <div class="row">
                        <div class="col-4 text-center border">'.$nombreJurado.'</div>
                        <div class="col-4 text-center border">'.$nombreDocumento.'</div>
                        <div class="col-4 text-center border">'.$rowProm['calificacion'].'</div>
                    </div>';
                }
            } else {
                echo '<div class="row"><div class="col-12 text-center">No hay calificaciones registradas</div></div>';
            }

            echo '
                                </div>
                            </div>
                        </div>
                    </div>
                  </td>
              </tr>
            ';
        }
    }

    echo '
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    ';
}

echo '</div>';
?>