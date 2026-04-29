<?php
include('qc.php');

$sqlCategoria = "SELECT * FROM categorias ORDER BY id ASC";
$resultadoCategorias = $conn->query($sqlCategoria);

echo '<div class="accordion w-100" id="accordionCategorias">';

$i = 0;

while($rowCategoria=$resultadoCategorias->fetch_assoc()){
    $categoria = $rowCategoria['id'];

    // 🔹 Contador de participantes con MENOS de 11 documentos
    $sqlCount = "
        SELECT u.id
        FROM usr u
        LEFT JOIN documentos d ON d.id_ext = u.id
        WHERE u.categoria = '$categoria' 
        AND u.perfil = 1
        GROUP BY u.id
        HAVING COUNT(d.id_ext) < 11
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

                <!-- 📊 TABLA -->
                <table class="table w-100 m-0">
                    <thead class="text-light text-center" style="background:#e4037d">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>CURP</th>
                            <th>Edad</th>
                            <th>Email</th>
                            <th>Municipio</th>
                            <th>Teléfono</th>
                            <th>Documentos</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="myTable'.$i.'">
    ';

    // 🔹 Usuarios (solo < 11 documentos)
    $sqlUsr = "SELECT * FROM usr WHERE categoria = '$categoria' AND perfil = 1 ORDER BY id ASC";
    $resultadoUsr = $conn->query($sqlUsr);
    $x=0;

    while($rowUsr=$resultadoUsr->fetch_assoc()){
        $idD = $rowUsr['id'];

        $sqlDoc = "SELECT * FROM documentos WHERE id_ext='$idD'";
        $resultadoDoc = $conn->query($sqlDoc);
        $noDocs=$resultadoDoc->num_rows;

        if($noDocs < 11){
            $x++;

            echo '
            <tr>
                <td>'.$x.'</td>
                <td style="text-transform: uppercase;">'.$rowUsr['nombre'].'</td>
                <td>'.$rowUsr['curp'].'</td>
                <td>'.$rowUsr['edad'].'</td>
                <td>'.$rowUsr['usr'].'</td>
            ';

            $idMun = $rowUsr['municipio'];
            $sqlMun = "SELECT * FROM municipio WHERE id = '$idMun'";
            $resultadoMun = $conn->query($sqlMun);
            $rowMun = $resultadoMun->fetch_assoc();

            echo '
                <td>'.$rowMun['municipio'].'</td>
                <td>'.$rowUsr['telefono'].'</td>
            ';

            if($noDocs==0){
                echo '<td><span class="badge text-bg-danger">'.$noDocs.'</span></td>';
            }
            else{
                echo '<td><a href="listado_docs.php?id='.$idD.'"><span class="badge text-bg-warning">'.$noDocs.'</span></a></td>';
            }

            echo '</tr>';
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