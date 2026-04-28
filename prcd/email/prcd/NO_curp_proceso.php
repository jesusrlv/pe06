<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<!DOCTYPE html>
   <html>
    
    <head>

        

       <meta charset="utf-8">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    </head>
<body>

<?php

    //validación
    include('../../dashboard/prcd/conn.php');
    $curp= $_POST['usuario'];
    $validacion="SELECT * FROM usr WHERE usuario='$curp'";
    $validar=$conn->query($validacion);
    $row=$validar->fetch_assoc();


$row_cnt = $validar->num_rows;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'email/Exception.php';
    require 'email/PHPMailer.php';
    require 'email/SMTP.php';
    

// if($conn->query($validacion)){

//    echo "<script type=\"text/javascript\">Swal.fire('Usuario ya registrado').then(function(){window.location='index.html';});</script>";
    
// } 
//validar

// if($validar['curp']!==$curp){
// if(mysqli_num_rows($validar)==0){
if($row_cnt == 0){
    //codigo aleatorio
    echo "<script type=\"text/javascript\">Swal.fire(
        'No existe este usuario',
        'Favor de registrarte en la plataforma',
        'warning'
      ).then(function(){window.location='../index.php';});</script>";
}
else{
    // echo "<script type=\"text/javascript\">Swal.fire('Usuario ya registrado').then(function(){window.location='index.html';});</script>";
    
   
    $row=$validar->fetch_assoc();
    
    $usuario=$row['usuario'];
    $pwd=md5($row['pwd']);
    $nombre=$row['nombre'];
    $email=$row['correo'];


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.correoexchange.com.mx';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'jesusrlv@zacatecas.gob.mx';                     // SMTP username
    $mail->Password   = 'DPeJ1Ax3Zc';                               // SMTP password
    $mail->SMTPSecure = 'TLS';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('jesusrlv@zacatecas.gob.mx', 'PEJ21 - INJUVENTUD');
    $mail->addAddress($email, $nombre);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('tecnologias.injuventud@gmail.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';                                  // Set email format to HTML
    $mail->Subject = 'Recuperar datos de usuario';
    $mail->Body    = 'Este mensaje es para recuperar tus datos de acceso a la plataforma del <b>Premio Estatal de la Juventud</b>.<br><br>Usuario: '.$usuario.'<br>Contraseña: '.$pwd.'';
    $mail->AltBody = 'Mensaje para recuperar acceso';

    $mail->send();
    // echo 'Message has been sent';
    echo "<script type=\"text/javascript\">Swal.fire(
        'Usuario ya registrado',
        'Se envió a tu correo electrónico tu usuario y contraseña',
        'warning'
      ).then(function(){window.location='../../index.php';});</script>";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo $email;
}

}    
?>


</body>

</html>