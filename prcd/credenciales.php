<html>
    <header>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </header>
<body>

<?php
require('conn/qc.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'email/prcd/email/Exception.php';
require 'email/prcd/email/PHPMailer.php';
require 'email/prcd/email/SMTP.php';

$email = $_POST['email'];

$stmt = $conn->prepare("SELECT * FROM usr WHERE usr = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultadoSql = $stmt->get_result();
    $rowSql = $resultadoSql->fetch_assoc();
    $no_resultados = $resultadoSql->num_rows;
    
    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conn->close();


// if(!empty($rowSql['email'])){
if($no_resultados == 1){
    $nombre = $rowSql['nombre'];
    $pwd = $rowSql['pwd'];

        // email
        $mail = new PHPMailer(true);

        try {

            //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        //$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->Host = 'mailc76.carrierzone.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username = 'injuventud@zacatecas.gob.mx';                     // SMTP username
        $mail->Password = 'De6/thf.613';                               // SMTP password
        $mail->SMTPSecure = 'SSL';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to 587 465
        
            //Recipients
            $mail->setFrom('injuventud@zacatecas.gob.mx', 'PREMIO ESTATAL DE LA JUVENTUD 2024 - INJUVENTUD');
            $mail->addAddress($email, $nombre);     // Add a recipient
        
            // Content
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';                                  // Set email format to HTML
            $mail->Subject = 'Recuperar credenciales';
            $mail->Body    = '<p>El presente correo es para recuperar tus credenciales de acceso al sistema del Premio Estatal de la Juventud 2024.</p>
            
            <p>Usuario: '.$email.'</p>
            <p>Contraseña: '.$pwd.'</p>
            
            <p><strong>Atentamente</strong></p>
            <p>INSTITUTO DE LA JUVENTUD DEL ESTADO DE ZACATECAS</p>';
            $mail->AltBody = 'Mensaje registro';
        
            $mail->send();

          
                echo"
                <script>
                    Swal.fire({
                        icon: 'success',
                        imageUrl: '../img/logo_injuventud_01.png',
                        imageHeight: 200,
                        title: 'Correo enviado',
                        text: 'Se envío un correo con tus datos de acceso',
                        confirmButtonColor: '#3085d6',
                        footer: 'INJUVENTUD'
                    }).then(function(){window.location='../index.html';});
                </script>
                ";
            
          
               
            

        }catch (Exception $e) {
            echo "
           
            Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                imageUrl: 'img/logo_injuventud_01.png',
                imageHeight: 200,
                title: 'Fallo',
                text: 'No se envió el correo',
                confirmButtonColor: '#3085d6',
                footer: 'INJUVENTUD'
            }).then(function(){window.location='../index.html';});
            </script>
            ";
        }    
    
}
else{
    // $error = $conn->error;
    // echo $error;

    echo"
                <script>
                Swal.fire({
                    icon: 'error',
                    imageUrl: 'img/logo_injuventud_01.png',
                    imageHeight: 200,
                    title: 'Fallo',
                    text: 'No se envió el correo',
                    confirmButtonColor: '#3085d6',
                    footer: 'INJUVENTUD'
                }).then(function(){window.location='../index.html';});
                </script>
                ";
 }

?>

</body>
</html>
