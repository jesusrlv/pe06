<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        require('../dashboard/prcd/conn.php');
    ?>
  

  <title>PREMIO ESTATAL DE LA JUVENTUD 2022</title>
  <link rel="icon" type="image/png" href="../img/icon.ico"/>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/signin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/4d63b5ef28.js" crossorigin="anonymous"></script>

  <!-- script validate -->
  <script src="../dashboard/prcd/validacion_pwd.js"></script>
  <script src="../dashboard/prcd/validacion.js"></script>
  <link href="../dashboard/css/CheckPassword.css" rel="stylesheet" />

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">


  <script type="text/javascript">
  $(document).ready(function() {	
      $('#username').on('blur', function() {
          $('#result-username').html('<img src="dashboard/img/loader.gif" />').fadeOut(1000);
  
          var username = $(this).val();		
          var dataString = 'username='+username;
  
          $.ajax({
              type: "POST",
              url: "verficacion.php",
              data: dataString,
              success: function(data) {
                  $('#result-username').fadeIn(1000).html(data);
              }
          });
      });              
  });    
  </script>
  <!-- script validate -->

  <!-- script visual -->
<script>
 function myFunction() {
  var x = document.getElementById("exampleInputPassword1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
</script>
  <!-- script visual -->

</head>

<body class="text-center" style="background-image: url(../img/fondo.jpg); background-repeat: repeat;background-attachment: fixed;  
background-size: 500px 300px;">



<!-- <form class="form-signin" action="dashboard.html" method="POST" name="envio"> -->
<form class="form-signin" action="prcd/curp_proceso.php" name="envio" method="POST">
  <img class="mb-4" src="../img/logo.png" alt="" width="100%" >
  <h3></h3>
  <hr>
  <h1 class="h4 mb-3 font-weight-normal"><i class="bi bi-key"></i> Recordar accesos</h1>
  <label for="inputEmail" class="sr-only">Usuario</label>
  <input type="text" id="inputEmail" class="form-control" placeholder="CURP" name="usuario" required autofocus>
  <small>Los datos se enviarán al correo que registraste.</small>
  <!-- <label for="inputPassword" class="sr-only">Contraseña</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="pwd" required> -->
  <div class="checkbox mb-3">
    <!-- <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label> -->
  </div>
  <button class="btn btn-lg btn-primary btn-block" name="Submit" type="submit"><i class="bi bi-envelope-fill"></i> Enviar datos de acceso</button>
  
    <hr>

    <h6><a href="../index.php" class="text-light" style="text-decoration:none;"><i class="bi bi-house-fill"></i> Página principal</a></h6>

    <p class="mt-5 mb-3 text-light"> Desarrollo: <strong>INJUVENTUD</strong><br>Gobierno del estado de Zacatecas<br>2021 - 2027</p>
</form>


</body>

</html>

<!--MODAL-->




