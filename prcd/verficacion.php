<?php 
require('conn/qc.php');
sleep(1);
if (isset($_POST)) {
    $username = (string)$_POST['username'];
 
    $result = $conn->query(
        "SELECT * FROM usr WHERE curp = '$username'"
    );
    
 
    if ($result->num_rows > 0) {
        $resticcion = $result->fetch_assoc();
        $varRest = $resticcion['categoria'];
        if($varRest == 2021 || $varRest == 2022 || $varRest == 2023){
            echo '<div class="alert alert-warning text-start"><strong><i class="bi bi-x-circle-fill"></i> ERROR.</strong> YA HAS SIDO GANADOR DEL PEJ EN EDICIONES ANTERIORES. A partir de la fecha en que ganaste, puedes participar nuevamente en 3 años.</div>
        
            <style>
                #boton_submit{display:none;}
            </style>
            ';

        }else{
            echo '<div class="alert alert-danger text-start"><strong><i class="bi bi-x-circle-fill"></i> ERROR.</strong> Ya se ha registrado este usuario anteriormente.</div>
        
            <style>
                #boton_submit{display:none;}
            </style>
            ';

        }
       
        
    } else {
        echo '<div class="alert alert-success text-start"><strong><i class="bi bi-check-square"></i> CORRECTO.</strong> Usuario disponible.</div>';
    }
}

?>

