<?php
include('qc.php');

$sqlCategoria = "SELECT * FROM categorias ORDER BY id ASC";
$resultadoCategorias = $conn->query($sqlCategoria);

echo '<div class="accordion w-100" id="accordionCategorias">';

$i = 0;

while($rowCategoria = $resultadoCategorias->fetch_assoc()){
    $categoria = $rowCategoria['id'];
    $categoriaNombre = $rowCategoria['nombre'];
    
    // 🔹 CONTADOR: Total de usuarios en esta categoría (sin filtrar por documentos)
    $sqlCount = "SELECT COUNT(*) as total FROM usr WHERE categoria = '$categoria' AND perfil = 1";
    $resultCount = $conn->query($sqlCount);
    $rowCount = $resultCount->fetch_assoc();
    $total = $rowCount['total'];

    $i++;

    echo '
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading'.$i.'">
            <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapse'.$i.'">
                <div>
                    <i class="bi bi-flag-fill text-dark me-2"></i>
                    '.$categoriaNombre.'
                </div>
                <span class="badge bg-primary rounded-pill ms-2">'.$total.'</span>
            </button>
        </h2>

        <div id="collapse'.$i.'" class="accordion-collapse collapse" data-bs-parent="#accordionCategorias">
            <div class="accordion-body p-0">

                <!-- 🔍 BUSCADOR -->
                <div class="input-group mb-3 p-3">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control buscar-categoria" placeholder="Buscar ..." data-tabla="myTable'.$i.'">
                </div>

                <!-- 📊 TABLA -->
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

    // 🔹 Usuarios (TODOS, sin filtrar por documentos)
    $sqlUsr = "SELECT * FROM usr WHERE categoria = '$categoria' AND perfil = 1 ORDER BY id ASC";
    $resultadoUsr = $conn->query($sqlUsr);
    $x = 0;

    while($rowUsr = $resultadoUsr->fetch_assoc()){
        $x++;
        $idD = $rowUsr['id'];
        
        // Contar documentos del usuario
        $sqlDoc = "SELECT COUNT(*) as total FROM documentos WHERE id_ext='$idD'";
        $resultadoDoc = $conn->query($sqlDoc);
        $rowDoc = $resultadoDoc->fetch_assoc();
        $noDocs = $rowDoc['total'];

        echo '
        <tr>
            <td>'.$x.'</td>
            <td class="text-start">'.strtoupper($rowUsr['nombre']).'</td>
            <td>'.$rowUsr['curp'].'</td>
            <td>'.$rowUsr['edad'].'</td>
        ';

        // Municipio
        $idMun = $rowUsr['municipio'];
        $sqlMun = "SELECT * FROM municipio WHERE id = '$idMun'";
        $resultadoMun = $conn->query($sqlMun);
        $rowMun = $resultadoMun->fetch_assoc();
        $nombreMunicipio = $rowMun ? $rowMun['municipio'] : 'No especificado';

        echo '
            <td>'.$nombreMunicipio.'</td>
            <td>'.$rowUsr['telefono'].'</td>
            <td>'.$rowUsr['usr'].'</td>
            <td class="text-center">
                <a href="listado_docs.php?id='.$idD.'">
                ';
        if ($noDocs == 0) {
            echo '<span class="badge bg-danger">'.$noDocs.'</span>';
        } else if ($noDocs < 11 && $noDocs > 0) {
            echo '<span class="badge bg-warning">'.$noDocs.'</span>';
        }
        else {
            echo '<span class="badge bg-primary">'.$noDocs.'</span>';
        }
        echo '
                </a>
            </td>
        </tr>
        ';
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