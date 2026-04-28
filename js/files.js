
function _(el) {
    return document.getElementById(el);
  }
  
  function uploadFile(doc,idUsr) {
    var file = _("file"+doc).files[0];
    var documento = doc;
    var idUsuario = idUsr;
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    // variable del name file
    formdata.append("file", file);
    // variables post
    formdata.append("documento", documento);
    formdata.append("idUsuario", idUsuario);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "prcd/upload_file.php"); 
    
    // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
    //use file_upload_parser.php from above url

    //ARCHIVO CON EL PROCEDIMIENTO PARA MOVER EL DOCUMENTO AL SERVIDOR
    ajax.send(formdata);
    

    function progressHandler(event) {

        _("loaded_n_total"+doc).innerHTML = "Cargado " + event.loaded + " bytes de " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar"+doc).value = Math.round(percent);
        _("status"+doc).innerHTML = Math.round(percent) + "% subido... espere un momento";
      }
      
      function completeHandler(event) {
        _("status"+doc).innerHTML = event.target.responseText;
        _("progressBar"+doc).value = 0; //wil clear progress bar after successful upload
          _("file"+doc).style.display='none';
          _("progressBar"+doc).style.display='none';
      }
      
      function errorHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
      }
      
      function abortHandler(event) {
        _("status"+doc).innerHTML = "Fallo en la subida";
      }
    
  }
function _(el2) {
    return document.getElementById(el2);
  }
  
  function uploadFileEditar(doc,idUsr) {
    var fileEditar = _("fileEditar"+doc).files[0];
    var documento = doc;
    var idUsuario = idUsr;
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdataEdit = new FormData();
    // variable del name file
    formdataEdit.append("fileEditar", fileEditar);
    // variables post
    formdataEdit.append("documento", documento);
    formdataEdit.append("idUsuario", idUsuario);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandlerEditar, false);
    ajax.addEventListener("load", completeHandlerEditar, false);
    ajax.addEventListener("error", errorHandlerEditar, false);
    ajax.addEventListener("abort", abortHandlerEditar, false);
    ajax.open("POST", "prcd/edit_file.php"); 
    
    // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
    //use file_upload_parser.php from above url

    //ARCHIVO CON EL PROCEDIMIENTO PARA MOVER EL DOCUMENTO AL SERVIDOR
    ajax.send(formdataEdit);
    

    function progressHandlerEditar(event) {

        _("loaded_n_totalEditar"+doc).innerHTML = "Cargado " + event.loaded + " bytes de " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBarEditar"+doc).value = Math.round(percent);
        _("statusEditar"+doc).innerHTML = Math.round(percent) + "% subido... espere un momento";
      }
      
      function completeHandlerEditar(event) {
        _("statusEditar"+doc).innerHTML = event.target.responseText;
        _("progressBarEditar"+doc).value = 0; //wil clear progress bar after successful upload
          _("fileEditar"+doc).style.display='none';
          _("progressBarEditar"+doc).style.display='none';
      }
      
      function errorHandlerEditar(event) {
        _("statusEditar"+doc).innerHTML = "Fallo en la subida";
      }
      
      function abortHandlerEditar(event) {
        _("statusEditar"+doc).innerHTML = "Fallo en la subida";
      }
    
  }
  
// subir video

function uploadVideo(idDoc,idUsr){
  var video = document.getElementById('fileVideo'+idDoc).value;
  var idD = idDoc;
  var idU = idUsr;
  $.ajax({
    type: "POST",
    url: 'prcd/upload_video.php',
    dataType:'json',
    // dataType:'html',
    data:{
        idD:idD,
        idU:idU,
        video:video
    },
    success: function(response)
    {
        document.getElementById('fileVideo'+idDoc).disabled=true;
        document.getElementById('btnGuardar'+idDoc).disabled=true;

        var jsonData = JSON.parse(JSON.stringify(response));
        var successVideo = jsonData.success;
        if (successVideo == "1"){

          Swal.fire({
            icon: 'success',
            imageUrl: '../../img/logo_pej2025_01.png',
            imageHeight: 200,
            title: 'Video cargado',
            text: 'Proceso correcto',
            confirmButtonColor: '#3085d6',
            footer: 'INJUVENTUD'

        });
      }

    }
});

}

