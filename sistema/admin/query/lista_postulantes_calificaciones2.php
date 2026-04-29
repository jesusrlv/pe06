<?php
include('qc.php');

$sqlCategoria = "SELECT * FROM categorias ORDER BY id ASC";
$resultadoCategorias = $conn->query($sqlCategoria);

echo '<div class="accordion w-100" id="accordionCategorias">';

$i = 0;

while($rowCategoria=$resultadoCategorias->fetch_assoc()){
    $categoria = $rowCategoria['id'];

    // 🔹 CONTADOR (solo con 11 documentos)
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
    $total = $resultCount ? $resultCount->num_rows : 0;

    $i++;

    echo '
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading'.$i.'">
            <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapse'.$i.'">

                <div>
                    <i class="bi bi-flag-fill text-light me-2"></i>
                    '.$rowCategoria['nombre'].'
                </div>

                <span class="badge bg-primary ms-2">'.$total.'</span>
            </button>
        </h2>

        <div id="collapse'.$i.'" class="accordion-collapse collapse" data-bs-parent="#accordionCategorias">
            <div class="accordion-body p-0">

                <!-- 🔍 BUSCADOR -->
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

    // 🔹 QUERY PRINCIPAL (promedio)
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

    while($rowUsr=$resultadoUsr->fetch_assoc()){
        $idD = $rowUsr['id'];

        $sqlDoc = "SELECT * FROM documentos WHERE id_ext='$idD'";
        $resultadoDoc = $conn->query($sqlDoc);
        $noDocs=$resultadoDoc->num_rows;

        if($noDocs == 11){

            echo '
            <tr>
                <td>'.$rowUsr['nombre'].'</td>
                <td>'.$rowUsr['curp'].'</td>
                <td>'.$rowUsr['edad'].'</td>
            ';

            $idMun = $rowUsr['municipio'];
            $sqlMun = "SELECT * FROM municipio WHERE id = '$idMun'";
            $resultadoMun = $conn->query($sqlMun);
            $rowMun = $resultadoMun->fetch_assoc();

            echo '
                <td>'.$rowMun['municipio'].'</td>
                <td>'.$rowUsr['telefono'].'</td>
                <td>
                    <a href="listado_docs.php?id='.$idD.'">
                        <span class="badge bg-primary">'.$noDocs.'</span>
                    </a>
                </td>
                <td>
                    <span class="badge bg-primary">'.round($rowUsr['promedio'],PHP_ROUND_HALF_DOWN).'</span>
                </td>
            </tr>

            <!-- 🔽 ACCORDION INTERNO -->
            <tr>
                <td colspan="7">
                    <div class="accordion accordion-flush" id="accordionFlushExample'.$idD.'">
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
                    <div class="col-4 text-center border">'.$rowJur['nombre'].'</div>
                    <div class="col-4 text-center border">'.$rowDoc['documento'].'</div>
                    <div class="col-4 text-center border">'.$rowProm['calificacion'].'</div>
                </div>';
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