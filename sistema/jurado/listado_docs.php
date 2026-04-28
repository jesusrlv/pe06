<?php
session_start();

$id = $_SESSION['id'];
$usr = $_SESSION['usr'];
$nombre = $_SESSION['nombre'];
$perfil = $_SESSION['perfil'];
$categoria = $_SESSION['categoria'];
$idPostulante = $_REQUEST['id'];
include('query/name.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="INJUVENTUD" content="PEJ 2025">
    <meta name="" content="">
    <link rel="icon" type="image/png" href="../../img/icon.ico" sizes="22x21">
    <title>Perfil Jurado | PEJ 2025</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <script src="../../js/files.js"></script>
    <script src="../../js/calificaciones.js"></script>
    <!-- <script src="../../js/index.js"></script> -->

     <!-- type font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400&display=swap" rel="stylesheet"> 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
     *{
        font-family: 'Montserrat', sans-serif;
      }
      #colorRounded{
        background-color: rgba(61, 42, 93, 0.9);
      }
      #imgPortrait{
        background-image: url('../../img/fondo_pej2025.png');

        object-fit: cover;
        background-position: auto 100%; /* Center the image */
        background-repeat: repeat;
        background-size: 100% auto; /* Resize the background image to cover the entire container */
        /* background-position: center; */
        width:100%; 
        height:100%;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      /* buttons hover */

      /* #botonesFiles:hover {
    
        box-shadow: 0 10px 20px rgba(0,0,0,.1), 0 4px 8px rgba(0,0,0,.06);
        transform: scale(1.03);
        transition: width 0.8s, height 0.8s, transform 0.3s;
        
      } */
      .card{
        box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
      }
      .card:hover{
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
        transition: width 0.8s, height 0.8s, transform 0.3s;
      }
     
      /* CELULAR */
      @media screen and (max-width: 600px) {
        .card:active{
          transform: scale(1.03);
          transition: width 0.3s, height 0.3s, transform 0.3s;
        }
        #imgPortrait{

        object-fit: cover;
        background-repeat: no-repeat;
        background-size: 350% 18%; /* Resize the background image to cover the entire container */
        background-position: 0 0;
        
      
        }
        #colorRounded{
          background-color: rgba(61, 42, 93, 0.9);
          border-radius:0px;
        }
        #textPortada{
          font-size:8px;
        }
      }
    </style>

    
  </head>
 <header>
<span id="inicio"></span>
  <div class="navbar navbar-dark shadow-sm" style="background:#ff9d07">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <img src="../../img/logo_injuventud_0.png" width="20" alt="" class="me-1">
        <strong>JURADO | PEJ 2024</strong>
      </a>
      <a href="prcd/sort.php" type="button" class="btn btn-sm btn-outline-light"><i class="bi bi-door-open"></i> Salir</a>
    </div>
  </div>
</header>

  <body onload="categoriaCompleta();">

<main id="imgPortrait">


<section class="text-center container">
    <!-- <div class="row py-lg-5"  style="background-image: url('../../img/logo_consejo_05.png')"> -->
    <div class="row py-lg-5" >
      <div class="col-lg-6 col-md-8 mx-auto rounded p-2" id="colorRounded">
      <h1 class="fw-light"><img src="../../img/logo_pej2025_01.png" alt="" width="100%" style="padding:10px; border-radius: 15px;"></h1>
        <h2 class="fw-bold" style="color:white">Bienvenid@</h2>
        <h2 class="fw-bold" style="color:white"><i class="bi bi-person-circle"></i></h2>

	<?php echo '<input type="text" value="'.$categoria.'" id="catCompleto" hidden>'?>
	<h5 class="fw-bold" style="color:white">Mesa: <output id="categoriaOut"></h5>

        <p id="resultSpan"></p>
        <p class="lead text-light mt-2">Sistema de calificación del PEJ en su edición 2024.</p>
        <p>
          <hr class="text-secondary">
          <a href="#seccion_convocatoria" class="btn btn-primary my-2"><i class="bi bi-clipboard-data-fill"></i> Dashboard</a>
      </div>
    </div>
  </section>
  <div class="album py-5 bg-light mb-0" hidden>
    <div class="container">
      <div class="d-grid gap-2">
        <a href="index.php" class="btn btn-outline-primary" type="button"><i class="bi bi-arrow-bar-left"></i> Regresar lista principal</a>
      </div>
    </div>
  </div>
  <div class="album py-5 bg-light">
    <div class="container">
       
      <div class="mb-0">
        <p><span id="seccion_convocatoria"></span>
          <p class="h2 text-secondary" ><i class="bi bi-file-earmark-post-fill"></i> Documentos | <a href="#inicio"><i class="bi bi-arrow-bar-up"></i></a></p>
        <p><small>POSTULANTE: <strong><?php echo $rowName['nombre']?></strong>.</small></p>
      </div>
      
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
       
      <table class="table">
          <thead class="text-light text-center" style="background:#e4037d">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Documento</th>
              <th scope="col">Descripción</th>
              <th scope="col">Link</th>
              <th scope="col">Calificar</th>
              <th scope="col">Calificación</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
            include('query/listado_documentos.php');
            ?>
          </tbody>
        </table>

      </div><!-- row -->
      <div class="d-grid gap-2 mt-5">
        <a href="index.php" class="btn btn-outline-primary" type="button"><i class="bi bi-arrow-bar-left"></i> Regresar lista principal</a>
      </div> 
    </div>
  </div>

</main>
</body>

  </body>
</html>
<script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $("a[href^='#']").click(function(e) {
    e.preventDefault();
    
    var position = $($(this).attr("href")).offset().top;

    $("body, html").animate({
        scrollTop: position
    } /* speed */ );
});

</script>
