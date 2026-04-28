  function ValidaSoloNumeros() {
    if ((event.keyCode < 48) || (event.keyCode > 49)) 
      event.returnValue = false;
    }

    function ValidaDos(){
        var cant = document.getElementById('cantidad').value;
        if(cant <= 1){
          document.getElementById('detalles').readOnly = true;
        }
       else if(cant = 2){
          document.getElementById('detalles').readOnly = false;
        }
      }

    //   EDAD A PARTIR DE LA CURP

    function curp2date(curp) {
        var miCurp = curp.value.toUpperCase();
        var resultado = document.getElementById("edad");
      
        var m = miCurp.match(/^\w{4}(\w{2})(\w{2})(\w{2})/);  
        var anyo = parseInt(m[1], 10) + 1900;
        if (anyo < 1950) anyo += 100;
        var mes = parseInt(m[2], 10) - 1;
        var dia = parseInt(m[3], 10);  
        var fechaNacimiento = new Date(anyo, mes, dia);
        var edad = calcularEdad(fechaNacimiento);  
        resultado.classList.add("ok");
        // resultado.innerText = "Su edad es: " + edad + " años.";
        document.getElementById("edad").value = edad;

        var cumplidos = document.getElementById("edad").value;
        if ( cumplidos < 12 || cumplidos > 29 ){
            document.getElementById("result-username3").innerHTML = '<div class="alert alert-danger text-start"><strong><i class="bi bi-x-circle-fill"></i> ERROR.</strong> Tu edad no está permitida en la convocatoria.</div><style>#boton_submit{display:none;}</style>';
        }
        else{
            document.getElementById("result-username3").innerHTML = '<div class="alert alert-success text-start"><strong><i class="bi bi-check-square"></i> CORRECTO. </strong> Edad correcta.</div>';
        }
      }
      
      function calcularEdad(fecha) {
        var hoy = new Date();
        var cumpleanos = new Date(fecha);
        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
        var m = hoy.getMonth() - cumpleanos.getMonth();
      
        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
          edad--;
        }
        return edad;
      }

    //   VALIDACIÓN CURP

    
        // input
        function validarInput(input) {
            var curp = input.value.toUpperCase(),
                resultado = document.getElementById("result-username"),
                valido = "No válido";
                
            if (curpValida(curp)) {
                valido = "Válido";
                resultado.innerHTML ='<div class="alert alert-success text-start"><strong><i class="bi bi-check-square"></i> CORRECTO. </strong> Cadena CURP correcta.</div>';
                document.getElementById('boton_submit').hidden = false;
            } else {
                resultado.innerHTML = '<div class="alert alert-danger"><strong><i class="bi bi-exclamation-triangle-fill"></i> ERROR. </strong> Cadena CURP incorrecta.</div><style>#boton_submit{display:none;}</style>';
                document.getElementById('boton_submit').hidden = true;
            }
                
        }
    function curpValida(curp) {
        var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
            validado = curp.match(re);
        
        if (!validado)  //Coincide con el formato general?
            return false;
        
        //Validar que coincida el dígito verificador
        function digitoVerificador(curp17) {
            //Fuente https://consultas.curp.gob.mx/CurpSP/
            var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
                lngSuma      = 0.0,
                lngDigito    = 0.0;
            for(var i=0; i<17; i++)
                lngSuma= lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
            lngDigito = 10 - lngSuma % 10;
            if(lngDigito == 10)
                return 0;
            return lngDigito;
        }
        if (validado[2] != digitoVerificador(validado[1])) 
            return false;
            
        return true; //Validado
    }

    // VALIDA USUARIO REGISTRADO
 
    $(document).ready(function() {	
        $('#curp').on('blur', function() {
            $('#result-username2').html('<img src="img/loader.gif" />').fadeOut(1000);
    
            var username = $(this).val();		
            var dataString = 'username='+username;
    
            $.ajax({
                type: "POST",
                url: "prcd/verficacion.php",
                data: dataString,
                success: function(data) {
                    $('#result-username2').fadeIn(1000).html(data);
                }
            });
        });              
    });    
    $(document).ready(function() {	
        $('#curpUSA').on('blur', function() {
            $('#result-username4').html('<img src="img/loader.gif" />').fadeOut(1000);
    
            var username = $(this).val();		
            var dataString = 'username='+username;
    
            $.ajax({
                type: "POST",
                url: "prcd/verficacionUSA.php",
                data: dataString,
                success: function(data) {
                    $('#result-username4').fadeIn(1000).html(data);
                    
                }
            });
        });              
    });    

