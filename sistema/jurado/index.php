<?php
session_start();

$id = $_SESSION['id'];
$usr = $_SESSION['usr'];
$nombre = $_SESSION['nombre'];
$perfil = $_SESSION['perfil'];
$categoria = $_SESSION['categoria'];

if(empty($id)){
	session_start();
	session_destroy();
	$_SESSION = [];

	echo "<script type=\"text/javascript\">location.href='prcd/sort.php';</script>";
}

?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="INJUVENTUD" content="PEJ2025">
    <meta name="" content="">
    <link rel="icon" type="image/png" href="../../img/icon.ico" sizes="22x21">
    <title>Perfil Jurado | PEJ2025</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <script src="../../js/files.js"></script>
    <script src="../../js/jur.js"></script>
    <!-- <script src="../../js/index.js"></script> -->

     <!-- type font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400&display=swap" rel="stylesheet"> 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
  <body onload="categoriaCompleta();criterios(<?php echo $categoria ?>)">
    
<header>
<span id="inicio"></span>
  <div class="navbar navbar-dark shadow-sm" style="background:#ff9d07">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <img src="../../img/logo_injuventud_0.png" width="20" alt="" class="me-1">
        <strong>JURADO | PEJ 2025</strong>
      </a>
      <a href="prcd/sort.php" type="button" class="btn btn-sm btn-outline-light"><i class="bi bi-door-open"></i> Salir</a>
    </div>
  </div>
</header>

