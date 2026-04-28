<?php
include('qc.php');
// USA
$sqlPostulantesUSA ="SELECT * FROM usr WHERE perfil = 4";
$resultadoSQLUSA = $conn->query($sqlPostulantesUSA);
$x = 0;
while($rowSQLUSA = $resultadoSQLUSA->fetch_assoc()){
    $x++;
    $idDocs = $rowSQLUSA['id'];
    $contador = "SELECT COUNT(documento) AS contar FROM documentos WHERE id_ext = '$idDocs'";
    $resultadoContar = $conn->query($contador);
    $rowContar = $resultadoContar -> fetch_assoc();
    $numero = $rowContar['contar'];
    if($numero<9){
    echo'
    <tr>
        <td>'.$x.'</td>
        <td>'.$rowSQLUSA['nombre'].'</td>
        <td>'.$rowSQLUSA['curp'].'</td>
        <td>'.$rowSQLUSA['edad'].'</td>
        <td>'.$rowSQLUSA['telefono'].'</td>
        <td>
            <a href="listado_docs.php?id='.$rowSQLUSA['id'].'">';
        if ($numero == 0){
            echo'
            <span class="badge rounded-pill text-bg-danger">
            ';
        }
        else if ($numero == 1 || $numero == 2 || $numero == 3 || $numero == 4 || $numero == 5 || $numero == 6 || $numero == 7 || $numero == 8){
            echo'
            <span class="badge rounded-pill text-bg-warning">
            ';
        }
        else if ($numero == 9){
            echo'
            <span class="badge rounded-pill text-bg-primary">
            ';
        }
            echo'
                '.$numero.'
            </span>
            </a>
        </td>
    </tr>
';
}
}

?>