// <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.reload();">Guardar</button>

function editVideo(idDoc,idUsr){

    var video = document.getElementById('editVideo'+idDoc).value;
    var idD = idDoc;
    var idU = idUsr;

    $.ajax({
      type: "POST",
      url: 'prcd/edit_video.php',
      dataType:'json',
      data:{
          idD:idD,
          idU:idU,
          video:video
      },
      success: function(response)
      {
          document.getElementById('editVideo'+idDoc).disabled=true;
          document.getElementById('btnEditar'+idDoc).disabled=true;

          var jsonData = JSON.parse(JSON.stringify(response));
          var successVideo = jsonData.success;
          if (successVideo == "1"){
  
            Swal.fire({
              icon: 'success',
              imageUrl: '../../img/logo_pej2025_01.png',
              imageHeight: 200,
              title: 'Video actualizado',
              text: 'Proceso correcto',
              confirmButtonColor: '#3085d6',
              footer: 'INJUVENTUD'
  
          });
        }
        else{
            Swal.fire({
              icon: 'error',
              imageUrl: '../../img/logo_pej2025_01.png',
              imageHeight: 200,
              title: 'Video no actualizado',
              text: 'Proceso incorrecto',
              confirmButtonColor: '#3085d6',
              footer: 'INJUVENTUD'

          });
        }
  
      }
  });

}

function contador(){
  var cont = document.getElementById('contarDocs').value;

  if(cont == 0){
    Swal.fire({
      icon: 'info',
      imageUrl: '../../img/logo_pej2025_01.png',
      imageHeight: 200,
      title: 'Bienvenido al sistema de postulación al PEJ2025',
      text: 'No has cargado documentos para postularte al PEJ2025, comienza a subir tus documentos.',
      confirmButtonColor: '#3085d6',
      footer: 'INJUVENTUD'

  });
  }
  else if(cont >= 0 & cont < 11){
    Swal.fire({
      icon: 'warning',
      imageUrl: '../../img/logo_pej2025_01.png',
      imageHeight: 200,
      title: 'Tienes documentos pendientes por cargar',
      html: 'Has cargado <b>'+cont+'</b> documento(s) para postularte al PEJ2025.',
      confirmButtonColor: '#3085d6',
      footer: 'INJUVENTUD'

    });
  }
  else if(cont == 11){

    document.getElementById('constanciaP').hidden=false;

    Swal.fire({
      icon: 'success',
      imageUrl: '../../img/logo_pej2025_01.png',
      imageHeight: 200,
      title: 'Proceso finalizado',
      html: 'Has cargado los <strong>11 documentos</strong> para postularte al <strong>PEJ2025</strong>. Ya puedes descargar la constancia de participación en la sección de Convocatoria.<p>Contesta una breve encuesta para ayudarnos a mejorar el sistema de postulación al PEJ2025.</p><p><a href="https://forms.gle/iLMZR3EWTwvpPmA1A" target="_blank">Encuesta</a></p>',
      confirmButtonColor: '#3085d6',
      footer: 'INJUVENTUD'

  });
  }
}

function categoriaCompleta(){
  var categoria = document.getElementById('catCompleto').value;
//document.getElementById('catCompleto').hidden = false;
  console.log('este este el valor 2: '+categoria);
  $.ajax({
    type: "POST",
    url: 'query/categoria_titulo.php',
    dataType:'json',
    data:{
        categoria:categoria
    },
    success: function(data)
    {
      
      var jsonData = JSON.parse(JSON.stringify(data));
      var successCategoria = jsonData.cat;
      if(successCategoria != null || successCategoria !=""){
      	console.log('es el data de JSON cat '+jsonData.cat);

      var elemento = document.getElementById('categoriaOut');
      elemento.value = jsonData.cat;
	console.log(jsonData.cat);
      // $('#resultSpan').html(data);
      }
    }

  });

}
