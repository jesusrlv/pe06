// DATOS DE EJEMPLO - REEMPLAZA CON TUS CONSULTAS AJAX O PHP
// Como solo es front-end, uso datos de muestra. Conéctalo con tu backend mediante AJAX.

const datosEjemplo = {
  totalParticipantes: 0,
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

function datosFront() {
    $.ajax({
        url: 'datosGraph.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Aquí puedes actualizar el DOM con los datos recibidos
            console.log(data);
        },
        error: function(error) {
            console.error('Error al obtener los datos:', error);
        }
    });

}