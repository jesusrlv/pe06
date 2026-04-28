<?php
session_start();
require('conn/qc.php');
if (isset($_POST['usr']) && isset($_POST['pwd'])) {
   
    $id = $_POST['usr'];
    $pwd = $_POST['pwd'];
    $sql = "SELECT * FROM usr WHERE usr = '$id' AND pwd ='$pwd'";
    $resultado_sql = $conn->query($sql);
    if($row_sql=mysqli_fetch_array($resultado_sql)){
        
        if($row_sql['perfil'] == 1){

            $_SESSION['usr'] = $id;
            $_SESSION['perfil'] = $row_sql['perfil'];
            $_SESSION['id'] = $row_sql['id'];
            $_SESSION['nombre'] = $row_sql['nombre'];
            $_SESSION['categoria'] = $row_sql['categoria'];

            echo json_encode(array('success' => 1));
        }
        if($row_sql['perfil'] == 2){

            $_SESSION['usr'] = $id;
            $_SESSION['perfil'] = $row_sql['perfil'];
            $_SESSION['id'] = $row_sql['id'];
            $_SESSION['nombre'] = $row_sql['nombre'];
            $_SESSION['categoria'] = $row_sql['categoria'];


            echo json_encode(array('success' => 2));
        }
        if($row_sql['perfil'] == 3){

            $_SESSION['usr'] = $id;
            $_SESSION['perfil'] = $row_sql['perfil'];
            $_SESSION['id'] = $row_sql['id'];
            $_SESSION['nombre'] = $row_sql['nombre'];
            $_SESSION['categoria'] = $row_sql['categoria'];


            echo json_encode(array('success' => 3));
        }
        if($row_sql['perfil'] == 4){

            $_SESSION['usr'] = $id;
            $_SESSION['perfil'] = $row_sql['perfil'];
            $_SESSION['id'] = $row_sql['id'];
            $_SESSION['nombre'] = $row_sql['nombre'];
            $_SESSION['categoria'] = $row_sql['categoria'];


            echo json_encode(array('success' => 4));
        }
    } 
        else{
            session_abort();
            echo json_encode(array('success' => 0));
            
        }
   
} else {
    session_abort();
    echo json_encode(array('success' => 0));
    
}
