<?php
session_start();

// Verifica si las variables de sesión están establecidas y no están vacías
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    
    // Redirige al usuario a la página de inicio de sesión
    header("Location: prcd/sort.php"); // Cambia 'login.php' por la página de inicio de sesión de tu sitio
    exit();
}

// Si las variables están establecidas y no están vacías, asigna los valores a variables locales
$idSess = $_SESSION['id'];
$usr = $_SESSION['usr'];
$nombre = $_SESSION['nombre'];
$perfil = $_SESSION['perfil'];
$categoria = $_SESSION['categoria'];

// Aquí continúa el resto del código para tu página protegida

$idSess = $_SESSION['id'];
$usr = $_SESSION['usr'];
$nombre = $_SESSION['nombre'];
$perfil = $_SESSION['perfil'];
$categoria = $_SESSION['categoria'];


?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="INJUVENTUD" content="Consejo Juvenil">
    <meta name="" content="">
    <link rel="icon" type="image/png" href="../../img/icon.ico" sizes="22x21">
    <title>Perfil Admin | PEJ2026</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <script src="../../js/files.js"></script>
    <!-- <script src="../../js/index.js"></script> -->

     <!-- type font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400&display=swap" rel="stylesheet"> 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     
     <!-- Chart.js para gráficos -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      body{
        font-family: 'Montserrat', sans-serif;
      }
      #colorRounded{
        background-color: rgba(122, 205, 228, 0.63);
      }
      #imgPortrait{
        background-image: url('../../img/fondo_pej2026.jpg');

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
        transition: all 0.3s ease;
      }
      .card:hover{
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
      }
     
      /* ESTILOS NUEVOS PARA DASHBOARD */
      .stats-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
      }
      .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
      }
      .stats-card .card-icon {
        position: absolute;
        right: 20px;
        top: 20px;
        font-size: 3rem;
        opacity: 0.15;
      }
      .stats-card .card-value {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 0;
      }
      .stats-card .card-label {
        font-size: 0.8rem;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      .bg-soft-primary { background: linear-gradient(135deg, #fff 0%, #e0f2fe 100%); }
      .bg-soft-success { background: linear-gradient(135deg, #fff 0%, #d1fae5 100%); }
      .bg-soft-danger { background: linear-gradient(135deg, #fff 0%, #fee2e2 100%); }
      .bg-soft-warning { background: linear-gradient(135deg, #fff 0%, #fed7aa 100%); }
      
      .table-dashboard {
        background: white;
        border-radius: 20px;
        overflow: hidden;
      }
      .table-dashboard thead th {
        background: #e0f2fe;
        border: none;
        padding: 1rem;
      }
      .table-dashboard tbody td {
        padding: 0.8rem 1rem;
        vertical-align: middle;
      }
      .badge-completado {
        background: #d1fae5;
        color: #065f46;
        padding: 0.3rem 1rem;
        border-radius: 40px;
      }
      .badge-no-completado {
        background: #fee2e2;
        color: #991b1b;
        padding: 0.3rem 1rem;
        border-radius: 40px;
      }
      .menu-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        text-align: center;
        text-decoration: none;
        display: block;
        transition: all 0.3s ease;
        box-shadow: 0 6px 10px rgba(0,0,0,.08);
      }
      .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
      }
      .menu-card i {
        font-size: 2.5rem;
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
          background-size: 350% 18%;
          background-position: 0 0;
        }
        #colorRounded{
          background-color: rgba(122, 205, 228, 0.929);
          border-radius:0px;
        }
        #textPortada{
          font-size:8px;
        }
        .stats-card .card-value {
          font-size: 1.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
<span id="inicio"></span>
  <div class="navbar navbar-dark shadow-sm bg-dark text-light" style="background: #199bd8;color:white">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <img src="../../img/logo_injuventud_0.png" width="20" alt="" class="me-1">
        <strong class="text-light" id="texto_">ADMINISTRADOR | PEJ 2025</strong>
      </a>
      <a href="prcd/sort.php" type="button" class="btn btn-sm btn-outline-light"><i class="bi bi-door-open"></i> Salir</a>
    </div>
  </div>
</header>

<main id="imgPortrait">
<!-- hidden -->
<section class="text-center container" hidden>
    <div class="row py-lg-5" >
      <div class="col-lg-6 col-md-8 mx-auto rounded p-2" id="colorRounded">
      <h1 class="fw-light"><img src="../../img/logo_pej2025_01.png" alt="" width="100%" style="padding:10px; border-radius: 15px;"></h1>
        <h2 class="fw-bold" style="color:white">Bienvenid@</h2>
        <h2 class="fw-bold" style="color:white"><i class="bi bi-person-circle"></i></h2>
        <h2 class="fw-bold" style="color:white"><?php echo $nombre ?></h2>
        <p id="resultSpan"></p>
        <p class="lead text-light mt-2">Sistema de postulación del INJUVENTUD para integrarse al PEJ2026.</p>
        <p>
          <hr class="text-secondary">
          <a href="#dashboard" class="btn btn-primary my-2"><i class="bi bi-clipboard-data-fill"></i> Dashboard</a>
        </p>
      </div>
    </div>
  </section>
  <!-- hidden -->

<!-- ========== NUEVO DASHBOARD - SOLO FRONT END ========== -->
<div id="dashboard" class="album py-5 bg-light">
  <div class="container">
    
    <!-- Título Dashboard -->
    <div class="alert alert-light text-center mb-4" role="alert">
      <p class="fs-1 mb-0"><i class="bi bi-speedometer2"></i><br> Dashboard de Estadísticas</p>
      <p class="text-muted small">Visualización general de participantes</p>
    </div>

    <!-- CARDS ESTADÍSTICAS -->
    <div class="row g-4 mb-5">
      <div class="col-md-6 col-lg-3">
        <div class="stats-card bg-soft-primary">
          <i class="bi bi-people-fill card-icon"></i>
          <p class="card-value text-primary" id="totalParticipantes">0</p>
          <p class="card-label">Total de participantes</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="stats-card bg-soft-success">
          <i class="bi bi-check-circle-fill card-icon"></i>
          <p class="card-value text-success" id="expedientesCompletados">0</p>
          <p class="card-label">Expedientes completados</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="stats-card bg-soft-danger">
          <i class="bi bi-x-circle-fill card-icon"></i>
          <p class="card-value text-danger" id="expedientesNoCompletados">0</p>
          <p class="card-label">Expedientes no completados</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="stats-card bg-soft-warning">
          <i class="bi bi-building card-icon"></i>
          <p class="card-value text-warning" id="totalMunicipios">0</p>
          <p class="card-label">Municipios participantes</p>
        </div>
      </div>
    </div>

    <!-- GRÁFICOS -->
    <div class="row g-4 mb-5">
      <div class="col-lg-4">
        <div class="card p-3 border-0 shadow-sm">
          <h6 class="fw-bold mb-3"><i class="bi bi-gender-ambiguous"></i> Participantes por sexo</h6>
          <canvas id="sexoChart" style="max-height: 250px;"></canvas>
          <div class="row mt-3 text-center">
            <div class="col-6"><span class="badge bg-info px-3 py-2" id="totalHombres">Hombres: 0</span></div>
            <div class="col-6"><span class="badge bg-danger px-3 py-2" id="totalMujeres">Mujeres: 0</span></div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card p-3 border-0 shadow-sm">
          <h6 class="fw-bold mb-3"><i class="bi bi-tags"></i> Participantes por categoría</h6>
          <canvas id="categoriaChart" style="max-height: 250px;"></canvas>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card p-3 border-0 shadow-sm">
          <h6 class="fw-bold mb-3"><i class="bi bi-clipboard-data"></i> Estado de expedientes</h6>
          <canvas id="expedienteChart" style="max-height: 250px;"></canvas>
        </div>
      </div>
    </div>

    <!-- TABLA DE MUNICIPIOS -->
    <div class="card border-0 shadow-sm mb-5">
      <div class="card-header bg-white border-0 pt-3">
        <h6 class="fw-bold mb-0"><i class="bi bi-geo-alt-fill"></i> Participantes por municipio</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-dashboard" id="tablaMunicipios">
            <thead>
              <tr><th>#</th><th>Municipio</th><th>Participantes</th></tr>
            </thead>
            <tbody id="municipiosBody">
              <tr><td colspan="3" class="text-center">Cargando datos...</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- GRÁFICO DE EDADES -->
    <div class="card border-0 shadow-sm mb-5">
      <div class="card-header bg-white border-0 pt-3">
        <h6 class="fw-bold mb-0"><i class="bi bi-calendar-heart"></i> Rango de edades de participantes</h6>
      </div>
      <div class="card-body">
        <canvas id="edadChart" style="max-height: 300px;"></canvas>
      </div>
    </div>

    <!-- MENÚ DE OPCIONES ORIGINAL (solo diseño mejorado) -->
    <div class="alert alert-light text-center mt-4" role="alert">
      <p class="fs-5 mb-0"><i class="bi bi-menu-up"></i><br> Módulos del Sistema</p>
    </div>
    
    <div class="row g-4 pb-5">
      <div class="col-md-6 col-lg-3">
        <a href="index_completados.php" class="menu-card">
          <i class="bi bi-list-check text-success"></i>
          <h6 class="mt-2 fw-bold mb-0">Listado completados</h6>
          <small class="text-muted">Expedientes finalizados</small>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="index_no_completados.php" class="menu-card">
          <i class="bi bi-list-columns text-danger"></i>
          <h6 class="mt-2 fw-bold mb-0">Listado no completados</h6>
          <small class="text-muted">Expedientes pendientes</small>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="index_calificaciones.php" class="menu-card">
          <i class="bi bi-list-ol text-info"></i>
          <h6 class="mt-2 fw-bold mb-0">Calificaciones</h6>
          <small class="text-muted">Gestión de calificaciones</small>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="index_general.php" class="menu-card">
          <i class="bi bi-card-list text-warning"></i>
          <h6 class="mt-2 fw-bold mb-0">Lista general</h6>
          <small class="text-muted">Reporte completo</small>
        </a>
      </div>
    </div>

  </div>
</div>
<!-- ========== FIN DASHBOARD ========== -->

</main>

<footer class="text-light py-5" style="background:rgb(122, 205, 228)">
<div class="container">
    <div>
      <div class="row">
        <div class="col-sm-3 col-md-6 col-lg-4 mt-2">
          <p class="mb-0 text-center"><img src="../../img/logo_white_02.png"  width="180" alt=""></p>
          <p class="mb-0 mt-1 text-center"><small>&copy; Desarrollo:<br> <strong class="text-light">Tecnologías de la Información | INJUVENTUD</strong></small></p>
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

<script>
// DATOS DE EJEMPLO - REEMPLAZA CON TUS CONSULTAS AJAX O PHP
// Como solo es front-end, uso datos de muestra. Conéctalo con tu backend mediante AJAX.

const datosEjemplo = {
  totalParticipantes: 1247,
  expedientesCompletados: 856,
  expedientesNoCompletados: 391,
  totalMunicipios: 58,
  hombres: 680,
  mujeres: 567,
  categorias: ['Logro Académico', 'Emprendimiento', 'Arte y Cultura', 'Deporte', 'Innovación Social', 'Medio Ambiente'],
  participantesCategoria: [245, 189, 234, 167, 198, 214],
  municipios: [
    {nombre: 'Zacatecas', participantes: 245},
    {nombre: 'Guadalupe', participantes: 198},
    {nombre: 'Fresnillo', participantes: 312},
    {nombre: 'Jerez', participantes: 98},
    {nombre: 'Calera', participantes: 67},
    {nombre: 'Villanueva', participantes: 54},
    {nombre: 'Loreto', participantes: 43},
    {nombre: 'Otros', participantes: 230}
  ],
  edades: [85, 342, 421, 278, 98, 23]
};

// Cargar datos en las cards
document.getElementById('totalParticipantes').innerText = datosEjemplo.totalParticipantes.toLocaleString();
document.getElementById('expedientesCompletados').innerText = datosEjemplo.expedientesCompletados.toLocaleString();
document.getElementById('expedientesNoCompletados').innerText = datosEjemplo.expedientesNoCompletados.toLocaleString();
document.getElementById('totalMunicipios').innerText = datosEjemplo.totalMunicipios;
document.getElementById('totalHombres').innerHTML = `Hombres: ${datosEjemplo.hombres}`;
document.getElementById('totalMujeres').innerHTML = `Mujeres: ${datosEjemplo.mujeres}`;

// Tabla de municipios
let municipiosHtml = '';
datosEjemplo.municipios.forEach((m, i) => {
  municipiosHtml += `<tr><td>${i+1}</td><td class="fw-medium">${m.nombre}</td><td><span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">${m.participantes.toLocaleString()}</span></td></tr>`;
});
document.getElementById('municipiosBody').innerHTML = municipiosHtml;

// Gráfico de sexo
new Chart(document.getElementById('sexoChart'), {
  type: 'doughnut',
  data: { labels: ['Hombres', 'Mujeres'], datasets: [{ data: [datosEjemplo.hombres, datosEjemplo.mujeres], backgroundColor: ['#199bd8', '#dc2626'], borderWidth: 0 }] },
  options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { position: 'bottom' } } }
});

// Gráfico de categorías
new Chart(document.getElementById('categoriaChart'), {
  type: 'bar',
  data: { labels: datosEjemplo.categorias, datasets: [{ label: 'Participantes', data: datosEjemplo.participantesCategoria, backgroundColor: '#199bd8', borderRadius: 8 }] },
  options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { display: false } } }
});

// Gráfico de expedientes
new Chart(document.getElementById('expedienteChart'), {
  type: 'pie',
  data: { labels: ['Completados', 'No completados'], datasets: [{ data: [datosEjemplo.expedientesCompletados, datosEjemplo.expedientesNoCompletados], backgroundColor: ['#10b981', '#ef4444'], borderWidth: 0 }] },
  options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { position: 'bottom' } } }
});

// Gráfico de edades
new Chart(document.getElementById('edadChart'), {
  type: 'line',
  data: { labels: ['15-17', '18-20', '21-23', '24-26', '27-29', '30+'], datasets: [{ label: 'Participantes', data: datosEjemplo.edades, borderColor: '#199bd8', backgroundColor: 'rgba(25, 155, 216, 0.1)', fill: true, tension: 0.4, pointBackgroundColor: '#199bd8', pointRadius: 4 }] },
  options: { responsive: true, maintainAspectRatio: true }
});

// Smooth scroll
$("a[href^='#']").click(function(e) {
  e.preventDefault();
  var position = $($(this).attr("href")).offset().top;
  $("body, html").animate({ scrollTop: position });
});

$(document).ready(function () {
  $("#myInput").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function () { $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1); });
  });
  $("#myInput2").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#myTable2 tr").filter(function () { $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1); });
  });
});
</script>

</body>
</html>