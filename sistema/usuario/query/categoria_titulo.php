<?php
    include('qc.php');

    $categoria = $_POST['categoria'];

    $sqlCategorias ="SELECT * FROM categorias WHERE id = '$categoria'";
    $resultadoCategorias = $conn -> query($sqlCategorias);
    $rowCat = $resultadoCategorias->fetch_assoc();
    $categoria = $rowCat['nombre'];

    echo json_encode(array('cat'=>$categoria));
    
?>