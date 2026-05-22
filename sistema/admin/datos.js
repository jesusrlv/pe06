// Variable para almacenar los datos
let datosDashboard = {};

// Obtener datos del servidor
$.ajax({
    url: 'query/datosGraph.php',
    method: 'GET',
    dataType: 'json',
    success: function(data) {
        console.log('Datos recibidos:', data);
        
        // Asignar datos del servidor + datos de ejemplo
        datosDashboard = {
            totalParticipantes: data.totalPostulantes || 0,
            expedientesCompletados: data.totalCompletos || 0,
            expedientesNoCompletados: data.totalIncompletos || 0,
            totalMunicipios: data.totalMunicipios || 0,
            hombres: data.hombres || 0,
            mujeres: data.mujeres || 0,
            categorias: data.categorias.map(c => c.nombre),
            participantesCategoria: data.categorias.map(d => d.total),
            municipios: data.municipios || [
                {nombre: 'Zacatecas', participantes: 245},
                {nombre: 'Guadalupe', participantes: 198},
                {nombre: 'Fresnillo', participantes: 312},
                {nombre: 'Jerez', participantes: 98},
                {nombre: 'Calera', participantes: 67},
                {nombre: 'Villanueva', participantes: 54},
                {nombre: 'Loreto', participantes: 43},
                {nombre: 'Otros', participantes: 230}
            ],
            // edades: data.edades.map(e => e.total, f => f.edad) || [0, 0, 0, 0, 0, 0] // Asegurarse de que sea un array de números

            edades: data.edades.map(e => ({ 
                edad: e.edad, 
                total: e.total 
            }))
        };

        aplicarPopovers(datosDashboard);

        // datos de municipio
        if (Array.isArray(data.municipios)) {
            let variable = 0;
            let num = 0;
          console.log('Número de elementos en el array:', data.municipios.length);
            // Recorrer el array de municipios y sumar el total de participantes
            data.municipios.forEach((m, i) => {
                console.log(`Municipio ${i}:`, m);
                num = parseInt(m.total);
                variable = variable + num;
            });
                console.log('Total de participantes por municipio:', variable);
            
            // porcentaje por municipio
            data.municipios.forEach((n, i) => {
                var elemento = document.querySelector('[data-name="' + n.municipio + '"]');
                console.log(`Municipio ${i}:`, n);
                num2 = parseInt(n.total);
                variable2 = num2 / variable * 100;
                console.log(`Porcentaje de ${n.municipio}:`, variable2.toFixed(2) + '%');

                if (elemento) {
                    // Calcular percentil (0-20% = más bajo, 80-100% = más alto)
                    let percentil = (num2 / variable) * 100;
                    
                    // Definir colores según percentiles (de menor a mayor)
                    let fillColor, strokeColor;
                    
                    
                    if (percentil == 0) {
                        fillColor = "#c70c51";      // Menor
                        strokeColor = "#2244aa";
                    } else if (percentil <= 20 && percentil > 0) {
                        fillColor = "#cbe2fe";
                        strokeColor = "#10288c";
                    } else if (percentil <= 40 && percentil > 20) {
                        fillColor = "#4b0090";
                        strokeColor = "#a8b5e8";
                    } else if (percentil <= 60 && percentil > 40) {
                        fillColor = "#4466aa";
                        strokeColor = "#7bb3d9";
                    } else if (percentil <= 80 && percentil > 60) {
                        fillColor = "#2244aa";
                        strokeColor = "#f296b5";
                    } else if (percentil <= 100 && percentil > 80) {
                        fillColor = "#10288c";      // Mayor
                        strokeColor = "#d1d4d7";
                    }
                    // else {
                    //     // Percentil 80-100% (más alto)
                    //     fillColor = "#99e7ff";
                    //     strokeColor = "#004f67";
                    // }
                    
                    elemento.style.fill = fillColor;
                    elemento.style.stroke = strokeColor;
                    
                } else {
                    console.error(`Elemento con ID "${n.municipio}" no encontrado en el DOM.`);
                }

            });
        }

        
        // Cargar todos los datos en el DOM
        cargarDatosEnDOM(datosDashboard);
        
    },
    error: function(error) {
        console.error('Error al obtener los datos:', error);
        
        // Usar datos de ejemplo si hay error
        datosDashboard = {
            totalParticipantes: 0,
            expedientesCompletados: 0,
            expedientesNoCompletados: 0,
            totalMunicipios: 0,
            hombres: 0,
            mujeres: 0,
            categorias: [categorias.map(c => c.nombre)],
            participantesCategoria: categorias.map(d => d.total),
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
        
        cargarDatosEnDOM(datosDashboard);
    }
});

// Función principal para cargar todos los datos
function cargarDatosEnDOM(datos) {
    // Cargar datos en las cards
    document.getElementById('totalParticipantes').innerText = datos.totalParticipantes.toLocaleString();
    document.getElementById('expedientesCompletados').innerText = datos.expedientesCompletados.toLocaleString();
    document.getElementById('expedientesNoCompletados').innerText = datos.expedientesNoCompletados.toLocaleString();
    document.getElementById('totalMunicipios').innerText = datos.totalMunicipios;
    document.getElementById('totalHombres').innerHTML = `Hombres: ${datos.hombres}`;
    document.getElementById('totalMujeres').innerHTML = `Mujeres: ${datos.mujeres}`;
    
    // Tabla de municipios
    let municipiosHtml = '';
    datos.municipios.forEach((m, i) => {
        municipiosHtml += `<tr><td class="fw-medium">${i+1}</td><td class="fw-medium">${m.municipio}</td><td><span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">${m.total.toLocaleString()}</span></td></tr>`;
    });
    document.getElementById('municipiosBody').innerHTML = municipiosHtml;
    
    // Gráfico de sexo
    // if (window.sexoChart) window.sexoChart.destroy();
    window.sexoChart = new Chart(document.getElementById('sexoChart'), {
        type: 'doughnut',
        data: { labels: ['Hombres', 'Mujeres'], datasets: [{ data: [datos.hombres, datos.mujeres], backgroundColor: ['#199bd8', '#dc2626'], borderWidth: 0 }] },
        options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { position: 'bottom' } } }
    });
    
    // Gráfico de categorías
    // if (window.categoriaChart) window.categoriaChart.destroy();
    window.categoriaChart = new Chart(document.getElementById('categoriaChart'), {
        type: 'bar',
        data: { labels: datos.categorias, datasets: [{ label: 'Participantes', data: datos.participantesCategoria, backgroundColor: '#199bd8', borderRadius: 8 }] },
        options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { display: false } } }
    });
    
    // Gráfico de expedientes
    // if (window.expedienteChart) window.expedienteChart.destroy();
    window.expedienteChart = new Chart(document.getElementById('expedienteChart'), {
        type: 'pie',
        data: { labels: ['Completados', 'No completados'], datasets: [{ data: [datos.expedientesCompletados, datos.expedientesNoCompletados], backgroundColor: ['#10b981', '#ef4444'], borderWidth: 0 }] },
        options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { position: 'bottom' } } }
    });
    
    // Gráfico de edades
    // if (window.edadChart) window.edadChart.destroy();
    window.edadChart = new Chart(document.getElementById('edadChart'), {
        type: 'line',
        data: { labels: [
            ...datos.edades.map(e => e.edad)
        ], datasets: [{ label: 'Participantes', data: datos.edades.map(e => e.total), borderColor: '#199bd8', backgroundColor: 'rgba(25, 155, 216, 0.1)', fill: true, tension: 0.4, pointBackgroundColor: '#199bd8', pointRadius: 4 }] },
        options: { responsive: true, maintainAspectRatio: true }
    });
}

// Smooth scroll
$("a[href^='#']").click(function(e) {
    e.preventDefault();
    var position = $($(this).attr("href")).offset().top;
    $("body, html").animate({ scrollTop: position });
});

// Filtros de búsqueda
$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
    
    $("#myInput2").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable2 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

// Después de cargar los datos del AJAX
function aplicarPopovers(datos) {
    // Recorrer cada municipio del JSON
    datos.municipios.forEach(municipio => {
        // Buscar el elemento del mapa por su ID (debe coincidir con el nombre del municipio)
        // const elemento = document.getElementById(municipio.nombre);
        const elemento = document.querySelector('[data-name="' + municipio.municipio + '"]');
        
        if (elemento) {
            // Inicializar el tooltip/popover
            $(elemento).popover({
                trigger: 'hover',  // Se activa con hover
                placement: 'top',   // Posición arriba
                html: true,         // Permite HTML
                title: municipio.municipio,
                content: `Total: ${municipio.total.toLocaleString()} participantes`,
                customClass: 'mapa-popover'
            });
        }
    });
}