<main id="imgPortrait">
  <section class="text-center container">
    <!-- <div class="row py-lg-5"  style="background-image: url('../../img/logo_consejo_05.png')"> -->
    <div class="row py-lg-5" >
      <div class="col-lg-6 col-md-8 mx-auto rounded p-2" id="colorRounded">
        <h1 class="fw-light"><img src="../../img/logo_pej2025_01.png" alt="" width="100%" style="padding:10px; border-radius: 15px;"></h1>
        <h2 class="fw-bold" style="color:white">Bienvenid@</h2>
        <h2 class="fw-bold" style="color:white"><i class="bi bi-person-circle"></i></h2>
        <h2 class="fw-bold" style="color:white"><?php echo $nombre ?></h2>
        <?php echo '<input type="text" value="'.$categoria.'" id="catCompleto" hidden>'?>
        <h5 class="fw-bold" style="color:white">Mesa: <output id="categoriaOut"></h5>
        <p id="resultSpan"></p>
        <p class="lead text-light mt-2">Sistema de calificación del INJUVENTUD del PEJ2025.</p>
        <p>
          <hr class="text-secondary">
          <a href="#seccion_convocatoria" class="btn btn-primary my-2"><i class="bi bi-clipboard-data-fill"></i> Dashboard</a>
        </p>
      </div>
    </div>
  </section>

  <!-- <div class="album py-5 bg-light">
    <div class="container">
      <div class="mb-4">
        <p><span id="seccion_convocatoria"></span>
          <p class="h2 text-secondary">
            <i class="bi bi-clipboard-data-fill"></i> Dashboard | 
              <a href="#inicio">
                <i class="bi bi-arrow-bar-up"></i>
              </a>
          </p>
        </p>
        <p><small>Dashboard<strong> postulantes</strong>.</small></p>
      </div>
      
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"> -->
        
        <?php //include('query/docs_contador.php'); ?>
        <?php //include('query/docs_contador.php'); ?>
        
      <!-- </div> -->
      <!-- row -->
    <!-- </div>
  </div> -->

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="mb-4">
        <p><span id=""></span>
          <p class="h2 text-secondary" ><i class="bi bi-clipboard-check-fill"></i> Lista de postulantes | <a href="#inicio"><i class="bi bi-arrow-bar-up"></i></a></p></p>
        <p><small>Listado de los <strong>postulantes</strong> al PEJ5.</small></p>
      </div>
      
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
        <input type="text" class="form-control" placeholder="Buscar ..." aria-label="Buscar ..." aria-describedby="basic-addon1" id="myInput">
      </div>

       
      <table class="table">
          <thead class="text-light text-center" style="background:#e4037d">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">CURP</th>
              <th scope="col">Edad</th>
              <th scope="col">Municipio</th>
              <th scope="col">Teléfono</th>
              <th scope="col"># Documentos</th>
              <th scope="col">Estatus</th>
            </tr>
          </thead>
          <tbody class="text-center" id="myTable">
            <?php
            include('query/lista_postulantes_general.php');
            ?>
          </tbody>
        </table>

      </div><!-- row -->
    </div>
  </div>

  
  </main>
  
  <footer class="text-light py-5" style="background:rgb(61, 42, 93)">
    <div class="container">
      <div>
        <div class="row">
          <div class="col-sm-3 col-md-6 col-lg-4 mt-2">
            <p class="mb-0 text-center"><img src="../../img/logo_white_02.png"  width="180" alt=""></p>
            <p class="mb-0 mt-1 text-center"><small>&copy; Desarrollo:<br> <strong class="text-light">Tecnologías de la Información | INJUVENTUD</strong></small></p>
            <!-- <p class="mb-0 text-center"><small><a href="/" style="text-decoration: none;" class="text-light">Gobierno del estado de Zacatecas</a>.</small></p> -->
            </div>
            <div class="col-sm-3 col-md-6 col-lg-4 mt-2 text-center">
              <img src="../../img/logo_pej2025_01.png" width="180" alt="">
              </div>
              <div class="col-sm-3 col-md-6 col-lg-4 mt-2">
                <p class="float-end mb-1 text-center">
                  <a href="#inicio" style="text-decoration: none;" class="text-light"><i class="bi bi-arrow-bar-up"></i> Arriba</a>
                  </p>
                  </div>
                  </div>
                  </div>
                  </div>
                  </footer>
                  
                  <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>
                  
                  </body>
                  
  <!-- Modal -->
  <div class="modal fade" id="criteriosCalificacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-pencil-fill"></i> Criterios de calificación</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <ol>
          <li class="fw-bold">Cumplimiento de Requisitos de Elegibilidad:</li>
          <ul>
            <li>Verificación de que los participantes tengan entre 12 y 29 años de edad.</li>
            <li>Comprobación de residencia en el Estado de Zacatecas.</li>
            <li>Confirmación de que los participantes no sean servidores públicos.</li>
            <li>Revisión de la documentación presentada, asegurando que cumpla con los requisitos de la convocatoria.</li>
          </ul>
          <li class="fw-bold">Impacto y Relevancia:</li>
          <ul>
            <li>Evaluación del impacto social, económico, cultural o ambiental de las acciones y proyectos de los participantes.</li>
            <li>Análisis de cómo las contribuciones de los participantes han beneficiado a la comunidad zacatecana.</li>
          </ul>
          <li class="fw-bold">Originalidad e Innovación:</li>
          <ul>
            <li>Consideración de la originalidad y creatividad de los proyectos, investigaciones o acciones realizadas por los jóvenes.</li>
            <li>Evaluación de la capacidad de los participantes para generar ideas innovadoras y aplicarlas efectivamente.</li>
          </ul>
          <li class="fw-bold">Sostenibilidad y Viabilidad:</li>
          <ul>
            <li>Análisis de la viabilidad y sostenibilidad de los proyectos presentados.</li>
            <li>Evaluación de la capacidad de los proyectos para mantenerse en el tiempo y generar un impacto duradero.</li>
          </ul>
          <li class="fw-bold">Compromiso y Dedicación:</li>
          <ul>
            <li>Evaluación del nivel de compromiso y dedicación mostrado por los participantes en sus actividades y proyectos.</li>
            <li>Consideración de la trayectoria y esfuerzo continuo de los participantes en su área de influencia.</li>
          </ul>
        </ol>

        <p><strong>Criterios Específicos por Categoría</strong></p>
        <p id="criteriosCategoria"></p>
        
        <p><strong>Criterios Adicionales</strong></p>
        <ol>
          <li class="fw-bold">Transparencia y Equidad:</li>
          <ul>
            <li>Asegurarse de que los recursos públicos se utilicen de manera imparcial, sin influir en la equidad de la competencia.</li>
          </ul>
          <li class="fw-bold">Prioridad a la Paz Social:</li>
          <ul>
            <li>Dar prioridad a los proyectos que promuevan la paz social y la convivencia armoniosa en la comunidad.</li>
          </ul>
          
        </ol>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

</html>

<script>
    $("a[href^='#']").click(function(e) {
    e.preventDefault();
    
    var position = $($(this).attr("href")).offset().top;

    $("body, html").animate({
        scrollTop: position
    } /* speed */ );
});

$(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<!-- modal datos visualizar -->
<?php 
  // include('query/visualizar_datos.php');
  // include('prcd/editar_datos.php');
?>
