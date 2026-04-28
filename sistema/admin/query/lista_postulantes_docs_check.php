<?php
include('qc.php');
// Mx
// $idDocs = $rowSQL['id'];
// join
$sqlJoin ="SELECT usr.nombre as nombre,usr.curp as curp, documentos.documento as documento,documentos.id_ext as id_ext,documentos.link as link FROM usr INNER JOIN documentos ON usr.id = documentos.id_ext"
// join

$usuario = "SELECT * FROM usr WHERE perfil = 1";
$resultadoID = $conn->query($usuario);
$rowID = $resultadoID -> fetch_assoc();

$ContarDocs ="SELECT COUNT(documento) AS documento FROM catalogo_documentos";
$resultadoContarDOCS = $conn->query($ContarDocs);
$rowContarDOCS = $resultadoContarDOCS -> fetch_assoc();
$docs = $rowContarDOCS['documento'];

$sqlDocumentos ="SELECT * FROM documentos WHERE id_ext = $id";
$resultadoSQL = $conn->query($sqlDocumentos);
$x = 0;
while($rowSQL = $resultadoSQL->fetch_assoc()){
    $x++;
    
echo'
    <tr>
        <td>'.$x.'</td>
        <td>'.$rowID['nombre'].'</td>
        <td>'.$rowID['curp'].'</td>';
        if(!empty($rowSQL['documento']==1)){
            echo'
            <td><i class="bi bi-check-circle-fill"></i></td>
            ';
        }else{
            echo'
            <td><i class="bi bi-x-circle-fill"></i></td>
            ';
        }
        if(!empty($rowSQL['documento']==2)){
            echo'
            <td><i class="bi bi-check-circle-fill"></i></td>
            ';
        }else{
            echo'
            <td><i class="bi bi-x-circle-fill"></i></td>
            ';
        }
        if(!empty($rowSQL['documento']==3)){
            echo'
            <td><i class="bi bi-check-circle-fill"></i></td>
            ';
        }else{
            echo'
            <td><i class="bi bi-x-circle-fill"></i></td>
            ';
        }
        if(!empty($rowSQL['documento']==4)){
            echo'
            <td><i class="bi bi-check-circle-fill"></i></td>
            ';
        }else{
            echo'
            <td><i class="bi bi-x-circle-fill"></i></td>
            ';
        }
        if(!empty($rowSQL['documento']==5)){
            echo'
            <td><i class="bi bi-check-circle-fill"></i></td>
            ';
        }else{
            echo'
            <td><i class="bi bi-x-circle-fill"></i></td>
            ';
        }
        if(!empty($rowSQL['documento']==6)){
            echo'
            <td><i class="bi bi-check-circle-fill"></i></td>
            ';
        }else{
            echo'
            <td><i class="bi bi-x-circle-fill"></i></td>
            ';
        }
        if(!empty($rowSQL['documento']==7)){
            echo'
            <td><i class="bi bi-check-circle-fill"></i></td>
            ';
        }else{
            echo'
            <td><i class="bi bi-x-circle-fill"></i></td>
            ';
        }
        if(!empty($rowSQL['documento']==8)){
            echo'
            <td><i class="bi bi-check-circle-fill"></i></td>
            ';
        }else{
            echo'
            <td><i class="bi bi-x-circle-fill"></i></td>
            ';
        }
        if(!empty($rowSQL['documento']==9)){
            echo'
            <td><i class="bi bi-check-circle-fill"></i></td>
            ';
        }else{
            echo'
            <td><i class="bi bi-x-circle-fill"></i></td>
            ';
        }
        
echo'
    </tr>
';
}


?>