// LOGIN
$(document).ready(function() {
    $('#pwdForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'prcd/login.php',
            dataType:'json',
            data: $(this).serialize(),
            success: function(response)
            {
                // var jsonData = JSON.parse(response);
                var jsonData = JSON.parse(JSON.stringify(response));
 
                // user is logged in successfully in the back-end
                // let's redirect

    //             if (jsonData.success == "1")
    //             {
    //                 // location.href = 'my_profile.php';
    //                 Swal.fire({
    //                     icon: 'success',
    //                     imageUrl: 'img/logo_pej2025_01.png',
    //                     imageHeight: 200,
    //                     title: 'CONVOCATORIA CERRADA',
    //                     text: 'GRACIAS POR PARTICIPAR. MUCHA SUERTE ',
    //                     confirmButtonColor: '#3085d6',
		// 	showCancelButton: true,
		// 	cancelButtonText: 'Constancia de participación',
    //                     footer: 'INJUVENTUD'
    //                 }).then((result) => {
    // 		if (result.dismiss === Swal.DismissReason.cancel) {
    //     		// Redirigir al hipervínculo deseado
		// 	window.open('constancia.php', '_blank');
    // 			}
		// });
    //             }

              if (jsonData.success == "1")
                {
                    // location.href = 'my_profile.php';
                    Swal.fire({
                        icon: 'success',
                        imageUrl: 'img/logo_pej2025_01.png',
                        imageHeight: 200,
                        title: 'Acceso a postulante correcto',
                        text: 'Credenciales correctas',
                        confirmButtonColor: '#3085d6',
                        footer: 'INJUVENTUD'
                    }).then(function(){window.location='sistema/usuario/index.php';});
                }

                else if (jsonData.success == "2")
                {
                    // location.href = 'my_profile.php';
                    Swal.fire({
                        icon: 'success',
                        imageUrl: 'img/logo_pej2025_01.png',
                        imageHeight: 200,
                        title: 'Usuario Admin correcto',
                        text: 'Credenciales correctas',
                        confirmButtonColor: '#3085d6',
                        footer: 'INJUVENTUD'
                    }).then(function(){window.location='sistema/admin/index.php';});
                }

                else if (jsonData.success == "3")
                {
                    // location.href = 'my_profile.php';
                    Swal.fire({
                        icon: 'success',
                        imageUrl: 'img/logo_pej2025_01.png',
                        imageHeight: 200,
                        title: 'Usuario Jurado correcto',
                        text: 'Credenciales correctas',
                        confirmButtonColor: '#3085d6',
                        footer: 'INJUVENTUD'
                    }).then(function(){window.location='sistema/jurado/index.php';});
                }
                else if (jsonData.success == "5")
                {
                    // location.href = 'my_profile.php';
                    Swal.fire({
                        icon: 'success',
                        imageUrl: 'img/logo_pej2025_01.png',
                        imageHeight: 200,
                        title: 'Usuario Migrtante correcto',
                        text: 'Credenciales correctas',
                        confirmButtonColor: '#3085d6',
                        footer: 'INJUVENTUD'
                    }).then(function(){window.location='sistema/migrante/index.php';});
                }
                else if (jsonData.success == "4")
                {
                    // location.href = 'my_profile.php';
                    Swal.fire({
                        icon: 'success',
                        imageUrl: 'img/logo_pej2025_01.png',
                        imageHeight: 200,
                        title: 'Usuario Notario correcto',
                        text: 'Credenciales correctas',
                        confirmButtonColor: '#3085d6',
                        footer: 'INJUVENTUD'
                    }).then(function(){window.location='sistema/notario/index.php';});
                }
                else
                {
                    // alert('Invalid Credentials!');
                    Swal.fire({
                        icon: 'error',
                        title: 'Datos incorrectos',
                        text: 'Credenciales incorrectas',
                        confirmButtonColor: '#3085d6',
                        footer: 'INJUVENTUD'
                    }).then(function(){window.location='index.html';});
                    // });
                }
           }
       });
     });
});

