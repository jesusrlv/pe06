<?php
    include('qc.php');

    $sqlCategorias ="SELECT * FROM categorias";
    $resultadoCategorias = $conn -> query($sqlCategorias);
    echo '<option selected value="">Categoría</option>';
    while ($rowCategorias = $resultadoCategorias -> fetch_assoc()){
        echo '
        <option value="'.$rowCategorias['id'].'">'.$rowCategorias['nombre'].'</option>
        ';
    }
?>