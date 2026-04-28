<?php
    include('qc.php');

    $sqlMunicipio ="SELECT * FROM municipio";
    $resultadoMunicipio = $conn -> query($sqlMunicipio);
    echo '<option selected value="">Municipio</option>';
    while ($rowMunicipio = $resultadoMunicipio -> fetch_assoc()){
        echo '
        <option value="'.$rowMunicipio['id'].'">'.$rowMunicipio['municipio'].'</option>
        ';
    }
?>