// REGISTRO DE USUARIOS
$(document).ready(function() {
    $('#registroMX').submit(function(e) {
        document.getElementById('boton_submit').hidden = true;
        var nombre = document.getElementById('nombre').value;
        var municipio = document.getElementById('municipio').value;
        var curp = document.getElementById('curp').value;
        var edad = document.getElementById('edad').value;
        var email = document.getElementById('email').value;
        var pwd = document.getElementById('pwd').value;
        var telefono = document.getElementById('telefono').value;
        var categoria = document.getElementById('categoria').value;

        // sweetalert
        let timerInterval
        Swal.fire({
        title: 'Espere un momento',
        html: 'Sus datos se están registrando en la plataforma.',
        timer: 2500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
        })
        // sweetalert
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'prcd/registro.php',
            dataType:'json',
            // data: $(this).serialize(),
            data:{
                nombre:nombre,
                municipio:municipio,
                curp:curp,
                edad:edad,
                email:email,
                pwd:pwd,
                telefono:telefono,
                categoria:categoria
            },
            success: function(response)
            {
                // var jsonData = JSON.parse(response);
                var jsonData = JSON.parse(JSON.stringify(response));
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    // location.href = 'my_profile.php';
                    Swal.fire({
                        icon: 'success',
                        imageUrl: 'img/logo_pej2024.png',
                        imageHeight: 200,
                        title: 'Registro exitoso',
                        text: 'Bienvenido(a) al Sistema de Postulación PEJ2023',
                        confirmButtonColor: '#3085d6',
                        footer: 'INJUVENTUD'
                    }).then(function(){window.location='index.html';});
                }
                else
                {
                    console.log(jsonData.error);
                    alert(jsonData.error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Datos incorrectos',
                        text: 'Credenciales incorrectas',
                        confirmButtonColor: '#3085d6',
                        footer: 'INJUVENTUD'
                    }).then(function(){window.location='index.html';});
                    // });
                }
           }
       });
     });
});

// function alertaC(){
//     alert("Estás seleccionando esta categoría para participar, al registrarte con esta, no podrás cambiar a otra");
// }

// REGISTRO DE USUARIOS USA
$(document).ready(function() {
    $('#formUSA').submit(function(e) {
        document.getElementById('boton_submitUSA').hidden = true;
        var nombre = document.getElementById('nombreUSA').value;
        var curp = document.getElementById('curpUSA').value;
        var edad = document.getElementById('edadUSA').value;
        var email = document.getElementById('emailUSA').value;
        var pwd = document.getElementById('pwdUSA').value;
        var telefono = document.getElementById('telefonoUSA').value;
         // sweetalert
         let timerInterval
         Swal.fire({
         title: 'Espere un momento',
         html: 'Sus datos se están registrando en la plataforma.',
         timer: 2500,
         timerProgressBar: true,
         didOpen: () => {
             Swal.showLoading()
             const b = Swal.getHtmlContainer().querySelector('b')
             timerInterval = setInterval(() => {
             b.textContent = Swal.getTimerLeft()
             }, 100)
         },
         willClose: () => {
             clearInterval(timerInterval)
         }
         }).then((result) => {
         /* Read more about handling dismissals below */
         if (result.dismiss === Swal.DismissReason.timer) {
             console.log('I was closed by the timer')
         }
         })
         // sweetalert
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'prcd/registro_usa.php',
            dataType:'json',
            // data: $(this).serialize(),
            data:{
                nombre:nombre,
                curp:curp,
                edad:edad,
                email:email,
                pwd:pwd,
                telefono:telefono
            },
            success: function(response)
            {
                // var jsonData = JSON.parse(response);
                var jsonData = JSON.parse(JSON.stringify(response));
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    // location.href = 'my_profile.php';
                    Swal.fire({
                        icon: 'success',
                        imageUrl: 'img/logo_pej2024.png',
                        imageHeight: 200,
                        title: 'Registro exitoso (Migrante)',
                        text: 'Bienvenido(a) al Sistema de Postulación',
                        confirmButtonColor: '#3085d6',
                        footer: 'INJUVENTUD'
                    }).then(function(){window.location='index.html';});
                }
                else
                {
                    // alert('Invalid Credentials!');
                    Swal.fire({
                        icon: 'error',
                        title: 'Datos incorrectos',
                        text: 'Credenciales incorrectas',
                        confirmButtonColor: '#3085d6',
                        footer: 'INJUVENTUD'
                    }).then(function(){window.location='index.html';});
                    // });
                }
           }
       });
     });
});

