<?php
include('qc.php');

$sqlCategoria = "SELECT * FROM categorias ORDER BY id ASC";
$resultadoCategorias = $conn->query($sqlCategoria);

echo '<div class="accordion w-100" id="accordionCategorias">';

$i = 0;

while($rowCategoria=$resultadoCategorias->fetch_assoc()){
    $categoria = $rowCategoria['id'];

    // 🔹 Contador participantes con 11 documentos
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
                    <i class="bi bi-flag-fill text-success me-2"></i>
                    '.$rowCategoria['nombre'].'
                </div>

                <span class="badge ms-2 bg-primary">'.$total.'</span>
            </button>
        </h2>

        <div id="collapse'.$i.'" class="accordion-collapse collapse" data-bs-parent="#accordionCategorias">
            <div class="accordion-body p-0">

            <div class="input-group mb-3 p-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
        <input type="text" class="form-control" placeholder="Buscar ..." aria-label="Buscar ..." aria-describedby="basic-addon1" id="myInput'.$i.'">
      </div>

            <table class="table w-100 m-0">
                <thead class="text-light text-center" style="background:#e4037d">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>CURP</th>
                        <th>Edad</th>
                        <th>Municipio</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Documentos</th>
                    </tr>
                </thead>
                <tbody class="text-center" id="myTable'.$i.'">
    ';

    // 🔹 Usuarios
    $sqlUsr = "SELECT * FROM usr WHERE categoria = '$categoria' AND perfil = 1 ORDER BY id ASC";
    $resultadoUsr = $conn->query($sqlUsr);
    $x=0;

    while($rowUsr=$resultadoUsr->fetch_assoc()){
        $idD = $rowUsr['id'];

        $sqlDoc = "SELECT * FROM documentos WHERE id_ext='$idD'";
        $resultadoDoc = $conn->query($sqlDoc);
        $noDocs=$resultadoDoc->num_rows;

        if($noDocs == 11){
            $x++;

            echo '
            <tr>
                <td>'.$x.'</td>
                <td>'.strtoupper($rowUsr['nombre']).'</td>
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
                <td>'.$rowUsr['usr'].'</td>
                <td>
                    <a href="listado_docs.php?id='.$idD.'">
                        <span class="badge bg-primary">'.$noDocs.'</span>
                    </a>
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