function loaded() {
    $.ajax({
        url: "sistema/usuario/query/municipios.php",
        success: function(data) {
            $('#municipio').html(data);
        }
    });

    $.ajax({
        url: "sistema/usuario/query/categoria.php",
        success: function(data) {
            $('#categoria').html(data);
        }
    });
}

// function loaded() {
    
// }

// BLOQUEO DE MODALS
function bloquearMDS(){
    // var dateBLQ = '2023-02-04,00:00:01';
    let dateBLQ = new Date("2023-03-02 00:00:01");
    $.ajax({
            type: "POST",
            url: 'prcd/date.php',
            dataType:'json',
            data:{
                dateBLQ:dateBLQ
            },
            success: function(response)
            {
                // var jsonData = JSON.parse(response);
                var jsonData = JSON.parse(JSON.stringify(response));
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    document.getElementById('bloquearMDL').hidden = true;
                }
            }
    });
}

// Categorías descripciones

function descripcionesCat(desc){

    if(desc == 1){
        Swal.fire({
            title: '<strong>Logro académico (12-18)</strong>',
            icon: 'info',
            html:
              '<b>Trayectoria académica ejemplar, distinciones recibidas, concursos académicos, así como otros estudios curriculares.</b><br> ' +
              'a) Elaboración de investigaciones o estudios científicos, publicación de libros o artículos académicos, conferencias impartidas, ponente en intercambios académicos y distinciones recibidas; concursos académicos, así como otros estudios curriculares. <br>b) Labores docentes en los diversos niveles educativos a favor de la comunidad y que trascienden las responsabilidades cotidianas, como expresión de un compromiso personal para crear un proyecto de vida que redunde en beneficio de la sociedad.' +
              '<br><b>SUBCATEGORÍA 12 A 18 AÑOS DE EDAD.</b>',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Aceptar',
            confirmButtonAriaLabel: 'Aceptar',
            // cancelButtonText:
            //   '<i class="fa fa-thumbs-down"></i>',
            // cancelButtonAriaLabel: 'Thumbs down'
          })
    }
    else if(desc == 2){
        Swal.fire({
            title: '<strong>Logro académico (19-29)</strong>',
            icon: 'info',
            html:
              '<b>Trayectoria académica ejemplar.</b><br> ' +
              'a) Elaboración de investigaciones o estudios científicos, publicación de libros o artículos académicos, conferencias impartidas, ponente en intercambios académicos y distinciones recibidas; concursos académicos, así como otros estudios curriculares. <br>b) Labores docentes en los diversos niveles educativos a favor de la comunidad y que trascienden las responsabilidades cotidianas, como expresión de un compromiso personal para crear un proyecto de vida que redunde en beneficio de la sociedad.' +
              '<br><b>SUBCATEGORÍA 19 A 29 AÑOS DE EDAD.</b>',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Aceptar',
            confirmButtonAriaLabel: 'Aceptar',
            // cancelButtonText:
            //   '<i class="fa fa-thumbs-down"></i>',
            // cancelButtonAriaLabel: 'Thumbs down'
          })
    }
    else if(desc == 3){
        Swal.fire({
            title: '<strong>Discapacidad e integración</strong>',
            icon: 'info',
            html:
              'Mujeres y hombres jóvenes, quienes por su actitud (resiliencia), perseverancia y actividades individuales o de manera organizada, sean ejemplo de superación y contribuyan a generar oportunidades en el desarrollo y la integración de otras personas jóvenes con o sin discapacidad en los diversos rubros de nuestra cotidianidad (aportaciones a la comunidad, recreación, trabajo y educación).',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Aceptar',
            confirmButtonAriaLabel: 'Aceptar',
            // cancelButtonText:
            //   '<i class="fa fa-thumbs-down"></i>',
            // cancelButtonAriaLabel: 'Thumbs down'
          })
    }
    else if(desc == 4){
        Swal.fire({
            title: '<strong>Ingenio emprendedor</strong>',
            icon: 'info',
            html:
              'Liderazgo emprendedor en distintas ramas económicas que debe traducirse en habilidad para crear y desarrollar unidades de producción viables y sustentables. Además, de la implementación de iniciativas de negocios, transferencia de tecnología e innovación; fortalecimiento de la planta productiva con impacto en el aspecto económico y social de la comunidad.<br>Asimismo, el  desarrollo, difusión y promoción de una cultura emprendedora; inversión en el desarrollo de capital humano de las organizaciones productivas, destacando: gestión directiva; habilidades gerenciales; capacitación y adiestramiento de personal dirigido a la productividad y crecimiento.',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Aceptar',
            confirmButtonAriaLabel: 'Aceptar',
            // cancelButtonText:
            //   '<i class="fa fa-thumbs-down"></i>',
            // cancelButtonAriaLabel: 'Thumbs down'
          })
    }
    else if(desc == 5){
        Swal.fire({
            title: '<strong>Responsabilidad social</strong>',
            icon: 'info',
            html:
              'Jóvenes que por el desarrollo de programas, proyectos o actividades, cuyo propósito sea expresión de solidaridad con comunidades y grupos sociales vulnerables del Estado, y que al ejecutarse generan opciones de solución a problemáticas específicas, mejorando en su caso, la calidad y nivel de vida de sus habitantes. De igual forma, se reconocerán los proyectos para el desarrollo de capacidades y habilidades en las comunidades; la implementación de los proyectos productivos; la colaboración en situaciones de desastre o emergencias; proyectos para mejorar la salud física y psicológica, la alimentación, la vivienda e infraestructura en las comunidades, así como proyectos para fomentar y fortalecer los valores ciudadanos.',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Aceptar',
            confirmButtonAriaLabel: 'Aceptar',
            // cancelButtonText:
            //   '<i class="fa fa-thumbs-down"></i>',
            // cancelButtonAriaLabel: 'Thumbs down'
          })
    }
    else if(desc == 6){
        Swal.fire({
            title: '<strong>Mérito migrante</strong>',
            icon: 'info',
            html:
              'Promoción del conocimiento, el ejercicio y/o respeto a los derechos y obligaciones que poseen los miembros de la comunidad zacatecana en el extranjero. Participación relevante en medios impresos, en radio, en televisión y/o en cine, en términos de su profesionalismo, innovación, contenido social y/o divulgación tanto de los valores mexicanos como de la cultura zacatecana. Actividades que se destaquen por su sentido de solidaridad social y que se traduzcan en mejoramiento de las condiciones de vida de grupos, comunidades o de la sociedad en general, así como las acciones heroicas, de protección civil y atención a grupos vulnerables. Los (as) candidatos(as) deberán preferentemente pertenecer a algún club registrado en alguna de las federaciones de clubes zacatecanos en algún estado de la Unión Americana.',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Aceptar',
            confirmButtonAriaLabel: 'Aceptar',
            // cancelButtonText:
            //   '<i class="fa fa-thumbs-down"></i>',
            // cancelButtonAriaLabel: 'Thumbs down'
          })
    }
    else if(desc == 7){
        Swal.fire({
            title: '<strong>Mérito campesino</strong>',
            icon: 'info',
            html:
              'Acciones de las y los jóvenes que en el medio rural promuevan la vigencia y el desarrollo de sus municipios y comunidades. Iniciativas para preservar y/o transmitir su patrimonio cultural. Elaboración y desarrollo de proyectos productivos; mejoramiento y conservación ambiental; aplicación de tecnologías alternativas para el aprovechamiento de los recursos naturales y actividades de capacitación y educación en materia ambiental en sus municipios y comunidades.',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Aceptar',
            confirmButtonAriaLabel: 'Aceptar',
            // cancelButtonText:
            //   '<i class="fa fa-thumbs-down"></i>',
            // cancelButtonAriaLabel: 'Thumbs down'
          })
    }
    else if(desc == 8){
        Swal.fire({
            title: '<strong>Protección al medio ambiente</strong>',
            icon: 'info',
            html:
              'Acciones de las y los jóvenes que promuevan el cuidado y protección del medio ambiente dentro de su comunidad y en nuestro estado, que estén encaminadas a revertir efectos de impacto debido al calentamiento global, la disposición de agua, la deforestación, los patrones de producción, consumo irresponsable, etc., rescatando los principios y valores que sustentan a esta sociedad. Fomentando la sostenibilidad ambiental y la sustentabilidad de los recursos naturales.',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Aceptar',
            confirmButtonAriaLabel: 'Aceptar',
            // cancelButtonText:
            //   '<i class="fa fa-thumbs-down"></i>',
            // cancelButtonAriaLabel: 'Thumbs down'
          })
    }
    else if(desc == 9){
        Swal.fire({
            title: '<strong>Cultura cívica, política y/o democrática</strong>',
            icon: 'info',
            html:
              'Las y los jóvenes que con sus propuestas promuevan el avance en la democracia participativa requisito necesario para la transformación de nuestro país, hacia uno donde prevalezca la justicia, donde cada ciudadano asuma su papel en la definición del rumbo de México y desempeñe la parte que le corresponde desde lo local para contribuir al progreso nacional. <br>Premiando su aportación a una cultura de participación ciudadana, en el ejercicio de acciones basadas en la reflexión, el análisis y fortalecimiento de una cultura democrática sustentada en los valores del diálogo, la tolerancia, el respeto a la pluralidad y a la generación de acuerdos; estas acciones se pueden llevar a cabo por medio de foros, talleres, investigaciones, simulacros, iniciativas ciudadanas, modelos de prácticas democráticas, así como la elaboración de estudios, ponencias, investigaciones, trabajos o publicaciones en revistas; que por su impacto modifiquen entornos y prácticas ciudadanas.',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Aceptar',
            confirmButtonAriaLabel: 'Aceptar',
            // cancelButtonText:
            //   '<i class="fa fa-thumbs-down"></i>',
            // cancelButtonAriaLabel: 'Thumbs down'
          })
    }
    else if(desc == 10){
        Swal.fire({
            title: '<strong>Literatura</strong>',
            icon: 'info',
            html:
              'Escritores(as) del género literario y narrativo: poemas, sonetos, novelas, ensayos y cuentos que hayan permitido fortalecer y salvaguardar las tradiciones de una o de varias regiones del Estado.',
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Aceptar',
            confirmButtonAriaLabel: 'Aceptar',
            // cancelButtonText:
            //   '<i class="fa fa-thumbs-down"></i>',
            // cancelButtonAriaLabel: 'Thumbs down'
          })
    }
    // talento joven
    else if(desc == 11){
      Swal.fire({
        title: '<strong>Artes escénicas (Música)</strong>',
        icon: 'info',
        html:
          'Las y los jóvenes creadores que por su trayectoria de calidad contribuyan a enriquecer nuestro acervo cultural.Subcategoría Música. Composición de música o canciones en cualquier género, que reflejen o hallan reflejado la identidad con Zacatecas.<br> b) Interpretes de cualquier instrumento que hayan representado a la Entidad en el país o en el extranjero<br> c) Interpretación de música regional que identifique a Zacatecas con las y los zacatecanos.',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> Aceptar',
        confirmButtonAriaLabel: 'Aceptar',
        // cancelButtonText:
        //   '<i class="fa fa-thumbs-down"></i>',
        // cancelButtonAriaLabel: 'Thumbs down'
      })
    }
    else if(desc == 12){
      Swal.fire({
        title: '<strong>Artes escénicas (Teatro)</strong>',
        icon: 'info',
        html:
          'Actores, productores que destacan por su trayectoria, intercambios culturales, presentaciones, cursos o actividades curriculares y proyectos en beneficio de la sociedad zacatecana.',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> Aceptar',
        confirmButtonAriaLabel: 'Aceptar',
        // cancelButtonText:
        //   '<i class="fa fa-thumbs-down"></i>',
        // cancelButtonAriaLabel: 'Thumbs down'
      })
    }
    else if(desc == 13){
      Swal.fire({
        title: '<strong>Artes escénicas (Danza)</strong>',
        icon: 'info',
        html:
          'Bailarines que destaquen por su trayectoria, intercambios culturales, cursos y capacitaciones, presentaciones nacionales o internacionales, proyectos o actividades en beneficio de la sociedad en general.',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> Aceptar',
        confirmButtonAriaLabel: 'Aceptar',
        // cancelButtonText:
        //   '<i class="fa fa-thumbs-down"></i>',
        // cancelButtonAriaLabel: 'Thumbs down'
      })
    }
    else if(desc == 14){
      Swal.fire({
        title: '<strong>Artes plásticas, visuales y populares</strong>',
        icon: 'info',
        html:
          'a) Las y los Jóvenes destacados en las artes plásticas y que hayan representado a Zacatecas en el país o en el extranjero,que a través de la práctica del dibujo o la pintura han aportado a la juventud herramientas para sobresalir y mantenerlos alejados de las adicciones, que hayan destacado en el séptimo arte (comerciales, cortometrajes, largometrajes y animaciones), así como aquellos que su quehacer versa en la arquitectura, la escultura, la fotografía.<br>En artes populares serán tomadas en cuenta las expresiones de obras artesanales, con técnicas y materiales tradicionales, así como la creación de nuevos diseños que, por su calidad y aportaciones a nuestra vida cotidiana, contribuyan al fortalecimiento de nuestra identidad, a la vez que beneficien a su comunidad.',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> Aceptar',
        confirmButtonAriaLabel: 'Aceptar',
        // cancelButtonText:
        //   '<i class="fa fa-thumbs-down"></i>',
        // cancelButtonAriaLabel: 'Thumbs down'
      })
    }
    else if(desc == 15){
      Swal.fire({
        title: '<strong>Artes urbano</strong>',
        icon: 'info',
        html:
          'a) La representación de ideas, testimonios, demandas sociales, anécdotas, innovación y tendencias a través de la mezcla de colores de aerosol sobre una superficie de amplias dimensiones.<br> b) A las y los jóvenes que hayan fomentado a través de su arte el mantener vigentes valores y buenas prácticas sociales. Y en general todas aquellas manifestaciones de las llamadas tribus urbanas.',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> Aceptar',
        confirmButtonAriaLabel: 'Aceptar',
        // cancelButtonText:
        //   '<i class="fa fa-thumbs-down"></i>',
        // cancelButtonAriaLabel: 'Thumbs down'
      })
    }
    else if(desc == 16){
      Swal.fire({
        title: '<strong>Ciencia y tecnología</strong>',
        icon: 'info',
        html:
          'Acciones que contribuyan a fomentar y generar investigación científica; creación e innovación tecnológica; investigaciones básicas en las ciencias naturales, de la vida, sociales, de la conducta y las humanidades, fortaleciendo los espacios de expresión de su creatividad e inventiva; generación de conocimientos, difusión y transmisión de los mismos a nivel nacional e internacional, así como su desarrollo y aplicación sustentable. ',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> Aceptar',
        confirmButtonAriaLabel: 'Aceptar',
        // cancelButtonText:
        //   '<i class="fa fa-thumbs-down"></i>',
        // cancelButtonAriaLabel: 'Thumbs down'
      })
    }

}
